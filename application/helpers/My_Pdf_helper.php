<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('create_pdf')) {

    function create_pdf($html_data, $file_name = "") 
	{
        if ($file_name == "") {
            $file_name = 'report' . date('dMY');
        }
        require 'mpdf/mpdf.php';
        $mypdf = new mPDF();
		//echo $html_data;die();
        $mypdf->WriteHTML($html_data);
		
        $mypdf->Output($file_name . 'pdf', 'D');
    }
}
?>