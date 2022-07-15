<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("location: ../donation/donate.php");
}
?>
<!DOCTYPE html>
<html lang="EN" class="html_main">
    <head>
        <title>Donate|Wildlife|Wildlife Photography|Safari|Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="author" content="Kishore Prashanth P(2020115043)">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/lion_favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
        <script src="../js/script.js"></script>   
    </head>
    <body class="body_main">
        <div class="bg_donate">
        </div>
        <?php
        $nameErr=$EmailErr="";
        $amountErr="";
        $user_name=$email=$to="";
        $amount=0;
        $conn1=mysqli_connect('localhost','root','','donation');
        //FORM VALIDATION
        if(isset($_POST['donate_button'])){
            if(empty($_POST['donate_name'])){
                $nameErr="Username is required";
            }
            else{
                $user_name=mysqli_real_escape_string($conn1,check($_POST['donate_name']));
                if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
                    $nameErr="Only Letters and White space allowed for Userame";
                }
            }
            if(empty($_POST['donate_email'])){
                $EmailErr="Email is required";
            }
            else{
                $email=mysqli_real_escape_string($conn1,check($_POST["donate_email"]));
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $EmailErr="Enter valid Email ID";
                }
            }
            if(!(empty($_POST['donate_select']))){
                $to=mysqli_real_escape_string($conn1,check($_POST["donate_select"]));
            }
            if(empty($_POST['donate_amount'])){
                $amountErr="Enter Donation BTC";
            }
            else{
                $amount=$_POST['donate_amount'];
            }
            //MySQL
            if(($nameErr=="")&&($EmailErr=="")&&($amountErr=="")){
                $sql1="INSERT INTO donate (names,email,toanimal,amount) VALUES ('$user_name','$email','$to','$amount');";
                mysqli_query($conn1,$sql1);
                $_SESSION['donated']="donated";
                header('location:../index1.php');
            }
        }
        function check($x){
            $x=trim($x);
            $x=stripslashes($x);
            $x=htmlspecialchars($x);
            return $x;
        }
        ?>
        <div class="donate" id="donate">
            <img src="../images/donate.jpg" alt="DONATION" class="img_1" height="500">
            <div class="blured_donate">
                <img src="../images/donate.jpg" alt="DONATION" class="img_2">
                <div class="donate_text">DONATE</div>
                <form method="POST" action="" class="login_form1">
                    NAME:<input type="text" name="donate_name" class="form_box_2" value="<?php 
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                        echo $_SESSION['username']; 
                        }?>"><?php echo "<div class='Errtext'>".$nameErr."</div>"; ?><br>
                    EMAIL:<input type="email" name="donate_email" class="form_box_2"><br><?php echo "<div class='Errtext'>".$EmailErr."</div>"; ?><br>
                    TO:<select name="donate_select" class="form_box_2to">
                        <option value="tiger">SIBERIAN TIGER</option>
                        <option value="rhino">WHITE RHINOCEROS</option>
                        <option value="gorilla">MOUNTAIN GORILLA</option>
                        <option value="wolf">GRAY WOLF</option>
                    </select><br><br>
                    DONATE:<input type="number" name="donate_amount" class="form_box_2-1" min="0.0000546" max="100" step="0.0000001"><br><?php echo "<div class='Errtext'>".$amountErr."</div>"; ?><br>
                    <input type="submit" value="DONATE" name="donate_button" class="login_button_donate">
                </form>
            </div>
        </div>
    </body>
</html>