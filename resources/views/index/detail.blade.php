<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="{{asset('layui/css/layui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('markdown/css/editormd.min.css')}}">
<!--加载meta IE兼容文件-->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <div class="header">
    <div class="menu-btn">
      <div class="menu"></div>
    </div>
    <h1 class="logo">
      <a href="index.html">
        <span>MYBLOG</span>
        <img src="{{asset('img/logo.png')}}">
      </a>
    </h1>
    <div class="nav">
      <a href="index.html">文章</a>
      <a href="whisper.html">微语</a>
      <a href="leacots.html">留言</a>
      <a href="album.html">相册</a>
      <a href="about.html"  class="active">关于</a>
    </div>
    <ul class="layui-nav header-down-nav">
      <li class="layui-nav-item"><a href="index.html" class="active">文章</a></li>
      <li class="layui-nav-item"><a href="whisper.html">微语</a></li>
      <li class="layui-nav-item"><a href="leacots.html">留言</a></li>
      <li class="layui-nav-item"><a href="album.html">相册</a></li>
      <li class="layui-nav-item"><a href="about.html"  class="active">关于</a></li>
    </ul>
    <p class="welcome-text">
      欢迎来到<span class="name">小明</span>的博客~
    </p>
  </div>


  <div class="content whisper-content leacots-content details-content">
    <div class="cont w1000">
      <div class="whisper-list">
        <div class="item-box">
          <div class="review-version">
              <div class="form-box">
                <div class="article-cont">
                  <div class="title">
                    <h3>{{$articInfo->title}}</h3>
                    <p class="cont-info"><span class="data">2018/08/08</span><span class="types">散文札记</span></p>
                  </div>
                  <div id="show_editor">
                    <textarea style="display: none">{{$articInfo->content}}</textarea>
                  </div>
                  <div class="btn-box">
                    <button class="layui-btn layui-btn-primary">上一篇</button>
                    <button class="layui-btn layui-btn-primary">下一篇</button>
                  </div>
                </div>
                <div class="form">
                  <form class="layui-form" action="">
                    <div class="layui-form-item layui-form-text">
                      <div class="layui-input-block">
                        <textarea name="desc" placeholder="既然来了，就说几句" class="layui-textarea"></textarea>
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <div class="layui-input-block" style="text-align: right;">
                        <button class="layui-btn definite">確定</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div id="demo" style="text-align: center;"></div>
    </div>
  </div>

  <div class="footer-wrap" style="text-align: center;height: 50px;line-height: 50px">
    <p><a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备18018526号-1</a></p>
  </div>
  <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{asset('markdown/editormd.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('markdown/lib/marked.min.js')}}"></script>
  <script src="{{asset('markdown/lib/prettify.min.js')}}"></script>
  <script src="{{asset('markdown/lib/raphael.min.js')}}"></script>
  <script src="{{asset('markdown/lib/underscore.min.js')}}"></script>
  <script src="{{asset('markdown/lib/sequence-diagram.min.js')}}"></script>
  <script src="{{asset('markdown/lib/flowchart.min.js')}}"></script>
  <script src="{{asset('markdown/lib/jquery.flowchart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('layui/layui.js')}}"></script>
  <script type="text/javascript">
    layui.config({
      base: '../res/js/util/'
    }).use(['element','laypage','form','menu'],function(){
      element = layui.element,laypage = layui.laypage,form = layui.form,menu = layui.menu;
      laypage.render({
        elem: 'demo'
        ,count: 70 //数据总数，从服务端得到
      });
      menu.init();
      menu.submit();
    })
  </script>
  <script type="text/javascript">
    $(function() {
      var testEditormdView;
      testEditormdView = editormd.markdownToHTML("show_editor", {
        htmlDecode      : "style,script,iframe",  // you can filter tags decode
        emoji           : true,
        taskList        : true,
        tex             : true,  // 默认不解析
        flowChart       : true,  // 默认不解析
        sequenceDiagram : true,  // 默认不解析
      });
    });
  </script>
</body>
</html>