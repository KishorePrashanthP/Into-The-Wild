<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("location: index1.php");
}
if(!(empty($_SESSION['editted']))){
    echo "<script type='text/javascript'>alert('Your account details are editted successfully')</script>";
    unset($_SESSION['editted']);
}
if(!(empty($_SESSION['donated']))){
    echo "<script type='text/javascript'>alert('Thank you for your donation')</script>";
    echo "<script type='text/javascript'>window.location.href='#id';</script>";
    unset($_SESSION['donated']);
}
?>
<!DOCTYPE html>
<html lang="EN" class="html_body">
    <head>
        <title>Into the Wild|Wildlife|Wildlife Photography|Safari|Posts|Donate</title>
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
        <header>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="../images/banner1.jpg" class="slide_img">
                    <div class="banner_name">
                        <div class="banner_name_1">INTO THE</div>
                        <div class="banner_name_2">WILD</div>
                    </div>
                </div>
                <div class="mySlides fade">
                    <img src="../images/banner3.jpg" class="slide_img">
                    <div class="banner_name_slide2">
                        <div class="banner_name_1">INTO THE</div>
                        <div class="banner_name_2">WILD</div>
                    </div>
                </div>
                <div class="mySlides fade">
                    <img src="../images/newban.jpg" class="slide_img">
                    <div class="banner_name_slide3">
                        <div class="banner_name_1">INTO THE</div>
                        <div class="banner_name_2">WILD</div>
                    </div>
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
                    <a href="javascript:void(0);" class="active" class="alone">Home</a>
                    <a href="../safari/safari.php" class="alone">Safari</a>
                    <a href="../posts/posts.php" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" class="icon" id="icon" onclick="openNav()"><span class="material-icons" class="bar">menu</span></a>
                    <a href="javascript:void(0);" style="float:right;" class="user_profile">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div class='dropdown'><a href='"."index1.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
                <div id="hiddenSidebar" class="hiddensidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                    <a href="javascript:void(0);" class="active" class="alone">Home</a>
                    <a href="../safari/safari.php" class="alone">Safari</a>
                    <a href="../posts/posts.php" class="alone">Posts</a>
                    <a href="../login/login.php" class="alone">Log in</a>
                    <a href="../contacts/contacts.php" class="alone">Contacts</a>
                    <a href="javascript:void(0);" style="float:right;">
                        <?php
                        if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                            echo "<div><a href='"."index1.php?logout='1'"."'"." ><div><img src='../images/nodp.png' alt='Profile' width='50' height='50' class='profile'><div class='dropdown_content'>".$_SESSION['username'];
                            echo "</div></div></a></div>"; 
                        }
                        ?>
                    </a>
                </div>
            </div>
            <script>
                var slideIndex = 0;
                showSlides();
                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}    
                    slides[slideIndex-1].style.display = "block";  
                    setTimeout(showSlides, 5000); 
                }
            </script>
        </header>
        <div class="ani_quote">
            <div class="quote">"</div>
            <div class="quote_text">No <span class="highlight">Life</span> without <span class="highlight">Wildlife</span>!Period."</div>
            <div class="said_by">- Quote by Alvis Lazarus</div>
            <div class="said_by_1">19-Feb-2020</div>
        </div>
        <div>
            <div class="wildlife_photographers">
                <span class="wildlife">Wildlife</span><span class="photographers">Photo<span class="diffe">G</span>raphers</span>
            </div>
        </div>
        <div class="row">
            <div class="column move">
            <div class="card">
                <img src="../images/nickbrandt.jpg" alt="NickBrandt" class="img_photographers">
                <div class="container">
                <h2 class="their_name">Nick Brandt</h2>
                <div class="photo" onclick="document.getElementById('id1').style.display='block'"><span class="material-icons">photo_camera</span></div>
                </div>
            </div>
            </div>
        
            <div class="column">
            <div class="card">
                <img src="../images/WillburradLucas.jpg" alt="Will Burrad- Lucas" class="img_photographers">
                <div class="container">
                <h2 class="their_name">Will Burrard-Lucas</h2>
                <div class="photo" onclick="document.getElementById('id2').style.display='block'"><span class="material-icons">photo_camera</span></div>
                </div>
            </div>
            </div>
            <div class="column">
            <div class="card">
                <img src="../images/WillNicholls.jpg" alt="Will Nicholls" class="img_photographers">
                <div class="container">
                <h2 class="their_name">Will Nicholls</h2>
                <div class="photo" onclick="document.getElementById('id3').style.display='block'"><span class="material-icons">photo_camera</span></div>
                </div>
            </div>
            </div>
        </div>
        <div id="id1" class="modal">
            <div>
                <span onclick="document.getElementById('id1').style.display='none'" class="photo_close">x</span>
            </div>
            <div class="modal-content"> 
                <div class="column_photo">
                <img src="../images/nick1.jpeg">
                <img src="../images/nick2.jpg">
                <img src="../images/nick3.jpg">
                <img src="../images/nick4.jpg">
                <img src="../images/nick5.jpg">
                <img src="../images/nick6.jpg">
                </div>
            </div>
        </div>
        <div id="id2" class="modal">
            <div>
                <span onclick="document.getElementById('id2').style.display='none'" class="photo_close">x</span>
            </div>
            <div class="modal-content"> 
                <div class="column_photo">
                <img src="../images/will1.jpg">
                <img src="../images/will2.jpg">
                <img src="../images/will3.jpg">
                <img src="../images/will4.jpg">
                <img src="../images/will5.jpg">
                <img src="../images/will6.jpg">
                </div>
            </div>
        </div>
        <div id="id3" class="modal">
            <div>
                <span onclick="document.getElementById('id3').style.display='none'" class="photo_close">x</span>
            </div>
            <div class="modal-content"> 
                <div class="column_photo">
                <img src="../images/willn1.jpg">
                <img src="../images/willn2.jpg">
                <img src="../images/willn3.jpg">
                <img src="../images/willn4.jpg">
                <img src="../images/willn5.jpg">
                <img src="../images/willn6.jpg">
                </div>
            </div>
        </div>
        <div class="ani_quote">
            <div class="quote1">"</div>
            <div class="quote_text1">My images are unashamedly idyllic and romantic, a kind of <span class="highlight">enchanted Africa</span>. They're my elegy to a world that is <span class="highlight">steadily</span>, <span class="highlight"> tragically vanishing</span>."</div>
            <div class="said_by">- Quote by Nick Brandt</div>
        </div>
        <div class="our_projects"  id="id">
            OUR PROJECTS
            <div class="over_projects">Help Animals <span class="diffe">W</span>orldwide</div>
            <div class="text_projects">Below are some of our recent charity projects that helped us protect wild animals and save them from from retaliatory killings in 28 countries.</div>
        </div>
        <div class="image-container">
            <div class="textdonar" onclick="window.location.href='../donation/donate.php';">DONATE</div>
        </div>
        <?php
        $tiger=$rhino=$gorilla=$wolf=0;
        $conn=mysqli_connect('localhost','root','','donation');
        $sql="SELECT SUM(amount) AS total FROM donate WHERE toanimal='tiger';";
        $result=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($result)){
            $tiger=$rows['total'];
        }
        $sql="SELECT SUM(amount) AS total FROM donate WHERE toanimal='rhino';";
        $result=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($result)){
            $rhino=$rows['total'];
        }
        $sql="SELECT SUM(amount) AS total FROM donate WHERE toanimal='gorilla';";
        $result=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($result)){
            $gorilla=$rows['total'];
        }
        $sql="SELECT SUM(amount) AS total FROM donate WHERE toanimal='wolf';";
        $result=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($result)){
            $wolf=$rows['total'];
        }
        ?>
        <div class="flex-container">
            <div class="flex-item">
                <img src="../images/siberiantiger.jpg" alt="Siberian Tiger">
                <div class="overlay">
                    <div class="flex_name">SIBERIAN TIGER</div>
                    <div class="flex_name1"><?php echo round($tiger,6); ?> BTC DONATED</div>
                </div>
            </div>
            <div class="flex-item">
                <img src="../images/whiterhino.jpeg" alt="White Rhino">
                <div class="overlay">
                    <div class="flex_name-1">WHITE RHINOCEROS</div>
                    <div class="flex_name1-1"><?php echo round($rhino,6); ?> BTC DONATED</div>
                </div>
            </div>
            <div class="flex-item">
                <img src="../images/mountaingorilla.jpg" alt="Mountain Gorilla">
                <div class="overlay">
                    <div class="flex_name-1">MOUNTAIN GORILLA</div>
                    <div class="flex_name1"><?php echo round($gorilla,6); ?> BTC DONATED</div>
                </div>
            </div>
            <div class="flex-item">
                <img src="../images/graywolf.jpg" alt="Gray Wolf">
                <div class="overlay">
                    <div class="flex_name-2">GRAY WOLF</div>
                    <div class="flex_name1"><?php echo round($wolf,6); ?> BTC DONATED</div>
                </div>
            </div>
        </div>
        <div class="aboutus_text">Abo<span class="diffe">U</span>t   Us</div>
        <div class="aboutus">
            <img src="../images/aboutus.jpg" alt="ABOUTUS" height="370" class="img_about">
            <div class="float">
                <div class="aboutus_para">"Into the Wild" is devoted to the conservation of the world’s wild cats and dozens of other endangered species.</div>
                <div class="aboutus_para">Our team of leading biologists and law enforcement experts develop innovative strategies to address the dire threats facing the wild animals globally.</div>
                <div class="aboutus_para">Here,you will be able to book Jungle Safaris across the world and post your clicks to get featured.</div>
            </div>
        </div>
        <div class="our_projects1 marginabove">
            OUR PROJECTS
            <div class="over_projects1">Collabor<span class="diffe">A</span>tions</div>
        </div>
        <div class="collo_flex">
            <img src="../images/wwf.png" alt="wwf" width="200" class="collo_flex_items">
            <img src="../images/wti.png" alt="wti" width="200" class="collo_flex_items">
            <img src="../images/wsos.png" alt="wsos" width="200" class="collo_flex_items">
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
                    <a href="../contacts/contacts.php" class="footer_a">Contacts</a>
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
    </body>
</html> 

