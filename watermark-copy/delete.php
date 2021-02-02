<?php

  if (array_key_exists('deleteImg', $_POST)) {
    $output = $_POST['deleteImg'];
    if (file_exists($output)) {
      unlink($output);     
    }
  }

  header ('location: index.php');