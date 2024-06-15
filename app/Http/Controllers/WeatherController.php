<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $jsonData = file_get_contents('https://mgm.ub.ac.id/weather.json');
        $data = json_decode($jsonData, true);
        $timezone = new \DateTimeZone('Asia/Jakarta');

        // Convert the sunrise and sunset timestamps to DateTime objects
        $sunrise = new \DateTime('@' . $data['sys']['sunrise']);
        $sunset = new \DateTime('@' . $data['sys']['sunset']);

        // Set the timezone for the sunrise and sunset DateTime objects
        $sunrise->setTimezone($timezone);
        $sunset->setTimezone($timezone);

        // Format the sunrise and sunset DateTime objects to a date and time string
        $data['sys']['sunrise'] = $sunrise->format('Y-m-d H:i:s');
        $data['sys']['sunset'] = $sunset->format('Y-m-d H:i:s');

        // Access the 'icon' data
        $icon = $data['weather'][0]['icon'];

        // Concatenate to form the image URL
        $imgurl = 'https://openweathermap.org/img/wn/' . $icon . '@2x.png';

        return view('weather', ['data' => $data, 'imgurl' => $imgurl]);
    }
}
