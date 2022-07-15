<?php
session_start();
if(!(empty($_SESSION['deleted']))){
    echo "<script type='text/javascript'>alert('Your account was deleted successfully')</script>";
    unset($_SESSION['deleted']);
}
$user_name=$pass_1="";
$nameErr=$passErr=$Err="";
//FORM VALIDATE
$conn=mysqli_connect('localhost','root','','sample');
if(isset($_POST['login'])){
    if(empty($_POST['username'])){
        $nameErr="Username is required";
    }
    else{
        $user_name=mysqli_real_escape_string($conn,check($_POST['username']));
        if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
            $nameErr="Only Letters and White space allowed for Userame";
        }
    }
    if(empty($_POST['password'])){
        $passErr="Password is required";
    }
    else{
        $pass_1=mysqli_real_escape_string($conn,$_POST['password']);

    }
    if(($nameErr=="")&&($passErr=="")){
        $encpass=md5($pass_1);
        $sql="SELECT * FROM users WHERE username='$user_name' AND password1='$encpass';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username']=$user_name;
            $_SESSION['success']="Hello,You have logged in successfully";
            header('location:../index1.php');
        }
        else{
            $Err="Wrong Username and Password";
        }
    }
}
if(isset($_POST['delete'])){
    if(empty($_POST['username'])){
        $nameErr="Username is required";
    }
    else{
        $user_name=mysqli_real_escape_string($conn,check($_POST['username']));
        if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
            $nameErr="Only Letters and White space allowed for Userame";
        }
    }
    if(empty($_POST['password'])){
        $passErr="Password is required";
    }
    else{
        $pass_1=mysqli_real_escape_string($conn,$_POST['password']);

    }
    if(($nameErr=="")&&($passErr=="")){
        $encpass=md5($pass_1);
        $sql="SELECT * FROM users WHERE username='$user_name' AND password1='$encpass';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $sql1="DELETE FROM users WHERE username='$user_name';";
            mysqli_query($conn,$sql1);
            $_SESSION['deleted']="deleted";
            header('location:../login/login.php');
        }
        else{
            $Err="Username doesn't exist";
        }
    }
}
if(isset($_POST['edit'])){
    if(empty($_POST['username'])){
        $nameErr="Username is required";
    }
    else{
        $user_name=mysqli_real_escape_string($conn,check($_POST['username']));
        if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
            $nameErr="Only Letters and White space allowed for Userame";
        }
    }
    if(empty($_POST['password'])){
        $passErr="Password is required";
    }
    else{
        $pass_1=mysqli_real_escape_string($conn,$_POST['password']);

    }
    if(($nameErr=="")&&($passErr=="")){
        $encpass=md5($pass_1);
        $sql="SELECT * FROM users WHERE username='$user_name' AND password1='$encpass';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            while($rows=mysqli_fetch_assoc($result)){
                $_SESSION['edit_name']=$rows['username'];
                $_SESSION['edit_email']=$rows['email'];
                header('location:../edit/edit.php');
            }
        }
        else{
            $Err="Username doesn't exist";
        }
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
        <title>Log in|Into the Wild|Wildlife|Wildlife Photography|Safari|Posts|Donate</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Kishore Prashanth P(2020115043)">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/png" href="../images/lion_favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    </head>
    
    <body class="body_login">
        <div class="bg_login">
            <div class="lion_login">
                <img src="../images/lion_login.jpg" alt="lion_login">
            </div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" class="login_form">
                <h1 class="form_head">LOGIN FORM</h1>
                <?php echo "<div class='Errtext'>".$Err."</div>"; ?><br>
                <label for="username">USERNAME:</label>
                <input type="text" name="username" id="username" value="<?php echo $user_name; ?>" class="form_box"><br><?php echo "<div class='Errtext'>".$nameErr."</div>"; ?><br>
                <label for="password">PASSWORD:</label>
                <input type="password" name="password" id="password" class="form_box"><br><?php echo "<div class='Errtext'>".$passErr."</div>"; ?><br>
                <input type="submit" value="LOGIN" name="login" class="login_button">
                <h3><span class="login_mem">Not yet a member?</span><span><a href="../signup/signup.php" class="login_sign">SIGNUP</a></span></h3>
                <input type="submit" value="DELETE" name="delete" class="login_button_delete">
                <input type="submit" value="EDIT" name="edit" class="login_button_edit">
            </form>

        </div>
    </body>
</html>