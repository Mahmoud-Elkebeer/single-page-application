<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jumia Market Test</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="app">
    <customers></customers>
</div>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
