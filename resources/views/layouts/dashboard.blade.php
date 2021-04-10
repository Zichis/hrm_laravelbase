<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <div class="bg-gray-800 h-screen w-14 fixed text-center py-5">
                    <div class="my-20">
                        <a href="{{ route('company.dashboard', ['company'=> $company->identifier]) }}" class="p-2 block my-5 text-gray-200 hover:text-gray-400 focus:outline-none">
                            <i class="fas fa-th-large"></i>
                        </a>
                        <a href="{{ route('staff.index', ['company'=> $company->identifier]) }}" class="p-2 block my-5 text-gray-200 hover:text-gray-400 focus:outline-none">
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-200 pl-14 h-screen overflow-y-scroll w-full">
                    <div>{{ $header }}</div>
                    <div>{{ $slot }}</div>
                </div>
            </div>
        </div>
    </body>
</html>
