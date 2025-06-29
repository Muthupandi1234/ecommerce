<?php
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['pass'])) {
    $n = $_POST['firstname'];
    $c = $_POST['lastname'];
    $d = $_POST['pass'];
    $con = mysqli_connect("localhost", "root", "", "ecommerce");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $stmt = $con->prepare("INSERT INTO signin (first_name, last_name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $n, $c, $d);

    if ($stmt->execute()) {
        echo "Student details added successfully";
    } else {
        echo "Not added: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($con);
} else {
    echo "Missing form data";
}
?>
