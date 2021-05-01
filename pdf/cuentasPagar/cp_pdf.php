<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	//if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
      //  header("location: ../../login.php");
	//	exit;
   // }
	
	
	/* Connect To Database*/
	//include '../../library/configServer.php';
    //include '../../library/consulSQL.php';
	//Archivo de funciones PHP
	
	//$session_id= session_id();
	//$sql_count=mysqli_query($con,"select * from tmp where session_id='".$session_id."'");
	//$count=mysqli_num_rows($sql_count);
	//if ($count==0)
	//{
	//echo "<script>alert('No hay productos agregados a la factura')</script>";
	//echo "<script>window.close();</script>";
	//exit;
	//}

	require '../../vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;	
	//Variables por GET
	//$id_cliente=intval($_GET['id_cliente']);
	//$id_vendedor=intval($_GET['id_vendedor']);
	$condiciones=1;

	//Fin de variables por GET
	//$sql=mysqli_query($con, "select LAST_INSERT_ID(numero_factura) as last from facturas order by id_factura desc limit 0,1 ");
	//$rw=mysqli_fetch_array($sql);
	$numero_factura="1";	
	$simbolo_moneda="$";
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/cp_html.php');
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
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
