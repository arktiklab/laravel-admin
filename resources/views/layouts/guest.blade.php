<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Arktik - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('vendor/arktik-admin/arktik-admin.app.css')}}" />
</head>
<body class="font-sans antialiased">
<div>
    <div class="flex flex-1 flex-col md:pl-64">
        <!-- PAGE DYNAMIC CONTENT -->
        <main>
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
