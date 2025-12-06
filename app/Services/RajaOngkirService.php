<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $baseUrl;
    protected $costApiKey;

    public function __construct()
    {
        $this->baseUrl = config('app.shipping.base_url');
        $this->costApiKey = config('app.shipping.cost_api_key');

    }

    private function client() {
        return Http::withHeaders([
            'key' => $this->costApiKey
        ]);
    }

    public function getProvince()
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/province");

        return $response->json();
    }

    public function getCities($provinceId)
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/city/{$provinceId}");

        return $response->json();
    }

    public function getDistrict($cityId)
    {
        $response = $this->client()->get("{$this->baseUrl}/destination/district/{$cityId}");

        return $response->json();
    }

    public function checkEstimation($origin, $destination, $weight, $courier)
    {
        $response = $this->client()->asForm()->post("{$this->baseUrl}/calculate/district/domestic-cost", [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
            'price' => 'lowest',
        ]);

        \Log::info('RajaOngkir Response: ' . $response->body());

        return $response->json();
    }
}