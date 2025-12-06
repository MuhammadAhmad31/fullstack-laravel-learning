<?php

namespace App\Http\Controllers;

use App\Services\RajaOngkirService;
use App\Helpers\ApiResponse;

class RajaOngkirController extends Controller
{
    protected $rajaOngkir;

    public function __construct(RajaOngkirService $service)
    {
        $this->rajaOngkir = $service;
    }

    public function provinces()
    {
        $res = $this->rajaOngkir->getProvinces();
        return ApiResponse::success($res['data'], "Provinces retrieved successfully");
    }

    public function cities($provinceId)
    {
        $res = $this->rajaOngkir->getCities($provinceId);
        return ApiResponse::success($res['data'], "Cities retrieved successfully");
    }

    public function district($cityId)
    {
        $res = $this->rajaOngkir->getDistrict($cityId);
        return ApiResponse::success($res['data'], "Districts retrieved successfully");
    }

    public function subdistrict($districtId)
    {
        $res = $this->rajaOngkir->getSubdistrict($districtId);
        return ApiResponse::success($res['data'], "Subdistricts retrieved successfully");
    }

    public function cost()
    {   
        request()->validate([
            'origin' => 'required|integer',
            'destination' => 'required|integer',
            'weight' => 'required|integer',
            'courier' => 'required|string'
        ]);

        $res = $this->rajaOngkir->checkCost(
                request('origin'),
                request('destination'),
                request('weight'),
                request('courier')
            );

        return ApiResponse::success($res['data'], "Shipping cost calculated successfully");
    }

    public function CheckOngkirPage()
    {
        return view('pages.ongkir.index');
    }
}
