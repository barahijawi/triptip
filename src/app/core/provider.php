<?php
//namespace triptip\src\app\core\provider;
class provider
{
    public static function jsonProvider()
    {
        return json_encode( [
        [
            "Departure"             => "Gerona Airport",
            "Arrival"               => "Stockholm",
            "Transportation"        => "Plane",
            "Transportation_number" => "SK455",
            "Seat"                  => "3A",
            "Gate"                  => "45B",
            "Baggage"               => "334",
        ],
        [
            "Departure"             => "Stockholm",
            "Arrival"               => "New York",
            "Transportation"        => "Plane",
            "Transportation_number" => "SK22",
            "Seat"                  => "7B",
            "Gate"                  => "22",
        ],
        [
            "Departure"      => "Barcelona",
            "Arrival"        => "Gerona Airport",
            "Transportation" => "Bus",
        ],
        [
            "Departure"             => "Madrid",
            "Arrival"               => "Barcelona",
            "Transportation"        => "Train",
            "Transportation_number" => "78A",
            "Seat"                  => "45B",
        ],
    ]);
    }
}
