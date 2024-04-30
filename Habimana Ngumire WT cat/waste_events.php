<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waste Events Logging</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Waste Events Logging</h2>

    <!-- PHP code for handling form submission -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $reason = $_POST['reason'];
        $quantity = $_POST['quantity'];
        $location = $_POST['location'];
        $date = date("Y-m-d");

        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "your_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO waste_events (reason, quantity, location, date) VALUES (?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $reason, $quantity, $location, $date);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Waste event logged successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <!-- HTML form for waste events logging -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="reason">Reason for Waste:</label>
        <textarea id="reason" name="reason" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity Wasted:</label>
        <input type="number" id="quantity" name="quantity" required>
      </div>
      <div class="form-group">
        <label for="location">Location of Waste:</label>
        <input type="text" id="location" name="location" required>
      </div>
      <button type="submit">Log Waste Event</button>
    </form>

    <!-- Table to display logged waste events -->
    <table id="wasteEventsTable">
      <thead>
        <tr>
          <th>Reason for Waste</th>
          <th>Quantity Wasted</th>
          <th>Location of Waste</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <!-- Waste events will be dynamically added here -->
      </tbody>
    </table>
  </div>
</body>
</html>
