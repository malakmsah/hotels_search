<?php

namespace App\Services;

use App\Callers\HotelProviders\BestHotelCaller;
use App\Repositories\HotelRepository;
use App\Repositories\ProviderRepository;

class HotelService
{
    /**
     * @param $fromDate
     * @param $toDate
     * @param string $city
     * @param int $numberOfAdults
     * @param int $providerId
     * @return mixed
     *
     * 1 is the id of the provider (“BestHotels”),
     */
    public function getAvailableHotels($fromDate, $toDate, string $city, int $numberOfAdults, int $providerId = 1)
    {
        $provider = $this->getProviderRepository()->getById($providerId);

        switch ($provider->name) {
            case 'Best Hotels':
                $response = $this->getBestHotelCaller()->getAvailableHotels($fromDate, $toDate, $city, $numberOfAdults);
                break;
            default:
                $response = null;
                break;
        }

        return $this->mapResponse($response);
    }

    /**
     * @return ProviderRepository
     */
    protected function getProviderRepository()
    {
        return new ProviderRepository();
    }

    /**
     * @return BestHotelCaller
     */
    protected function getBestHotelCaller()
    {
        return new BestHotelCaller();
    }

    /**
     * In real implementation this should be converted to mapping classes
     * @param array $response
     * @return array
     */
    protected function mapResponse(array $response): array
    {
        $mapped = [];
        foreach ($response as $index => $entry) {
            $mapped[$index]['hotelName'] = $entry['hotel'];
            $mapped[$index]['fare'] = $entry['hotelFare'];
            $mapped[$index]['amenities'] = !empty(['roomAmenities']) ? explode(',', $entry['roomAmenities']) : null;
        }
        return $mapped;
    }

    /**
     *  In real implementation this should be converted to name generation classes
     * @param $providerName
     * @return void|null
     *
     *   * */
    function callerNameGenerator($providerName)
    {
        $callerName = '\App\Callers\HotelProviders' . '\\' . $providerName;
        if (is_callable(array($this, $callerName))) {
            $this->$callerName();
        } else {
            return null;
        }
    }

    /**
     * @return \App\Repositories\HotelRepository
     */
    protected function getRepository()
    {
        return new HotelRepository();
    }
}
