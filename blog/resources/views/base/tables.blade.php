<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>dj_blog</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}"  media="all">
</head>
<body>

@yield('content')
<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('layui/layui.all.js')}}" charset="utf-8"></script>
<script src="{{asset('js/common.js')}}"></script>

<script>
    layui.use(['form', 'layedit', 'laydate'], function(){

    });
</script>

</body>
</html>