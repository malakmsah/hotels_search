<?php

namespace App\Callers\HotelProviders;

use App\Callers\BaseCaller;
use Monolog;

class BestHotelCaller extends BaseCaller
{

    private $url;

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
    public function getAvailableHotels($fromDate, $toDate, $city, $numberOfAdults)
    {
        $url = $this->url . 'getAvailableHotels/';
        $parameters = [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'city' => $city,
            'numberOfAdults' => $numberOfAdults
        ];
        $response = $this->get($url, $parameters);

        // mocked response
        return [
            0 => [
                'hotelName' => '4 seasons',
                'fare' => '150',
                'amenities' => [
                    'Valet parking',
                    'Pool',
                    'Wifi',
                    'Flatscreen TV',
                    'Landmark view'
                ]
            ],
            1 => [
                'hotelName' => 'Fairmont',
                'fare' => '140',
                'amenities' => [
                    'Valet parking',
                    'Pool',
                    'Wifi',
                    'Flatscreen TV',
                    'Landmark view'
                ]
            ],
            3 => [
                'hotelName' => 'Hilton',
                'fare' => '147',
                'amenities' => [
                    'Valet parking',
                    'Pool',
                    'Wifi',
                    'Flatscreen TV',
                ]
            ],
        ];
    }
}
