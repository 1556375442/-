<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link rel="stylesheet" href="./log.css">
    <link rel="stylesheet" href="./common.css"> 
</head>
<body>
    <div class="box">
        <!-- <img src="denglu.png" alt="" class="pic"> -->
        <h1>氢燃料电池关键零部件性能和可靠性检测项目演示</h1>
    </div>
    <div class="modal">
        <form  method="post" action="">
            <table>
                <tr>
                <td><div class="username">用户名</div></td>
                <td class="use"><input type="text" placeholder="请输入用户名" name="username" id="user"></td>
                </tr>
     
                <tr>
                    <td><div class="password">密      码</div></td>
                    <td class="pass"><input type="password" placeholder="请输入密码" name="password" id="pass" ></td>
                </tr>
                <!-- <tr>
                    <td><div class="vcode">验证码</div></td>
                    <td ><input type="text" placeholder="" name="vcode" ></td>
                    <td><img src="vcode.php" alt=""></td>
                </tr> -->
                
                
            </table>
        
                <!-- <button class='log' type="button" >登录</button> -->
                <input type="submit" value="登录" name="submit"  id="log">
                <!-- <input type="button" value="重置" onclick="document.getElementById('pass').value='',document.getElementById('user').value=''" id="reset"> -->
                <!-- <button type="reset">重置</button> <input type="checkbox" value="" id="box" name="remember"> -->
                <div class="remember"> <input type="checkbox" value="" id="box" name="remember">记住密码<?php login()?></div>
                <li>没有帐户？<span><a href="register.php">立即注册</a></span></li>
        </form>
</div>
 <!-- <div class='reg'>

   <form  method="post" action='' name="regis">
        <table>
            <tr>
            <td><div class="username1">请输入用户名</div></td>
            <td class="use"><input type="text" placeholder="请输入用户名" name="username" id="user1"></td><?php test() ?>
            </tr>
 
            <tr>
                <td><div class="password1">请输入密码</div></td>
                <td class="pass"><input type="password" placeholder="请输入密码" name="password" id="pass1"></td><?php check()?>
            </tr>
            <tr>
                <td><div class="password2">再次输入密码</div></td>
                <td class="pass"><input type="password" placeholder="" name="confirm" id="pass2"></td><?php confirm()?>
            </tr>
            

           
            
        </table>
        <div class='success'>
            <input type="submit" value="注册"  name="submit" id="regis"><?php success()?>
        </div>
        <li>已有帐户？<span>立即登录</span></li>
    </form> 
 </div>  -->
<div class="footer">
    Copyright © 2022-2055 山东省科学院自动化研究所新能源汽车团队 All Rights Reserved

</div>
    <script src="./jquery.min.js"></script>
   
    
<script>
    $('.modal span').click(function(){
        
        $('.modal').hide()
        $('.reg').show()
        // alert('nihao')
    })
    $('.reg span').click(function(){
        
        $('.modal').show()
        $('.reg').hide()
        // alert('nihao')
    }) 
    function check(thisform){
        var user=document.getElementById('user').value;
        var pass=document.getElementById('pass').value;
        if(user=='energy'&&pass=='88888888'){
            // window.document.regis.action='second.html';
            // window.document.regis.submit();
            location.assign('../first/first.php')
        }
        else{
            alert('用户名或者密码错误，请重新输入')
        }
    }  

 </script>  

</body>

</html>
