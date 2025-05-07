<?php
require 'vendor/setasign/fpdf/fpdf.php';
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
    $city_accountant = $settings['city_accountant'] ?? "John Doe";
    $province_no = $settings['province_no'] ?? "12345";
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
        global $barangay_name, $barangay_city, $barangay_province, $barangay_treasurer, $province_no, $current_scki_no;

        $this->SetFont('Arial', '', 9);
        // "Annex 16" on the top right
        $this->SetXY(170, 10);
        $this->Cell(0, 5, 'Annex 16', 0, 1, 'R');

        $this->SetFont('Arial', 'B', 10);
        $this->SetXY(10, 20);
        $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 5, 'Province of ' . $barangay_province, 0, 1, 'C');
        $this->Cell(0, 5, 'City of ' . $barangay_city, 0, 1, 'C');
        $this->Cell(0, 5, 'Barangay ' . $barangay_name, 0, 1, 'C');
        $this->Ln(5);
        $this->Cell(0, 5, 'TRANSMITAL LETTER', 0, 1, 'C');
        $this->Ln(7);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'To: The City Accountant', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, '                City of ' . $barangay_city, 0, 1, 'L');
        $this->Ln(7);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'Sir/Madam:', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Ln(6);
        $this->Cell(0, 5, 'We submit herewith the following documents: a.) Certified copy of the cash book b.) Copy of PBCs', 0, 1, 'L');

        // Table Header
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(21, 5, 'A.', 1, 0, 'L');
        $this->Cell(13, 5, "DV's", 1, 0, 'C');
        $this->Cell(42, 5, 'CHECK', 1, 0, 'C');
        $this->Cell(50, 5, 'PAYEE', 1, 0, 'C');
        $this->Cell(22, 5, 'AMOUNT', 1, 0, 'C');
        $this->Cell(42, 5, 'PBC/s ISSUED', 1, 1, 'C');

        // Subheaders
        $this->Cell(21, 5, 'DATE', 1, 0, 'C');
        $this->Cell(13, 5, 'NO.', 1, 0, 'C');
        $this->Cell(24, 5, 'DATE', 1, 0, 'C');
        $this->Cell(18, 5, 'NO.', 1, 0, 'C');
        $this->Cell(50, 5, '', 1, 0, 'L');
        $this->Cell(22, 5, '', 1, 0, 'L');
        $this->Cell(31, 5, 'DATE', 1, 0, 'C');
        $this->Cell(11, 5, 'NO.', 1, 1, 'C');
    }

    function Footer()
    {
        global $barangay_encoder, $barangay_treasurer, $barangay_captain, $city_accountant;
        $this->SetFont('Arial', '', 10);
        $this->SetY(-80);
        $this->Cell(0, 5, 'Very truly yours', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, '                                                                                                                        ' . strtoupper($barangay_treasurer), 0, 1, 'C');
        $this->Ln(1);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, '                                                                                                                            Barangay Treasurer', 0, 1, 'C');
        $this->Cell(0, 5, 'Noted By:', 0, 1, 'L');
        $this->Ln(3);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, '               HON. ' . strtoupper($barangay_captain), 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, '                      Punong Barangay', 0, 1, 'L');
        $this->Ln(5);
        $this->Cell(0, 5, 'Received by:', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, '                                                                                                                        ' . strtoupper($city_accountant), 0, 1, 'C');
        $this->Ln(1);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, '                                                                                                                            City Accountant', 0, 1, 'C');
    }
}

// Fetch transaction data
if (isset($_GET['ids'])) {
    $ids = $_GET['ids'];
    $idArray = explode(',', $ids);
    $placeholders = rtrim(str_repeat('?,', count($idArray)), ',');
    $stmt = $pdo->prepare("SELECT id, date, pbc_no, cheque_no, dv_no, payee, net_amount FROM financial_transaction WHERE id IN ($placeholders)");
    $stmt->execute($idArray);
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $transactions = [];
}

// Generate filename with current timestamp
$filename = date('Ymd_His') . '.pdf';
$upload_dir = 'uploads/transmital/';

// Ensure directory exists
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}
$file_path = $upload_dir . $filename;

// Create PDF instance
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

// Decode rcdData
$rcdDataEncoded = isset($_GET['rcdData']) ? $_GET['rcdData'] : '';
$rcdJsonString = urldecode($rcdDataEncoded);
$rcdArray = json_decode($rcdJsonString, true);
$rcdEntries = [];
if (is_array($rcdArray)) {
    $rcdEntries = $rcdArray;
}

$reportDataJson = isset($_GET['reportData']) ? $_GET['reportData'] : '';
$reportEntries = json_decode(urldecode($reportDataJson), true);

