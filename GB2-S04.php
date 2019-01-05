<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <p />Total: <input type="number" name="total"> Bayar: <input type="number" name="bayar">
    <p /><input type="submit" name="submit" action="submit">
  </form>
</body>
</html>

<?php
  $total = $bayar = 0;
  $money = array(500, 1000, 2000, 5000, 10000, 20000, 50000);
  $detilKembalian = array('500' => 0,
                          '1000' => 0,
                          '2000' => 0,
                          '5000' => 0,
                          '10000' => 0,
                          '20000' => 0,
                          '50000' => 0);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = (int)$_POST["total"];
    $bayar = (int)$_POST["bayar"];
    $kembalian = $bayar - $total;

    echo "<br />Total: ".$total;
    echo "<br />Bayar: ".$bayar;
    echo "<br />Kembalian: ".$kembalian;

    // calculate the return
    while ($kembalian > 0) {
      if ($kembalian >= 50000) {
        $kembalian -= 50000;
        $detilKembalian['50000'] += 1;
      } elseif ($kembalian >= 20000) {
        $kembalian -= 20000;
        $detilKembalian['20000'] += 1;
      } elseif ($kembalian >= 10000) {
        $kembalian -= 10000;
        $detilKembalian['10000'] += 1;
      } elseif ($kembalian >= 5000) {
        $kembalian -= 5000;
        $detilKembalian['5000'] += 1;
      } elseif ($kembalian >= 2000) {
        $kembalian -= 2000;
        $detilKembalian['2000'] += 1;
      } elseif ($kembalian >= 1000) {
        $kembalian -= 1000;
        $detilKembalian['1000'] += 1;
      } elseif ($kembalian >= 500) {
        $kembalian -= 500;
        $detilKembalian['500'] += 1;
      }
    }

    echo "<br />Detil kembalian: ";
    echo '<pre>';
    print_r($detilKembalian);
    echo '</pre>';
  }
?>
