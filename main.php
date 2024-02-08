<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet" />
</head>

<body>
    <?php

    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $regno_err = $id_err = $email_err = "";
    if (isset($_POST['tra'])) {
        $flag = 0;
        if (strlen($regno) == 10) {
            $flag++;
        } else {
            $regno_err = "Enter a valid vehicle Registration number";
        }
        if (strlen($id) == 7) {
            $flag++;
        } else {
            $id_err = "Enter a valid Tracker ID number";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Enter a valid e-mail address";
        } else {
            $flag++;
        }
        if ($flag == 3) {
            echo '<h1 class=" text-red-600 "> HELLO </h1> ';
        }
    }
    ?>
</body>

</html>