<!DOCTYPE html>
<html>
<head>
    <title>Book Information Form</title>
</head>
<body>
    <form action="process_form.php" method="POST" enctype="multipart/form-data">
        <label for="file">Select JPG File:</label>
        <input type="file" id="file" name="file" accept=".jpg" required>
        <br>

        <label for="bookname">Book Name:</label>
        <input type="text" id="bookname" name="bookname" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        <br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <br>

        <label for="rentprice">Rent Price:</label>
        <input type="number" id="rentprice" name="rentprice" step="0.01" required>
        <br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="available">Available</option>
            <option value="notavailable">Not Available</option>
        </select>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>