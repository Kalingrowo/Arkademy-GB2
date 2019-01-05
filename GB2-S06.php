<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ark_dbgudang";

// create connection to Mysql
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <table>
    <tr>
      <td>ID</td>
      <td>category_name</td>
      <td>products</td>
    </tr>
    <?php
      $sqlC = "SELECT * FROM categories";
      $resultC = $conn->query($sqlC);
      if($resultC->num_rows > 0) {
        while ($row = $resultC->fetch_array()) {
    ?>
    <tr>
      <td>
        <?php echo $row['id']; ?>
      </td>
      <td>
        <?php echo $row['name']; ?>
      </td>
      <td>
        <?php
          $sqlP = "SELECT name FROM products WHERE category_id='".$row['id']."'";
          $resultP = $conn->query($sqlP);
          if($resultP->num_rows > 0) {
            while ($rowP = $resultP->fetch_array()) {
              echo $rowP['name'].",&nbsp";
            }
          }
        ?>
      </td>
    </tr>
    <?php } } ?>
  </table>
</body>
</html>
