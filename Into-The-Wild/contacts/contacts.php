<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("location: ../contacts/contacts.php");
}
?>
<!DOCTYPE html>
<html lang="EN" class="html_main">
    <head>
        <title>Contacts|Into the Wild|Wildlife|Wildlife Photography|Safari|Posts|Donate</title>
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
        <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/lion_favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../js/script.js" type="text/javascript"></script>   
    </head>
    <body class="body_main">
        <div class="bg_contacts">
            <div class="banner_name_contacts">
                <div class="banner_name_1">INTO THE</div>
                <div class="banner_name_2">WILD</div>
            </div>
            <script>
                window.onscroll = () => {
                    const nav = document.querySelector('#Topnav');
                    if(this.scrollY >= 50){
                        nav.classList.add('bg_topnav');
                    } else {
                        nav.classList.remove('bg_topnav');
                    }
                }
            </script>
            <div class="topnav" id="Topnav">
                    <a href="../index1.php"><img src="../images/lion.png" alt="logo" width="100" height="100" class="logo"></a>
                    <a href="../index1.php" class="alone">Home</a>
                    <a href="../safari/safari.php" class="alone">Safari</a>
                    <a href="../posts/posts.php"  class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="javascript:void(0);" class="active" class="alone">Contacts</a>
                    <a href="javascript:void(0);" class="icon" id="icon" onclick="openNav()"><span class="material-icons" class="bar">menu</span></a>
                    <a href="javascript:void(0);" style="float:right;" class="user_profile">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div class='dropdown'><a href='"."contacts.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
                <div id="hiddenSidebar" class="hiddensidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                    <a href="../index1.php" class="alone">Home</a>
                    <a href="../safari/safari.php" class="alone">Safari</a>
                    <a href="../posts/posts.php"  class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="javascript:void(0);" class="alone" class="active">Contacts</a>
                    <a href="javascript:void(0);" style="float:right;">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div><a href='"."contacts.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='column1_contacts'>
                <div class='card1_contacts'>
                    <diV class='new_photo_icon call'>
                        <span class="material-icons contact_icon">call</span>
                    </div>
                    <div class='container1'>
                        <h2 class='their_name1_contact'>6382486188</h2>
                        <div class='their_name2_contacts call_2'>You can call us anytime</div>
                    </div>
                </div>
            </div>
            <div class='column1_contacts'>
                <div class='card1_contacts'>
                    <diV class='new_photo_icon'>
                        <span class="material-icons contact_icon">location_on</span>
                    </div>
                    <div class='container1_contact'>
                        <h2 class='their_name1_contact chennai'>Chennai,Tamilnadu</h2>
                        <div class='their_name2_contacts india'>India</div>
                    </div>
                </div>
            </div>
            <div class='column1_contacts'>
                <div class='card1_contacts'>
                    <diV class='new_photo_icon'>
                        <span class="material-icons contact_icon">email</span>
                    </div>
                    <div class='container1'>
                        <h2 class='their_name1_contact mail'>intothewild@gmail.com</h2>
                        <div class='their_name2_contacts mail'>Feel free to email us your questions</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="js_val">
            <div class="getintouch">Get in T<span class="diffe">O</span>uch</div>
            <form method="POST" action="" class="contacts_form" onsubmit="return validate()" name="contact_form">
                Name:<input type="text" name="username" id="username" class="form_box form" required value="<?php 
                    if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                    echo $_SESSION['username']; 
                    }?>"><br><br>
                Email:<input type="email" name="email" id="email" class="form_box form" required><br><br>
                Contact<br>
                Number.<input type="tel" name="contact" id="contact" class="form_box form" required><br><br>
                Message:<br><br>
                <textarea name="message" rows="10" cols="40" class="form_box_post_desp" required placeholder="Comments,Queries.."></textarea><br><br>
                <input type="submit" name="send" value="SEND" class="login_button_post">
            </form>
        </div>
        <div class="footerbg">
            <img src="../images/lion.png" alt="logo" class="footer_logo">
            <div class="footer_text">
                <div class="footer_text_1">INTO THE</div>
                <div class="footer_text_2">WILD</div>
            </div>
            <div class="footer_flex">
                <div class="footer_items away">
                    <a href="../safari/safari.php" class="footer_a">Safari</a>
                </div>
                <div class="footer_items">
                    <a href="../posts/posts.php" class="footer_a">Posts</a>
                </div>
                <div class="footer_items">
                    <a href="#id" class="footer_a">Donate</a>
                </div>
                <div class="footer_items">
                    <a href="../index1.php" class="footer_a">Home</a>
                </div>
            </div>
            <div class="footer_flex">
                <div class="footer_items_icons away2">
                    <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                </div>
                <div class="footer_items_icons">
                    <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>
                </div>
                <div class="footer_items_icons">
                    <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
                </div>
                <div class="footer_items_icons">
                    <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
                </div>
            </div>
            <div class="footer_text_privacy">
                <div class="footer_text_1_privacy">&copy  2021 Wildlife. All Rights Reserved. Privacy Policy</div>
            </div>
        </div>
        <?php
        $conn=mysqli_connect('localhost','root','','queries');
        if(isset($_POST['send'])){
            $name=$email=$message=$contact="";
            $name=$_POST['username'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $message=$_POST['message'];
            $sql="INSERT INTO queries (names,email,contact,messages) VALUES ('$name','$email','$contact','$message');";
            mysqli_query($conn,$sql);
            $_SESSION['response']="OK";
            if(!(empty($_SESSION['response']))){
                echo "<script type='text/javascript'>alert('Thank you for your response')</script>";
                unset($_SESSION['response']);
            }
        }
        ?>
    </body>
</html>
            