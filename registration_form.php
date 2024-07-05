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
        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" required><br><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"><br><br>
        <label for="district">District:</label>
        <input type="text" id="district" name="district" required><br><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required><br><br>
        <label for="phoneno">Phone Number:</label>
        <input type="tel" id="phoneno" name="phoneno" required pattern="[0-9]{10}"><br><br>
         <input type="submit" name ="submit" value="Register" reset>
    </form>
</body>
</html>
