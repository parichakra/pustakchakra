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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted values
    $bookname = $_POST["bookname"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $price = $_POST["price"];
    $rentprice = $_POST["rentprice"];
    $status = $_POST["status"];
    $file = $_FILES["file"];

    // Check if a file was selected
    if ($file["error"] == UPLOAD_ERR_OK) {
        $temp_name = $file["tmp_name"];
        $image_content = file_get_contents($temp_name);

        // Prepare the SQL statement
        $sql = "INSERT INTO book_details (title, author, genre, price, rentp, status, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdsss", $bookname, $author, $genre, $price, $rentprice, $status, $image_content);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Book information stored successfully" ;
     
        } else {
            echo "Error storing book information: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file: " . $file["error"];
    }
}

// Close the connection
$conn->close();
// require_once(details_upload.php);
?>