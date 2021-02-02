<?php

    if(!isset($_FILES["primaryImg"]) && !isset($_FILES["waterMark"])) 
    {
      echo '<div class="height"><div class="output"><h3>UPLOAD IMAGE</h3</div</div</div>';
      include_once 'inc/footer.php';
      exit;
    }

    // Create
    if(filter_has_var(INPUT_POST, 'submit'))
    {
        $msg = '';
        $msgClass = '';
        $imgClass = '';
        $waterMark = $_FILES["waterMark"]["name"];
        $primaryImg = $_FILES["primaryImg"]["name"];

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

        $uploads = glob("uploads/*.*");
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

        $stamp = imagecreatefromfile($waterMark);
        
        if(!empty($uploads)){
            $im = imagecreatefromfile($image);
        } else {
            $im = imagecreatefromfile($primaryImg);
        }

        if(empty($waterMark)){
            $msg = 'Upload Logo to Add More';
            $msgClass = 'alert-danger alertClass';
        } else {
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
        }

        if (!is_dir('uploads')) {
            mkdir('uploads');
        }

        if(!empty($uploads)){
            $output = $image;
        } else {
            $output = "uploads/".$_FILES["primaryImg"]["name"];
        }
        
        imagejpeg($im,$output);
        imagedestroy($im);
        if($msg != ''){
            $imgClass = 'imgClass';
        }
    }

    // Undo
    if(filter_has_var(INPUT_POST, 'undo'))
    {
        echo 'undo';
    }    