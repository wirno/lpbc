<?php
require_once ('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

if(isset($_POST['url_pdf']) && !empty($_POST['url_pdf'])){
	$url = $_POST['url_pdf'];
	$html = file_get_contents($url, NULL, NULL, 0, 100000);
	$filename = "votre_parcours";

	$dompdf = new Dompdf();
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->loadHtml($html);
	$dompdf->render();

	$dompdf->stream($filename,array('Attachment'=>0));
}


?>