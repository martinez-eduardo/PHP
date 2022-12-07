<?php
  $bin = base64_decode($_REQUEST['base64']);
  $size = getImageSizeFromString($bin);
  if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
    echo('Base64 no es una Imagen');
  }
  else{
    $ext = substr($size['mime'], 6);
    if (!in_array($ext, ['png', 'jpeg'])) {
      echo('Imagen no Soportada');
    }
    else{
      echo('Imagen Valida');
      //$img_file = "/files/images/filename.{$ext}";
      //file_put_contents($img_file, $bin);
    }
  }
?>
