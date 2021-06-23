<?php
    // cargamos libreria
    require_once './dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    $template = "./comprar.php";

    function renderToPDF($templateFile) {
        ob_start();
        include $templateFile;
        $contents = ob_get_clean(); 

        $dompdf = new DOMPDF();
        $dompdf->load_html($contents);
        $dompdf->render();
        $dompdf->stream("reciboCompra.pdf");
    }

    renderToPDF($template);
?>