<?php
session_start();
if (isset($_POST['subir'])) {
    $archivo = $_FILES['archivo']['name'];
    if (isset($archivo) && $archivo != "") {
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $nuevonombre = substr(str_shuffle($permitted_chars), 0, 16);




        $ruta_nuevo_destino = $_ENV['RAILWAY_VOLUME_MOUNT_PATH'].'/' . $_FILES['archivo']['name'];
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        if ( in_array($_FILES['archivo']['type'], $extensiones) ) {
             $max_tamanyo = 1024 * 1024 * 8;
             if ( $_FILES['archivo']['size']< $max_tamanyo ) {
                  if( move_uploaded_file ( $temp, $ruta_nuevo_destino ) ) {
                  

                    echo $tipo;
                    echo $nuevonombre;
                    echo $nuevonombre.'.'.$tipo;
                    
                  }else{
                    
                  }
             }
        }
    }
  }

?>


