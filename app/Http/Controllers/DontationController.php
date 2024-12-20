<?php

namespace App\Http\Controllers;
use App\Models\Dontation;
use App\Services\CurrencyConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmail;
class DontationController extends Controller
{
  protected $currencyConverter;
  public function __construct(CurrencyConverter $currencyConverter)
  {
      $this->currencyConverter = $currencyConverter;
  }

    function index(){
      $donations = DB::table('dontations')->where('status','completed')->get();
      $donations_count = DB::table('dontations')->where('status','completed')->count();
        $amt_donated = 0;
        foreach ($donations as $donation){
          $amount=$donation->amount;
          $amt_donated += $amount;
        }
        return view('donation',[
          'donations_count'=>$donations_count,
            'amt_donated'=>$amt_donated,
        ]);
    }

    function donate(Request $request){
      
      $ref=rand(1000,20000)+1;
      session(['ref_no'=>$ref]);
      $email=$request->input('email');
      $donation = new Dontation;
      $donation->donor_name=$request->input('name');
      $donation->amount=$request->input('amount');
      $donation->email=$email;
      $donation->status='pending';
      $donation->refno=$ref;

      if(!($donation->save())){
        return back()->with('error','Unable to proceed to payment, Try again');
      }

      $amt=$request->input('amount');
      $amtInUSD = $this->currencyConverter->convertToNGN($amt, 'USD');

      if(!$amtInUSD){
        return back()->with('error','Error trying to pay,Try again');
      }

        $postRequest = [
          "email"=> $email,
          "amount"=> intval($amtInUSD) * 100,
          "reference"=> $ref,
          "callback_url"=>route('pay.verify'),
      ];
      $headers = ['Content-Type: application/json', 'Authorization: Bearer sk_test_55ea63fa0f071099b7db6e20a105ca1cf6d2165e'];
      $url ='https://api.paystack.co/transaction/initialize';
      ////Step 1, initialize curl
      $cURLConnection = curl_init($url);
      ////step 2, Set the curl options using the functions curl_setopt()
      curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST,'POST');
      curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($postRequest));
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
      ////step 3, execute the curl session using curl_exec()
      $apiResponse = curl_exec($cURLConnection);
      if($apiResponse){
          curl_close($cURLConnection);
          $response = json_decode($apiResponse);
          if($response->status == true){
            $url=$response->data->authorization_url;
            return redirect($url);
          }else{
            dd($apiResponse);
            $donation->status="failed";
            $donation->save();
            return back()->with('error','Error trying to pay');
          }
      }else{
          $r = curl_error($cURLConnection);
          $donation=Dontation::where('refno','=',$ref)->first();
          $donation->status="failed";
          $donation->save();
        return back()->with('error','Poor Connection Status');
      }
    }



    public function verify(){
      $donations = DB::table('dontations')->where('status','completed')->get();
        $ref=session('ref_no');
        $headers = ['Content-Type: application/json', 'Authorization: Bearer sk_test_55ea63fa0f071099b7db6e20a105ca1cf6d2165e'];
        $url ="https://api.paystack.co/transaction/verify/$ref";
        ////Step 1, initialize curl
        $cURLConnection = curl_init($url);
        ////step 2, Set the curl options using the functions curl_setopt()
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
        $apiResponse = curl_exec($cURLConnection);
        $donation=Dontation::where('refno','=',$ref)->first();
        if($apiResponse){
            curl_close($cURLConnection);
            $response = json_decode($apiResponse);
            if($response->status == true){
               $donation->status="completed";
               $donation->save();
               $name=$donation->donor_name;
               $amt=$donation->amount;
               $email=$donation->email;
               $amt_raised=
               $amt_raised = 0;
              foreach ($donations as $donation){
                $amount=$donation->amount;
                $amt_raised += $amount;
              }
              $date=$donation->date;
               $this->sendmail($name,$email,$amt,$date,$amt_raised);
               return redirect()->route('donation')->with('success','Payment successfully, Thank You..');
              }else{
                $donation->status="failed";
                $donation->save();
                return redirect()->route('donation')->with('error','Payment failed');
              }
        }else{
            $r = curl_error($cURLConnection);
            $donation->status="failed";
            $donation->save();
            return redirect()->route('donation')->with('error','Payment failed');
        }

    }

    public function sendmail($name,$email,$amt,$date,$amt_raised){
        $details = [
          'subject' => 'Thank You from HopeNest',
          'name' => $name,
          'amount'=>$amt,
          'date'=>$date,
          'amt_raised'=>$amt_raised,
      ];

      Mail::to($email)->send(new CustomEmail($details));

      return 'Email Sent Successfully';
    }

    public function admin_donation(){
      $donations=Dontation::get();
      return view('admin.showdonation', 
      ['donations'=>$donations]);
    }

}
