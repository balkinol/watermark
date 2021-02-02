<?php

  if (array_key_exists('deleteImg', $_POST)) {
    $output = $_POST['deleteImg'];
    if (file_exists($output)) {
      unlink($output);
      rmdir('images/uploads');
    }
  }

  if (array_key_exists('primaryImgPath', $_POST)) {
    $primaryImgPath = $_POST['primaryImgPath'];
    if (file_exists($primaryImgPath)) {
      unlink($primaryImgPath);
      rmdir('images/primaryImg');
    }
  }
  
  if (array_key_exists('waterMarkPath', $_POST)) {
    $waterMarkPath = $_POST['waterMarkPath'];
    if (file_exists($waterMarkPath)) {
      unlink($waterMarkPath);
      rmdir('images/watermark');
    }
  }

  header ('location: index.php');