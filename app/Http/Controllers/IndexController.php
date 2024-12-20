<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request  $request){

        $blogs = DB::table('blogs')->limit(3)->get();
        $donations = DB::table('dontations')->where('status','completed')->get();
        $donations_count = DB::table('dontations')->where('status','completed')->count();
        $amt_donated = 0;
        foreach ($donations as $donation){
          $amount=$donation->amount;
          $amt_donated += $amount;
        }

        return view('index',[
            'donations_count'=>$donations_count,
            'amt_donated'=>$amt_donated,
            'blogs'=>$blogs,
        ]);
      }
}
