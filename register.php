<?php
require_once('tcpdf/tcpdf.php'); 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$category = $_POST['category'];
$email = $_POST['email'];
$id_number = $_POST['id_number'];
$phoneno = $_POST['phoneno'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$sql = "INSERT INTO registrations (name, category, id_number,email, phoneno, district, state, pincode)
        VALUES ('$name', '$category', '$id_number', '$email', '$phoneno', '$district', '$state', '$pincode')";
if ($conn->query($sql) === TRUE) {
    $registration_id = $conn->insert_id;
    $pdf = new TCPDF();
    $pdf->AddPage();
    $img_file = 'image/idcardfront.jpg';
    $image_width = 179;
    $page_width = 210;
    $x_center = ($page_width - $image_width) / 2;
    $pdf->Image($img_file, $x_center, 0, $image_width, 297);
    $pdf->SetFont('Helvetica', 'B', 20);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetXY(60, 128);
    $pdf->Write(0, "Name: $name");
    $pdf->SetXY(60, 140);
    $pdf->Write(0, "Id No.: $id_number");
    $pdf->SetXY(60, 152);
    $pdf->Write(0, "Category: $category");
    $pdf->SetXY(60, 164);
    $pdf->Write(0, "Email: $email");
    $pdf->SetXY(60, 176);
    $pdf->Write(0, "District: $district");
    $pdf->SetXY(60, 188);
    $pdf->Write(0, "State: $state");
    $pdf->SetXY(60, 200);
    $pdf->Write(0, "Pin Code: $pincode");
    $pdf->SetXY(60, 212);
    $pdf->Write(0, "Phone No: $phoneno");
    $pdf->AddPage();
    $img_file_back = 'image/idcardback.jpg';
    $pdf->Image($img_file_back, $x_center, 0, $image_width, 297); // Adjust height as needed
   $pdf->Output('id_card.pdf', 'D');
    $pdf->close();
echo "Registration successful. <a href='registration_form.php'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
