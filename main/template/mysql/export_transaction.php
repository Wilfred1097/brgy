<?php
require 'vendor/setasign/fpdf/fpdf.php';
require 'conn.php'; // Include your database connection file

// Fetch barangay details from the database
try {
    $stmt = $pdo->query("SELECT * FROM settings LIMIT 1"); // Assuming there's only one settings row
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($settings) {
        $barangay_name = $settings['barangay_name'] ?? "Barangay Example";
        $barangay_city = $settings['barangay_city'] ?? "Sample City";
        $barangay_province = $settings['barangay_province'] ?? "Sample Province";
        $barangay_treasurer = $settings['barangay_treasurer'] ?? "John Doe";
        $province_no = $settings['province_no'] ?? "12345";
        $scki_no = $settings['scki_no'] ?? "00000";
        $barangay_encoder = $settings['barangay_encoder'] ?? "Jane Doe";
    } else {
        throw new Exception("No settings found in the database.");
    }
} catch (Exception $e) {
    die("Error fetching settings: " . $e->getMessage());
}

// Extend FPDF class to add a custom header and footer
class PDF extends FPDF
{
    function Header()
    {
        global $barangay_name, $barangay_city, $barangay_province, $barangay_treasurer, $province_no, $scki_no, $month_range;

        // Logo
        $this->Image('../../../assets/img/brgylogo-removebg.png', 10, 10, 25);

        // Title Section
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'Office of the Barangay Captain', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Barangay ' . $barangay_name, 0, 1, 'C');
        $this->Cell(0, 5, $barangay_city . ', ' . $barangay_province, 0, 1, 'C');
        $this->Ln(5);

        // Report Title
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'SUMMARY OF FINANCIAL TRANSACTIONS', 0, 1, 'C');
        $this->SetFont('Arial', '', 9);
        $this->Cell(0, 5, 'For the month of ' . $month_range, 0, 1, 'C');
        $this->Ln(5);

        // Barangay Treasurer and Location Details
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(95, 5, 'Barangay Treasurer: ' . $barangay_treasurer, 0, 0, 'L');
        $this->Cell(95, 5, '                                                                                                       Province: ' . $barangay_province, 0, 1, '');

        $this->SetFont('Arial', '', 9);
        $this->Cell(95, 5, 'City / Municipality: ' . $barangay_city, 0, 0, 'L');
        $this->Cell(95, 5, '                                                                                                       Province No: ' . $province_no, 0, 1, '');
        $this->Cell(95, 5, 'SCKI No: ' . $scki_no, 0, 1, 'L');

        $this->Ln(2);
        $this->Cell(0, 0, '', 'T', 1, 'C');
        $this->Ln(2);
    }

    function Footer()
    {
        global $barangay_encoder, $barangay_treasurer;

        $this->SetY(-50);

        // Certification Statement (Left Side)
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(95, 5, 'Certification:', 0, 0, 'L');
        $this->Cell(95, 5, '                                                                                       Acknowledgement:', 0, 1, 'L');

        $this->SetFont('Arial', '', 8);
        $this->MultiCell(95, 5, "I hereby certify that the above information is correct. Check is issued from \n______________________________. The carbon copies of the checks \nissued and originals of all DVs/Payrolls are hereto attached.", 0, 'C');

        // Move to the right for Acknowledgment section
        $this->SetXY(165, $this->GetY() - 15); // Align acknowledgment with certification
        $this->MultiCell(95, 5, "                     I hereby acknowledge receipt of the certified SCKI complete                          with carbon copies of all checks issued and originals of all                            DVs/Payrolls and supporting documents.", 0, 'C');

        $this->Ln(5);

        // Signature Section (Barangay Encoder - Left)
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(95, 5, '__________________________', 0, 0, 'C');
        $this->Cell(95, 5, '                                                                                                                                                                            __________________________', 0, 1, 'C');

        $this->Cell(95, 5, $barangay_encoder, 0, 0, 'C');
        $this->Cell(95, 5, '                                                                                                                                                                            ' . $barangay_treasurer, 0, 1, 'C');

        $this->SetFont('Arial', '', 8);
        $this->Cell(95, 5, 'Barangay Encoder', 0, 0, 'C');
        $this->Cell(95, 5, '                                                                                                                                                                            Barangay Treasurer', 0, 1, 'C');

        // Page Number
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 7);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create PDF object using the extended class
$pdf = new PDF();
$pdf->SetFont('Arial', 'B', 12);

