<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF { 
	function __construct() { 
		parent::__construct(); 
	}
	
	//Page header
    public function Header() {
        {
            $image_file = K_PATH_IMAGES.'logo.png';
            $this->Image($image_file, 15, 7.5, 25, '', 'PNG');
            $html = '<strong style="font-size:20px;">Sate Mas Seno</strong><br/>
                     satemasseno@gmail.com<br/>
                     0895145601111';
            $tDate=date('d-m-Y');
            $this->Cell(320, 10, 'Tanggal: '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $this->writeHTMLCell(
                $w=0,
                $h=0,
                $x=45,
                $y=7.5,
                $html,
                $border=0,
                $ln=0,
                $fill=false,
                $reseth=true,
                $align='L'
            );
            $this->Line(5, 25, 200, 25);
        }
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 12);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
