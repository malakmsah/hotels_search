<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HotelService;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * @var HotelService
     */
    private $hotelService;

    public function getAvailable(Request $request): \Illuminate\Http\JsonResponse
    {

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $city = $request->input('city');
        $numberOfAdults = $request->input('numberOfAdults');

        $validate = $request->validate([
            'fromDate' => 'required|date',
            'toDate' => 'required|date',
            'city' => 'required|string|min:3|max:255',
            'numberOfAdults' => 'required|integer|min:1|max:5',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        try {

            $data = $this->getHotelsService()->getAvailableHotels($fromDate, $toDate, $city, $numberOfAdults);
            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * @return HotelService
     */
    private function getHotelsService(): HotelService
    {
        if (empty($this->hotelService)) {
            $this->hotelService = new HotelService();
        }
        return $this->hotelService;
    }
}
