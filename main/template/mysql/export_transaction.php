<?php
require 'vendor/setasign/fpdf/fpdf.php';
require 'conn.php'; // Include your database connection file

// Fetch barangay details from the database
try {
    $stmt = $pdo->query("SELECT * FROM settings WHERE 1"); // Assuming there's only one settings row
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($settings) {
        $barangay_name = $settings['barangay_name'] ?? "Barangay Example";
        $barangay_city = $settings['barangay_city'] ?? "Sample City";
        $barangay_province = $settings['barangay_province'] ?? "Sample Province";
        $barangay_treasurer = $settings['barangay_treasurer'] ?? "John Doe";
        $province_no = $settings['province_no'] ?? "12345";
        $current_scki_no = $settings['current_scki_no'] ?? 1; // This is the current SCKI number
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
    var $totalPages; // Variable to store total pages

    function Header()
    {
        global $barangay_name, $barangay_city, $barangay_province, $barangay_treasurer, $province_no, $current_scki_no, $month_range;

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
        $this->Cell(95, 5, 'SCKI No: ' . $current_scki_no, 0, 1, 'L');

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
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of ' . $this->totalPages, 0, 0, 'C');
    }
}

// Create PDF object using the extended class
$pdf = new PDF('L', 'mm', 'A4'); // 'L' for landscape, 'mm' for millimeters, 'A4' for A4 size
$pdf->SetFont('Arial', 'B', 12);

// Define the upload directory at the beginning of the script
$upload_dir = 'uploads/transactions/';

try {
    // Your existing code for fetching settings and generating the PDF...

    if (isset($_GET['ids']) && !empty($_GET['ids'])) {
        // Convert comma-separated IDs into an array
        $ids = explode(',', $_GET['ids']); 
        $ids = array_map('intval', $ids); // Ensure IDs are integers

        // Prepare SQL query with placeholders
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT financial_transaction.*,
               rao_program.name AS rao_program_name
                FROM financial_transaction
                JOIN rao_program ON financial_transaction.fund = rao_program.id
                WHERE financial_transaction.id IN ($placeholders)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ids);
            $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if transactions are found
            if (!empty($transactions)) {
                // Your logic for adding pages and inputting transaction details goes here...
                // Determine the range of months with the year
                $months = array_map(function ($transaction) {
                    return date('F Y', strtotime($transaction['date'])); // Extracts both Month and Year
                }, $transactions);

                $months = array_unique($months);
                sort($months, SORT_NATURAL); // Sorts alphabetically but keeps the year in order

                // Get the first and last month-year
                $month_range = count($months) > 1 ? $months[0] . ' - ' . end($months) : $months[0];
                // Add a page for the summary of financial transactions
                $pdf->AddPage();

                // Set table headers
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetFillColor(200, 200, 200); // Set fill color for headers
                $pdf->Cell(22, 6, 'Date', 1, 0, 'C', true);
                $pdf->Cell(21, 6, 'Cheque No', 1, 0, 'C', true);
                $pdf->Cell(21, 6, 'Voucher No', 1, 0, 'C', true);
                $pdf->Cell(49, 6, 'Fund', 1, 0, 'C', true);
                $pdf->Cell(49, 6, 'Payee', 1, 0, 'C', true);
                $pdf->Cell(35, 6, 'Particulars', 1, 0, 'C', true);
                $pdf->Cell(25, 6, 'Gross Amt', 1, 0, 'C', true);
                $pdf->Cell(15, 6, 'VAT %', 1, 0, 'C', true);
                $pdf->Cell(15, 6, 'EVAT %', 1, 0, 'C', true);
                $pdf->Cell(25, 6, 'Net Amount', 1, 1, 'C', true);

                // Set table data
                $pdf->SetFont('Arial', '', 8);
                $total_gross_amount = 0;
                $total_vat = 0;
                $total_evat = 0;
                $total_net_amount = 0;

                foreach ($transactions as $row) {
                    $gross_amount = $row['gross_amount'] ?? 0;
                    $vat_amount = $row['vat_amount'] ?? 0; 
                    $evat_amount = $row['evat_amount'] ?? 0; 
                    $net_amount = $gross_amount - $vat_amount - $evat_amount;

                    $pdf->Cell(22, 5, date("M j, Y", strtotime($row['date'])), 1, 0, 'C');
                    $pdf->Cell(21, 5, $row['cheque_no'], 1, 0, 'C');
                    $pdf->Cell(21, 5, $row['dv_no'], 1, 0, 'C');
                    $pdf->Cell(49, 5, $row['rao_program_name'], 1, 0, 'C');
                    $pdf->Cell(49, 5, $row['payee'], 1, 0, 'C');
                    $pdf->Cell(35, 5, $row['particulars'], 1, 0, 'C');
                    $pdf->Cell(25, 5, 'P ' . number_format($gross_amount, 2), 1, 0, 'C');
                    $pdf->Cell(15, 5, number_format($vat_amount / $gross_amount * 100, 2), 1, 0, 'C'); // VAT % calculation
                    $pdf->Cell(15, 5, number_format($evat_amount / $gross_amount * 100, 2), 1, 0, 'C'); // EVAT % calculation
                    $pdf->Cell(25, 5, 'P ' . number_format($net_amount, 2), 1, 1, 'C');

                    // Add to totals
                    $total_gross_amount += $gross_amount;
                    $total_vat += $vat_amount;
                    $total_evat += $evat_amount;
                    $total_net_amount += $net_amount;
                }

                // Add a blank row for spacing
                $pdf->Cell(272, 5, '', 0, 1, 'R');

                // Display total calculations
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(252, 4, 'Total Gross Amount:', 0, 0, 'R'); 
                $pdf->Cell(25, 4, 'P ' . number_format($total_gross_amount, 2), 0, 1, 'R'); 

                $pdf->Cell(252, 4, 'Total VAT Amount:', 0, 0, 'R'); 
                $pdf->Cell(25, 4, 'P ' . number_format($total_vat, 2), 0, 1, 'R'); 

                $pdf->Cell(252, 4, 'Total eVAT Amount:', 0, 0, 'R'); 
                $pdf->Cell(25, 4, 'P ' . number_format($total_evat, 2), 0, 1, 'R'); 

                $pdf->Cell(252, 4, 'Total Net Amount:', 0, 0, 'R'); 
                $pdf->Cell(25, 4, 'P ' . number_format($total_net_amount, 2), 0, 1, 'R'); 

                // Save the PDF or display it, depending on your workflow 

                // Ensure the uploads directory exists
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Increment current_scki_no before using it
                $new_scki_no = $current_scki_no + 1; // Increment the current SCKI number

                // Prepare to insert into generated_reports table
                $file_name = $upload_dir . $current_scki_no . '.pdf'; // Use the new SCKI number for the filename

                // First, save the PDF with the complete content (including the new SCKI no if applicable)
                try {
                    // Now save the PDF file with the new SCKI number
                    $pdf->Output('F', $file_name); // Save the PDF file to the server

                    // Update the database with the new SCKI number
                    $update_stmt = $pdo->prepare("UPDATE settings SET current_scki_no = ? WHERE id = ?"); // Update the SCKI number
                    $update_stmt->execute([$new_scki_no, 1]); // Ensure you pass the correct setting ID

                    // Insert the filename into the generated_reports table
                    try {
                        $insert_report_stmt = $pdo->prepare("INSERT INTO generated_reports (filename) VALUES (?)");
                        $insert_report_stmt->execute([$file_name]); // Save the filename in the database
                    } catch (Exception $e) {
                        // If you encounter an error while saving the filename, handle that error
                        die('Error saving report filename: ' . $e->getMessage()); // Or use other error handling
                    }

                } catch (Exception $e) {
                    // Handle errors during PDF creation or saving
                    die('Error saving the PDF file: ' . $e->getMessage());
                }

                // After saving, output the PDF once
                $pdf->Output(); // This sends the content to the browser as output or download
                
            } else {
                // Handle no transactions found
                $pdf->AddPage(); 
                $pdf->Cell(0, 10, 'No transactions found.', 1, 1, 'C');
            }
        } catch (Exception $e) {
            // Handle database errors by adding error message to PDF
            $pdf->AddPage();
            $pdf->Cell(0, 10, 'Database error: ' . $e->getMessage(), 1, 1, 'C');
        }
    } else {
        $pdf->AddPage();
        $pdf->Cell(0, 10, 'No transactions selected.', 1, 1, 'C');
    }
} catch (Exception $e) {
    // Handle general errors
    $pdf->AddPage();
    $pdf->Cell(0, 10, 'Error fetching settings: ' . $e->getMessage(), 1, 1, 'C');
}

// Output the PDF only at the end after handling all messages
$pdf->Output();
?>