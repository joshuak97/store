<?php

session_start();

include '../library/configServer.php';
include '../library/consulSQL.php';

require '../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

 ob_start();
if($_POST['conceptoR']=="entradas"){//Si se trata de un reporte de entradas
    if($_POST['sucursalR']!=0){
        $queryM=ejecutarSQL::consultar("SELECT*FROM sucursal inner join ubicacion on ubicacion.idUbicacion=sucursal.idUbicacion WHERE idSucursal=$_POST[sucursalR]");
        $suc=mysqli_fetch_array($queryM);
        $nombreSalida="Reporte de $_POST[conceptoR] $_POST['fechaR']-$_POST['hastaR']";
 include(dirname('__FILE__').'/Entradas/reporte_html.php');
    }else{
        $nombreSalida="Reporte general de $_POST[conceptoR] $_POST['fechaR']-$_POST['hastaR']";
        include(dirname('__FILE__').'/Entradas/reporte_total_html.php');
    }
}else{
    if($_POST['sucursalR']!=0){
    include(dirname('__FILE__').'/Salidas/reporte_html.php');
    }else{
    $nombreSalida="Reporte general de $_POST[conceptoR] $_POST['fechaR']-$_POST['hastaR']";
    include(dirname('__FILE__').'/Salidas/reporte_total_html.php');
    }    
}
 $content = ob_get_clean();

    try{
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output($nombreSalida.'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>