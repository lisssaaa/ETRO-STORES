//表单验证 手机号
      $('#reg1 input[name=repassword]').blur(function(){
        pass = $('#reg1 input[name=password]').val();
        repass = $('#reg1 input[name=repassword]').val();

        var check = /\w{6,18}/;
        if(pass != repass){
          $('#n1').html('两次密码不一致');
        }else if(!check.test(pass)){
          $('#n1').html('密码必须为6-18个字符');
        }else{
          $('#n1').html('');
        }
      }); 
      $('#reg1 input[name=username]').blur(function(){
        var check = /\w{4,8}/;
        name = $(this).val();
        if(!check.test(name)){
          $('#n1').html('用户名必须为4-8位字母数字下划线');
        }else{
          $('#n1').html('');
        }
      });
      $('#reg1 input[name=phone]').blur(function(){
        var check = /^[\d]{5,20}$/;
        phone = $(this).val();
        if(!check.test(phone)){
          $('#n1').html('手机号格式错误');
        }else{
          $('#n1').html('');
        }
      });
//表单验证 邮箱
      $('#reg2 input[name=repassword]').blur(function(){
        pass = $('#reg2 input[name=password]').val();
        repass = $('#reg2 input[name=repassword]').val();
        var check = /\w{6,18}/;

        if(pass != repass){
          $('#n2').html('两次密码不一致');
        }else if(check.test(pass)){
          $('#n2').html('');          
        }else{
          $('#n2').html('密码必须为6-18个字符');
        }
      }); 
      $('#reg2 input[name=username]').blur(function(){
        var check = /\w{4,8}/;
        name = $(this).val();
        if(!check.test(name)){
          $('#n2').html('用户名必须为4-8位字母数字下划线');
        }else{
          $('#n2').html('');
        }
      });
      $('#reg2 input[name=email]').blur(function(){
        var check = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
        email = $(this).val();
        if(!check.test(email)){
          $('#n2').html('邮箱格式错误');
        }else{
          $('#n2').html('');
        }
      });
      
      //注册方式切换
          $('.go1').click(function(){            
            $('div #login').css('display','none');
            $(' #back').css('display','block');
            $('div #reg2').css('display','none');
            $('div #reg1').css('display','block');
          });
          $('.go2').click(function(){            
            $('div #login').css('display','none');
            $('div #back').css('display','block');
            $('div #reg1').css('display','none');
            $('div #reg2').css('display','block');
          });
          $('#back').click(function(){
            $('#back').css('display','none');
            $('div #login').css('display','block');
            $('div #reg1').css('display','none');
            $('div #reg2').css('display','none');
          });          