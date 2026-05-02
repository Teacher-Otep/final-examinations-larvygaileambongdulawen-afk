<?php
include("db.php");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Surname</th>
            <th>Name</th>
            <th>Middlename</th>
            <th>Address</th>
            <th>Contact Number</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['surname']."</td>
                <td>".$row['name']."</td>
                <td>".$row['middlename']."</td>
                <td>".$row['address']."</td>
                <td>".$row['contact_number']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No student records found.</p>";
}

$conn->close();
?>
