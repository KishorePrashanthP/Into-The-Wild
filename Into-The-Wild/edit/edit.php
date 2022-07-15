<?php
session_start();
$nameErr=$EmailErr=$passErr=$CpassErr=$nomatch=$Err1=$Err2="";
$user_name=$email=$pass_1=$pass_2=$edit_name="";
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
    //MySql
    $edit_name=$_SESSION['edit_name'];
    $_SESSION['username']=$user_name;
    $sql="UPDATE users SET username='$user_name',email='$email' WHERE username='$edit_name';";
    mysqli_query($conn,$sql);
    $_SESSION['editted']="editted";
    header('location:../index1.php');
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
        <title>Edit Account|Into the Wild|Wldlife|Wildlife Photography|Safari|Posts|Donate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Kishore Prashanth P(2020115043)">
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/png" href="../images/lion_favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    </head>
    <body class="body_signup">
        <div class="bg_edit">
            <div class="lion_login">
                <img src="../images/lion_login.jpg" alt="lion_login">
            </div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off" class="login_form">
                <h1 class="form_head">EDIT ACCOUNT</h1>
                <?php echo "<div class='Errtext'>".$Err1."</div>"; ?><?php echo "<div class='Errtext'>".$Err2."</div>";?><br>            
                <label for="username">USERNAME:</label>
                <input type="text" name="username" id="username" value="<?php 
                if(!(empty($_SESSION['edit_name']))){
                    echo $_SESSION['edit_name']; 
                }?>" class="form_box"><br><?php echo "<div class='Errtext'>".$nameErr."</div>"; ?><br>
                <label for="password">EMAIL:</label>
                <input type="text" name="email" id="email" value="<?php 
                if(!(empty($_SESSION['edit_email']))){
                    echo $_SESSION['edit_email']; 
                }?>" class="form_box alterEmail"><br><?php echo "<div class='Errtext'>".$EmailErr."</div>"; ?><br>
                <input type="submit" value="EDIT" class="login_button"><br><?php echo "<div class='Errtext'>".$nomatch."</div>"; ?><br>
            </form>
        </div>
               
    </body>
</html>