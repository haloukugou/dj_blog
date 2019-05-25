@extends('base.tables')

@section('content')
    <div class="layui-form" style="margin-top: 25px;">
        <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
                <input type="text" id="account"  autocomplete="off" placeholder="请输入账号" class="layui-input" value="{{$info['account']}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text" id="pwd"  autocomplete="off" placeholder="请输入密码" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="text" id="rpwd"  autocomplete="off" placeholder="请确认密码" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn"  onclick="sub()">立即提交</button>
            </div>
        </div>
    </div>
    <script>
        function sub()
        {
            var account = $('#account').val(),
                pwd = $('#pwd').val(),
                rpwd = $('#rpwd').val();
            setAjaxHeader();
            $.ajax({
                url:"{{url('editInfo')}}",
                type:'post',
                data:{account:account, pwd:pwd, rpwd:rpwd}
            }).done(function(data){
                layer.msg(data.msg);
                if(data.code == 1){
                    setTimeout(function(){
                        window.top.location = "{{url('dj')}}";
                    }, 1500)
                }
            })
        }
    </script>
@endsection