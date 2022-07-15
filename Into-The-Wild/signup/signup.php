<?php
session_start();
$nameErr=$EmailErr=$passErr=$CpassErr=$nomatch=$Err1=$Err2="";
$user_name=$email=$pass_1=$pass_2="";
$conn=mysqli_connect('localhost','root','','sample');
//FORM VALIDATION
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST['username'])){
        $nameErr="Username is required";
    }
    else{
        $user_name=mysqli_real_escape_string($conn,check($_POST['username']));
        if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
            $nameErr="Only Letters and White space allowed for Userame";
        }
    }
    if(empty($_POST['email'])){
        $EmailErr="Email is required";
    }
    else{
        $email=mysqli_real_escape_string($conn,check($_POST["email"]));
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $EmailErr="Enter valid Email ID";
        }
    }
    if(empty($_POST['password'])){
        $passErr="Password is required";
    }
    else{
        $pass_1=mysqli_real_escape_string($conn,$_POST['password']);

    }
    if(empty($_POST['confirmpassword'])){
        $CpassErr="Please confirm your password";
    }
    else{
        $pass_2=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
    }
    if($pass_1!=$pass_2){
        $nomatch="The two passwords do not match";
    }
    //MySql
    $sql="SELECT * FROM users WHERE username='$user_name' OR email='$email' LIMIT 1;";
    $result=mysqli_query($conn,$sql);
    $ans=mysqli_fetch_assoc($result);
    if($ans){
        if($ans['username']==$user_name){
            $Err1="Username already exists";
        }
        if($ans['email']==$email){
            $Err2="Email already exists";
        }
    }
    if(($nameErr=="")&&($EmailErr=="")&&($passErr=="")&&($CpassErr=="")&&($nomatch=="")&&($Err1=="")&&($Err2=="")){
        $encpass=md5($pass_1);
        $sql1="INSERT INTO users (username,email,password1) VALUES ('$user_name','$email','$encpass');";
        mysqli_query($conn,$sql1);
        $_SESSION['username']=$user_name;
        $_SESSION['success']="Hello,You have logged in successfully";
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
<!DOCTYPE html>
<html lang="EN" class="html_login">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up|Into the Wild|Wldlife|Wildlife Photography|Safari|Posts|Donate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Kishore Prashanth P(2020115043)">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/png" href="../images/lion_favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    </head>
    <body class="body_signup">
        <div class="bg_signup">
            <div class="lion_login">
                <img src="../images/lion_login.jpg" alt="lion_login">
            </div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off" class="login_form">
                <h1 class="form_head">SIGNUP FORM</h1>
                <?php echo "<div class='Errtext'>".$Err1."</div>"; ?><?php echo "<div class='Errtext'>".$Err2."</div>";?><br>            
                <label for="username">USERNAME:</label>
                <input type="text" name="username" id="username" value="<?php echo $user_name; ?>" class="form_box"><br><?php echo "<div class='Errtext'>".$nameErr."</div>"; ?><br>
                <label for="password">EMAIL:</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form_box alterEmail"><br><?php echo "<div class='Errtext'>".$EmailErr."</div>"; ?><br>
                <label for="password">PASSWORD:</label>
                <input type="password" name="password" id="password" class="form_box"><br><?php echo "<div class='Errtext'>".$passErr."</div>"; ?><br>
                <label for="confirmpassword">CONFIRM</label><br>
                <label for="confirmpassword">PASSWORD:</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form_box"><br><?php echo "<div class='Errtext'>".$CpassErr."</div>"; ?><br>
                <input type="submit" value="SIGNIN" class="login_button"><br><?php echo "<div class='Errtext'>".$nomatch."</div>"; ?><br>
                <h3><span class="login_mem">Already signed up?</span><a href="../login/login.php" class="login_sign">LOGIN</a></h3>
            </form>
        </div>
               
    </body>
</html>