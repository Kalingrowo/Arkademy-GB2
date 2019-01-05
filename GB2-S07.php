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
  //echo "Connection success !";
?>

<!DOCTYPE HTML>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Hello, Arkadians !</title>
</head>
<body>
  <hr />
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card-columns">
          <?php
            $sqlC = "SELECT * FROM categories";
            $resultC = $conn->query($sqlC);
            if($resultC->num_rows > 0) {
              while ($row = $resultC->fetch_array()) {
          ?>
          <div class="card">
            <div class="card-header">
              <?php echo $row['name']; ?>
            </div>
            <ul class="list-group list-group-flush">
              <?php
                $sqlP = "SELECT name FROM products WHERE category_id='".$row['id']."'";
                $resultP = $conn->query($sqlP);
                if($resultP->num_rows > 0) {
                  while ($rowP = $resultP->fetch_array()) {
              ?>
              <li class="list-group-item"><?php echo $rowP['name']; ?></li>
              <?php } } ?>
            </ul>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4 fixed-bottom">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://github.com/Kalingrowo/"> Kalingrowo</a>
  </div>
  <!-- Copyright -->
</footer>
</html>
