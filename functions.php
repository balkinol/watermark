<?php

    if(!isset($_FILES["primaryImg"]) && !isset($_FILES["waterMark"])) 
    {
      echo '<div class="height"><div class="output"><h3>UPLOAD IMAGE</h3</div</div</div>';
      include_once 'inc/footer.php';
      exit;
    }

    if (!is_dir('images')) {
       mkdir('images');
    }

    if (!is_dir('images/watermark')) {
        mkdir('images/watermark');
    }

    if (!is_dir('images/primaryImg')) {
       mkdir('images/primaryImg');
    }

    if (!is_dir('images/uploads')) {
        mkdir('images/uploads');
    }

    // Create
    if(filter_has_var(INPUT_POST, 'submit'))
    {
        $waterMark = $_FILES["waterMark"];
        $primaryImg = $_FILES["primaryImg"];

        $waterMarkPath = '';
        $primaryImgPath = '';

        function imagecreatefromfile( $primaryImg ) {
            switch ( strtolower( pathinfo( $primaryImg, PATHINFO_EXTENSION ))) {
                case 'jpeg':
                case 'jpg':
                    return imagecreatefromjpeg($primaryImg);
                break;
        
                case 'png':
                    return imagecreatefrompng($primaryImg);
                break;
        
                case 'gif':
                    return imagecreatefromgif($primaryImg);
                break;
            }
        }

        $uploads = glob("images/uploads/*.*");
        for ($i=0; $i<count($uploads); $i++)
        {
            $image = $uploads[$i];
            $supported_file = array(
                    'gif',
                    'jpg',
                    'jpeg',
                    'png'
            );

            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        }
    
        if ($waterMark && $waterMark['tmp_name']) {
            $waterMarkPath = 'images/watermark/'.$waterMark['name'];
            move_uploaded_file($waterMark['tmp_name'], $waterMarkPath);
        }
    
        if ($primaryImg && $primaryImg['tmp_name']) {
            $primaryImgPath = 'images/primaryImg/'.$primaryImg['name'];
            move_uploaded_file($primaryImg['tmp_name'], $primaryImgPath);
        }

        $stamp = imagecreatefromfile($waterMarkPath);
        
        if(!empty($uploads)){
            $im = imagecreatefromfile($image);
        } else {
            $im = imagecreatefromfile($primaryImgPath);
        }

            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            $size = $_POST['size'];
    
            $width = $sx * $size;
            $height = $sy * $size;
    
            $position = $_POST['position'];
    
            if (!empty($position)) {
                switch ($position) {
                    case 'bottomRight':
                        imagecopyresized($im, $stamp, imagesx($im) - $width + -20, imagesy($im) - $height + -20, 0, 0, $width, $height, $sx, $sy);
                    break;
    
                    case 'bottomLeft':
                        imagecopyresized($im, $stamp, 20,  imagesy($im) - $height + -20, 0, 0, $width, $height, $sx, $sy);
                    break;
    
                    case 'center':
                        imagecopyresized($im, $stamp, (imagesx($im) - $width)/2, (imagesy($im) - $height)/2, 0, 0, $width, $height, $sx, $sy);
                    break;
    
                    case 'topRight':
                        imagecopyresized($im, $stamp, imagesx($im) - $width + -20, 20, 0, 0, $width, $height, $sx, $sy);
                    break;
    
                    case 'topLeft':
                        imagecopyresized($im, $stamp, 20, 20, 0, 0, $width, $height, $sx, $sy);
                    break;
                }
            }

        if(!empty($uploads)){
            $output = $image;
        } else {
            $output = "images/uploads/".$_FILES["primaryImg"]["name"];
        }
        
        imagejpeg($im,$output);
        imagedestroy($im);
    }