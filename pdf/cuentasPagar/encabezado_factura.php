<?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
//session_start();
$idCP=$_SESSION['idCP'];
$conCp=mysqli_query($con, "select*from cuentasPagar where idCuentaP=".$idCP);
$cuentaP=mysqli_fetch_array($conCp);
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
            
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
            <?php
             $conProvee=mysqli_query($con, "SELECT*FROM proveedor where idProveedor=".$cuentaP['idProveedor']);
             $provee=mysqli_fetch_array($conProvee);
            ?>
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo $provee['NombreProveedor']; ?></span>
				<br><?php echo $provee['Direccion'] ?>
				<?php echo $provee['Telefono'] ?><br>
				<?php echo $provee['PaginaWeb'] ?>
                
            </td>
			<td style="width: 25%;text-align:right">
              	<?php
                $numero_factura="";
                $idProd="";  
                if($cuentaP['concepto']=='nota'){  
                $sql=mysqli_query($con, "select*from notas where idNota=".$cuentaP['idConcepto']);
                $res=mysqli_fetch_array($sql);
                $numero_factura="FOLIO: ".$res['folioNota']; 
                $idProd=$res['idProd'];
                }else{
                $sql=mysqli_query($con, "select*from facturas  where id_factura=".$cuentaP['idConcepto']);
                $res=mysqli_fetch_array($sql);
                $numero_factura="FACTURA N°".$res['numero_factura']; 
                $idProd=$res['idProd'];
                }                
                echo $numero_factura;
                ?>
                
			</td>
			
        </tr>
    </table>
		