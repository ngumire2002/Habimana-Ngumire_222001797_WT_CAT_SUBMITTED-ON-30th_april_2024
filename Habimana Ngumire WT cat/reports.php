<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_wastage_reduction_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check report type and fetch data accordingly
if (isset($_GET['type'])) {
    $reportType = $_GET['type'];

    switch ($reportType) {
        case 'foodInventory':
            // Fetch food inventory data from database
            $sql = "SELECT * FROM food_inventory";
            $result = $conn->query($sql);

            // Process and display food inventory report
            if ($result->num_rows > 0) {
                echo "<h3>Food Inventory Report</h3>";
                echo "<table><tr><th>Item Name</th><th>Quantity</th><th>Expiration Date</th><th>Storage Location</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['item_name'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['expiration_date'] . "</td><td>" . $row['storage_location'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No data available";
            }
            break;
        case 'wasteEvents':
            // Fetch waste events data from database
            // Similar process as above
            break;
        case 'preventionMeasures':
            // Fetch prevention measures data from database
            // Similar process as above
            break;
        default:
            echo "Invalid report type";
    }
}

$conn->close();
?>
