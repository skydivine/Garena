<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql1 = mysqli_query($db,"select username from user where username = '$user_check' ");
   $ses_sql2 = mysqli_query($db,"select name from user where username = '$user_check' ");
   $ses_sql3 = mysqli_query($db,"select telepon from user where username = '$user_check' ");
   $ses_sql4 = mysqli_query($db,"select gender from user where username = '$user_check' ");
   $ses_sql5 = mysqli_query($db,"select isRegis from user where username = '$user_check' ");
   
   $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
   $row2 = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
   $row3 = mysqli_fetch_array($ses_sql3,MYSQLI_ASSOC);
   $row4 = mysqli_fetch_array($ses_sql4,MYSQLI_ASSOC);
   $row5 = mysqli_fetch_array($ses_sql5,MYSQLI_ASSOC);

   
   $login_session = $row1['username'];
   $name = $row2['name'];
   $telepon = $row3['telepon'];
   $gender = $row4['gender'];
   $flag = $row5['isRegis'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>