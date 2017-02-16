<?php

    include("session.php");

    if (!isset($_SESSION['check'])){
        $_SESSION['check'] = false;
    }

    if($flag == "true"){
        header("location:success.php");
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

            $myname = mysqli_real_escape_string($db,$_POST['name']);
            $mynamacaptain = mysqli_real_escape_string($db,$_POST['namacaptain']);
            $myteleponcaptain = mysqli_real_escape_string($db,$_POST['teleponcaptain']);
            $mygendercaptain = mysqli_real_escape_string($db,$_POST['gendercaptain']);
            $mynamaanggota = mysqli_real_escape_string($db,$_POST['namaanggota']);
            $myteleponanggota = mysqli_real_escape_string($db,$_POST['teleponanggota']);
            $mygenderanggota = mysqli_real_escape_string($db,$_POST['genderanggota']);

            
            $sql1 = "SELECT * FROM team WHERE name = '$myname'";
            $cekUser = mysqli_query($db,$sql1);
            if (mysqli_num_rows($cekUser) != 0) {
                $_SESSION['check'] = true;
                $_SESSION['messageE'] = "Nama Tim telah terpakai";
                $isValid = false;
            }
           // $username = $_SESSION['login_user'];
           if($isValid) {
                $_SESSION['messageE'] = "";
                $query = "INSERT INTO team(name,namacaptain,teleponcaptain,gendercaptain,namaanggota,teleponanggota,genderanggota) VALUES('$myname','$mynamacaptain','$myteleponcaptain','$mygendercaptain','$mynamaanggota','$myteleponanggota','$mygenderanggota')";
                $res = mysqli_query($db,$query);
                $query2 = "UPDATE user SET isRegis = 'true' WHERE username = '$user_check'";
                $res2 = mysqli_query($db,$query2);
                header("location:team.php");
            }
        }
    ?>



