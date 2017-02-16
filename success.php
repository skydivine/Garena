<?php

    include("session.php");

    if($flag == ""){
        header("location:team.php");
    }
?>
<html>
<head>
<title>Garena_Test_Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
    #image {
        position: relative;
        
    }

    img, input {
        user-drag: none; 
        user-select: none;
        -moz-user-select: none;
        -webkit-user-drag: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }

</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (Garena_Test_Website.psd) -->
<table id="Table_01" width="1920" height="1080" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="5">
            <img id="image" src="images/success/Garena_Test_Website_01.jpg" width="1920" height="428" alt=""></td>
    </tr>
    <tr>
        <td rowspan="4">
            <img id="image" src="images/success/Garena_Test_Website_02.jpg" width="584" height="652" alt=""></td>
        <td colspan="3">
            <img id="image" src="images/success/succ_bg.jpg" width="752" height="435" alt=""></td>
        <td rowspan="4">
            <img id="image" src="images/success/Garena_Test_Website_04.jpg" width="584" height="652" alt="">
            <p style="z-index:100; position:absolute; color:white; right:30; top: 440;">Hi, <?php echo $_SESSION['login_user']?>! [<a style="color: yellow" href="logout.php">Keluar</a>]</p>    
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <img id="image" src="images/success/Garena_Test_Website_05.jpg" width="752" height="26" alt=""></td>
    </tr>
    <tr>
        <td rowspan="2">
            <img id="image" src="images/success/Garena_Test_Website_06.jpg" width="291" height="191" alt=""></td>
        <td>
            <img onmouseover="hover(this);" onmouseout="unhover(this);" style="cursor: pointer;" onclick="location.href='logout.php'" id="image" src="images/success/succ_btn.jpg" width="171" height="50" alt=""></td>
        <td rowspan="2">
            <img id="image" src="images/success/Garena_Test_Website_08.jpg" width="290" height="191" alt=""></td>
    </tr>
    <tr>
        <td>
            <img id="image" src="images/success/Garena_Test_Website_09.jpg" width="171" height="141" alt=""></td>
    </tr>
</table>
<!-- End Save for Web Slices -->
</body>
<script type="text/javascript">
    function hover(element) {
        element.setAttribute('src', 'images/success/succ_btn_hover.jpg');
    }
    function unhover(element) {
        element.setAttribute('src', 'images/success/succ_btn.jpg');
    }
</script>
</html>