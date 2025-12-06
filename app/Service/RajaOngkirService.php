<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('app.rajaongkir.base_url');
        $this->apiKey = config('app.rajaongkir.cost_api_key');
    }

    private function client()
    {
        return Http::withHeaders([
            'key' => $this->apiKey
        ]);
    }

    public function getProvinces()
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/province");

        return $response->json();
    }

    public function getCities($provinceId)
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/city", [
            'province' => $provinceId
        ]);

        return $response->json();
    }

    public function getDistrict($cityId)
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/district", [
            'city' => $cityId
        ]);

        return $response->json();
    }

    public function getSubdistrict($districtId)
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/subdistrict", [
            'district' => $districtId
        ]);

        return $response->json();
    }

    public function checkCost($origin, $destination, $weight, $courier)
    {
        $response = $this->client()->post("{$this->baseUrl}/calculate/district/domestic-cost", [
            'origin'        => $origin, 
            'destination'   => $destination,
            'weight'        => $weight,
            'courier'       => $courier
        ]);

        return $response->json();
    }
}
