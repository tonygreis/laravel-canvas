<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="manifest" href="/site.webmanifest">
        <meta property="fb:app_id" content="1899604223522771" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123751041-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123751041-8');
</script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" data-turbolinks-track="true">
        <script defer src="{{ mix('js/front.js') }}" data-turbolinks-track="true"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" data-turbolinks-track="true">
    @if(isset($head))
            {{ $head }}
        @endif
    </head>
    <body class="font-sans antialiased bg-gray-200 dark:bg-gray-800">
            <x-front.navbar></x-front.navbar>
            @if (isset($header))
                <header class="bg-gray-900 shadow">
                        {{ $header }}
                </header>
            @endif
            <main class="mt-2 min-h-screen">
                {{ $slot }}
            </main>
            <x-front.footer></x-front.footer>
            @if(isset($script))
                {{ $script }}
            @endif
    </body>
</html>
