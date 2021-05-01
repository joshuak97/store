<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

$where=$_POST['where'];

     $categorias=  ejecutarSQL::consultar("SELECT * FROM modeloCarros LEFT JOIN lineaCarros ON lineaCarros.idLinea=modeloCarros.idLinea LEFT JOIN anoCarros on anoCarros.idAno=modeloCarros.idAno $where");
     $ui=1;
     while($cate=mysqli_fetch_array($categorias)){
         echo '
            <div>
               <form method="post" action="process/updateCarros.php">
                <tr>
                     <td>
                       <input class="form-control" name="id" maxlength="9" required="" value="'.$cate['idModelo'].'" readonly>
                    </td>
                    <td><input class="form-control" type="text" name="act-nombreModelo" required="" value="'.$cate['nombreModelo'].'"></td>
                    <td><select class="form-control" name="act-linea"  required="">';
                    $modelocon=  ejecutarSQL::consultar("SELECT*FROM modeloCarros where idModelo=".$cate['idModelo']);
                    $datos=mysqli_fetch_array($modelocon);
                    $lineascon=  ejecutarSQL::consultar("SELECT*FROM lineaCarros where idLinea=".$datos['idLinea']);
                    $linea=mysqli_fetch_array($lineascon);
                    echo'<option value="'.$linea['idLinea'].'">'.$linea['nombreLinea'].'</option>';
                    $lineas2con=  ejecutarSQL::consultar("SELECT*FROM lineaCarros where idLinea!=".$datos['idLinea']." and idLinea!=17");
                    while($lineas=mysqli_fetch_array($lineas2con)){
                     echo'<option value="'.$lineas['idLinea'].'">'.$lineas['nombreLinea'].'</option>';
                    }
                    echo '</select></td>
                     <td><select class="form-control" name="act-anio" id="act-anio" >';
                     $aniocon=  ejecutarSQL::consultar("SELECT*FROM anoCarros where idAno=".$datos['idAno']);
                    $anio=mysqli_fetch_array($aniocon);
                    echo'<option value="'.$anio['idAno'].'">'.$anio['ano'].'</option>';
                    $anioscon=  ejecutarSQL::consultar("SELECT*FROM anoCarros where idAno!=".$datos['idAno']." and idAno!=41");
                    while($anios=mysqli_fetch_array($anioscon)){
                    echo'<option value="'.$anios['idAno'].'">'.$anios['ano'].'</option>';
                    }
                     echo '</select></td>
                     <td><input class="form-control" type="text" name="act-desCarro" required="" value="'.$cate['desCarro'].'"></td>
                    <td class="text-center">
                         <button type="submit" class="btn btn-sm btn-primary button-UM"  value="res-update-carros-'.$ui.'">Actualizar</button>
                        <div id="res-update-carros-'.$ui.'" style="width: 100%; margin:0px; padding:0px;"></div>
                    </td>
                 </tr>
               </form>
             </div>';
       $ui=$ui+1;
    } 
   ?>