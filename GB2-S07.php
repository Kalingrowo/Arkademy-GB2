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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
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
