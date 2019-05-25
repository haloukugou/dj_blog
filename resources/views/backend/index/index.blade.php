@extends('base.default')

{{--@section('title', 'Page Title')--}}

{{--@section('sidebar')--}}
    {{--@parent--}}

    {{--<p>这将追加到主布局的侧边栏。</p>--}}
{{--@endsection--}}

@section('content')
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">首页</a>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

        </div><!-- /.page-content -->
    </div>
@endsection