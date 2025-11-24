<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

{{-- Judul Halaman Dinamis --}}
<title>{{ $title ?? config('app.name') }}</title>

{{-- Favicon dengan Prioritas WebP dan Fallback --}}
<link rel="icon" href="{{ asset('assets/img/logo.webp') }}" type="image/webp">
<link rel="icon" href="{{ asset('assets/img/logo.webp') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

{{-- Font --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

{{-- Aset Vite dan Konfigurasi Flux --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance