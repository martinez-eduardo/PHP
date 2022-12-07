<?php
  $url = $_REQUEST['enlace'];
  $nombre = $_REQUEST['nombre'];
  if (file_exists($url)) {
    $pdf_contenido = file_get_contents($url);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment;
    filename="'.basename($nombre).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($url));
    readfile($url);
    exit;
  }
  else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "Archivo '$url' no fue encontrado.";
    exit();
  }
?>
