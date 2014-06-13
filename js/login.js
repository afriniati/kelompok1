$(document).ready(function(){
    $("#add_err").css('display', 'none', 'important');
     $("#login").click(function(){    
          username=$("#name").val();
          password=$("#word").val();
          $.ajax({
           type: "POST",
           url: "log.php",
            data: "id_aslab="+username+"&pass="+password,
           success: function(html){    
            if(html=='true')    {
             //$("#add_err").html("right username or password");
             window.location="login.php";
            }
            else    {
            $("#add_err").css('display', 'inline', 'important');
             $("#add_err").html("<img src='images/alert.png' />Wrong username or password");
            }
           },
           beforeSend:function()
           {
            $("#add_err").css('display', 'inline', 'important');
            $("#add_err").html("<img src='images/ajax-loader.gif' /> Loading...")
           }
          });
        return false;
    });
});


Read more: http://www.ondeweb.in/ajax-login-form-with-jquery-and-php/#ixzz2o3WTQq6x