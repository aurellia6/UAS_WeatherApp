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

        // mengubah var sunrise sunset menjadi objek datetime 
        $sunrise = new \DateTime('@' . $data['sys']['sunrise']);
        $sunset = new \DateTime('@' . $data['sys']['sunset']);

        // menetapkan timezone 
        $sunrise->setTimezone($timezone);
        $sunset->setTimezone($timezone);

        //format ke date dan time string 
        $data['sys']['sunrise'] = $sunrise->format('Y-m-d H:i:s');
        $data['sys']['sunset'] = $sunset->format('Y-m-d H:i:s');

        //icon weather 
        $icon = $data['weather'][0]['icon'];

        //ambil gambar icon
        $imgurl = 'https://openweathermap.org/img/wn/' . $icon . '@2x.png';

        return view('weather', ['data' => $data, 'imgurl' => $imgurl]);
    }
}
