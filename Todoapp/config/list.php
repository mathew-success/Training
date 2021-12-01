<?php

require('../config/connection/connection.php');

$sql = "select * from tasks";

$query = $db->query($sql);

if ($query->num_rows > 0) {
  while($row = $query->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Task Name: " . $row["name"]. "<br>";
  }
} else {
  echo "No data found";
}

?>