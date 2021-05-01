 <?php
                    
                    $consulta1= ejecutarSQL::consultar("SELECT * FROM abono INNER JOIN venta_credito ON venta_credito.idVentaC=abono.idVentaC INNER JOIN cliente ON venta_credito.idCliente=cliente.idCliente  WHERE NumFolioC=$pid");
                    echo '<table class="table table-bordered">';

                    echo '<tr><td>Nombre del cliente</td><td>Ultimo Abono</td><td>Monto</td><td>Total a Pagar</td><td>Restante</td><td>Detalles</td></tr>';  
                    while($ventas=mysqli_fetch_array($consulta1)){

echo '<tr><td>'.$ventas['NombreCompleto'].'</td><td>'.$ventas['FechaC'].'</td><td>'.$ventas['fechaAbono'].'</td><td>'.$ventas['abono'].'</td><td>'.$ventas['totalPagar'].'</td><td>'.$ventas['restante'].'</td>
  
    </tr>';



}
                    ?>