<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';
    sleep(2);
    $nombre=$_POST['nombre-login'];
    $clave=md5($_POST['clave-login']);
 

   if(!$nombre==""&&!$clave==""){
        $verUser=ejecutarSQL::consultar("select * from usuarios where user='$nombre' and pass='$clave'");
        
            $UserC=mysqli_num_rows($verUser);
            if($UserC>0){
                $verAcc=ejecutarSQL::consultar("select * from usuarios where user='$nombre' and pass='$clave'");
                $acceso=mysqli_fetch_array($verAcc);
                $_SESSION['nombreUser']=$nombre;
                $_SESSION['claveUser']=$clave;
                $_SESSION['acceso']=$acceso['idTipoU'];
                $_SESSION['idUser']=$acceso['idUsuario'];
                $_SESSION['sucursal']=$acceso['idSucursal'];
				$consultaSucursal=ejecutarSQL::consultar("SELECT * FROM sucursal where idSucursal=".$_SESSION['sucursal']);
                $sucursal=mysqli_fetch_array($consultaSucursal);
				$_SESSION['nombreSucursal']=$sucursal['nombreSucursal'];
                echo '<script> location.href="index.php"; </script>';
            }else{
                echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error nombre o contraseña invalido';
            }
        

    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error campo vacío<br>Intente nuevamente';
    }