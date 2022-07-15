<!DOCTYPE html>
<html lang="EN" class="html_main">
    <head>
        <title>Bookings|Into the Wild|Wildlife|Wildlife Photography|Safari|Posts|Donate</title>
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
    <?php
    session_start();
    $nameErr=$EmailErr=$pplErr=$cardErr=$monthErr=$yearErr=$cvvErr=$dateErr="";
    $user_name=$email=$card_name=$month=$year=$cvv=$date=$safari="";
    $amount=0;
    $card_number="";
    $ppl="";
    $conn1=mysqli_connect('localhost','root','','bookings');
    //FORM VALIDATION
    if(isset($_POST['make_payment'])){
        if(empty($_POST['firstname'])){
            $nameErr="Username is required";
        }
        else{
            $user_name=mysqli_real_escape_string($conn1,check($_POST['firstname']));
            if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
                $nameErr="Only Letters and White space allowed for Userame";
            }
        }
        if(empty($_POST['email'])){
            $EmailErr="Email is required";
        }
        else{
            $email=mysqli_real_escape_string($conn1,check($_POST["email"]));
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $EmailErr="Enter valid Email ID";
            }
        }
        if(empty($_POST['safari'])){
        }
        else{
            $safari=$_POST['safari'];
        }
        if((empty($_POST['ppl']))&&($_POST['ppl']==0)){
            $pplErr="Enter the number of people";
        }
        else{
            $ppl=$_POST['ppl'];
        }
        if(!(empty($_POST['total']))){
            $amount=$_POST['total'];
        }
        if(empty($_POST['date'])){
            $dateErr="Enter the date you would like to visit";
        }
        else{
            $date=$_POST['date'];
        }
        if(empty($_POST['cardname'])){
            $nameErr="Username is required";
        }
        else{
            $card_name=mysqli_real_escape_string($conn1,check($_POST['cardname']));
            if(!preg_match("/^[a-zA-Z-' ]*$/",$card_name)){
                $nameErr="Only Letters and White space allowed for Userame";
            }
        }
        if(empty($_POST['cardnumber'])){
            $cardErr="Card number is required";
        }
        else{
            $card_number=$_POST['cardnumber'];
            if(!preg_match("/^[0-9]{12}$/",$card_number)){
                $cardErr="Enter correct Card number";
            }
        }
        if(empty($_POST['expmonth'])){
            $monthErr="Select the Exp Month";
        }
        else{
            $month=$_POST['expmonth'];
        }
        if(empty($_POST['expyear'])){
            $yearErr="Select the Exp Year";
        }
        else{
            $year=$_POST['expyear'];
            if(!preg_match("/^[0-9]{4}$/",$year)){
                $yearErr="Enter correct Exp Year";
            }
        }
        if(empty($_POST['cvv'])){
            $cvvErr="Enter CVV";
        }
        else{
            $cvv=$_POST['cvv'];
            if(!preg_match("/^[0-9]{3}$/",$cvv)){
                $cvvErr="Enter correct CVV";
            }
        }
        if(($nameErr=="")&&($EmailErr=="")&&($pplErr=="")&&($cardErr=="")&&($monthErr=="")&&($yearErr=="")&&($cvvErr=="")&&($dateErr=="")){
            $conn1=mysqli_connect('localhost','root','','bookings');
            $sql1="INSERT INTO booking VALUES ('$user_name','$email','$safari','$ppl','$amount','$date','$card_name','$card_number','$month','$year','$cvv');";
            mysqli_query($conn1,$sql1);
            $_SESSION['booked']="Booking confirmed";
            header("location:../safari/safari.php");
        }
    }
    function check($x){
        $x=trim($x);
        $x=stripslashes($x);
        $x=htmlspecialchars($x);
        return $x;
    }
    ?>
    <body class="body_bill">
        <div class="billbg"></div>
        <div class="outer">
            <div class="billboard">
                <div class="col-75">
                    <div class="bill_container">
                        <form method="POST" action="">    
                            <div class="billboard">
                                <div class="col-50">
                                    <h3 class="bill_name">DETAILS</h3>
                                    <label for="fname">Full Name</label>
                                    <input type="text" id="fname" name="firstname" class="input_bill" value="<?php 
                                    if((isset($_SESSION['username']))&&(isset($_SESSION['success']))){
                                        echo $_SESSION['username']; 
                                    } ?>"><br><?php echo "<div class='Errtext1'>".$nameErr."</div>"; ?>
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="input_bill" value="<?php echo $email; ?>"><?php echo "<div class='Errtext1'>".$EmailErr."</div>"; ?>
                                    <label for="saf">Safari</label>
                                    <input type="text" id="saf" name="safari" readonly class="input_bill" value="<?php echo $_SESSION['safari_name']; ?>">
                                    <label for="ppl">Number of people</label>
                                    <input type="number" id="ppl" name="ppl" min="1" max="100" class="input_bill" ><?php echo "<div class='Errtext1'>".$pplErr."</div>"; ?>
                                    <label for="total">Total Amount $</label>
                                    <input type="number" id="total" readonly name="total" min="1" max="500" class="input_bill" value="<?php echo $_SESSION['safari_price']; ?>">
                                    <script type="text/javascript">
                                        var input1 = document.getElementById('ppl');
                                        var input2 = document.getElementById('total');
                                        input1.addEventListener('input', function() {
                                            input2.value = input1.value * <?php echo $_SESSION['safari_price']; ?>
                                        });
                                    </script>
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date" class="input_bill" value="<?php echo $date; ?>"><?php echo "<div class='Errtext1'>".$dateErr."</div>"; ?>
                                </div>
                                <div class="col-50">
                                    <h3 class="bill_name">PAYMENT</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" id="crecard1"></i>
                                        <i class="fa fa-cc-mastercard" id="crecard2"></i>
                                    </div>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" class="input_bill" value="<?php echo $card_name; ?>"><?php echo "<div class='Errtext1'>".$nameErr."</div>"; ?>
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" class="input_bill"><?php echo "<div class='Errtext1'>".$cardErr."</div>"; ?>
                                    <label for="expmonth">Exp Month</label>
                                    <select id="expmonth" name="expmonth" class="input_bill">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select><br><?php echo "<div class='Errtext'>".$monthErr."</div>"; ?>
                                    <div class="billboard">
                                        <div class="col-50">
                                            <label for="expyear">ExpYear</label>
                                            <input type="text" id="expyear" name="expyear" class="input_bill" value="<?php echo $year; ?>"><?php echo "<div class='Errtext1'>".$yearErr."</div>"; ?>
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" class="input_bill" value="<?php echo $cvv; ?>"><?php echo "<div class='Errtext1'>".$cvvErr."</div>"; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="MAKE PAYMENT" class="btn" name="make_payment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
