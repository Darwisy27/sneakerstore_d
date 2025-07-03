<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sneakerstore_d";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input
$name = $conn->real_escape_string($_POST['name']);
$review = $conn->real_escape_string($_POST['review']);

// Insert review
$sql = "INSERT INTO reviews (name, review) VALUES ('$name', '$review')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Review submitted successfully!');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