try {

    if (isset($_GET['ids']) && !empty($_GET['ids'])) {
        $ids = explode(',', $_GET['ids']); // Convert comma-separated IDs into an array
        $ids = array_map('intval', $ids); // Ensure IDs are integers

        // Prepare SQL query with placeholders
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT financial_transaction.*,
               sub_program.name AS sub_program_name,
               rao_program.name AS rao_program_name
                FROM financial_transaction
                JOIN sub_program ON financial_transaction.fund = sub_program.id
                JOIN rao_program ON sub_program.rao_program_id = rao_program.id
                WHERE financial_transaction.id IN ($placeholders)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ids);
            $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($transactions)) {
                    // Determine the range of months with the year
                    $months = array_map(function ($transaction) {
                        return date('F Y', strtotime($transaction['date'])); // Extracts both Month and Year
                    }, $transactions);

                    $months = array_unique($months);
                    sort($months, SORT_NATURAL); // Sorts alphabetically but keeps the year in order

                    // Get the first and last month-year
                    $month_range = count($months) > 1 ? $months[0] . ' - ' . end($months) : $months[0];

                    // Add a page after calculating month_range
                    $pdf->AddPage('L');

                    // Set table headers
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->SetFillColor(200, 200, 200);
                    $pdf->Cell(22, 6, 'Date', 1, 0, 'C', true);
                    $pdf->Cell(21, 6, 'Cheque No', 1, 0, 'C', true);
                    $pdf->Cell(21, 6, 'Voucher No', 1, 0, 'C', true);
                    $pdf->Cell(49, 6, 'Fund', 1, 0, 'C', true);
                    $pdf->Cell(49, 6, 'Payee', 1, 0, 'C', true);
                    $pdf->Cell(35, 6, 'Particulars', 1, 0, 'C', true);
                    $pdf->Cell(25, 6, 'Gross Amt', 1, 0, 'C', true);
                    $pdf->Cell(15, 6, 'VAT %', 1, 0, 'C', true);
                    $pdf->Cell(15, 6, 'EVAT %', 1, 0, 'C', true);
                    // $pdf->Cell(15, 6, 'VAT Amt', 1, 0, 'C', true);
                    // $pdf->Cell(15, 6, 'EVAT Amt', 1, 0, 'C', true);
                    $pdf->Cell(25, 6, 'Net Amount', 1, 1, 'C', true);

                    // Set table data
                    $pdf->SetFont('Arial', '', 8);
                    $total_gross_amount = 0;
                    $total_vat = 0;
                    $total_evat = 0;
                    $total_net_amount = 0;

                    foreach ($transactions as $row) {
                        $gross_amount = $row['gross_amount'];
                        $vat_amount = $row['vat_amount'];
                        $evat_amount = $row['evat_amount'];
                        $net_amount = $gross_amount - $vat_amount - $evat_amount;

                        $pdf->Cell(22, 5, date("M j, Y", strtotime($row['date'])), 1, 0, 'C');
                        $pdf->Cell(21, 5, $row['cheque_no'], 1, 0, 'C');
                        $pdf->Cell(21, 5, $row['dv_no'], 1, 0, 'C');
                        $pdf->Cell(49, 5, $row['rao_program_name']. ' - ' . $row['sub_program_name'], 1, 0, 'C');
                        $pdf->Cell(49, 5, $row['payee'], 1, 0, 'C');
                        $pdf->Cell(35, 5, $row['particulars'], 1, 0, 'C');
                        $pdf->Cell(25, 5, 'P ' . number_format($gross_amount, 2), 1, 0, 'C');
                        $pdf->Cell(15, 5, number_format($row['vat'], 2), 1, 0, 'C');
                        $pdf->Cell(15, 5, number_format($row['evat'], 2), 1, 0, 'C');
                        // $pdf->Cell(15, 5, 'P ' . number_format($vat_amount, 2), 1, 0, 'C');
                        // $pdf->Cell(15, 5, 'P ' . number_format($evat_amount, 2), 1, 0, 'C');
                        $pdf->Cell(25, 5, 'P ' . number_format($net_amount, 2), 1, 1, 'C');

                        // Add to totals
                        $total_gross_amount += $gross_amount;
                        $total_vat += $vat_amount;
                        $total_evat += $evat_amount;
                        $total_net_amount += $net_amount;
                    }

                    // Add a blank row for spacing
                    $pdf->Cell(272, 5, '', 0, 1, 'R');

                    // Display total net amount row
                    $pdf->SetFont('Arial', '', 8);

                    // Total Gross Amount
                    $pdf->Cell(252, 4, 'Total Gross Amount:', 0, 0, 'R'); // No border
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell(25, 4, 'P ' . number_format($total_gross_amount, 2), 0, 1, 'R'); // Only amount in a bordered cell

                    // VAT
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->Cell(252, 4, 'Vat:', 0, 0, 'R'); // No border
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell(25, 4, 'P ' . number_format($total_vat, 2), 0, 1, 'R'); // Only amount in a bordered cell

                    // EVAT
                    $pdf->SetFont('Arial', '', 8);

                    $pdf->Cell(252, 4, 'eVat:', 0, 0, 'R'); // No border
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell(25, 4, 'P ' . number_format($total_evat, 2), 0, 1, 'R'); // Only amount in a bordered cell

                    // Total Net Amount
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->Cell(252, 4, 'Total Net Amount:', 0, 0, 'R'); // No border
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell(25, 4, 'P ' . number_format($total_net_amount, 2), 0, 1, 'R'); // Only amount in a bordered cell
                } else {
                $pdf->Cell(0, 10, 'No transactions found.', 1, 1, 'C');
            }
        } catch (Exception $e) {
            $pdf->Cell(0, 10, 'Database error: ' . $e->getMessage(), 1, 1, 'C');
        }
    } else {
        $pdf->Cell(0, 10, 'No transactions selected.', 1, 1, 'C');
    }
} catch (Exception $e) {
    // Handle general errors
    $pdf->AddPage(); // Add a page before writing to PDF in case of errors
    $pdf->Cell(0, 10, 'Error fetching settings: ' . $e->getMessage(), 1, 1, 'C');
}

$pdf->Output();
?>