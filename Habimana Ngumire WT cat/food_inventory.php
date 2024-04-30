 <?php
      // Display existing inventory items
      $inventory = [
        ['name' => 'Apples', 'quantity' => 10],
        ['name' => 'Bananas', 'quantity' => 15],
        ['name' => 'Oranges', 'quantity' => 8]
      ];

      foreach ($inventory as $item) {
        echo "<li>{$item['name']}: {$item['quantity']}</li>";
      }
      ?>
    </ul>
  </div>
  <?php
  // Handle form submission
  if (isset($_POST['addItem'])) {
    $itemName = $_POST['itemName'];
    $itemQuantity = (int)$_POST['itemQuantity'];

    if ($itemName && $itemQuantity > 0) {
      // Update inventory (this is just a dummy example, in real-world scenario you'd update a database)
      $newItem = ['name' => $itemName, 'quantity' => $itemQuantity];
      $inventory[] = $newItem;

      // Display the newly added item
      echo "<script>document.getElementById('inventoryList').innerHTML += '<li>{$newItem['name']}: {$newItem['quantity']}</li>';</script>";
    } else {
      echo "<script>alert('Please enter valid item name and quantity.');</script>";
    }
  }
  ?>
</body>
</html>