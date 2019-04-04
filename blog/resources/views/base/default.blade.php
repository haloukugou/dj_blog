<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>blog-@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('cssfile')
</head>

<body class="gray-bg">

@yield('base.content')



</body>

</html>
