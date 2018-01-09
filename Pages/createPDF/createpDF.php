<?php
require_once "../../Includes/init.php";
require_once ('../../Classes/FpdfClass.php');

$pdf = new FPDFClass();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$pdf->SetY(100);
$image = "../../Includes/Img/lanparty.png";
$firstName = "Henk";
$lastName = "Krol";

$pdf->Image($image, 40,70, 0, 100);

$pdf->SetFont('Arial', 'B');
$pdf->SetX($pdf->lMargin);
$pdf->Cell( 0, 10, 'Voornaam: ' .$firstName. '', 0, 0, 'R' );
$pdf->SetX($pdf->lMargin);
$pdf->Cell( 0, 40, 'Achternaam: ' .$lastName. '', 0, 0, 'R' );


/*$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, 'Date');
$pdf->SetFont('Arial', '');
$pdf->Cell(200, 13, $rekeningGegevens, 0, 1);

$pdf->SetFont('Arial', 'B');
$pdf->Cell(100, 13, "Adres");
$pdf->SetFont('Arial', '');
$pdf->Cell(200, 15, $klantGegevens . " " . $klantGegevens . " " . $klantGegevens, 0, 1);
$pdf->Cell(100, 13, "");
$pdf->Cell(220, 15, $klantGegevens . " " . $klantGegevens);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, 'Email');
$pdf->SetFont('Arial', '');
$pdf->Cell(200, 13, $klantGegevens, 0, 1);*/

$pdf->Ln(100);

$pdf->PriceTable('tst');

$pdf->Ln(150);

$message = "Bedankt voor het inschrijven voor de LAN-party! We hopen dat je een leuke tijd heb!:";
$pdf->MultiCell(0, 15, $message);

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);

$pdf->Write(13, "landstede-harderwijk-lanparty.nl", "mailto:lan-party@hotmail.com");

$pdf->Output();