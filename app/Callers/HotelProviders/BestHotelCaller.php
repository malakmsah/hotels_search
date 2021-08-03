<?php

namespace App\Callers\HotelProviders;

use App\Callers\BaseCaller;
use App\Mappers\HotelProviders\BestHotelsMapper;
use Monolog;

class BestHotelCaller extends BaseCaller
{
    /**
     * @var string
     */
    private $url;

    /**
     * @return BestHotelsMapper
     */
    private function getBestHotelMapper() : BestHotelsMapper
    {
        return new BestHotelsMapper();
    }

    public function __construct()
    {
        $this->url = env('HOTEL_PROVIDER_URL_BEST_HOTEL');

        $logger = new Monolog\Logger('BestHotelLogger');
        parent::__construct($logger);
    }

    /**
     * @param $fromDate
     * @param $toDate
     * @param $city
     * @param $numberOfAdults
     * @return array[]
     */
    public function getAvailableHotels($fromDate, $toDate, $city, $numberOfAdults) : array
    {
        $url = $this->url . 'getAvailableHotels/';
        $parameters = [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'city' => $city,
            'numberOfAdults' => $numberOfAdults
        ];
        $response = $this->get($url, $parameters);

        // Mocked response
        $response =[
            0 => [
                'hotel' => '4 seasons',
                'hotelRate' => '4.6',
                'hotelFare' => '150',
                'roomAmenities' => 'Valet parking,Pool,Wifi,Flatscreen TV,Landmark view'

            ],
            1 => [
                'hotel' => 'Fairmont',
                'hotelRate' => '4.3',
                'hotelFare' => '140',
                'roomAmenities' => 'Valet parking,Pool,Wifi,Flatscreen TV,Landmark view'
            ],
            2 => [
                'hotel' => 'Hilton',
                'hotelRate' => '4.2',
                'hotelFare' => '147',
                'roomAmenities' => 'Valet parking,Pool,Wifi,Flatscreen TV,Landmark view'
            ],
        ];
        // mocked response
        return $this->getBestHotelMapper()->mapResponse($response);
    }
}
