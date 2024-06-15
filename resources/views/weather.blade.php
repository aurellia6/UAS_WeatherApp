<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather Show</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
<body style="display: flex; align-items: center; justify-content: center; text-align:center; background-color:rgb(202, 135, 135); color:white; font-family:Helvetica; margin-top:10%; margin-bottom:10%; font-weight:bold">
    <div style="margin-left: auto;
    margin-right: auto;
    width: 50%;">
        <div>
            <h1>Weather Data</h1>
        </div>


        <h2>Coordinates</h2>
        <p>Longitude: {{ $data['coord']['lon'] }}</p>
        <p>Latitude: {{ $data['coord']['lat'] }}</p>
        <br>

        @foreach ($data['weather'] as $weather)
            <h2>Weather : </h2>
            <img src="{{$imgurl}}">
            <p>
                Clouds : {{ $weather['description'] }}
            </p>
        @endforeach

        <p>Temperature: {{ $data['main']['temp'] }}</p>
        <p>Feels Like: {{ $data['main']['feels_like'] }}</p>
        <br>

        <p>Sunrise: {{ $data['sys']['sunrise'] }}</p>
        <p>Sunset: {{ $data['sys']['sunset'] }}</p>
        <br>
    </div>

   </body>

</html>
