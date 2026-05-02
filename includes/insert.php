<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname    = $_POST['surname'];
    $name       = $_POST['name'];
    $middlename = $_POST['middlename'];
    $address    = $_POST['address'];
    $contact    = $_POST['contact'];

    // Use ? placeholders instead of :name, :surname, etc.
    $sql = "INSERT INTO students (surname, name, middlename, address, contact_number) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $surname, $name, $middlename, $address, $contact);

    if ($stmt->execute()) {
        header("Location: ../public/index.php?status=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
