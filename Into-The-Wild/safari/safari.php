<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("location: ../safari/safari.php");
}
if(!(empty($_SESSION['booked']))){
    echo "<script type='text/javascript'>alert('Booking confirmed')</script>";
    unset($_SESSION['booked']);
}
?>
<!DOCTYPE html>
<html lang="EN" class="html_main">
    <head>
        <title>Safari|Into the Wild|Wildlife|Wildlife Photography|Posts|Donate</title>
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
        <script src="../js/script.js"></script>   
    </head>
    <body class="body_main">
        <div class="bg_safari">
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
                    <a href="../safari/safari.php" class="active" class="alone">Safari</a>
                    <a href="../posts/posts.php" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" class="icon" id="icon" onclick="openNav()"><span class="material-icons" class="bar">menu</span></a>
                    <a href="javascript:void(0);" style="float:right;" class="user_profile">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div class='dropdown'><a href='"."safari.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
                <div id="hiddenSidebar" class="hiddensidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                    <a href="../index1.php" class="alone">Home</a>
                    <a href="../safari/safari.php" class="active" class="alone">Safari</a>
                    <a href="../posts/posts.php" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" style="float:right;">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div><a href='"."safari.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="our_projects1">
                OUR PROJECTS
                <div class="over_projects1">Jungle <span class="diffe">S</span>afari</div>
            </div>
        <form action="" method="POST" class="search_sort">
            <input type="text" name="search" class="form_box1">
            <input type="submit" name="find_me" value="SEARCH" class="login_button1">
            <select name="filter" class="form_box1">
                <option value="rating">Rating</option>
                <option value="LH">Price:Low to High</option>
                <option value="HL">Price: High to Low</option>
            </select>
            <input type="submit" name="filter_search" value="FILTER" class="login_button1">
            <input type="submit" name="back" value="BACK" class="login_button1_back">
        </form>
        <?php
        $conn=mysqli_connect('localhost','root','','safari');
        if(!(isset($_POST['find_me']))){
            if(isset($_POST['filter_search'])){
                if($_POST['filter']=="rating"){
                    $sql="SELECT * FROM safari_1 ORDER BY rating DESC;";
                    $result=mysqli_query($conn,$sql);
                    if((mysqli_num_rows($result)>0)){
                        while ($rows=mysqli_fetch_assoc($result)){
                            echo 
                            "<div class='row'>
                                <div class='column1'>
                                    <div class='card1'>
                                        <diV class='new_photo'>
                                            <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                        </div>
                                        <div class='container1'>
                                            <h2 class='their_name1'>".$rows['names']."</h2>
                                            <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                            <div class='their_name3'><i>".$rows['category']."</i></div>
                                            <div class='their_name4'>".$rows['rating']."/5.0</div>
                                            <div class='their_name5'>$".$rows['min_price']."</div>
                                            <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        
                    }
                }
                elseif($_POST['filter']=="LH"){
                    $sql="SELECT * FROM safari_1 ORDER BY min_price;";
                    $result=mysqli_query($conn,$sql);
                    if((mysqli_num_rows($result)>0)){
                        while ($rows=mysqli_fetch_assoc($result)){
                            echo 
                            "<div class='row'>
                                <div class='column1'>
                                    <div class='card1'>
                                        <diV class='new_photo'>
                                            <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                        </div>
                                        <div class='container1'>
                                            <h2 class='their_name1'>".$rows['names']."</h2>
                                            <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                            <div class='their_name3'><i>".$rows['category']."</i></div>
                                            <div class='their_name4'>".$rows['rating']."/5.0</div>
                                            <div class='their_name5'>$".$rows['min_price']."</div>
                                            <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                        </div>
                                    </div>
                                </div>
                            </div> ";
                        }
                    }
                }
                elseif($_POST['filter']=="HL"){
                    $sql="SELECT * FROM safari_1 ORDER BY min_price DESC;";
                    $result=mysqli_query($conn,$sql);
                    if((mysqli_num_rows($result)>0)){
                        while ($rows=mysqli_fetch_assoc($result)){
                            echo 
                            "<div class='row'>
                                <div class='column1'>
                                    <div class='card1'>
                                        <diV class='new_photo'>
                                            <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                        </div>
                                        <div class='container1'>
                                            <h2 class='their_name1'>".$rows['names']."</h2>
                                            <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                            <div class='their_name3'><i>".$rows['category']."</i></div>
                                            <div class='their_name4'>".$rows['rating']."/5.0</div>
                                            <div class='their_name5'>$".$rows['min_price']."</div>
                                            <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                }
            }
            elseif(isset($_POST['back'])){
                $sql="SELECT * FROM safari_1;";
                $result=mysqli_query($conn,$sql);
                if((mysqli_num_rows($result)>0)){
                    while ($rows=mysqli_fetch_assoc($result)){
                        echo 
                        "<div class='row'>
                            <div class='column1'>
                                <div class='card1'>
                                    <diV class='new_photo'>
                                        <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                    </div>
                                    <div class='container1'>
                                        <h2 class='their_name1'>".$rows['names']."</h2>
                                        <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                        <div class='their_name3'><i>".$rows['category']."</i></div>
                                        <div class='their_name4'>".$rows['rating']."/5.0</div>
                                        <div class='their_name5'>$".$rows['min_price']."</div>
                                        <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
            }
            else{
                $sql="SELECT * FROM safari_1;";
                $result=mysqli_query($conn,$sql);
                if((mysqli_num_rows($result)>0)){
                    while ($rows=mysqli_fetch_assoc($result)){
                        echo 
                        "<div class='row'>
                            <div class='column1'>
                                <div class='card1'>
                                    <diV class='new_photo'>
                                        <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                    </div>
                                    <div class='container1'>
                                        <h2 class='their_name1'>".$rows['names']."</h2>
                                        <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                        <div class='their_name3'><i>".$rows['category']."</i></div>
                                        <div class='their_name4'>".$rows['rating']."/5.0</div>
                                        <div class='their_name5'>$".$rows['min_price']."</div>
                                        <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
            }
        }
        elseif(isset($_POST['find_me'])){
            $who=$_POST['search'];
            $sql="SELECT * FROM safari_1 WHERE names LIKE '%$who%' OR locations LIKE '%$who%' OR country LIKE '%$who%' OR category LIKE '%$who%';";
            $result=mysqli_query($conn,$sql);
            if((mysqli_num_rows($result)>0)){
                while ($rows=mysqli_fetch_assoc($result)){
                    echo 
                    "<div class='row'>
                        <div class='column1'>
                            <div class='card1'>
                                <diV class='new_photo'>
                                    <img src='../images/".$rows['image']."' alt='".$rows['names']."' class='img_photographers1'>
                                </div>
                                <div class='container1'>
                                    <h2 class='their_name1'>".$rows['names']."</h2>
                                    <div class='their_name2'>".$rows['locations'].",".$rows['country']."</div>
                                    <div class='their_name3'><i>".$rows['category']."</i></div>
                                    <div class='their_name4'>".$rows['rating']."/5.0</div>
                                    <div class='their_name5'>$".$rows['min_price']."</div>
                                    <div class='their_name6'><form method='POST' action=''><button type='submit' class='login_button11' name='book' value='".$rows['id']."'>BOOK NOW</button></form></div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
            
        }
        else{
            echo "NO RESULTS";
        }
        ?>
        <?php
        if(isset($_POST['book'])){
            $book="";
            if(!(empty($_POST['book']))){
                $book=$_POST['book'];
                $conn=mysqli_connect('localhost','root','','safari');
                $sql="SELECT * FROM safari_1 WHERE id='$book';";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)==1){
                    while($rows=mysqli_fetch_assoc($result)){
                        $_SESSION['safari_name']=$rows['names'];
                        $_SESSION['safari_price']=$rows['min_price'];
                        echo "<script>window.top.location='http://localhost/booknow/booknow.php'</script>";
                    }
                }
                

            }
        }
        ?>
        
    </body>
</html>