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
    $current_scki_no = $settings['current_scki_no'] ?? 1;
    $barangay_encoder = $settings['barangay_encoder'] ?? "Jane Doe";
} catch (Exception $e) {
    die("Error fetching settings: " . $e->getMessage());
}

// Fetch transaction data
$month_range = ""; // Initialize month range
if (isset($_GET['ids'])) {
    $ids = $_GET['ids'];
    $idArray = explode(',', $ids);
    $placeholders = rtrim(str_repeat('?,', count($idArray)), ',');
    
    // Modified query to get transaction_id, date, cheque_no, particulars, and gross_amount
    $stmt = $pdo->prepare("
        SELECT t.id, t.date, t.cheque_no, t.particulars, t.gross_amount, t.payee 
        FROM financial_transaction t 
        WHERE t.id IN ($placeholders)
        ORDER BY t.date ASC
    ");
    
    $stmt->execute($idArray);
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Determine month range from transactions
    if (!empty($transactions)) {
        // Get earliest and latest dates
        $dates = array_column($transactions, 'date');
        $earliestDate = min($dates);
        $latestDate = max($dates);
        
        // Parse dates
        $earliestDateTime = new DateTime($earliestDate);
        $latestDateTime = new DateTime($latestDate);
        
        // If transactions span multiple months
        if ($earliestDateTime->format('Y-m') != $latestDateTime->format('Y-m')) {
            // Format: "January - February 2023" or "January 2023 - February 2023" if years differ
            if ($earliestDateTime->format('Y') == $latestDateTime->format('Y')) {
                $month_range = $earliestDateTime->format('F') . ' - ' . $latestDateTime->format('F Y');
            } else {
                $month_range = $earliestDateTime->format('F Y') . ' - ' . $latestDateTime->format('F Y');
            }
        } else {
            // Same month: Format as "January 2023"
            $month_range = $earliestDateTime->format('F Y');
        }
    }
} else {
    $transactions = [];
    $month_range = date('F Y'); // Default to current month if no transactions
}

// Extend FPDF to customize header and footer
class PDF extends FPDF
{
    protected $month_range;
    
    function setMonthRange($range) {
        $this->month_range = $range;
    }
    
    function Header()
    {
        global $barangay_name, $barangay_city, $barangay_province;

        $this->SetFont('Arial', '', 8);
        $this->SetXY(10, 20);
        $this->Cell(298, 5, 'PROVINCE: ' . strtoupper($barangay_province), 0, 1, 'C');
        $this->Cell(277, 5, 'CITY/MUNICIPALITY: ' . strtoupper($barangay_city), 0, 1, 'C');
        $this->Cell(280, 5, 'BARANGAY: ' . strtoupper($barangay_name), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 5, 'ITEMIZED MONTHLY COLLECTION AND DISBURSEMENT', 0, 1, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Cell(277, 5, 'For the month of: ' . strtoupper($this->month_range), 0, 1, 'C');
        $this->Ln(4);
        $this->SetFont('Arial', '', 7);

        // Table Header
        $this->Cell(60, 5, 'COLLECTION', 1, 0, 'C');
        $this->Cell(215, 5, "DISBURSEMENT", 1, 1, 'C');
        // Subheaders
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(60, 5, 'O.R/Accountable', 1, 0, 'C');
        $this->Cell(20, 5, '', 1, 0, 'C');
        $this->Cell(20, 5, '', 1, 0, 'C');
        $this->Cell(155, 5, '', 1, 0, 'C');
        $this->Cell(20, 5, '', 1, 1, 'C');

        $this->SetFont('Arial', 'B', 7);
        $this->Cell(20, 5, 'Date', 1, 0, 'C');
        $this->Cell(20, 5, 'Particulars', 1, 0, 'C');
        $this->Cell(20, 5, 'Amount', 1, 0, 'C');
        $this->Cell(20, 5, 'Date', 1, 0, 'C');
        $this->Cell(20, 5, 'Check No.', 1, 0, 'C');
        $this->Cell(155, 5, 'Particulars', 1, 0, 'C');
        $this->Cell(20, 5, 'Amount', 1, 1, 'C');
    }

    function Footer()
    {
        global $barangay_treasurer, $barangay_captain;
        $this->SetFont('Arial', '', 7);
        $this->SetY(-40);
        
        // Add prepared by section
        $this->Cell(115, 5, 'Prepared by:', 0, 0, 'C');
        $this->Cell(135, 5, 'Approved by:', 0, 1, 'C');
        
        // Add signatures
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(155, 5, strtoupper($barangay_treasurer), 0, 0, 'C');
        $this->Cell(100, 5, 'HON. ' . strtoupper($barangay_captain), 0, 1, 'C');
        
        // Add titles
        $this->SetFont('Arial', '', 7);
        $this->Cell(155, 5, 'BARANGAY TREASURER', 0, 0, 'C');
        $this->Cell(100, 5, 'PUNONG BARANGAY', 0, 1, 'C');
    }
}

// Generate filename with current timestamp
$filename = 'IMCD_' . date('Ymd_His') . '.pdf';
$upload_dir = 'uploads/imcd/';

// Ensure directory exists
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}
$file_path = $upload_dir . $filename;

// Create PDF instance
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages(); // For page numbering
$pdf->setMonthRange($month_range); // Set the month range
$pdf->AddPage('L');

// Display transaction data in the table
$totalAmount = 0;

foreach ($transactions as $trans) {
    // Format date
    $date = date('M d, Y', strtotime($trans['date']));
    
    // Set font for data rows
    $pdf->SetFont('Arial', '', 7);    
    
    // Print fixed-height cells for date and check number
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, $date, 1, 0, 'C');
    $pdf->Cell(20, 5, $trans['cheque_no'], 1, 0, 'C');
    $pdf->Cell(155, 5, $trans['particulars'], 1, 0, 'L');
    
    // Print payee and amount cells
    // $pdf->Cell(40, 5, $trans['payee'], 1, 0, 'C');
    $pdf->Cell(20, 5, number_format($trans['gross_amount'], 2), 1, 1, 'R');
    
    $totalAmount += $trans['gross_amount'];
}
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(155, 5, 'TOTAL', 1, 0, 'R');
$pdf->Cell(20, 5, 'P ' . number_format($totalAmount), 1, 1, 'C');

$pdf->Output('I', $file_path);
?>