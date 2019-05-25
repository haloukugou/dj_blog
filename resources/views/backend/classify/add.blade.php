@extends('base.default')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{url('djIndex')}}">首页</a>
                    </li>
                    <li>
                        文章类型管理
                    </li>
                    <li>
                        <a href="{{url('classifyList')}}">类型列表</a>
                    </li>
                    <li>
                        添加类型
                    </li>
                </ul>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-12">
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>

                            <div class="col-sm-9">
                                <input type="text" id="classify_name"  class="col-xs-10 col-sm-5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>

                            <div class="col-sm-9">
                                <button class="btn btn-sm btn-info" type="button" onclick="sub()">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    提交
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sub()
        {

            var name = $('#classify_name').val(),
                btn = $(this);
            if(!name){
                layer.msg('请输入类型名称');return;
            }

            $.ajax({
                url:"{{url('classifyAdd')}}",
                type:'post',
                data:{name:name},
                beforeSend:function(){
                    $(btn).attr('disabled', 'disabled');
                },
                success:function(data){
                    layer.msg(data.msg);
                    if(data.code == 1){
                        setTimeout(function(){
                            window.location.reload();
                        }, 1500);
                        return;
                    }
                    $(btn).removeAttr('disabled');
                },
                error:function(e){
                    layer.msg('报错');
                    $(btn).removeAttr('disabled');
                }
            })
        }
    </script>
@endsection