<!DOCTYPE html>
<html>
<body>

<?php

  preg_match_all('/[0-9]/', 'f09barBaz', $matches, PREG_OFFSET_CAPTURE);
  print_r($matches);

?>

</body>
</html>
