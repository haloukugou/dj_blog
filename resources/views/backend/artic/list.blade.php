@extends('base.default')
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
                        文章管理
                    </li>
                    <li>
                        文章列表
                    </li>
                </ul>
            </div>

            <div class="page-content">
                <div class="row" style="padding: 0 12px;margin-bottom: 20px;">
                    <button class="btn btn-sm btn-primary" onclick="add()">添加</button>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="50">
                                            编号
                                        </th>
                                        <th width="200">分类名称</th>
                                        <th width="100">添加时间</th>
                                        <th width="200">修改时间</th>
                                        <th width="150">操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($info as $k=>$v)
                                        <tr>
                                            <td class="center">
                                                {{$v['num']}}
                                            </td>
                                            <td>{{$v['type_name']}}</td>
                                            <td>{{$v['create_at']}}</td>
                                            <td>{{$v['update_at']}}</td>
                                            <td>
                                            <div class="hidden-sm hidden-xs btn-group">
                                            <button class="btn btn-xs btn-success">
                                            <i class="ace-icon fa fa-check bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-danger" onclick="del(this)" cid="{{$v['id']}}">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </button>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$info->links()}}
                            </div><!-- /.span -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function add()
        {
            window.location.href = "{{url('articAdd')}}";
        }
        function del(obj)
        {
            var id = $(obj).attr('cid');
            if(!id){
                layer.msg('缺少参数');return;
            }
            layer.confirm('确定删除?',function(){
                $.ajax({
                    url:"{{url('del_classify')}}",
                    post:'post',
                    data:{id:cid},
                    beforeSend:function(){
                      $(obj).attr('disabled','disabled');
                    },
                    success:function(data){

                    },
                    error:function(e){
                        $(obj).removeAttr('disabled');
                        layer.msg('网络错误');
                    }
                })
            })
        }
    </script>
@endsection