<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>dj_blog_admin</title>
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>

<body>
<div class="lowin">
    <div class="lowin-brand">
        <img src="{{asset('img/kodinger.jpg')}}">
    </div>
    <div class="lowin-wrapper">
        <div class="lowin-box lowin-login">
            <div class="lowin-box-inner">
                <div action="{{url('loginIn')}}">
                    <p>hi! dota</p>
                    <div class="lowin-group">
                        <label>账号 </label>
                        <input type="text" autocomplete="required" id="account" class="lowin-input">
                    </div>
                    <div class="lowin-group password-group">
                        <label>密码 </label>
                        <input type="password" id="password" autocomplete="current-password" class="lowin-input">
                    </div>
                    <div class="lowin-group password-group">
                        <label>验证码 </label>
                        <div>
                            <input type="text" id="code" class="lowin-input" style="width: 58%;">
                            <img src="{{captcha_src()}}"  style="cursor: pointer;width: 39%;vertical-align:middle;height: 45px;" onclick="this.src='{{captcha_src()}}'+Math.random()">
                        </div>
                    </div>
                    <button class="lowin-btn login-btn" onclick="loginIn()">
                        冲啊!!!
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="lowin-footer">
       php是世界上最好的语言
    </footer>
</div>
<script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('layui/layui.all.js')}}"></script>
<script>
    function loginIn()
    {
        var account = $('#account').val(),
            password = $('#password').val(),
            code = $('#code').val(),
            obj = $(this);
        if(!account){
            layer.alert('账号都不输入???');return;
        }
        if(!password){
            layer.alert('密码呢????');return;
        }
        if(!code){
            layer.alert('验证码???');return;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{url('loginIn')}}",
            data:{account:account,password:password,code:code},
            type:'post',
            beforeSend:function(){
                $(obj).attr('disabled', 'disabled');
            },
            success:function(data){
                if(data.code == 0){
                    layer.alert(data.msg);
                    $('img').click();
                }
                if(data.code == 1){
                    layer.msg(data.msg);
                    setTimeout(function(){
                        window.location = "{{url('djIndex')}}";
                    }, 1500)

                }
            },
            error:function(e){
                $(obj).removeAttr('disabled');
                layer.alert(e.responseText);return;
            }
        })
    }
</script>
</body>
</html>