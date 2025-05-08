<?php
ob_start(); // Start output buffering to prevent premature output

require 'vendor/setasign/fpdf/fpdf.php'; // Ensure the path to FPDF is correct

// Extend FPDF to customize header and footer
class PDF extends FPDF
{
    function Header()
    {
        // Title
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 8, 'PURCHASE REQUEST', 0, 1, 'C');
        $this->Ln(5);

        // Entity Details
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 6, 'BARANGAY:', 0, 0, 'L');
        $this->Cell(80, 6, 'BULATOK', 0, 0, 'L');
        $this->Cell(30, 6, 'P.R. No.:', 0, 0, 'L');
        $this->Cell(50, 6, '', 0, 1, 'L'); // Leave blank for P.R. No.

        $this->Cell(30, 6, 'CITY/MUNICIPALITY:', 0, 0, 'L');
        $this->Cell(80, 6, 'PAGADIAN', 0, 0, 'L');
        $this->Cell(30, 6, 'Date:', 0, 0, 'L');
        $this->Cell(50, 6, '', 0, 1, 'L'); // Leave blank for Date

        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create PDF instance
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 8, 'Requisition', 0, 1, 'C');
$pdf->Ln(5);
// Add Group Headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 8, 'Item', 1, 0, 'C');
$pdf->Cell(15, 8, 'Qty.', 1, 0, 'C');
$pdf->Cell(30, 8, 'Unit of', 1, 0, 'C');
$pdf->Cell(65, 8, 'Item Description', 1, 0, 'C');
$pdf->Cell(25, 8, 'Estimated', 1, 0, 'C');
$pdf->Cell(25, 8, 'Estimated', 1, 1, 'C');

// Sub-Headers
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(10, 8, 'No.', 1, 0, 'C');
$pdf->Cell(15, 8, '', 1, 0, 'C');
$pdf->Cell(30, 8, 'Measurement', 1, 0, 'C');
$pdf->Cell(65, 8, '', 1, 0, 'C');
$pdf->Cell(25, 8, 'Unit Cost', 1, 0, 'C');
$pdf->Cell(25, 8, 'Amount', 1, 1, 'C');

// Table Content (Example Data)
$pdf->SetFont('Arial', '', 9);
$data = [
    ['1', '70', 'PCS', 'Chicken Siopao', '50.00', '3,500.00'],
    ['2', '6', 'BOX', 'Nature Spring', '250.00', '1,500.00']
];
foreach ($data as $row) {
    $pdf->Cell(10, 8, $row[0], 1, 0, 'C');
    $pdf->Cell(15, 8, $row[1], 1, 0, 'C');
    $pdf->Cell(30, 8, $row[2], 1, 0, 'C');
    $pdf->Cell(65, 8, $row[3], 1, 0, 'L');
    $pdf->Cell(25, 8, '₱ ' . $row[4], 1, 0, 'R');
    $pdf->Cell(25, 8, '₱ ' . $row[5], 1, 1, 'R');
}

// Add Empty Rows
for ($i = 0; $i < 3; $i++) {
    $pdf->Cell(10, 8, '', 1, 0, 'C');
    $pdf->Cell(15, 8, '', 1, 0, 'C');
    $pdf->Cell(30, 8, '', 1, 0, 'C');
    $pdf->Cell(65, 8, '', 1, 0, 'L');
    $pdf->Cell(25, 8, '', 1, 0, 'R');
    $pdf->Cell(25, 8, '', 1, 1, 'R');
}

// Total Row
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(145, 8, 'TOTAL', 1, 0, 'R');

$pdf->Cell(25, 8, '₱ 5,000.00', 1, 1, 'R');



// Footer Notes
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 6, 'XXXXXXXXXX NOTHING FOLLOWS XXXXXXXXXX', 0, 1, 'C');
$pdf->Ln(5);
// Total Estimated Amount Section
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 6, 'Total Estimated Amount: Five Thousand Pesos only.', 0, 1, 'L');
// Purpose Section
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, 'Purpose:', 0, 1, 'L'); // No border for the label
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 6, 'Snacks for the conduct of Spiritual Counseling for CICL, CAR and Parents of Barangay Bulatok', 0, 'L'); // No border for the text

// Footer Section
$pdf->Ln(10); // Add some space before the footer

// Requested by and Approved by (Side-by-Side)
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95, 6, 'Requested by:', 0, 0, 'L'); // Requested by on the left
$pdf->Cell(95, 6, 'Approved by:', 0, 1, 'L'); // Approved by on the right

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(95, 6, 'Signature: __________________________', 0, 0, 'L'); // Requested by signature
$pdf->Cell(95, 6, 'Signature: __________________________', 0, 1, 'L'); // Approved by signature

$pdf->Cell(95, 6, 'Printed Name: HON. JOCELYN V. SARANILLO', 0, 0, 'L'); // Requested by printed name
$pdf->Cell(95, 6, 'Printed Name: HON. EDDIE M. GALLEGA', 0, 1, 'L'); // Approved by printed name

$pdf->Cell(95, 6, 'Designation: Comm. Chair. On BCPC', 0, 0, 'L'); // Requested by designation
$pdf->Cell(95, 6, 'Designation: Punong Barangay', 0, 1, 'L'); // Approved by designation

$pdf->Cell(95, 6, 'Date: __________________________', 0, 0, 'L'); // Requested by date
$pdf->Cell(95, 6, 'Date: __________________________', 0, 1, 'L'); // Approved by date

// Output the PDF
$pdf->Output();
ob_end_flush(); // End output buffering