<?php include "../../vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;

// levanta contenido del otro achivo
ob_start();
require_once 'print_informe_pedido.php';
$html = ob_get_clean();

//creamos un nuevo objeto html2pdf

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($html);
$html2pdf->output('comprobante.pdf');

?>