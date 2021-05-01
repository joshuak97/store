<?php

session_start();

include '../library/configServer.php';
include '../library/consulSQL.php';

require '../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

 ob_start();
if($_SESSION['acceso']==1){
 if($_SESSION['todo']){
 include(dirname('__FILE__').'/factura_todo_html.php');
 }else{
    include(dirname('__FILE__').'/factura_html.php');     
 }
}else{
 include(dirname('__FILE__').'/factura_html.php');
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
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>