<?php
$Server = "localhost";
$username = "root";
$password = "";
$db = "job";
$con = mysqli_connect($Server, $username, $password, $db);
if (!$con) {
    die("connection failed : " . mysqli_connect_error());
}
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'doc', 'docx'])) {
        echo "You file extension must be .zip, .pdf, .doc or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $fn = $_POST['FirstName'];
            $ln = $_POST['LastName'];
            $date =  $_POST['Date'];
            $mail = $_POST['Email'];
            $ph = $_POST['Mobile'];
            $ye = $_POST['yearsExperience'];
            $addr = $_POST['Address'];
            $b10 = $_POST['Board_10'];
            $p10 = $_POST['Percentage_10'];
            $y10 = $_POST['Year_10'];
            $b12 = $_POST['Board_12'];
            $p12 = $_POST['Percentage_12'];
            $y12 = $_POST['Year_12'];


            $sql = "INSERT INTO deets values('$fn','$ln','$date','$mail')";
            if (mysqli_query($con, $sql)) {
                echo "<h2>File uploaded successfully</h2>";
            }
        } else {
            echo "<h2>Failed to upload file.</h2>";
        }
        //echo "<h2>Thank you, your information has been stored in our Database.</h2>";
    }
}
echo "<h2>Thank you, your information has been stored in our Database.</h2>";
mysqli_close($con);
