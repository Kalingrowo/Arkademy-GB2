<?php

  // function drawLine(int)
  function drawLine($length) {
    for($i=1; $i <= $length; $i++) {
      for ($j=1; $j <= $i; $j++) {
        if ($i == $j) {
          echo "*";
          echo "<br />";
        } else {
          echo "&nbsp;&nbsp;&nbsp;";
        }
      }
    }
  }

  drawLine(8);
?>