<div id="form">
<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
<table id="Table_01" width="1921" height="1080" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="5">
            <img id="image" src="images/team/Garena_Test_Website_01.jpg" width="1920" height="440" alt=""></td>
        <td>
            <img id="image" src="images/team/spacer.gif" width="1" height="440" alt=""></td>
    </tr>
    <tr>
        <td rowspan="4">
            <img id="image" src="images/team/Garena_Test_Website_02.jpg" width="859" height="640" alt=""></td>
        <td>
            <img id="image" src="images/team/team_title.jpg" width="201" height="24" alt=""></td>
        <td colspan="3" rowspan="2">
            <img id="image" src="images/team/Garena_Test_Website_04.jpg" width="860" height="446" alt="">
            <p style="z-index:100; position:absolute; color:white; left:1150; top: 420;">Hi, <?php echo $_SESSION['login_user']?>! [<a style="color: yellow" href="logout.php">Keluar</a>]</p>
        </td>
        <td>
            <img id="image" src="images/team/spacer.gif" width="1" height="24" alt=""></td>
    </tr>
    <tr>
        <td rowspan="3">
            <img id="image" src="images/team/Garena_Test_Website_05.jpg" width="201" height="616" alt=""></td>
        <td>
            <img id="image" src="images/team/spacer.gif" width="1" height="422" alt=""></td>
    </tr>
    <tr>
        <td rowspan="2">
            <img id="image" src="images/team/Garena_Test_Website_06.jpg" width="86" height="194" alt="">
            <label style="z-index:100; position:absolute; color:white; left:650; top: 500;"  for="name">Nama Tim :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 550;"  for="nameuser">Nama Lengkap :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 600;"  for="telepon">No. Telepon :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 650;"  for="gender">Jenis Kelamin :</label>
            <p style="z-index:100; position:absolute; color: white; left:1230; top: 620; font-size: 30"  ><span style="color: orange">C</span>aptain</p>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 700;"  for="namacaptain">Nama Lengkap :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 750;"  for="teleponcaptain">No. Telepon :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 800;"  for="gendercaptain">Jenis Kelamin :</label>
            <p style="z-index:100; position:absolute; color: white; left:1200; top: 770; font-size: 30"  >Anggota <span style="color: orange">1</span></p>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 850;"  for="namaanggota">Nama Lengkap :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 900;"  for="teleponanggota">No. Telepon :</label>
            <label style="z-index:100; position:absolute; color:white; left:650; top: 950;"  for="genderanggota">Jenis Kelamin :</label>
            <input  style="z-index:100; position:absolute;  left:650; top: 1000;" type="checkbox" name="agreement" value="on"> <label style="z-index:100; position:absolute; color:white;  left:670; top: 1000;">Saya telah membaca dan menerima <br> <span style="cursor: pointer; text-decoration: underline; color: yellow" id="myBtn">Syarat dan Peraturan </span> dari turnamen ini. </label>
        </td>
        <td>
            <input onmouseover="hover(this);" onmouseout="unhover(this);" type="image" src="images/team/team_button.jpg" alt="Submit Form">
            <!-- <img id="image" src="images/team/team_button.jpg" width="171" height="51" alt=""> --></td>
        <td rowspan="2">
            <img id="image" src="images/team/Garena_Test_Website_08.jpg" width="603" height="194" alt=""></td>
        <td>
            <img id="image" src="images/team/spacer.gif" width="1" height="51" alt=""></td>
    </tr>
    <tr>
        <td>
            <img id="image" src="images/team/Garena_Test_Website_09.jpg" width="171" height="143" alt="">
            <input  style="z-index:100; position:absolute;  left:900; top: 500;" type="text" name="name" pattern="[A-Za-z0-9_]{4,15}" title="4-15 karakter, hanya huruf dan angka" required>
            <input  style="z-index:100; position:absolute; left:900; top: 550;" type="text" name="nameuser" value="<?php echo $name ?>" readonly>
            <input  style="z-index:100; position:absolute;  left:900; top: 600;" type="text" name="telepon" value="<?php echo $telepon ?>" readonly>
            <select  style="z-index:100; position:absolute;  left:900; top: 650;"  name="gender" disabled>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
                <option selected="selected"><?php echo $gender ?></option>
            </select>
            <input  style="z-index:100; position:absolute; left:900; top: 700;" type="text" name="namacaptain" value="<?php echo isset($_POST['namacaptain'])? $_POST['namacaptain'] : '' ?>" pattern="[A-Za-z]|[A-Za-z][A-Za-z ]+" title="hanya huruf dan spasi" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 750;" type="text" value="<?php echo isset($_POST['teleponcaptain'])? $_POST['teleponcaptain'] : '' ?>" name="teleponcaptain" pattern="[0-9]{7,14}" title="7-14 karakter, hanya angka" required>
            <select  style="z-index:100; position:absolute;  left:900; top: 800;"  name="gendercaptain" >
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            <input  style="z-index:100; position:absolute; left:900; top: 850;" type="text" name="namaanggota" pattern="[A-Za-z]|[A-Za-z][A-Za-z ]+" value="<?php echo isset($_POST['namaanggota'])? $_POST['namaanggota'] : '' ?>" title="hanya huruf dan spasi" required>
            <input  style="z-index:100; position:absolute;  left:900; top: 900;" type="text" name="teleponanggota" pattern="[0-9]{7,14}" value="<?php echo isset($_POST['teleponanggota'])? $_POST['teleponanggota'] : '' ?>" title="7-14 karakter, hanya angka" required>
            <select  style="z-index:100; position:absolute;  left:900; top: 950;"  name="genderanggota" >
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            
            <div style="z-index:100; position:absolute; color: white;  left:900; top: 1050;"><?php
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
            <img id="image" src="images/team/spacer.gif" width="1" height="143" alt=""></td>
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

    function hover(element) {
        element.setAttribute('src', 'images/team/team_button_hover.jpg');
    }
    function unhover(element) {
        element.setAttribute('src', 'images/team/team_button.jpg');
    }
</script>
</html>