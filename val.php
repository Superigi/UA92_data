<?php
function test_input($data) {
  $data = trim($data);
  // trims the data
  $data = stripslashes($data);
  // removes the slashes from the data
  $data = htmlspecialchars($data);
  // remove any specail charaters like ! ? /
  return $data;
}
?>