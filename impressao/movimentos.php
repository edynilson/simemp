<?php
/*
* @Author: Ricardo Órfão
* @Date:   2014-05-04 13:22:09
* @Last Modified by:   Ricardo Órfão
* @Last Modified time: 2014-07-24 14:52:54
*/
?>
<?php

/*
  Created on : 24/Jan/2014, 18:28:09
  Author     : Ricardo Órfão
 */

ob_start();
include(dirname(__FILE__) . '/movimentos_dados.php');
$content = ob_get_clean();
require_once(dirname(__FILE__) . '/html2pdf_v4.03/html2pdf.class.php');
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8', array(15, 10, 15, 5));
    $html2pdf->pdf->setTitle('SIMEMP - Extrato');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('Movimentos_Simemp.pdf', 'I');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}