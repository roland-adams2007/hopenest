<?php
// app/Services/CurrencyConverter.php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CurrencyConverter
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CURRENCY_API_KEY'); // Store your API key in the .env file
    }

    public function convertToNGN($amount, $currency = 'USD')
    {
        try {
            // Make the API request
            $response = $this->client->get("https://v6.exchangerate-api.com/v6/{$this->apiKey}/latest/{$currency}");

            // Decode the response JSON
            $data = json_decode($response->getBody(), true);

            // Check if the NGN conversion rate exists
            if (isset($data['conversion_rates']['NGN'])) {
                $rate = $data['conversion_rates']['NGN'];
                return $amount * $rate;
            }
            return null;
        } catch (RequestException $e) {
            logger()->error('Currency conversion request failed: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            // Handle other unexpected exceptions
            logger()->error('Unexpected error in currency conversion: ' . $e->getMessage());
            return null;
        }
    }
}
?>
