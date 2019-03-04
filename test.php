<?php
  $conn = mysqli_connect('localhost', 'root', '', 'frogs');
  mysqli_set_charset($conn,"utf8");

  $query = "SELECT * FROM customers
  INNER JOIN orders
  ON customers.customer_id = orders.customer_id
  INNER JOIN order_line
  ON orders.orderno = order_line.orderno
  INNER JOIN products
  ON order_line.artno = products.artno
  WHERE orders.orderno = 1";

  $output = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($output);

  echo "{$row['firstname']} har beställt:";
  echo '<br />';

  mysqli_data_seek($output, 0);

  while($row = mysqli_fetch_assoc($output)) {
        echo "{$row["quantity"]} st {$row["artname"]} á {$row["price"]} kr.";
        echo '<br />';
    }

  mysqli_close($conn);

 ?>
