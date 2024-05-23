<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$date = $_POST['date'];
$helpful = $_POST['helpful'];
$feedback = $_POST['feedback'];

if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($date) || !empty($helpful) || !empty($feedback)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "formfeedback";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM register WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO register (firstname, lastname, email, date, helpful, feedback) VALUES (?, ?, ?, ?, ?, ?)";

        // prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

       
        $stmt->close();
        $conn->close();
    }
} else {
    echo "ALL FIELDS ARE REQUIRED";
    die();
}
?>
