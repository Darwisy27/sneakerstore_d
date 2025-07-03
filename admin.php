<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <a href="index.html" class="back-button">← Back to Store</a>

    <h2>Payments</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Card Number</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>
            <th>CVV</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "sneakerstore_d");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $sql = "SELECT name, phone, address, card_number, expiry_month, expiry_year, cvv FROM payments";
        $result = $conn->query($sql);
        $serialNumber = 1;

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$serialNumber++."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["phone"]."</td>
                        <td>".$row["address"]."</td>
                        <td>".$row["card_number"]."</td>
                        <td>".$row["expiry_month"]."</td>
                        <td>".$row["expiry_year"]."</td>
                        <td>".$row["cvv"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No payments found</td></tr>";
        }
        ?>
    </table>

    <h2 style="margin-top: 50px;">Customer Reviews</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Review</th>
        </tr>
        <?php
        $sql_reviews = "SELECT name, review FROM reviews";
        $result_reviews = $conn->query($sql_reviews);
        $reviewNumber = 1;

        if ($result_reviews && $result_reviews->num_rows > 0) {
            while($row = $result_reviews->fetch_assoc()) {
                echo "<tr>
                        <td>".$reviewNumber++."</td>
                        <td>".htmlspecialchars($row["name"])."</td>
                        <td>".htmlspecialchars($row["review"])."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No reviews submitted yet.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
