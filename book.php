<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imagestore";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="stylesheet" href="rough.css">
    <link rel="stylesheet" href="home.css">
   
    <title>books</title>
</head>
<body>


    <div class="header">

        <div class="logobox "> <a  href="home.php"><img id="logo" src="logo1.png"  alt="logo "></a>
            
        </div>
        <div class="top-section">
    
            <div class="nav-sec"> 
                <div class="nav-link">
                    <div class="Abc"><a href="homepage.php">Home</a></div>
                    <div class="Abc"><a href="book.php">Library</a></div>
                    <div class="Abc"><a href="login.php">Log In/Out</a></div>
                   
                </div>
                
            </div>
                 <input class="search-bar" type="text" placeholder="    Search Here...">
        </div>
        </div>
    </div>

<?php
// Retrieve data from the database
$sql = "SELECT * FROM book_details";
$result = $conn->query($sql);

// Check if records were found
if ($result->num_rows > 0) {
  
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="div1">

        <div class="div2">
            <!-- <img class="book-pic" src="jayabhudi.jpg" alt="cat"> -->
            <img class="book-pic" src="data:image/jpeg;base64,<?php echo base64_encode($row["image"]); ?>" alt="Image">
        
                <p class="name"><?php echo $row["title"]?></p>
            <div>
                <img class="rating-star-img" src="./rating.jpeg" alt="">
                <p class="rating">4.5 rating</p>
            </div>
               <div class="detail">
                Name:<?php echo $row["title"] ?><br>
                Author:<?php echo $row["author"]?><br>
                Genre:<?php echo $row["genre"]?><br>
                Price:<?php echo $row["price"]?><br>
                Rent :<?php echo $row["rentp"]?> <br>
                Status: <?php echo $row["status"]?>
                
            </div>
             <button class="book-button">Book Now</button>
        
        </div>
        <?php
    }

   
} else {
    echo "No records found";
}

// Close the connection
$conn->close();
?>