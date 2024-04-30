<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['locationName'])) {
    // Retrieve location name from the form
    $locationName = $_POST['locationName'];

    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_wastage_reduction_management_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert the new location into the database
    $sql = "INSERT INTO storage_locations (location_name) VALUES (?)";

    // Prepare and bind parameter
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $locationName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New storage location added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Fetch and display existing storage locations
// Connect to your database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing storage locations from the database
$sql = "SELECT location_name FROM storage_locations";
$result = $conn->query($sql);

// Output data of each row
if ($result->num_rows > 0) {
    // Output each location as a table row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["location_name"]."</td><td><button onclick=\"deleteLocation('" . $row["location_name"] . "')\">Delete</button></td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No storage locations found</td></tr>";
}

// Close connection
$conn->close();
?>
