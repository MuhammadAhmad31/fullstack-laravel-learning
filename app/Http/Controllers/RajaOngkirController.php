<?php

namespace App\Http\Controllers;

use App\Services\RajaOngkirService;

class RajaOngkirController extends Controller
{
    protected $rajaOngkir;

    public function __construct(RajaOngkirService $service)
    {
        $this->rajaOngkir = $service;
    }

    public function provinces()
    {
        return response()->json($this->rajaOngkir->getProvinces());
    }

    public function cities($provinceId)
    {
        return response()->json($this->rajaOngkir->getCities($provinceId));
    }

    public function district($cityId)
    {
        return response()->json($this->rajaOngkir->getDistrict($cityId));
    }

    public function subdistrict($districtId)
    {
        return response()->json($this->rajaOngkir->getSubdistrict($districtId));
    }

    public function cost()
    {
        request()->validate([
            'origin' => 'required|integer',
            'destination' => 'required|integer',
            'weight' => 'required|integer',
            'courier' => 'required|string'
        ]);

        return response()->json(
            $this->rajaOngkir->checkCost(
                request('origin'),
                request('destination'),
                request('weight'),
                request('courier')
            )
        );
    }
}
