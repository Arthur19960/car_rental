<?php
include 'connection.php';
session_start();

if(isset($_POST["submit"])){
    $vBrand = $_POST["brand"];
    $vType = $_POST["type"];

    if($vType == '0'){
        $vType = 'Petrol';
    }else{
        $vType = 'Diesel';
    }

    $sql = "SELECT * FROM vehicles WHERE brand='".$vBrand."' and type='".$vType."'";
    $query = mysqli_query($conn,$sql);
   
}
?>

<html>
    <head>
        <title>Car Rental</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
    </head>
    <body>
        <div id="header">
            <div id="heading"><a href="#"><img src="images/logo.png" height=50 width=50> Artur Car Rental</a></div>
            <div id="menu">
                <div id="menu-item">Call/Whatsapp: +143-99999999</div>
                <div id="menu-item"><a href="login.php">Login/Register</a></div>
                <div id="menu-item"><a href="contact.php">Contact</a></div>
                <div id="menu-item"><a href="about.php">About Me</a></div>
            </div>
        </div>
        <div id="banner">
        <span class="search-heading"> Search car by brand and type: </span>
            <div id="search-section">
            
                <!-- <div id="search-box">
                    <input type="text" placeholder="Search..">
                </div> -->
                

                <div id="type">
                <form method="post" action="">
                    <div id="filter">
                        <select id="brand" name="brand">
                        <option value="Maruti">Maruti</option>
                        <option value="Maruti2134">Maruti1234</option>
                        <option value="Ford">Ford</option>
                        </select>
                    </div>
                     <div id="filter">
                        <select id="type" name="type">
                        <option value="0">Petrol</option>
                        <option value="1">Diesel</option>
                        </select>
                     </div>
                     <div id="filter">
                        <input type ="submit" name="submit" value="search">
                     </div>
                </form>

                </div>
                
            </div>

            <div id="available-cars-section"><h1>Available Cars</h1>
            <?php 
            if(isset($_POST["submit"])){
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="car-card">';
                echo '<div class="car-card-image">';
                echo '<img src="images/redcar.jpg" alt="car" style="width:200px;height:200px;">';
                echo '</div>';
                echo '<div class="car-card-text">';
                echo $row["name"].'<br><br><br><br>';
                echo $row["model_number"].'&nbsp;&nbsp;&nbsp;'.$row['capacity'].'&nbsp;&nbsp;&nbsp;Type<br><br><br><br>';
                echo '<button type="button">Book</button>';
                echo '</div>';
                echo '</div>';
            }
            }else{
                echo '<div class="car-card">';
                echo '<div class="car-card-image">';
                echo    '<img src="images/redcar.jpg" alt="car" style="width:200px;height:200px;">';
                echo'</div>';
                echo'<div class="car-card-text">';
                echo    'Alto<br><br><br><br>';
                echo    '1345865 &nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;&nbsp;Petrol<br><br><br><br>';
                echo    '<button type="button">Book</button>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
            }
            ?>
            

        </div>
    </body>
</html>