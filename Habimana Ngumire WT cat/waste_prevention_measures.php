<?php
// Sample data for prevention measures (replace with data from database)
$preventionMeasures = [
    [
        'name' => 'Better Inventory Management',
        'description' => 'Regularly update inventory to reduce overstocking and expiration of food items.'
    ],
    [
        'name' => 'Donation Programs',
        'description' => 'Donate excess food to local charities or food banks.'
    ],
    [
        'name' => 'Composting Initiatives',
        'description' => 'Implement composting programs for food waste to reduce landfill contributions.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waste Prevention Measures</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .measure {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .measure h2 {
      margin-top: 0;
    }

    .measure p {
      margin-bottom: 10px;
    }

    .implement-btn {
      background-color: #4CAF50;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .implement-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container" id="measuresList">
    <?php
    // Function to display prevention measures
    foreach ($preventionMeasures as $measure) {
        echo '<div class="measure">';
        echo '<h2>' . $measure['name'] . '</h2>';
        echo '<p>' . $measure['description'] . '</p>';
        echo '<button class="implement-btn" onclick="implementMeasure(\'' . $measure['name'] . '\')">Implement</button>';
        echo '</div>';
    }
    ?>
  </div>

  <script>
    // JavaScript code
    function implementMeasure(measureName) {
      alert('You have implemented the "' + measureName + '" measure.');
      // Add logic here to mark the measure as implemented in the database
    }
  </script>
</body>
</html>
