<?php include 'structure/check_cookies.php'; ?>
<!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities."/>
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app"/>
    <meta name="author" content="pixelstrap"/>
    <title>Bulatok - Barangay Transaction</title>
    <!-- Favicon icon-->
    <link rel="icon" href="./../../assets/img/brgylogo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="./../../assets/img/brgylogo.png" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet"/>
    <!-- Flag icon css -->
    <link rel="stylesheet" href="../assets/css/vendors/flag-icon.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="../assets/css/iconly-icon.css"/>
    <link rel="stylesheet" href="../assets/css/bulk-style.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="../assets/css/themify.css"/>
    <!--fontawesome-->
    <link rel="stylesheet" href="../assets/css/fontawesome-min.css"/>
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/weather-icons/weather-icons.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css"/>
    <!-- App css -->
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen"/>
    <style type="text/css">
      #suggestions {
          display: none; /* Start hidden */
          position: absolute; /* Overlay */
          background: white; /* Background color */
          z-index: 1000; /* Layer above other elements */
          border: 1px solid #ccc; /* Optional border */
          width: 100%; /* Match width of parent */
          max-height: 200px; /* Limit height */
          overflow-y: auto; /* Scroll if needed */
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
      }

      .suggestion-item {
          padding: 8px; /* Padding */
          cursor: pointer; /* Pointer cursor */
      }

      .suggestion-item:hover {
          background: #f0f0f0; /* Highlight on hover */
      }
    </style>
  </head>
  <body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page header start-->
      <?php include 'structure/header.php'; ?>
      <!-- Page header end-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page sidebar start-->
        <?php include 'structure/sidebar.php'; ?>
        <!-- Page sidebar end-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-12 col-12">
                  <h2>Barangay Transaction Management</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
              <div class="row mt-3">
                  <!-- Buttons on the Left -->
                  <div class="col-auto">
                      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#addTransactionModal">Add Barangay Transaction</button>
                  </div>
                  <!-- <div class="col-auto">
                      <button id="export-transaction" class="btn btn-primary">Export SOIC</button>
                      <button id="export-disbursement" class="btn btn-primary" data-toggle="modal" data-target="#disbursementModal">
                          Disbursement Voucher
                      </button>
                  </div> -->
              </div>
            </div>
          </div>

          <!-- Insert Transaction Modal -->
          <div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Added modal-lg for larger width -->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Add Barangay Transaction</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="" id="financialForm">
                              <div class="row">
                                  <!-- Disbursement Voucher No. -->
                                  <div class="col-md-6 position-relative">
                                      <label for="voucherNo">Disbursement Voucher No:</label>
                                      <input type="text" id="voucherNo" class="form-control" placeholder="Enter voucher number">
                                      <div id="suggestions" class="suggestions mt-2" style="display: none; border: 1px solid #ccc; max-height: 150px; overflow-y: auto; background: white;"></div>
                                  </div>
                                  <!-- Fund Cluster No -->
                                  <div class="col-md-6">
                                      <label class="form-label">Fund Cluster:</label>
                                      <select class="form-control" id="fund" required>
                                          <option value="" disabled selected>Select a Program</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Entity Name -->
                                  <div class="col-md-6">
                                      <label class="form-label">Entity Name:</label>
                                      <input type="text" class="form-control" placeholder="Enter entity name" id="entityName" required>
                                  </div>
                                  <!-- RIS Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">RIS Number:</label>
                                      <input type="number" class="form-control" placeholder="Enter RIS number" id="risNumber" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Request Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Request No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase request number" id="purchaseRequestNo" required>
                                  </div>
                                  <!-- Requisitioner -->
                                  <div class="col-md-6">
                                      <label class="form-label">Requisitioner:</label>
                                      <input type="text" class="form-control" placeholder="Enter requisitioner name" id="requisitioner" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Order Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Order No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase order number" id="purchaseOrderNo" required>
                                  </div>
                                  <!-- Project Amount -->
                                  <div class="col-md-6">
                                      <label class="form-label">Project Amount:</label>
                                      <input type="text" class="form-control" id="projectAmount" required readonly>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-primary mt-2 d-flex float-end">
                                  Submit Transaction
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Insert Transaction -->

          <!-- Edit Transaction Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Added modal-lg for larger width -->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Edit Barangay Transaction</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="" id="editTransactionForm">
                              <input type="hidden" id="edit_id" name="id">

                              <div class="row">
                                  <!-- Disbursement Voucher No. -->
                                  <div class="col-md-6">
                                      <label class="form-label">Disbursement Voucher No.:</label>
                                      <input type="text" class="form-control" placeholder="Enter voucher number" id="edit_voucher" name="voucher" required>
                                  </div>
                                  <!-- Fund Cluster No -->
                                  <div class="col-md-6">
                                      <label class="form-label">Fund Cluster:</label>
                                      <select class="form-control" id="edit_fund_cluster" name="fund_cluster" required>
                                          <option value="" disabled selected>Select Fund Cluster</option>
                                          <option value="Cluster 1">Cluster 1</option>
                                          <option value="Cluster 2">Cluster 2</option>
                                          <option value="Cluster 3">Cluster 3</option>
                                          <!-- Add more options as needed -->
                                      </select>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Entity Name -->
                                  <div class="col-md-6">
                                      <label class="form-label">Entity Name:</label>
                                      <input type="text" class="form-control" placeholder="Enter entity name" id="edit_entity_name" name="entity_name" required>
                                  </div>
                                  <!-- RIS Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">RIS Number:</label>
                                      <input type="number" class="form-control" placeholder="Enter RIS number" id="edit_ris_number" name="ris_number" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Request Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Request No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase request number" id="edit_purchase_request_no" name="purchase_request_no" required>
                                  </div>
                                  <!-- Requisitioner -->
                                  <div class="col-md-6">
                                      <label class="form-label">Requisitioner:</label>
                                      <input type="text" class="form-control" placeholder="Enter requisitioner name" id="edit_requisitioner" name="requisitioner" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Order Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Order No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase order number" id="edit_purchase_order_no" name="purchase_order_no" required>
                                  </div>
                                  <!-- Project Amount -->
                                  <div class="col-md-6">
                                      <label class="form-label">Project Amount:</label>
                                      <input type="number" class="form-control" placeholder="Enter project amount" id="edit_project_amount" name="project_amount" required>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success mt-2 d-flex float-end">
                                  Update Transaction
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Edit Transaction Modal -->

          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xxl-12 col-xl-12 proorder-xxl-5 col-md-12 box-col-12">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                      <h3>Barangay Transaction History</h3>
                      <div class="text-left">
                          <label for="searchTransactions" class="form-label">Search Transactions</label>
                          <input type="text" id="searchTransactions" class="form-control w-100" placeholder="Search transactions...">
                      </div>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="barangay-transaction-history" style="width:100%">
                        <thead>
                          <tr>
                              
                              <th>ID</th>
                              <th>Date</th>
                              <th>Disbursement Voucher No.</th>
                              <th>Fund Cluster</th>
                              <th>Entity Name</th>
                              <th>RIS Number</th>
                              <th>Purchase Request No.</th>
                              <th>Requisitioner</th>
                              <th>Purchase Order No.</th>
                              <th>Project Amount</th>
                              <th>Payee</th>
                              <th>Particulars</th>
                              <th>Gross Amount</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

