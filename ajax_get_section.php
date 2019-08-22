<?php

include 'dbconnect.php';

$type = $_REQUEST["t"];

if ($type == 1) {
  $sql2= "SELECT id,name,username FROM userlogin WHERE permission_group='2' AND id NOT IN ('98','99','100','101','102','103','104','105') ORDER BY name ASC";
} else {
  $sql2= "SELECT id,name,username FROM userlogin WHERE permission_group='2' AND id NOT IN ('98') ORDER BY name ASC";
}

$result2 = mysqli_query($conn, $sql2);

  while($row2 = mysqli_fetch_array($result2)) {
    echo"<option value='".$row2["username"]."'>" .$row2["name"]." </option>";
  }

?>
