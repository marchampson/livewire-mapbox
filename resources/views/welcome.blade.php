<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <style>
        #map-container {
            position: relative;
            width: 800px;
            height: 250px;
        }

        #map {
            position: relative;
            height: inherit;
            width: inherit;
        }

    </style>
    @livewireStyles
</head>
<body class="antialiased">
    <div class="flex-1 flex items-stretch overflow-hidden">
        <livewire:activity-stats/>
    </div>
    @livewireScripts
    @stack('scripts')
</body>
</html>
