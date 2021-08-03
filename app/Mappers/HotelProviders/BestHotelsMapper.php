<?php

namespace App\Mappers\HotelProviders;

class BestHotelsMapper
{
    /**
     * In real implementation this should be converted to mapping classes
     * @param array $response
     * @return array
     */
    public function mapResponse(array $response): array
    {
        $mapped = [];
        foreach ($response as $index => $entry) {
            $mapped[$index]['provider'] = 'BestHotels';
            $mapped[$index]['hotelName'] = $entry['hotel'];
            $mapped[$index]['fare'] = $entry['hotelFare'];
            $mapped[$index]['amenities'] = !empty(['roomAmenities']) ? explode(',', $entry['roomAmenities']) : null;
        }
        return $mapped;
    }
}