<!--               <div class="col-xxl-12 col-xl-12 col-md-12 box-col-12">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>SOIC Export History</h3>
                    </div>
                    <div class="card-body pt-0 manage-invoice">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="file-history" style="width:100%">
                        <thead>
                          <tr>
                            <th>Filename</th>
                            <th>Date Generated</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>

        </div>
        <!-- Page header start-->
        <?php include 'structure/footer.php'; ?>
        <!-- Page header end-->
      </div>
    </div>
    <!-- Sweetalert js-->
    <script src="../assets/js/sweetalert/sweetalert2.min.js"></script>
    <!-- jquery-->
    <script src="../assets/js/vendors/jquery/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <script src="../assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
    <!--fontawesome-->
    <script src="../assets/js/vendors/font-awesome/fontawesome-min.js"></script>
    <!-- feather-->
    <script src="../assets/js/vendors/feather-icon/feather.min.js"></script>
    <script src="../assets/js/vendors/feather-icon/custom-script.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/sidebar.js"></script>
    <!-- height_equal-->
    <script src="../assets/js/height-equal.js"></script>
    <!-- config-->
    <script src="../assets/js/config.js"></script>
    <!-- apex-->
    <script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
    <!-- scrollbar-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- slick-->
    <script src="../assets/js/slick/slick.min.js"></script>
    <script src="../assets/js/slick/slick.js"></script>
    <!-- data_table-->
    <script src="../assets/js/js-datatables/datatables/jquery.dataTables.min.js"></script>
    <!-- page_datatable-->
    <script src="../assets/js/js-datatables/datatables/datatable.custom.js"></script>
    <!-- page_datatable1-->
    <script src="../assets/js/js-datatables/datatables/datatable.custom1.js"></script>
    <!-- page_datatable-->
    <script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- theme_customizer-->
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- tilt-->
    <script src="../assets/js/animation/tilt/tilt.jquery.js"></script>
    <!-- page_tilt-->
    <script src="../assets/js/animation/tilt/tilt-custom.js"></script>
    <!-- dashboard_1-->
    <script src="../assets/js/dashboard/dashboard_1.js"></script>
    <!-- custom script -->
    <script src="../assets/js/script.js"></script>

    <script>
      $(document).ready(function () {
          fetchPrograms();

          function fetchPrograms() {
              $.ajax({
                  url: 'mysql/fetch_programs.php',
                  type: 'GET',
                  dataType: 'json',
                  success: function (data) {
                      let fundSelect = $('#fund');
                      fundSelect.empty().append('<option value="" disabled selected>Select a Program</option>');

                      // Populate the dropdown with fetched program names and amounts
                      data.forEach(rao_program => {
                          fundSelect.append(`<option value="${rao_program.id}" data-amount="${rao_program.amount}">${rao_program.name}</option>`);
                      });
                  },
                  error: function () {
                      console.error("Error fetching programs.");
                  }
              });
          }

          // Populate Gross Amount input when a fund is selected (Add Transaction)
          $('#fund').change(function () {
              let selectedOption = $(this).find('option:selected');
              let amount = selectedOption.data('amount'); // Changed from 'projectAmount' to 'amount'
              $('#projectAmount').val(amount ? parseFloat(amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : '');
          });
      });
  </script>
  <script>
$(document).ready(function() {
    $('#voucherNo').on('input', function() {
        var voucherNo = $(this).val();
        
        if (voucherNo.length > 0) {
            $.ajax({
                url: 'mysql/fetch_dv.php', // Ensure this URL is correct
                method: 'GET', // Change the method if needed
                data: { dv_no: voucherNo }, // Ensure this matches your PHP parameter
                dataType: 'json',
                success: function(response) {
                    $('#suggestions').empty().show();
                    $('#fund').empty().append('<option value="" disabled selected>Select a Program</option>'); // Reset fund options
                    
                    // Store items with amounts for future use
                    const items = {};
                    
                    if (response && Array.isArray(response) && response.length > 0) {
                        response.forEach(function(item) {
                            // Suggestion items for the input
                            $('#suggestions').append('<div class="suggestion-item" style="cursor: pointer;" data-amount="' + item.rao_program_amount + '">' + item.dv_no + '</div>');
                            
                            // Populate the fund select with unique rao_program_names
                            if (item.rao_program_name) {
                                if (!items[item.dv_no]) {
                                    items[item.dv_no] = {
                                        rao_program_amount: item.rao_program_amount,
                                        funds: []
                                    };
                                }
                                items[item.dv_no].funds.push({
                                    transaction_id: item.transaction_id,
                                    rao_program_name: item.rao_program_name
                                });
                            }
                        });

                        // Attach click event to suggestion items
                        $(document).on('click', '.suggestion-item', function() {
                            var selectedDv = $(this).text().trim();
                            
                            // Update the input based on selected item
                            $('#voucherNo').val(selectedDv); // Update voucherNo input
                            $('#suggestions').hide(); // Hide suggestions

                            // Now set the project amount and fund
                            if (items[selectedDv]) {
                                const projectAmount = items[selectedDv].rao_program_amount; // Get the amount from items
                                $('#projectAmount').val(projectAmount ? parseFloat(projectAmount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : '');

                                // Populate the fund select based on the selected DV number
                                $('#fund').empty(); // Clear previous fund options
                                items[selectedDv].funds.forEach(function(fund) {
                                    $('#fund').append('<option value="' + fund.transaction_id + '">' + fund.rao_program_name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#suggestions').hide();
                    }
                },
                error: function() {
                    $('#suggestions').hide();
                    console.error("An error occurred while fetching the data.");
                }
            });
        } else {
            $('#suggestions').hide();
            $('#fund').empty().append('<option value="" disabled selected>Select a Program</option>'); // Reset options if input is cleared
            $('#projectAmount').val(''); // Clear the project amount input
        }
    });
});
</script>
  </body>
</html>