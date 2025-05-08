// RIS REPORT

<?php
require 'vendor/setasign/fpdf/fpdf.php'; // Ensure the path to FPDF is correct
ob_start(); // Start output buffering to prevent premature output
require 'conn.php'; // Your database connection

// Fetch settings from database
try {
    $stmt = $pdo->query("SELECT * FROM settings WHERE 1");
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$settings) throw new Exception("No settings found");
    $barangay_name = $settings['barangay_name'] ?? "Barangay Example";
    $barangay_captain = $settings['barangay_captain'] ?? "Barangay Example";
    $barangay_city = $settings['barangay_city'] ?? "Sample City";
    $barangay_province = $settings['barangay_province'] ?? "Sample Province";
    $barangay_treasurer = $settings['barangay_treasurer'] ?? "John Doe";
    $current_scki_no = $settings['current_scki_no'] ?? 1;
    $barangay_encoder = $settings['barangay_encoder'] ?? "Jane Doe";
} catch (Exception $e) {
    die("Error fetching settings: " . $e->getMessage());
}

// Extend FPDF to customize header and footer
class PDF extends FPDF
{
    function Header()
    {
        global $barangay_name;

        // Title
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 8, 'REQUISITION AND ISSUE SLIP', 0, 1, 'C');
        $this->Ln(5);

        // Entity Details
        $this->SetFont('Arial', '', 8);
        $this->Cell(25, 6, 'Entity Name:', 0, 0, 'L');
        $this->Cell(90, 6, '(get from the table)', 0, 0, 'L');
        $this->Cell(25, 6, 'Fund Cluster:', 0, 0, 'L');
        $this->Cell(50, 6, 'BCPC FUND(RAO PROGRAM)', 0, 1, 'L');

        $this->Cell(25, 6, 'Division:', 0, 0, 'L');
        $this->Cell(90, 6, 'LGU - ' . strtoupper($barangay_name), 0, 0, 'L');
        $this->Cell(25, 6, 'Responsibility Center Code:', 0, 0, 'L');
        $this->Cell(50, 6, '', 0, 1, 'L'); // Leave blank for Responsibility Center Code

        $this->Cell(25, 6, 'Office:', 0, 0, 'L');
        $this->Cell(90, 6, strtoupper($barangay_name), 0, 0, 'L');
        $this->Cell(25, 6, 'RIS No.:', 0, 0, 'L');
        $this->Cell(50, 6, '', 0, 1, 'L'); // Leave blank for RIS No.

        $this->Ln(8);
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

// Add Group Headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(107.5, 8, 'Requisition', 1, 0, 'C');
$pdf->Cell(39.5, 8, 'Stock Available?', 1, 0, 'C');
$pdf->Cell(43, 8, 'Issue', 1, 1, 'C');

// Table Column Headers 
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 8, 'No.', 1, 0, 'C');
$pdf->Cell(15, 8, 'Unit', 1, 0, 'C');
$pdf->Cell(67.5, 8, 'Description', 1, 0, 'C');
$pdf->Cell(15, 8, 'Quantity', 1, 0, 'C'); // 1st Quantity
$pdf->Cell(22, 8, 'Yes', 1, 0, 'C'); // this column will automatically check if the item in the 2nd quantity is less than the first quantity
$pdf->Cell(17.5, 8, 'No', 1, 0, 'C'); // Leave blank for Quantity (Issue)
$pdf->Cell(17, 8, 'Quantity', 1, 0, 'C'); // 2nd Quantity
$pdf->Cell(26, 8, 'Remarks', 1, 1, 'C'); // put distriuted 

// Table Content (Example Data)
$pdf->SetFont('Arial', '', 9);
$data = [
    ['1', 'PCS', 'Chicken Siopao ', '70', 'check ni', 'Distributed'], // From table
    ['2', 'BOX', 'Assorted Mismo', '6', 'check ni', 'Distributed'] // from table
];
foreach ($data as $row) {
    $pdf->Cell(10, 8, $row[0], 1, 0, 'C');
    $pdf->Cell(15, 8, $row[1], 1, 0, 'C');
    $pdf->Cell(67.5, 8, $row[2], 1, 0, 'L');
    $pdf->Cell(15, 8, $row[3], 1, 0, 'C');
    $pdf->Cell(22, 8, $row[4], 1, 0, 'C'); // Yes column
    $pdf->Cell(17.5, 8, '', 1, 0, 'C'); // No column
    $pdf->Cell(17, 8, '', 1, 0, 'C'); // Leave blank for Quantity (Issue)
    $pdf->Cell(26, 8, $row[5], 1, 1, 'L');
}

// Purpose Section
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, 'Purpose:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 6, 'Snacks for the conduct of Spiritual Counseling for CICL, CAR and Parents of Barangay Bulatok', 0, 'L'); // additional entry upon exporting

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
$pdf->Cell(95, 6, 'Printed Name: HON. ' . strtoupper($barangay_captain), 0, 1, 'L'); // Approved by printed name

$pdf->Cell(95, 6, 'Designation: Comm. Chair. On BCPC', 0, 0, 'L'); // Requested by designation
$pdf->Cell(95, 6, 'Designation: Punong Barangay', 0, 1, 'L'); // Approved by designation

$pdf->Cell(95, 6, 'Date: __________________________', 0, 0, 'L'); // Requested by date
$pdf->Cell(95, 6, 'Date: __________________________', 0, 1, 'L'); // Approved by date

$pdf->Ln(5); // Add some space

// Issued by and Received by (Side-by-Side)
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(95, 6, 'Issued by:', 0, 0, 'L'); // Issued by on the left
$pdf->Cell(95, 6, 'Received by:', 0, 1, 'L'); // Received by on the right

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(95, 6, 'Signature: __________________________', 0, 0, 'L'); // Issued by signature
$pdf->Cell(95, 6, 'Signature: __________________________', 0, 1, 'L'); // Received by signature

$pdf->Cell(95, 6, 'Printed Name: ' . strtoupper($barangay_treasurer), 0, 0, 'L'); // Issued by printed name
$pdf->Cell(95, 6, 'Printed Name: HON. JOCELYN V. SARANILLO', 0, 1, 'L'); // Received by printed name

$pdf->Cell(95, 6, 'Designation: Barangay Treasurer', 0, 0, 'L'); // Issued by designation
$pdf->Cell(95, 6, 'Designation: Comm. Chair. On BCPC', 0, 1, 'L'); // Received by designation

$pdf->Cell(95, 6, 'Date: __________________________', 0, 0, 'L'); // Issued by date
$pdf->Cell(95, 6, 'Date: __________________________', 0, 1, 'L'); // Received by date


// Output the PDF
$pdf->Output();
