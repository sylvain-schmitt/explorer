<?php
$title = 'pdf';


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$_SERVER['REQUEST_URI'];
$path = $path = explode('pdf?/', $_SERVER['REQUEST_URI'])[1];
ob_start();
?>

<div style="margin-top: 300px; text-align:center; max-width: 100%; height:auto;">
        <img  src="<?=$path?>"/>
</div>

<?php
$content = ob_get_clean();

try{
    $pdf= new HTML2PDF('P','A4','fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);

    $pdf->Output('document.pdf');
    die;
}catch(HTML2PDFException $e){
    $pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}