// Initialize total for RCDs
$rcdTotalAmount = 0;

// Now, generate the table for transactions
$totalNetAmountA = 0;
foreach ($transactions as $trans) {
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(21, 5, $trans['date'], 1, 0, 'C');
    $pdf->Cell(13, 5, $trans['dv_no'], 1, 0, 'C');
    $pdf->Cell(24, 5, $trans['date'], 1, 0, 'C'); // or check check_date
    $pdf->Cell(18, 5, $trans['cheque_no'], 1, 0, 'C');
    $pdf->Cell(50, 5, $trans['payee'], 1, 0, 'C');
    $pdf->Cell(22, 5, number_format($trans['net_amount'], 2), 1, 0, 'C');
    $pdf->Cell(31, 5, $trans['date'], 1, 0, 'C'); // or pbc_date
    $pdf->Cell(11, 5, $trans['pbc_no'], 1, 1, 'C');

    $totalNetAmountA += $trans['net_amount'];
}

// Print total net amount
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(21, 5, '', 1, 0, 'L');
$pdf->Cell(13, 5, '', 1, 0, 'L');
$pdf->Cell(24, 5, '', 1, 0, 'L');
$pdf->Cell(18, 5, '', 1, 0, 'L');
$pdf->Cell(50, 5, '', 1, 0, 'L');
$pdf->Cell(22, 5, 'P ' . number_format($totalNetAmountA, 2), 1, 0, 'C');
$pdf->Cell(31, 5, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 1, 0, 'L');
$pdf->Ln();

// RCDs RCRs and duplicate ORs header
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(190, 5, 'B. RCDs RCRs and the duplicate of the ORs issued', 1, 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Ln();


// Loop through each RCD and add rows
foreach ($rcdEntries as $rcdItem) {
    $rcdNumber = $rcdItem['rcd'] ?? '';
    $rcdDateStr = $rcdItem['date'] ?? '';
    $rcdAmt = $rcdItem['amount'] ?? '';

    $ts = strtotime($rcdDateStr);
    $monthName = strtoupper(date('M', $ts));
    $year = date('Y', $ts);
    $formattedDate = $monthName . ' ' . $year;

    // Add RCD row
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(76, 5, 'RCD-' . htmlspecialchars($rcdNumber), 1, 0, 'C');
    $pdf->Cell(50, 5, $formattedDate, 1, 0, 'C');
    $pdf->Cell(64, 5, number_format(htmlspecialchars($rcdAmt), 2), 1, 0, 'R');
    $rcdTotalAmount += floatval($rcdAmt);
    $pdf->Ln();
}

// Add total of RCDs
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(76, 5, '', 1, 0, 'L');
$pdf->Cell(50, 5, '', 1, 0, 'L');
$pdf->Cell(64, 5, '' . number_format($rcdTotalAmount, 2), 1, 1, 'R');

// Other Reports
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(190, 5, 'C. Other Reports', 1, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 5, 'Type of Reports', 1, 0, 'L');
$pdf->Cell(90, 5, 'Period Covered: ', 1, 1, 'C');
$pdf->SetFont('Arial', '', 9);

// Loop through each report entry and display
if (is_array($reportEntries) && count($reportEntries) > 0) {
    foreach ($reportEntries as $report) {
        $reportType = isset($report['report_type']) ? $report['report_type'] : '';
        $periodCovered = isset($report['period_covered']) ? $report['period_covered'] : '';

        $pdf->SetFont('Arial', '', 9);
        // Create a row with Report Type and Period Covered
        $pdf->Cell(100, 5, htmlspecialchars($reportType), 1, 0, 'L');
        $periodCoveredStr = isset($report['period_covered']) ? $report['period_covered'] : '';
        $formattedPeriod = '';

        if ($periodCoveredStr) {
            $dt = DateTime::createFromFormat('Y-m', $periodCoveredStr);
            if ($dt) {
                $formattedPeriod = strtoupper($dt->format('M Y'));
            } else {
                $formattedPeriod = htmlspecialchars($periodCoveredStr);
            }
        } else {
            $formattedPeriod = '';
        }

        $pdf->Cell(90, 5, $formattedPeriod, 1, 1, 'C');
    }
}

// After generating the PDF content, save to file
try {
    $pdf->Output('F', $file_path); // Save to server file
    // Save filename only to database
    $stmt_insert = $pdo->prepare("INSERT INTO exported_transmital (filename) VALUES (?)");
    $stmt_insert->execute([$filename]);
} catch (Exception $e) {
    die('Error saving the PDF: ' . $e->getMessage());
}

// Output the PDF directly to browser (optional since saved file)
$pdf->Output(); // force download, or replace 'D' with 'I' for inline view
?>