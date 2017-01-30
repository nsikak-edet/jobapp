<?php
require dirname(__FILE__).'/MPDF57/mpdf.php';
require dirname(__FILE__).'/fpdf181/fpdf.php';
require dirname(__FILE__).'/FPDI-1.5.4/fpdi.php';
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/19/2017
 * Time: 4:57 PM
 */
class PDFGenerator extends mPDF
{
    private $ci;

    public function __construct($orientation='P', $unit='mm', $format='A4')
    {
        //Call parent constructor
        parent::__construct('c','A4',8,'' , 7 , 7 , 7 , 7 , 0 , 0);
        $this->ci =& get_instance();
    }

    public function generatePDF($filename,$table){

        $user_id = $this->ci->session->userdata('id');
        $this->writeHTML($table);
        $this->Output("pdfs/$filename".$user_id.'.pdf','F');
    }

    public function printPDFToBrowser($file_name=JAHR_FILENAME){

        // initiate FPDI
        $pdf = new FPDI();
        $user_id = $this->ci->session->userdata('id');

        try {

            switch ($file_name) {
                /*** print pdf generated for Jahresbericht ***/
                case JAHR_FILENAME:
                    $pageCount = $pdf->setSourceFile('pdfs/' . JAHR_FILENAME . $user_id . '.pdf');
                    break;

                /*** print pdf generated for Bericht erstellen ***/
                case BE_FILENAME:
                    $pageCount = $pdf->setSourceFile('pdfs/'.BE_FILENAME . $user_id . '.pdf');
                    break;
            }

            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplIdx = $pdf->importPage($pageNo);
                // get the size of the imported page
                $size = $pdf->getTemplateSize($tplIdx);
                if ($size['w'] > $size['h']) {
                    $pdf->AddPage('L', array($size['w'], $size['h']));
                } else {
                    $pdf->AddPage('P', array($size['w'], $size['h']));
                }

                // use the imported page and place it at point 10,10 with a width of 100 mm
                $pdf->useTemplate($tplIdx);
            }



            $pdf->Output();
        }catch(Exception $e){

        }
    }


}