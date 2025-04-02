<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enhanced Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h3 {
            color: #333;
        }
    </style>
</head>
<body>
    <h3>Hello, Welcome to the Blade Component Example!</h3>

    {{-- <x-alert style="color: red; border: 1px solid green;" text="Dit is een bericht"/> --}}

    {{-- @php
        $languages = ['Php', 'Javascript', 'Java', 'Dart', 'C', 'C++'];
    @endphp

    @foreach ($languages as $language)
        <x-alert :text="$language"/>
    @endforeach --}}
     
    <x-button style="padding: 10px; background-color: red; color: white; border-radius: 5px; border: none; cursor: pointer;"/>
</body>
</html>