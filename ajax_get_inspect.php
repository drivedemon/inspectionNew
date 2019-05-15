<?php

include 'dbconnect.php';

// $dpid = $_REQUEST["dpid"];

$sql2= "SELECT * FROM subins_zone ORDER BY id ASC";

$result2 = mysqli_query($conn, $sql2);

  while($row2 = mysqli_fetch_array($result2)) {
    echo"<option value='".$row2["id"]."'>" .$row2["name"]." </option>";
  }

?>
