<?php
  $code = $_REQUEST['CODIGO'];
  $size = $_FILES['ARCHIVO']['size'];
  $archivo = $_FILES['ARCHIVO']['name'];
  $min_size = 100; /*1k*/
  $max_size = 12000000; /*12mb*/
  $carpeta = "dir/";
  $ftp_server = "LOCALHOST";
  $ftp_user = "USUARIO";
  $ftp_pass = "PASSWORD";
  $url = "ftp://".$ftp_user.":".$ftp_pass."@".$ftp_server.":21/".$carpeta;
  $query = "CALL DATABASE.PROCEDURE('".$code."'.doc,'".$url."');";
  $rutasubida = $carpeta.$code.".doc";
  $rutacompleta = $url.$code.".doc";
  if (preg_match("/.doc/", $archivo) OR preg_match("/.DOC/", $archivo)){
    if (($size > $min_size AND $size < $max_size)){
      $remoto = $_FILES["ARCHIVO"]["tmp_name"];
      $conn_ftp = ftp_connect($ftp_server, 21) or die("Imposible Conectarse el FTP $ftp_server");
      $login = ftp_login($conn_ftp, $ftp_user, $ftp_pass);
      $subido = ftp_put($conn_ftp, $rutasubida, $remoto, FTP_BINARY);
      ftp_close($conn_ftp);
      if($subido){
        echo "<a href='$rutacompleta'>Archivo subido exitosamente y hubodescueto</a>";
      }
    }
    else{
      echo "El archivo debe tener un tamño limite de 1KB a 12MB";
    }
  }
  else{
    echo "El archivo no se pudo subir, Intente de nuevo con formato DOC";
  }
?>
