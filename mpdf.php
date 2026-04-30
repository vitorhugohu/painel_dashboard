<?php
require_once __DIR__ . '/vendor/autoload.php';

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

$mpdf = new \Mpdf\Mpdf();

$pagina = "TESTE...";

// Write some HTML code:
$mpdf->WriteHTML($pagina);

// Output a PDF file directly to the browser
$mpdf->Output();
//$mpdf->Output('documento_assinado.pdf', 'I');
?>