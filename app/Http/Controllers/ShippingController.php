<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaOngkirService;
use App\Helpers\ApiResponse;

class ShippingController extends Controller
{
    protected $rajaOngkir;

    public function __construct(RajaOngkirService $service)
    {
        $this->rajaOngkir = $service;
    }


    public function getProvinces()
    {
        $res = $this->rajaOngkir->getProvince();

        return ApiResponse::success($res['data'], "Provinces retrieved successfully");
    }

    public function getCities($provinceId)
    {
        $res = $this->rajaOngkir->getCities($provinceId);

        return ApiResponse::success($res['data'], "Cities retrieved successfully");
    }

    public function getDistricts($cityId)
    {
        $res = $this->rajaOngkir->getDistrict($cityId);

        return ApiResponse::success($res['data'], "Districts retrieved successfully");
    }

    public function postEstimation(Request $request)
    {
        // $validated = $request->validate([
        //     'origin' => 'required|integer',
        //     'destination' => 'required|integer',
        //     'weight' => 'required|integer',
        //     'courier' => 'required|string',
        // ]);

        // if(!$validated) {
        //     return ApiResponse::error('Validation Error', 422);
        // }

        // dd($request->all());

        $res = $this->rajaOngkir->checkEstimation(
            $request->input('origin'),
            $request->input('destination'),
            $request->input('weight'),
            $request->input('courier')
        );

        return ApiResponse::success($res['data'], "Estimation retrieved successfully");
    }

    public function pageCheckOngkir()
    {
        return view('pages.ongkir.index');
    }
}
