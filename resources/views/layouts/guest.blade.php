<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Velvet Hair Studio') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|inter:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <style>
            body { font-family: 'Inter', sans-serif; }
            .font-display { font-family: 'Cormorant Garamond', serif; }
        </style>
    </head>

@extends('layouts.salon')

@section('title', 'Home – ' . config('app.name'))

@section('content')    
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col">
    <!-- Page content -->
    <main class="flex-1 w-full">
        {{ $slot }}
    </main>
    @livewireScripts
</body>

</html>
