<html>
<head>
    <title>App Name - {{ $title ?? '' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
{{ $slot }}
</body>
</html>
