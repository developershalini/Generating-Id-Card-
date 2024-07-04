<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>
        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" required><br><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>
        <label for="district">District:</label>
        <input type="text" id="district" name="district" required><br><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required><br><br>
        <label for="image">Upload Image:</label>
        <input type="file" id="upload" name="image" accept="image/*" required><br><br>
        <input type="submit" name ="submit" value="Register" reset>
    </form>
</body>
</html>
