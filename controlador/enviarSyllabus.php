<?php  
    if (!empty($_POST["btnregistrar"])){ 
    //Capturo los datos enviados por POST desde el formulario
            $nombres=$_SESSION['nombres'];
            $correo=$_SESSION['correo'];
            $nrc=$_POST["nrc"];
            $curso=$_POST["curso"];
            $ciclo=$_POST["ciclo"];
            $desdEmail= 'syllabos.sisil@gmail.com'; 
        
            //Construyo el cuerpo del mensaje    
            $message            = "Nombre: " . $nombres . "\n";
            $message            = $message . "Email: " . $correo . "\n";
            $message            = $message . "NRC: " . $nrc . "\n";
            $message            = $message . "Curso: " . $curso . "\n";
            $message            = $message . "Ciclo: " . $ciclo . "\n";
                
            //Obtener datos del archivo subido 
            $file_tmp_name      = $_FILES['my_file']['tmp_name'];
            $file_name          = $_FILES['my_file']['name'];
            $file_size          = $_FILES['my_file']['size'];
            $file_type          = $_FILES['my_file']['type'];

            
            //Leer el archivo y codificar el contenido para armar el cuerpo del email
            $handle              = fopen($file_tmp_name, "r");
            $content             = fread($handle, $file_size);
            fclose($handle);
            $encoded_content     = chunk_split(base64_encode($content));
        
            $boundary            = md5("pera");
        
            //Encabezados
            $headers             = "MIME-Version: 1.0\r\n"; 
            $headers            .= "From:".$correo."\r\n"; 
            $headers            .= "Reply-To: ".$desdEmail."" . "\r\n";
            $headers            .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
                
            //Texto plano
            $body               = "--$boundary\r\n";
            $body               .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body               .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
            $body               .= chunk_split(base64_encode($message)); 
                
            //Adjunto
            $body               .= "--$boundary\r\n";
            $body               .="Content-Type: $file_type; name=".$file_name."\r\n";
            $body               .="Content-Disposition: attachment; filename=".$file_name."\r\n";
            $body               .="Content-Transfer-Encoding: base64\r\n";
            $body               .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
            $body               .= $encoded_content; 
            
            $subject            = "Nuevo Syllabo subido a la plataforma!";
            
            //Enviando el mail
            $tamanio = 1030; 
            if(isset($_FILES['my_file']) && $_FILES['my_file']['type'] == 'application/pdf'){
                if( $_FILES['my_file']['size'] < ($tamanio * 1024)){
                    $sentMail = mail($desdEmail, $subject, $body, $headers);
                    if($sentMail){       
                        echo "<div class='alert alert-success'>Formulario enviado correctamente, esperando a su confirmacion...</div>";
                    }else{
                        echo  "<div class='alert alert-danger'>Se produjo un error al enviar el archivo</div>";
                    } 
                
                }else{
                    echo  "<div class='alert alert-danger'>Tamaño del archivo no debe superar los 2MB</div>";
                }
            }else if(isset($_FILES['my_file']) && $_FILES['my_file']['type'] != 'application/pdf'){
                echo  "<div class='alert alert-danger'>Solo se permiten archivos .pdf </div>";
            }
        }
    if (!empty($_POST["btnregistrarproyecto"])){ 
    //Capturo los datos enviados por POST desde el formulario
            $nombres=$_SESSION['nombres'];
            $correo=$_SESSION['correo'];
            $nrc=$_POST["nrc"];
            $curso=$_POST["curso"];
            $ciclo=$_POST["ciclo"];
            $descripcion=$_POST["descripcion"];
            $desdEmail= 'syllabos.sisil@gmail.com'; 
        
            //Construyo el cuerpo del mensaje    
            $message            = "Nombre: " . $nombres . "\n";
            $message            = $message . "Email: " . $correo . "\n";
            $message            = $message . "NRC: " . $nrc . "\n";
            $message            = $message . "Curso: " . $curso . "\n";
            $message            = $message . "Ciclo: " . $ciclo . "\n";
            $message            = $message . "Descripcion: " . $descripcion . "\n";
                
            //Obtener datos del archivo subido 
            $file_tmp_name      = $_FILES['my_file']['tmp_name'];
            $file_name          = $_FILES['my_file']['name'];
            $file_size          = $_FILES['my_file']['size'];
            $file_type          = $_FILES['my_file']['type'];

            
            //Leer el archivo y codificar el contenido para armar el cuerpo del email
            $handle              = fopen($file_tmp_name, "r");
            $content             = fread($handle, $file_size);
            fclose($handle);
            $encoded_content     = chunk_split(base64_encode($content));
        
            $boundary            = md5("pera");
        
            //Encabezados
            $headers             = "MIME-Version: 1.0\r\n"; 
            $headers            .= "From:".$correo."\r\n"; 
            $headers            .= "Reply-To: ".$desdEmail."" . "\r\n";
            $headers            .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
                
            //Texto plano
            $body               = "--$boundary\r\n";
            $body               .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body               .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
            $body               .= chunk_split(base64_encode($message)); 
                
            //Adjunto
            $body               .= "--$boundary\r\n";
            $body               .="Content-Type: $file_type; name=".$file_name."\r\n";
            $body               .="Content-Disposition: attachment; filename=".$file_name."\r\n";
            $body               .="Content-Transfer-Encoding: base64\r\n";
            $body               .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
            $body               .= $encoded_content; 
            
            $subject            = "Nuevo Syllabo subido a la plataforma!";
            
            //Enviando el mail
            $tamanio = 1030; 
            $sentMail = mail($desdEmail, $subject, $body, $headers);
                    if($sentMail){       
                        echo "<div class='alert alert-success'>Formulario enviado correctamente, esperando a su confirmacion...</div>";
                    }else{
                        echo  "<div class='alert alert-danger'>Se produjo un error al enviar el archivo</div>";
                    } 
        }
?>