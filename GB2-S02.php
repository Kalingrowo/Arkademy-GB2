<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Password: <input type="password" name="password">
  </form>
</body>
</html>

<?php
  $password = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    echo "<br /> Input : ".$password;
    echo ValidatePass($password);
  }

  function ValidatePass($pass){
    if(empty($pass)) { return "<br />Error : password kosong"; }
    if(strlen($pass) < 8) { return "<br />Error : password kurang, min 8 char"; }

    $upCount = FindChar("up", $pass);
    $lowCount = FindChar("low", $pass);
    $numCount = FindChar("num", $pass);
    $spCount = FindChar("sp", $pass);

    if($upCount < 1) { return "<br />Error : password harus ada min 1 huruf besar"; }
    if($lowCount < 1) { return "<br />Error : password harus ada min 1 huruf kecil"; }
    if($numCount < 1) { return "<br />Error : password harus ada min 1 number"; }
    if($spCount < 1) { return "<br />Error : password harus ada min 1 karakter spesial"; }

    return "<br />Congratulation, Password validated !";
  }

  function FindChar($type, $pass) {
    if($type == "up") {
      preg_match_all('/[A-Z]/', $pass, $matches, PREG_OFFSET_CAPTURE);
    } else if ($type == "low") {
      preg_match_all('/[a-z]/', $pass, $matches, PREG_OFFSET_CAPTURE);
    } else if ($type == "num") {
      preg_match_all('/\d/', $pass, $matches, PREG_OFFSET_CAPTURE);
    } else if ($type == "sp") {
      preg_match_all('/[^a-zA-Z\d]/', $pass, $matches, PREG_OFFSET_CAPTURE);
    }
    $typeCount = count($matches[0]);
    return $typeCount;
  }

?>
