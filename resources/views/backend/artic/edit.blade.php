@extends('base.default')
<link rel="stylesheet" href="{{asset('markdown/examples/css/style.css')}}"/>
<link rel="stylesheet" href="{{asset('markdown/css/editormd.css')}}"/>
<style>
    .ace-nav {
        height: 0 !important;
    }

    .editormd-preview-close-btn {
        display: none !important;
    }
</style>
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb" style="float: left;">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{url('djIndex')}}">首页</a>
                    </li>
                    <li>
                        文章管理
                    </li>
                    <li>
                        <a href="{{url('articList')}}">文章列表</a>
                    </li>
                    <li>
                        编辑文章
                    </li>
                </ul>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-12">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题 </label>

                            <div class="col-sm-9">
                                <input type="text" id="title" class="col-xs-10 col-sm-5" value="{{$articInfo->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>

                            <div class="col-sm-9" style="text-align: left">
                                <select id="classify" style="width: 40%">
                                    <option value="0">请选择...</option>
                                    @foreach($classifyList as $k=>$v)
                                        <option value="{{$v['id']}}" @if($articInfo->classify_id == $v['id']) selected @endif>{{$v['type_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 描述 </label>

                            <div class="col-sm-9">
                                <textarea id="description" cols="30" rows="10" style="float: left">{{$articInfo->description}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" id="aid" value="{{$articInfo->id}}">
                        <!--编辑器开始-->
                        <div id="test-editormd" name="post_content">
                            <textarea name="post_content" id="content">{{$articInfo->content}}</textarea>
                        </div>
                        <!--编辑器结束-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>

                            <div class="col-sm-9" style="text-align: left">
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
@endsection

@section('jscontent')
    <script>
        function sub(obj)
        {
            var title = $('#title').val(),
                classify = $('#classify option:selected').val(),
                content = $('#content').val(),
                description = $('#description').val(),
                id = $('#aid').val();
            $.ajax({
                url:"{{url('articEdit')}}",
                type:'post',
                data:{title:title,classify:classify,content:content,description:description,id:id},
                beforeSend:function(){
                    $(obj).attr('disabled', 'disabled');
                },
                success:function(data){
                    layer.msg(data.msg);
                    if(data.code == 1){
                        setTimeout(function(){
                            window.location.reload();
                        },1500)
                    }else{
                        $(obj).removeAttr('disabled');
                    }
                },
                error:function(e){
                    $(obj).removeAttr('disabled');
                }
            })
        }

        $(function () {
            var testEditor = editormd("test-editormd", {
                width: "100%",
                height: 600,
                syncScrolling: "single",
                path: "{{asset('markdown/lib')}}" + '/',
                imageUpload: true,
                imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL: "{{url('api/upload')}}",//上传图片用，，这是tp的上传
                saveHTMLToTextarea: true
            })
        });
    </script>
@endsection
