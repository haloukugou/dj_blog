@extends('base.default')
<link rel="stylesheet" href="{{asset('markdown/examples/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('markdown/css/editormd.css')}}" />
<style>
    .ace-nav{
        height: 0!important;
    }
    .editormd-preview-close-btn{
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
                    <div class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>

                            <div class="col-sm-9">
                                <input type="text" id="classify_name"  class="col-xs-10 col-sm-5">
                            </div>
                        </div>
                        <!--编辑器开始-->
                        <div id="test-editormd" name="post[post_content]">
                            <textarea name="post[post_content]"></textarea>
                        </div>
                        <!--编辑器结束-->
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
@endsection

@section('jscontent')
    <script>
        $(function() {
            var testEditor = editormd("test-editormd", {
                width   : "100%",
                height  : 600,
                syncScrolling : "single",
                path    : "{{asset('markdown/lib')}}"+'/',
                imageUpload : true,
                imageFormats : ["jpg","jpeg","gif","png","bmp","webp"],
                imageUploadURL : "{{url('api/upload')}}",//上传图片用，，这是tp的上传
                saveHTMLToTextarea : true
            })
        });
    </script>
@endsection
