<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PT. Nata Ultima Enggal - Panel Maker Professional</title>
        
        {{-- Font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        
        @vite([ 'resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans">
        {{-- Konten Halaman --}}
        @include('livewire.guest.header')
        @include('livewire.guest.home')
        @include('livewire.guest.about')
        @include('livewire.guest.timeline')
        @include('livewire.guest.services')
        @include('livewire.guest.products')
        @include('livewire.guest.certified')
        @include('livewire.guest.portfolio')
        @include('livewire.guest.clients')
       {{-- @livewire('guest.faq') --}}
        @include('livewire.guest.contact')
        @include('livewire.guest.footer')

 
    </body>
</html>