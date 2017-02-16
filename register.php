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
    #image {
        position: relative;
        
    }

    .modal {
    display: none; /* Hidden by default */
    position: absolute; /* Stay in place */
    z-index: 120; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 650;
    top: 0;/* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        cursor: pointer;
    }

    input, select, textarea {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    /* The Close Button */

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
        $isValid = true;    
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(!isset($_SESSION['messageE'])) {
                    $_SESSION['messageE'] = "";
            
                }

                if (!isset($_POST['agreement'])){
                    $_SESSION['check'] = true;
                    $_SESSION['messageE'] = "Belum menyetujui Syarat dan Peraturan";
                    $isValid = false;
                }

                $myusername = mysqli_real_escape_string($db,$_POST['username']);
                $mypassword = mysqli_real_escape_string($db,$_POST['password']);
                $mypasswordconf = mysqli_real_escape_string($db,$_POST['passwordconf']);
                $myname = mysqli_real_escape_string($db,$_POST['name']);
                $myemail = mysqli_real_escape_string($db,$_POST['email']);
                $mytelepon = mysqli_real_escape_string($db,$_POST['telepon']);
                $mygender = mysqli_real_escape_string($db,$_POST['gender']);
                $myalamat = mysqli_real_escape_string($db,$_POST['alamat']);

                if(!filter_var($myemail , FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['check'] = true;
                    $_SESSION['messageE'] = "Format Email Salah";
                    $isValid = false;
                } 
                    
                if (!($mypassword == $mypasswordconf)) {
                    $_SESSION['check'] = true;
                    $_SESSION['messageE'] = "Password Tidak Sesuai";
                    $isValid = false;
                }

                


                $sql1 = "SELECT * FROM user WHERE username = '$myusername'";
                $cekUser = mysqli_query($db,$sql1);
                if (mysqli_num_rows($cekUser) != 0) {
                    $_SESSION['check'] = true;
                    $_SESSION['messageE'] = "Username telah terpakai";
                    $isValid = false;
                }

               if($isValid) {
                    $_SESSION['messageE'] = "";
                    $query = "INSERT INTO user(username,password,name,email,telepon,gender,alamat) VALUES('$myusername','$mypassword','$myname','$myemail','$mytelepon','$mygender','$myalamat')";
                    $res = mysqli_query($db,$query);
                    header("location:login.php");
                }
            }
        ?>



<div id="form">
<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
<table id="Table_01" width="1921" height="1080" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="7">
            <img id="image"  src="images/register/Garena_Test_Website_01.jpg" width="1920" height="428" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="428" alt=""></td>
    </tr>
    <tr>
        <td rowspan="6">
            <img id="image"  src="images/register/Garena_Test_Website_02.jpg" width="584" height="652" alt=""></td>
        <td colspan="5">
            <img id="image"  src="images/register/regis_bg.jpg" width="753" height="12" alt=""></td>
        <td rowspan="6">
            <img id="image"  src="images/register/Garena_Test_Website_04.jpg" width="583" height="652" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="12" alt=""></td>
    </tr>
    <tr>
        <td rowspan="4">
            <img id="image"  src="images/register/regis_bg-06.jpg" width="277" height="424" alt="">
            <label style="z-index:100; position:absolute; color:white; left:650; top: 500;"  for="username">Username :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 550;"  for="name">Nama Lengkap :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 600;"  for="email">Email :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 650;"  for="password">Password :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 700;"  for="passwordconf">Password Confirm :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 750;"  for="telepon">No. Telepon :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 800;"  for="gender">Jenis Kelamin :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 850;"  for="alamat">Alamat :</label>
            
        </td>
        <td>
            <img id="image"  src="images/register/regis_title.jpg" width="198" height="24" alt=""></td>
        <td colspan="3" rowspan="2">
            <img id="image"  src="images/register/regis_bg-08.jpg" width="278" height="323" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="24" alt=""></td>
    </tr>
    <tr>
        <td rowspan="3">
            <img id="image"  src="images/register/regis_bg-09.jpg" width="198" height="400" alt="">
            <input  style="z-index:100; position:absolute;  left:900; top: 500;" type="text" name="username" pattern="[A-Za-z0-9]{6,15}" value="<?php echo isset($_POST['username'])? $_POST['username'] : '' ?>" title="6-15 karakter, hanya huruf dan angka" required>
            <input  style="z-index:100; position:absolute; left:900; top: 550;" type="text" name="name" pattern="[A-Za-z]|[A-Za-z][A-Za-z ]+" value="<?php echo isset($_POST['name'])? $_POST['name'] : '' ?>" title="hanya huruf dan spasi" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 600;" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z0-9.-]{2,15}$" value="<?php echo isset($_POST['email'])? $_POST['email'] : '' ?>" title="format email salah" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 650;" type="password" name="password" pattern=".{8,16}" title="password harus 8-16 karakter" onchange="form.passwordconf.pattern = this.value;" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 700;" type="password" name="passwordconf" pattern=".{8,16}" title="Konfirmasi password harus sama dengan di atas" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 750;" type="text" pattern="[0-9]{7,14}" value="<?php echo isset($_POST['telepon'])? $_POST['telepon'] : '' ?>" title="7-14 karakter, hanya angka" name="telepon">
            <select  style="z-index:100; position:absolute;  left:900; top: 800;"  name="gender">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            <textarea style="z-index:100; position:absolute;  left:900; top: 850; resize: none;"  name="alamat" cols="30" rows="6"><?php echo isset($_POST['alamat'])? $_POST['alamat'] : '' ?></textarea>
            <input  style="z-index:100; position:absolute;  left:900; top: 950;" type="checkbox" name="agreement" value="on"> <label style="z-index:100; position:absolute; color:white;  left:920; top: 950;">Saya telah membaca dan menerima <br> <span style="cursor: pointer; text-decoration: underline; color: yellow" id="myBtn">Syarat dan Peraturan </span> dari Garena. </label>
            <div style="z-index:100; position:absolute; color: white;  left:900; top: 1000;"><?php
                if ($_SESSION['check']) {
                    echo $_SESSION['messageE'];
                    
                }

            ?></div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <img class="close" src="images/popup.jpg">
                </div>
                    
            </div>
        </td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="299" alt=""></td>
    </tr>
    <tr>
        <td rowspan="2">
            <img id="image"  src="images/register/regis_bg-10.jpg" width="174" height="101" alt=""></td>
        <td>
            <input type="image" src="images/register/regis_button.jpg" alt="Submit Form">
        </td>
        <td rowspan="2">
            <img id="image"  src="images/register/regis_bg-12.jpg" width="20" height="101" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="84" alt=""></td>
    </tr>
    <tr>
        <td>
            <img id="image"  src="images/register/regis_bg-13.jpg" width="84" height="17" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="17" alt=""></td>
    </tr>
    <tr>
        <td colspan="5">
            <img id="image"  src="images/register/Garena_Test_Website_13.jpg" width="753" height="216" alt=""></td>
        <td>
            <img id="image"  src="images/register/spacer.gif" width="1" height="216" alt=""></td>
    </tr>
</table>
</form>
</div>
<!-- End Save for Web Slices -->
</body>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var img = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
img.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>