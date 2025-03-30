<?php
namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PhoneValidationService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.abstract_api.key');
    }

    public function validatePhoneNumber($phone)
    {
        try {
            $query = http_build_query([
                'api_key' => $this->apiKey,
                'phone' => $phone
            ]);

            $response = $this->client->get("https://phonevalidation.abstractapi.com/v1/?{$query}");

            $data = json_decode($response->getBody(), true);
            return $data['valid'] ?? false;

        } catch (RequestException $e) {
            return $e->getMessage();
        }
    }
}


