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
     * @return array[]|null
     *
     * 1 is the id of the provider (“BestHotels”),
     */
    public function getAvailableHotels($fromDate, $toDate, string $city, int $numberOfAdults, int $providerId = 1): ?array
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
     * @return ProviderRepository
     */
    protected function getProviderRepository(): ProviderRepository
    {
        return new ProviderRepository();
    }

    /**
     * @return BestHotelCaller
     */
    protected function getBestHotelCaller(): BestHotelCaller
    {
        return new BestHotelCaller();
    }


    /**
     *  In further implementation this should be converted to name generated classes
     * @param $providerName
     * @return void|null
     *
     **/
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
     * @return HotelRepository
     */
    protected function getRepository(): HotelRepository
    {
        return new HotelRepository();
    }
}
