<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <p />Jumlah peserta: <input type="number" name="peserta">
  </form>
</body>
</html>

<?php
  $peserta = 0;

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $peserta = (int)$_POST["peserta"];

    echo "<br />Jumlah peserta: ".$peserta;
    echo "<br />Handshake: ".count_handshake($peserta);
  }

  // count the handshake
  function count_handshake($peserta) {
    $count = 0;
    for ($i=$peserta; $i > 0; $i--) {
      $count += $i - 1;
    }
    return $count;
  }

?>
