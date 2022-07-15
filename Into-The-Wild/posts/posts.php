<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("location: ../posts/posts.php");
}
?>
<!DOCTYPE html>
<html lang="EN" class="html_main">
    <head>
        <title>Posts|Into the Wild|Wildlife|Wildlife Photography|Safari|Donate</title>
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
    <div class="bg_posts">
            <div class="banner_name_slide2">
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
                    <a href="javascript:void(0);"><img src="../images/lion.png" alt="logo" width="80" height="80" class="logo"></a>
                    <a href="../index1.php" class="alone">Home</a>
                    <a href="../safari/safari.php"  class="alone">Safari</a>
                    <a href="javascript:void(0);" class="active" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" class="icon" id="icon" onclick="openNav()"><span class="material-icons" class="bar">menu</span></a>
                    <a href="javascript:void(0);" style="float:right;" class="user_profile">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div class='dropdown'><a href='"."posts.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
                <div id="hiddenSidebar" class="hiddensidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                    <a href="../index1.php" class="alone">Home</a>
                    <a href="../safari/safari.php"  class="alone">Safari</a>
                    <a href="javascript:void(0);" class="active" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" style="float:right;">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div><a href='"."posts.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="our_projects1">
                OUR PROJECTS
                <div class="over_projects2">Pos<span class="diffe">t</span>s</div>
        </div>
        <?php
        $nameErr="";
        $user_name="";
        $conn=mysqli_connect("localhost", "root", "", "store");
        $msg = "";
        if (isset($_POST['upload'])) {
            if(empty($_POST['username'])){
                $nameErr="Username is required";
            }
            else{
                $user_name=mysqli_real_escape_string($conn,check($_POST['username']));
                if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
                    $nameErr="Only Letters and White space allowed for Userame";
                }
            }
            $_SESSION['image'] = $_FILES['image']['name'];
            $_SESSION['image_text'] = mysqli_real_escape_string($conn, $_POST['image_text']);
            $target = "../images/".basename($_SESSION['image']);
            $img_in=$_SESSION['image'];
            $text_in=$_SESSION['image_text'];
            $sql="INSERT INTO images (username,images,descriptions) VALUES ('$user_name','$img_in', '$text_in');";
            mysqli_query($conn, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
        }
        function check($x){
            $x=trim($x);
            $x=stripslashes($x);
            $x=htmlspecialchars($x);
            return $x;
        }
        ?>
        <form method="POST" action="" enctype="multipart/form-data" class="post_box">
            <label for="username" class="postname">Username:</label>
            <input type="text" name="username" id="username" class="form_box" value="<?php 
            if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                echo $_SESSION['username']; 
            } ?>"><br><br><?php echo "<div class='Errtext1'>".$nameErr."</div>"; ?>
            <input type="file" name="image" accept="image/*" class="form_box_post" required><br><br>
            <textarea id="text" cols="40" rows="4" name="image_text" class="form_box_post_desp" placeholder="Add description..."></textarea><br><br>
            <button type="submit" name="upload" class="login_button_post">POST</button>
        </form>
        <?php
        $conn=mysqli_connect("localhost", "root", "", "store");
        $result = mysqli_query($conn, "SELECT * FROM images");
        while ($rows = mysqli_fetch_array($result)) {
            echo 
            "<div class='row'>
                <div class='column1'>
                    <div class='card1'>
                        <diV class='new_photo'>
                            <img src='../images/".$rows['images']."' alt='".$rows['username']."' class='img_photographers1'>
                        </div>
                        <div class='container1'>
                            <h2 class='their_name1'>".$rows['username']."</h2>
                            <div class='their_name2'>".$rows['descriptions']."</div>
                        </div>
                    </div>
                </div>
            </div>"; 
        }
        unset($_SESSION['image']);
        unset($_SESSION['image_text']);
        ?>
    </body>
</html>