<?php
require('../../Includes/Fpdf/fpdf.php');

class FpdfClass extends FPDF
{
    function __construct($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40)
    {
        $this->FPDF($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
    }

    function Header()
    {
        $this->SetFont('Arial', 'B', 20);
        $this->SetFillColor(36, 96, 84);
        $this->SetTextColor(225);
        $this->Cell(0, 30, "PDF", 0, 1, 'C', true);
    }

    function Footer()
    {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0, -60);
        $this->Cell(0, 20, "Bedankt voor het gebruiken van de PDF", 'T', 0, 'C');
    }

    function PriceTable() {
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(1);


        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);

        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(1);

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
    }
}