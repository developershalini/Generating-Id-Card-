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
$id_number = $_POST['id_number'];
$city = $_POST['city'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$sql = "INSERT INTO registrations (name, category, id_number, city, district, state, pincode)
        VALUES ('$name', '$category', '$id_number', '$city', '$district', '$state', '$pincode')";
if ($conn->query($sql) === TRUE) {
    $registration_id = $conn->insert_id;
    $pdf = new TCPDF();
    $pdf->AddPage();
    $img_file = 'image/frontpageidcard.jpg';
    $image_width = 179;
    $page_width = 210;
    $x_center = ($page_width - $image_width) / 2;
    $pdf->Image($img_file, $x_center, 0, $image_width, 297);
    $pdf->SetFont('Helvetica', '', 20);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetXY(75, 132);
    $pdf->Write(0, "$name");
    $pdf->SetXY(74, 147);
    $pdf->Write(0, "$id_number");
    $pdf->SetXY(89, 161);
    $pdf->Write(0, "$category");
    $pdf->SetXY(66, 177);
    $pdf->Write(0, "$city");
    $pdf->SetXY(81, 191);
    $pdf->Write(0, "$district");
    $pdf->SetXY(73, 204);
    $pdf->Write(0, "$state");
    $pdf->SetXY(83, 218);
    $pdf->Write(0, "$pincode");
    $pdf->AddPage();
    $img_file_back = 'image/back.jpeg';
    $pdf->Image($img_file_back, $x_center, 0, $image_width, 297); // Adjust height as needed
   $pdf->Output('id_card.pdf', 'D');
    $pdf->close();
echo "Registration successful. <a href='registration_form.php'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
