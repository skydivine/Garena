<?php
    include("config.php");
    session_start();

    if (!isset($_SESSION['check'])){
        $_SESSION['check'] = false;
    }

    if(isset($_SESSION['login_user'])){
      header("location:team.php");
   }
?>
<html>
<head>
<title>Garena_Test_Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
    input {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
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
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!isset($_SESSION['messageE'])) {
                $_SESSION['messageE'] = "";
        
            }

            $myusername = mysqli_real_escape_string($db,$_POST['username']);
            $mypassword = mysqli_real_escape_string($db,$_POST['password']);
           

            $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            

            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['login_user'] = $myusername;
                header("location: team.php");
            }else {
               $_SESSION['check'] = true;
               $_SESSION['messageE'] = "Username atau Password anda salah!";
            }
        }
    ?>
    <div id="form">
    <form method="post" action='<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>''>
    <table id="Table_01" width="1921" height="1080" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="5">
                <img src="images/login/Garena_Test_Website_01.jpg" width="1920" height="440" alt=""></td>
            <td>
                <img src="images/login/spacer.gif" width="1" height="440" alt=""></td>
        </tr>
        <tr>
            <td rowspan="4">
                <img src="images/login/Garena_Test_Website_02.jpg" width="926" height="640" alt=""></td>
            <td>
                <img src="images/login/Garena_Test_Website_03.jpg" width="68" height="24" alt=""></td>
            <td colspan="3" rowspan="2">
                <img src="images/login/Garena_Test_Website_04.jpg" width="926" height="33" alt=""></td>
            <td>
                <img src="images/login/spacer.gif" width="1" height="24" alt=""></td>
        </tr>
        <tr>
            <td rowspan="3">
                <img src="images/login/Garena_Test_Website_05.jpg" width="68" height="616" alt=""></td>
            <td>
                <img src="images/login/spacer.gif" width="1" height="9" alt=""></td>
        </tr>
        <tr>
            <td rowspan="2">
                <img src="images/login/Garena_Test_Website_06.jpg" width="239" height="607" alt="">
                <label style="z-index:100; position:absolute; color:white; left:650; top: 480;"  for="username">Username </label>
                <label style="z-index:100; position:absolute; color:white; left:830; top: 480;" >:</label>                
                <label style="z-index:100; position:absolute; color:white; left:650; top: 520;"  for="password">Password </label>
                <label style="z-index:100; position:absolute; color:white; left:830; top: 520;" >:</label>  
                <label style="z-index:100; position:absolute; color:white;  left:650; top: 560;">Anda Tidak Punya akun? Silahkan daftar <a style="color: yellow" href="register.php">disini</a> </label>
                <div style="z-index:100; position:absolute; color: white;  left:850; top: 600;"><?php
                    if ($_SESSION['check']) {
                        echo $_SESSION['messageE'];
                        session_destroy();
                    }

                ?></div>
            </td>
            <td> 
                <input type="image" src="images/login/Garena_Test_Website_07.jpg" alt="Submit Form">
            </td>
            <td rowspan="2">
                <img src="images/login/Garena_Test_Website_08.jpg" width="603" height="607" alt=""></td>
            <td>
                <img src="images/login/spacer.gif" width="1" height="84" alt=""></td>
        </tr>
        <tr>
            <td>
                <img src="images/login/Garena_Test_Website_09.jpg" width="84" height="523" alt="">
                <input  style="z-index:100; position:absolute;  left:850; top: 480;" type="text" name="username" value="<?php echo isset($_POST['username'])? $_POST['username'] : '' ?>" pattern="[A-Za-z0-9]{6,15}" title="6-15 karakter, hanya huruf dan angka" placeholder="Masukkan Username anda..." size="35" required>
                <input  style="z-index:100; position:absolute;  left:850; top: 520;" type="password" name="password" size="35" pattern=".{8,16}" title="8-16 karakter" placeholder="Masukkan Password anda..." required>
                
            </td>
            <td>
                <img src="images/login/spacer.gif" width="1" height="523" alt=""></td>
        </tr>
    </table>
    </form>
    </div>
<!-- End Save for Web Slices -->
</body>
</html>