<?php

Flight::route('GET /midterm/connection-check', function(){
    /** TODO
    * This endpoint prints the message from constructor within MidtermDao class
    * Goal is to check whether connection is successfully established or not
    * This endpoint does not have to return output in JSON format
    */
    Flight::midtermService();
});

Flight::route('POST /midterm/input_data', function(){
    /** TODO
    * This endpoint is used to insert IP2LOCATION.json file content to database table locations
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->input_data($data));
});


Flight::route('GET /midterm/summary', function(){
    /** TODO
    * This endpoint is used to return total number of countries, regions and cities from locations table
    * This endpoint should return output in JSON format
    */

    Flight::json(Flight::midtermService()->summary());
});

Flight::route("GET /midterm/report_per_country", function(){
    /** TODO
    * This endpoint is used to create report that shows countries and
    * total number of cities in each country.
    * This report should be generated using single query.
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->report_per_country());
});

Flight::route("GET /midterm/search", function(){
    /** TODO
    * This endpoint is used to return location or locations (country, region and city)
    * by given parameters 'from' and 'to'
    * Do not modify route by adding parameters to it
    * Parameters are not required
    * If parameters are not provided return all locations
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->search($from, $to));
});

?>
