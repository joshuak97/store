<?php

	/* Connect To Database*/
	include '../../library/configServer.php';
    include '../../library/consulSQL.php';
	session_start();
	//Archivo de funciones PHP
	
	

	require '../../vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;	
	//Variables por GET
	//$id_cliente=intval($_GET['id_cliente']);
	//$id_vendedor=intval($_GET['id_vendedor']);
	$condiciones=1;

	$numero_factura="1";	
	$simbolo_moneda="$";
    // get the HTML
	 ob_start();
	
	 include(dirname('__FILE__').'/nota_html.php');
	
    $content = ob_get_clean();

    try
    { 
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output($_SESSION['idVentaM'].'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
