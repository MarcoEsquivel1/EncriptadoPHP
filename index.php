<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
            <div class="col-12">
                <div class="p-3 mb-3 bg-success text-white">
                    <h3>Mensaje</h3>
                    <form class="row g-3" method="post" action="#">
                        <div class="col-6">
                            <div class="mb-3">  
                                <label for="mensaje" class="visually-hidden">Mensaje</label>
                                <textarea type="text" rows="3" class="form-control" id="mensaje" name="mensaje" placeholder="Di algo"></textarea>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Confirmar</button>
                        </div>
                    </form>   
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 mb-3 bg-danger text-white">
                    <h3>Mensaje</h3>
                    <?php
                    //Iniciar keys
                    $result = openssl_pkey_new(array("private_key_bits" => 4096));
                    //Generar privada
                    openssl_pkey_export($result, $privateKey);
                    //Generar llave publica
                    $publicKey = openssl_pkey_get_details($result)['key'];

                    if(isset($_POST["mensaje"])){
                        echo "<p> Mensaje sin encriptar: " . $_POST["mensaje"] ." </p>";
                        //Se obtiene el mensaje del formulario
                        $plaintext = $_POST["mensaje"];
                        //Encriptamos el mensaje y lo guardamos en $encrypted_text
                        openssl_public_encrypt($plaintext,$encrypted_text,$publicKey);
                        //Se muestra el texto encriptado
                        echo "<p>Texto encriptado: $encrypted_text </p>";
                        //Se desencripta el mensaje
                        openssl_private_decrypt($encrypted_text, $decrypt, $privateKey);
                        //Se muestran los valores
                        echo "<p> Mensaje: $decrypt </p>";
                        echo "<p>clave privada: $privateKey </p>";
                        echo "<p>clave publica: $publicKey</p>";
                    }else{
                        echo "Esperando mensaje";
                    }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>