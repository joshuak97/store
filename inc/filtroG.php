<?php
//echo $_POST['atributo'];
//echo $_POST['valor'];
//Esta archivo genera la consulta de la busqueda que realiza en filtro en el modulo de saldos en el apartado de gastos. 
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$sucursal=ejecutarSQL::consultar("select*from sucursal where idSucursal=".$_SESSION['sucursal']);
$sucursal=mysqli_fetch_array($sucursal);
$montoTotal=0;
$where="";
$num=0;
if($_SESSION['acceso']!=1){
    ini_set('date.timezone','America/Mexico_City');
    $fecha=date('Y-m-d',time()); 
    if(!$_POST['valor']==""){      
    $where="Where ".$_POST['atributo']." like '%".$_POST['valor']."%' AND nombreSucursal='".$sucursal['nombreSucursal']."' AND fecha_gasto like '%".$fecha."%'"; 
    }else{
    $where="Where  nombreSucursal='".$sucursal['nombreSucursal']."'  AND fecha_gasto like '%".$fecha."%'";
    }
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM gastos inner join usuarios on gastos.idVendedor=usuarios.idUsuario inner join sucursal on gastos.idSucursal=sucursal.idSucursal $where  order by fecha_gasto desc");
    $res=mysqli_num_rows($conDevoluciones);
if($res>0){
    echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Folio</th>
<th scope='col'>Descripcion</th>
<th scope='col'>Tipo de comprobante</th>
<th scope='col'>Costo</th>
<th scope='col'>Fecha de gasto</th>
<th scope='col'>Fecha de registro</th>
<th scope='col'>Registra</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'
    while($devoluciones=mysqli_fetch_array($conDevoluciones)){

    echo '<tr>
    <th scope="row">'.$devoluciones['folio_gasto'].'</th>
    <td>'.$devoluciones['descripcion'].'</td>
    <td>'.$devoluciones['comprobante'].'</td>
    <td>$'.$devoluciones['monto'].'</td>
    <td>'.$devoluciones['fecha_gasto'].'</td>
    <td>'.$devoluciones['fecha_registro'].'</td>
    <td>'.$devoluciones['user'].'</td>
    </tr>';
    $montoTotal+=$devoluciones['monto'];
    $num++;
    }
    echo "</tbody></table><br><br>";
    }else{
        echo "<table class='table table-striped'>
        <thead>
        <tr>
        <th scope='col'>Folio</th>
        <th scope='col'>Descripcion</th>
        <th scope='col'>Tipo de comprobante</th>
        <th scope='col'>Costo</th>
        <th scope='col'>Fecha de gasto</th>
        <th scope='col'>Fecha de registro</th>
        <th scope='col'>Registra</th>
        </tr>
        </thead><tbody>";
       echo  "<tr><td></td><td></td><td></td><td><h4>No se encontraron resultados</h4></td><td></td><td></td><td></td><td></td></tr>";
       echo "</tbody></table><br><br>";    
    }


}else{
    $where="Where ".$_POST['atributo']." like '%".$_POST['valor']."%'";
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM gastos inner join usuarios on gastos.idVendedor=usuarios.idUsuario inner join sucursal on gastos.idSucursal=sucursal.idSucursal $where order by fecha_gasto desc limit 100");
    $res=mysqli_num_rows($conDevoluciones);
    if($res>0){
        echo "<table class='table table-striped'>
        <thead>
        <tr>
        <th scope='col'>Folio</th>
        <th scope='col'>Descripcion</th>
        <th scope='col'>Tipo de comprobante</th>
        <th scope='col'>Costo</th>
        <th scope='col'>Fecha de gasto</th>
        <th scope='col'>Fecha de registro</th>
        <th scope='col'>Registra</th>
        <th scope='col'>Sucursal</th>
        </tr>
        </thead>
        <tbody>";// style='text-align:center;'
        while($devoluciones=mysqli_fetch_array($conDevoluciones)){
        
            echo '<tr>
            <th scope="row">'.$devoluciones['folio_gasto'].'</th>
            <td>'.$devoluciones['descripcion'].'</td>
            <td>'.$devoluciones['comprobante'].'</td>
            <td>$'.$devoluciones['monto'].'</td>
            <td>'.$devoluciones['fecha_gasto'].'</td>
            <td>'.$devoluciones['fecha_registro'].'</td>
            <td>'.$devoluciones['user'].'</td>
            <td>'.$devoluciones['nombreSucursal'].'</td>
            </tr>';
            $num++;
            $montoTotal+=$devoluciones['monto'];
            }
            
echo "</tbody></table><br><br>";
            }else{
                echo "<table class='table table-striped'>
                <thead><tbody>
                <tr>
                <th scope='col'>Folio</th>
                <th scope='col'>Descripcion</th>
                <th scope='col'>Tipo de comprobante</th>
                <th scope='col'>Costo</th>
                <th scope='col'>Fecha de gasto</th>
                <th scope='col'>Fecha de registro</th>
                <th scope='col'>Registra</th>
                <th scope='col'>Sucursal</th>
                </tr>";
               echo  "<tr><td></td><td></td><td></td><td><h4>No se encontraron resultados</h4></td><td></td><td></td><td></td><td></td></tr>";
               echo "</tbody></table><br><br>";
            }
}
echo "<table class='table table-striped text-center'>
<thead>
<tr>

<th scope='col'>Gasto total</th>
</tr>
</thead>
<tbody>";
echo"
<th scope='col'>$".number_format($montoTotal,2)."</th>";
echo "</tbody></table><br><br>";

?>