<?php

namespace App\Services;

use App\Callers\HotelProviders\BestHotelCaller;
use App\Repositories\HotelRepository;
use App\Repositories\ProviderRepository;

class HotelService
{
    /**
     * @return \App\Repositories\HotelRepository
     */
    protected function getRepository()
    {
        return new HotelRepository();
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
     * @param $fromDate
     * @param $toDate
     * @param $city
     * @param $numberOfAdults
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
        return $response;
    }

    /**
     * @param $providerName
     * @return void|null

    function callerNameGenerator($providerName)
    {
        $callerName = '\App\Callers\HotelProviders' . '\\' . $providerName;
        if (is_callable(array($this, $callerName))) {
            $this->$callerName();
        } else {
            return null;
        }
    }
     * */
}
