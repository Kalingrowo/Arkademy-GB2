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

  // function drawLine(int)
  function drawLine2($length) {
    for($i=$length; $i >= 0; $i--) {
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
  drawLine2(8);
?>
