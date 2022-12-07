<?php
if(isset($_FILES['image'])){
  $file_tmp= $_FILES['image']['tmp_name'];
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $data = file_get_contents( $file_tmp );
    $type = $check["mime"];
    $ext = substr($type, 6);
    if (!in_array($ext, ['png', 'jpeg'])) {
      echo('Imagen no Soportada');
    }
    else{
      $base64 = 'data:' . $type . ';base64,' . base64_encode($data);
      echo $base64;
    }
  }
  else {
    echo "Archivo no es Imagen.";
  }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
  <p>
    <input type="file" name="image" />
    <input type="submit" value="Upload">
  </p>
</form>
