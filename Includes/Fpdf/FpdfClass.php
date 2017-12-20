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
        $this->Cell(0, 30, "Lan-party", 0, 1, 'C', true);
    }

    function Footer()
    {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0, -60);
        $this->Cell(0, 20, "Bedankt voor het inschrijven voor de lan-party! We hopen dat je een leuke tijd hebt!", 'T', 0, 'C');
    }

    function PriceTable($data) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(1);
        $this->Cell(105, 25, "Prijs", 'LTR', 0, 'C', true);
        $this->Cell(105, 25, "Betaald?", 'LTR', 0, 'C', true);
        /*$this->Cell(105, 25, "Prijs", 'LTR', 0, 'C', true);
        $this->Cell(106, 25, "Type", 'LTR', 0, 'C', true);
        $this->Cell(106, 25, "Kleur", 'LTR', 1, 'C', true);*/

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;

        $this->Cell(105, 20, $data[0], 1, 0, 'L', $fill);
        $this->Cell(105, 20, $data[1], 1, 0, 'L', $fill);
        /*$this->Cell(105, 20, $data[2], 1, 0, 'L', $fill);
        $this->Cell(106, 20, $data[3], 1, 0, 'L', $fill);
        $this->Cell(106, 20, $data[4], 1, 1, 'L', $fill);

        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(1);

        $this->Cell(170, 25, "Zitplaatsen in de auto", 'LTR', 0, 'C', true);
        $this->Cell(180, 25, "Begindatum reservatie", 'LTR', 0, 'C', true);
        $this->Cell(177, 25, "Einddatum reservatie", 'LTR', 1, 'C', true);*/

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;

        /*$this->Cell(170, 20, $data[5], 1, 0, 'L', $fill);
        $this->Cell(180, 20, $data[6], 1, 0, 'L', $fill);
        $this->Cell(177, 20, $data[7], 1, 1, 'L', $fill);*/
    }
}