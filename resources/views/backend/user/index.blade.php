@extends('base.default')

{{--@section('title', 'Page Title')--}}

{{--@section('sidebar')--}}
{{--@parent--}}

{{--<p>这将追加到主布局的侧边栏。</p>--}}
{{--@endsection--}}
@section('content')
    <style>
        th {
            text-align: center !important;
        }

        tr td {
            text-align: center !important;
        }
    </style>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{url('djIndex')}}">首页</a>
                    </li>
                    <li>
                        用户管理
                    </li>
                    <li>
                        用户列表
                    </li>
                </ul>
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="50">
                                            <label class="pos-rel">
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th width="200">账号</th>
                                        <th width="100">密码盐</th>
                                        <th width="200">上次登录时间</th>
                                        <th width="150">登录ip</th>
                                        {{--<th width="150">操作</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($info as $k=>$v)
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{$v['account']}}</td>
                                            <td>{{$v['salt']}}</td>
                                            <td>{{$v['login_time']}}</td>
                                            <td>{{$v['login_ip']}}</td>
                                            {{--<td>--}}
                                                {{--<div class="hidden-sm hidden-xs btn-group">--}}
                                                    {{--<button class="btn btn-xs btn-success">--}}
                                                        {{--<i class="ace-icon fa fa-check bigger-120"></i>--}}
                                                    {{--</button>--}}

                                                    {{--<button class="btn btn-xs btn-info">--}}
                                                        {{--<i class="ace-icon fa fa-pencil bigger-120"></i>--}}
                                                    {{--</button>--}}

                                                    {{--<button class="btn btn-xs btn-danger">--}}
                                                        {{--<i class="ace-icon fa fa-trash-o bigger-120"></i>--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div><!-- /.span -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection