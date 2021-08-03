Backend Challenge

**Challenge details:**

&quot;AvailableHotels&quot; is a hotel search solution that look into many providers and display results from all the available hotels, for now we are aggregate from 1 provider: &quot;BestHotels&quot;

What is required:

1. Implement &quot;AvailableHotels&quot; service that should return results from the current provider (&quot;BestHotels&quot;), the result should be a JSON response of all available hotels ordered by hotel rate.
2. Implement a web page (1 page) that calls the implemented API to get the available hotels and display them, you can show them as you want. The only requirement from our side is to allow the user to search on the list from the web page.

&quot;AvailableHotel&quot; API (You service request/response API):

Request:

- fromDate: ISO\_LOCAL\_DATE

- toDate: ISO\_LOCAL\_DATE

- city: IATA code (AUH)

- numberOfAdults: integer number

Response:

- provider: name of the provider (&quot;BestHotels&quot; or &quot;CrazyHotels&quot;)

- hotelName: Name of the hotel

- fare: fare per night

- amenities: array of strings

Provider API details(BestHotel):

Request:

- city IATA code (AUH)

- fromDate ISO\_LOCAL\_DATE

- toDate ISO\_LOCAL\_DATE

- numberOfAdults: integer number

Response:

- hotel: Name of the hotel

- hotelRate: Number from 1-5

- hotelFare: Total price rounded to 2 decimals

- roomAmenities: String of amenities separated by comma

What you need to implement:

- A solution that meets the above requirements.
- You should consider the scalability in your solution, we will add new providers in the future in a minimum amount of change and without affecting the current working providers. You should consider the differences in the data structure between the providers and how to unify the data after getting the result from the provider.
- **There is no need to**  **use a database**  **in your solution, just mock the result, you can just**  **return a few**  **records for each provider.**


**Technology Set**
PHP programing language , version 7
Laravel framework , version 8
MySQL database
