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
    <?php include 'chatbot.php'; ?>
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
                  <!-- Button on the Left -->
                  <div class="col">
                      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#addTransactionModal">Add New Barangay Transaction</button>
                  </div>
                  
                  <!-- Buttons on the Right -->
                  <div class="col text-end">
                      <button id="export-ris" class="btn btn-primary">RIS</button>
                      <!-- <button id="export-transmital" class="btn btn-primary">Transmittal letter</button>
                      <button id="export-imcd" class="btn btn-primary">IMCD</button> -->
                  </div>
              </div>
            </div>
          </div>

          <!-- Insert New Transaction Modal -->
          <div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-fullscreen p-5" role="document"> <!-- Added modal-lg for larger width -->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Add New Barangay Transaction</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="" id="new_financialForm">
                              <div class="row">
                                  <!-- Disbursement Voucher No. -->
                                  <div class="col-md-6 position-relative">
                                      <label for="voucherNo">Disbursement Voucher No:</label>
                                      <input type="text" id="new_voucherNo" class="form-control" placeholder="Enter voucher number">
                                  </div>
                                  <!-- Fund Cluster No -->
                                  <div class="col-md-6">
                                      <label class="form-label">Fund Cluster:</label>
                                      <select class="form-control" id="new_fund" required>
                                          <option value="" disabled selected>Select a Program</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="row">
                                  <!-- Entity Name -->
                                  <div class="col-md-6">
                                      <label class="form-label">Entity Name:</label>
                                      <input type="text" class="form-control" placeholder="Enter entity name" id="new_entityName" required>
                                  </div>
                                  <!-- RIS Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">RIS Number:</label>
                                      <input type="text" class="form-control" placeholder="Enter RIS number" id="new_risNumber" required>
                                  </div>
                              </div>

                              <div class="row">
                                  <!-- Purchase Request Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Request No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase request number" id="new_purchaseRequestNo" required>
                                  </div>
                                  <!-- Requisitioner -->
                                  <div class="col-md-6">
                                      <label class="form-label">Requisitioner:</label>
                                      <select class="form-control" id="new_requisitioner" required>
                                          <option value="" disabled selected>Select Requisitioner</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="row">
                                  <!-- Purchase Order Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Order No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase order number" id="new_purchaseOrderNo" required>
                                  </div>
                                  <!-- Project Amount -->
                                  <div class="col-md-6">
                                      <label class="form-label">Project Amount:</label>
                                      <input type="text" class="form-control" id="new_projectAmount" placeholder="Enter amount" readonly>
                                  </div>
                              </div><hr>

                              <!-- Original code section to be modified -->
                              <div class="row">
                                <!-- Supplier Column -->
                                <div class="col-md-12">
                                  <h3>Suppliers and Items</h3>
                                  
                                  <!-- Add Supplier Button -->
                                  <div class="row mb-3">
                                    <div class="col-md-12 d-flex justify-content-end">
                                      <button id="addSupplierBtn" class="btn btn-success">Add Another Supplier</button>
                                    </div>
                                  </div>
                                  
                                  <!-- Suppliers Container -->
                                  <div id="suppliersContainer">
                                    <!-- First Supplier Section -->
                                    <div class="supplier-section" data-supplier-id="1">
                                      <div class="row align-items-center">
                                        <div class="col-md-12 d-flex">
                                          <div class="me-2" style="flex: 1;">
                                            <label for="supplierName" class="form-label">Supplier 1 Name:</label>
                                            <input type="text" class="form-control supplierName" id="supplierName" placeholder="Enter supplier name">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <!-- First Supplier's Items Container -->
                                      
                                      <div class="col-md-2 d-flex align-items-end justify-content-start">
                                          <button id="addItemBtn" class="btn btn-primary mt-4">Add Item</button>
                                        </div>
                                      <div id="supplierItemsContainer">
                                        <div class="row mb-3 align-items-center mt-2">
                                          <div class="col-md-2">
                                            <label class="form-label">Item No:</label>
                                            <input type="text" class="form-control itemNo" placeholder="Enter item number">
                                          </div>
                                          <div class="col-md-2">
                                            <label class="form-label">Unit:</label>
                                            <input type="text" class="form-control unit" placeholder="Enter unit">
                                          </div>
                                          <div class="col-md-5">
                                            <label class="form-label">Description:</label>
                                            <input type="text" class="form-control description" placeholder="Enter description">
                                          </div>
                                          <div class="col-md-1">
                                            <label class="form-label">Quantity:</label>
                                            <input type="number" class="form-control quantity" placeholder="Enter quantity">
                                          </div>
                                          <div class="col-md-1">
                                            <label class="form-label">Unit Price:</label>
                                            <input type="number" class="form-control unitPrice" step="0.01" placeholder="Enter unit price">
                                          </div>
                                          <div class="col-md-1">
                                            <label class="form-label">Amount:</label>
                                            <input type="number" class="form-control amount" step="0.01" placeholder="Enter amount" readonly>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Project and Theme Column -->
                                <div class="col-md-12 p-3">
                                  <h3>Project and Theme</h3>
                                  
                                  <div class="row mb-3">
                                    <!-- Project Title and Theme -->
                                    <div class="col-md-6">
                                      <label for="projectTitle" class="form-label">Project Title and Theme:</label>
                                      <input type="text" class="form-control" id="projectTitle" placeholder="Enter project title and theme">
                                    </div>
                                    <!-- Background and Rationale -->
                                    <div class="col-md-6">
                                      <label for="backgroundRationale" class="form-label">Background and Rationale:</label>
                                      <textarea class="form-control" id="backgroundRationale" rows="1" placeholder="Enter background and rationale"></textarea>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <!-- Objectives -->
                                    <div class="col-md-6">
                                      <label for="objectives" class="form-label">Objectives:</label>
                                      <textarea class="form-control" id="objectives" rows="1" placeholder="Enter objectives"></textarea>
                                    </div>
                                    <!-- Methodology -->
                                    <div class="col-md-6">
                                      <label for="methodology" class="form-label">Methodology:</label>
                                      <textarea class="form-control" id="methodology" rows="1" placeholder="Enter methodology"></textarea>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <!-- Expected Output -->
                                    <div class="col-md-6">
                                      <label for="expectedOutput" class="form-label">Expected Output:</label>
                                      <textarea class="form-control" id="expectedOutput" rows="1" placeholder="Enter expected output"></textarea>
                                    </div>
                                    <!-- Proponents -->
                                    <div class="col-md-6">
                                      <label for="proponents" class="form-label">Proponents:</label>
                                      <textarea class="form-control" id="proponents" rows="1" placeholder="Enter proponents"></textarea>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <!-- Venue -->
                                    <div class="col-md-6">
                                      <label for="venue" class="form-label">Venue:</label>
                                      <input type="text" class="form-control" id="venue" placeholder="Enter venue">
                                    </div>
                                    <!-- Date -->
                                    <div class="col-md-6">
                                      <label for="date" class="form-label">Date:</label>
                                      <input type="date" class="form-control" id="date">
                                    </div>
                                  </div>

                                </div>

                              <button type="submit" class="btn btn-primary d-flex float-end mb-3">
                                  Submit Transaction
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Insert New Transaction -->

          <!-- Insert Transaction with existing DVModal -->
          <div class="modal fade" id="addTransactionModalWithDV" tabindex="-1" role="dialog" aria-labelledby="addTransactionModalWithDV" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Added modal-lg for larger width -->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Add Barangay Transaction with Existing DV</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="" id="existing_financialForm">
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
                                      <select class="form-control" id="existing_fund" required>
                                          <option value="" disabled selected>Select a Program</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Entity Name -->
                                  <div class="col-md-6">
                                      <label class="form-label">Entity Name:</label>
                                      <input type="text" class="form-control" placeholder="Enter entity name" id="existing_entityName" required>
                                  </div>
                                  <!-- RIS Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">RIS Number:</label>
                                      <input type="number" class="form-control" placeholder="Enter RIS number" id="existing_risNumber" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Request Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Request No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase request number" id="existing_purchaseRequestNo" required>
                                  </div>
                                  <!-- Requisitioner -->
                                  <div class="col-md-6">
                                      <label class="form-label">Requisitioner:</label>
                                      <input type="text" class="form-control" placeholder="Enter requisitioner name" id="existing_requisitioner" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                  <!-- Purchase Order Number -->
                                  <div class="col-md-6">
                                      <label class="form-label">Purchase Order No.:</label>
                                      <input type="number" class="form-control" placeholder="Enter purchase order number" id="existing_purchaseOrderNo" required>
                                  </div>
                                  <!-- Project Amount -->
                                  <div class="col-md-6">
                                      <label class="form-label">Project Amount:</label>
                                      <input type="text" class="form-control" id="existing_projectAmount" required readonly>
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
          <!-- Insert Transaction with existing DV-->

          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xxl-12 col-xl-12 proorder-xxl-5 col-md-12 box-col-12">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <div class="row">
                      <!-- Title - full width on mobile, half width on larger screens -->
                      <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h3>Barangay Transaction History</h3>
                      </div>
                      
                      <!-- Search box - full width on mobile, half width on larger screens -->
                      <div class="col-12 col-md-6">
                        <label for="searchTransactions" class="form-label">Search Transactions</label>
                        <input type="text" id="searchTransactions" class="form-control w-100" placeholder="Search transactions...">
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="barangay-transaction-history" style="width:100%">
                        <thead>
                          <tr>
                              <th>
                                <div class="form-check checkbox checkbox-solid-primary">
                                  <input class="form-check-input" id="solid" type="checkbox"/>
                                  <label class="form-check-label" for="solid"> </label>
                                </div>
                              </th>
                              <th>Disbursement Voucher No.</th>
                              <th>Fund Cluster</th>
                              <th>Entity Name</th>
                              <th>RIS Number</th>
                              <th>Purchase Request No.</th>
                              <th>Requisitioner</th>
                              <th>Purchase Order No.</th>
                              <th>Project Amount</th>
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
            </div>
          </div>

          <div class="modal fade" id="transactionDetailsModal" tabindex="-1" aria-labelledby="transactionDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="transactionDetailsModalLabel">Transaction Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalTransactionDetails">
                  <!-- Dynamic content will be inserted here -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
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
      // Globally accessible function
      function confirmDelete(transactionId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("mysql/delete_barangay_transaction.php", { id: transactionId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success").then(() => {
                        location.reload();
                    });
                }, "json");
            }
        });
      }

    $(document).ready(function () {
        // --- Fetch and populate programs when page loads ---
        fetchPrograms();
        fetchOfficials();

        function fetchPrograms() {
            $.ajax({
                url: 'mysql/fetch_programs.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let fundSelect = $('#new_fund');
                    fundSelect.empty().append('<option value="" disabled selected>Select a Program</option>');
                    data.forEach(rao_program => {
                        fundSelect.append(`<option value="${rao_program.id}" data-amount="${rao_program.amount}">${rao_program.name}</option>`);
                    });
                },
                error: function () {
                    console.error("Error fetching programs.");
                }
            });
        }

        function fetchOfficials() {
            $.ajax({
                url: 'mysql/fetch_officials_name.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let fundSelect = $('#new_requisitioner');
                    fundSelect.empty().append('<option value="" disabled selected>Select Requisitioner</option>');
                    data.forEach(officials_name => {
                        fundSelect.append(`<option value="${officials_name.first_name} ${officials_name.last_name}">${officials_name.first_name} ${officials_name.last_name}</option>`);
                    });
                },
                error: function () {
                    console.error("Error fetching programs.");
                }
            });
        }

        // Populate the project amount input when a fund is selected
        $('#new_fund').change(function () {
            let selectedOption = $(this).find('option:selected');
            let amount = selectedOption.data('amount');
            $('#new_projectAmount').val(amount ? parseFloat(amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : '');
        });

        // --- Voucher No input event for suggestions and related logic ---
        $('#voucherNo').on('input', function() {
            var voucherNo = $(this).val();

            if (voucherNo.length > 0) {
                $.ajax({
                    url: 'mysql/fetch_dv.php',
                    method: 'GET',
                    data: { dv_no: voucherNo },
                    dataType: 'json',
                    success: function(response) {
                        $('#suggestions').empty().show();
                        $('#new_fund').empty().append('<option value="" disabled selected>Select a Program</option>');
                        
                        const items = {};

                        if (response && Array.isArray(response) && response.length > 0) {
                            response.forEach(function(item) {
                                // Suggestions for the input
                                $('#suggestions').append('<div class="suggestion-item" style="cursor:pointer;" data-amount="' + item.rao_program_amount + '">' + item.dv_no + '</div>');

                                // Store funds with amounts for the selected DV
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

                            // Handle suggestion click
                            $(document).off('click', '.suggestion-item').on('click', '.suggestion-item', function() {
                                var selectedDv = $(this).text().trim();
                                $('#voucherNo').val(selectedDv);
                                $('#suggestions').hide();

                                if (items[selectedDv]) {
                                    const projectAmount = items[selectedDv].rao_program_amount;
                                    $('#new_projectAmount').val(projectAmount ? parseFloat(projectAmount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : '');
                                    $('#new_fund').empty();
                                    items[selectedDv].funds.forEach(function(fund) {
                                        $('#new_fund').append('<option value="' + fund.transaction_id + '">' + fund.rao_program_name + '</option>');
                                    });
                                }
                            });
                        } else {
                            $('#suggestions').hide();
                        }
                    },
                    error: function() {
                        $('#suggestions').hide();
                        console.error("Error fetching DV data.");
                    }
                });
            } else {
                $('#suggestions').hide();
                $('#new_fund').empty().append('<option value="" disabled selected>Select a Program</option>');
                $('#new_projectAmount').val('');
            }
        });

        // --- Fetch and display transactions ---
        fetchTransactions();

        // Updated showDetails function to display multiple suppliers
        function showDetails(id, voucher_no, fund_cluster, entity_name, ris_number, purchase_request_no, requisitioner, purchase_order_no, project_amount, suppliers, project_title, background_rationale, objectives, methodology, expected_output, proponents, venue, date, items) {
          // Parse items data into a structured format
          let suppliersData = [];
          
          // Check if suppliers is a JSON string or already an object
          if (typeof suppliers === 'string') {
            try {
              // If it's a comma-separated list of supplier names (legacy format)
              if (suppliers.includes(',') && !suppliers.includes('{')) {
                const supplierNames = suppliers.split(',').map(s => s.trim());
                // Create a simple structure with supplier names only
                suppliersData = supplierNames.map(name => ({ 
                  supplier_name: name,
                  items: []
                }));
              } else {
                // Try to parse as JSON
                suppliersData = JSON.parse(suppliers);
              }
            } catch (e) {
              // If parsing fails, create a single supplier entry
              suppliersData = [{ 
                supplier_name: suppliers,
                items: []
              }];
            }
          } else if (Array.isArray(suppliers)) {
            // If it's already an array, use it directly
            suppliersData = suppliers;
          } else {
            // If it's a single string value (not JSON or array), create a single supplier
            suppliersData = [{ 
              supplier_name: suppliers,
              items: []
            }];
          }
          
          // Parse items data
          // Format can be:
          // 1. Array of items already grouped by supplier
          // 2. String with "Supplier: name, Item: ..." format
          // 3. Simple string of items without supplier info
          if (typeof items === 'string') {
            const itemsList = items.split('||');
            
            // Check if items contain supplier information
            const hasSuppliersInItems = itemsList.some(item => item.includes('Supplier:'));
            
            if (hasSuppliersInItems) {
              // Reset suppliers data if we're getting it from items
              suppliersData = [];
              let currentSupplier = null;
              
              itemsList.forEach(item => {
                // Check if this item contains supplier info
                if (item.includes('Supplier:')) {
                  // Extract supplier name
                  const supplierMatch = item.match(/Supplier:\s*([^,]+)/);
                  if (supplierMatch && supplierMatch[1]) {
                    const supplierName = supplierMatch[1].trim();
                    
                    // Check if we already have this supplier
                    const existingSupplier = suppliersData.find(s => s.supplier_name === supplierName);
                    if (existingSupplier) {
                      currentSupplier = existingSupplier;
                    } else {
                      // Create new supplier
                      currentSupplier = {
                        supplier_name: supplierName,
                        items: []
                      };
                      suppliersData.push(currentSupplier);
                    }
                    
                    // Extract and add the item details
                    const itemDetails = {
                      item_no: item.match(/Item No:\s*([^,]+)/) ? item.match(/Item No:\s*([^,]+)/)[1].trim() : '',
                      unit: item.match(/Unit:\s*([^,]+)/) ? item.match(/Unit:\s*([^,]+)/)[1].trim() : '',
                      description: item.match(/Description:\s*([^,]+)/) ? item.match(/Description:\s*([^,]+)/)[1].trim() : '',
                      quantity: item.match(/Quantity:\s*([^,]+)/) ? item.match(/Quantity:\s*([^,]+)/)[1].trim() : '',
                      unit_price: item.match(/Unit Price:\s*([^,]+)/) ? item.match(/Unit Price:\s*([^,]+)/)[1].trim() : '',
                      amount: item.match(/Amount:\s*([^,]+)/) ? item.match(/Amount:\s*([^,]+)/)[1].trim() : ''
                    };
                    
                    currentSupplier.items.push(itemDetails);
                  }
                } else if (currentSupplier) {
                  // This is an item without supplier info, add to current supplier
                  const itemDetails = {
                    item_no: item.match(/Item No:\s*([^,]+)/) ? item.match(/Item No:\s*([^,]+)/)[1].trim() : '',
                    unit: item.match(/Unit:\s*([^,]+)/) ? item.match(/Unit:\s*([^,]+)/)[1].trim() : '',
                    description: item.match(/Description:\s*([^,]+)/) ? item.match(/Description:\s*([^,]+)/)[1].trim() : '',
                    quantity: item.match(/Quantity:\s*([^,]+)/) ? item.match(/Quantity:\s*([^,]+)/)[1].trim() : '',
                    unit_price: item.match(/Unit Price:\s*([^,]+)/) ? item.match(/Unit Price:\s*([^,]+)/)[1].trim() : '',
                    amount: item.match(/Amount:\s*([^,]+)/) ? item.match(/Amount:\s*([^,]+)/)[1].trim() : ''
                  };
                  
                  currentSupplier.items.push(itemDetails);
                }
              });
            } else {
              // No supplier info in items, add all items to first supplier
              if (suppliersData.length === 0) {
                suppliersData.push({
                  supplier_name: 'Unknown Supplier',
                  items: []
                });
              }
              
              // Parse each item and add to the first supplier
              itemsList.forEach(item => {
                const itemDetails = {
                  item_no: item.match(/Item No:\s*([^,]+)/) ? item.match(/Item No:\s*([^,]+)/)[1].trim() : '',
                  unit: item.match(/Unit:\s*([^,]+)/) ? item.match(/Unit:\s*([^,]+)/)[1].trim() : '',
                  description: item.match(/Description:\s*([^,]+)/) ? item.match(/Description:\s*([^,]+)/)[1].trim() : '',
                  quantity: item.match(/Quantity:\s*([^,]+)/) ? item.match(/Quantity:\s*([^,]+)/)[1].trim() : '',
                  unit_price: item.match(/Unit Price:\s*([^,]+)/) ? item.match(/Unit Price:\s*([^,]+)/)[1].trim() : '',
                  amount: item.match(/Amount:\s*([^,]+)/) ? item.match(/Amount:\s*([^,]+)/)[1].trim() : ''
                };
                
                suppliersData[0].items.push(itemDetails);
              });
            }
          }
          
          // Build HTML content for the modal
          let modalContent = `
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label"><strong>Disbursement Voucher No:</strong></label>
                  <p>${voucher_no}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Fund Cluster:</strong></label>
                  <p>${fund_cluster}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label class="form-label"><strong>Entity Name:</strong></label>
                  <p>${entity_name}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>RIS Number:</strong></label>
                  <p>${ris_number}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label class="form-label"><strong>Purchase Request No:</strong></label>
                  <p>${purchase_request_no}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Requisitioner:</strong></label>
                  <p>${requisitioner}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label class="form-label"><strong>Purchase Order No:</strong></label>
                  <p>${purchase_order_no}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Project Amount:</strong></label>
                  <p>₱${parseFloat(project_amount).toLocaleString()}</p>
                </div>
              </div>
              <hr>
          `;

          // Add suppliers and their items
          modalContent += `<h4 class="mt-3 mb-3">Suppliers and Items</h4>`;
          
          // Add each supplier with their items
          suppliersData.forEach((supplier, index) => {
            modalContent += `
              <div class="supplier-details mb-4 p-3" style="background-color: #f8f9fa; border-radius: 5px;">
                <div class="row">
                  <div class="col-md-12">
                    <h5 class="mb-3">Supplier ${index + 1}: ${supplier.supplier_name}</h5>
                  </div>
                </div>
                
                <div class="table-responsive">
                  <table class="table table-sm table-bordered">
                    <thead class="table-light">
                      <tr>
                        <th>Item No.</th>
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
            `;
            
            // Add items for this supplier
            if (supplier.items && supplier.items.length > 0) {
              supplier.items.forEach(item => {
                modalContent += `
                  <tr>
                    <td>${item.item_no || ''}</td>
                    <td>${item.unit || ''}</td>
                    <td>${item.description || ''}</td>
                    <td>${item.quantity || ''}</td>
                    <td>${item.unit_price ? '₱' + parseFloat(item.unit_price).toLocaleString() : ''}</td>
                    <td>${item.amount ? '₱' + parseFloat(item.amount).toLocaleString() : ''}</td>
                  </tr>
                `;
              });
            } else {
              modalContent += `<tr><td colspan="6" class="text-center">No items found for this supplier</td></tr>`;
            }
            
            modalContent += `
                    </tbody>
                  </table>
                </div>
              </div>
            `;
          });
          
          // Add Project and Theme section
          modalContent += `
            <hr>
            <div class="col-md-12 p-3">
              <h4>Project and Theme</h4>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label"><strong>Project Title and Theme:</strong></label>
                  <p>${project_title || 'N/A'}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Background and Rationale:</strong></label>
                  <p>${background_rationale || 'N/A'}</p>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label"><strong>Objectives:</strong></label>
                  <p>${objectives || 'N/A'}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Methodology:</strong></label>
                  <p>${methodology || 'N/A'}</p>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label"><strong>Expected Output:</strong></label>
                  <p>${expected_output || 'N/A'}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Proponents:</strong></label>
                  <p>${proponents || 'N/A'}</p>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label"><strong>Venue:</strong></label>
                  <p>${venue || 'N/A'}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label"><strong>Date:</strong></label>
                  <p>${date || 'N/A'}</p>
                </div>
              </div>
            </div>
          `;
          
          // Close the modal body div
          modalContent += `</div>`;
          
          // Set the modal content and show the modal
          document.getElementById('modalTransactionDetails').innerHTML = modalContent;
          $('#transactionDetailsModal').modal('show');
        }

        function fetchTransactions() {
          $.ajax({
            url: 'mysql/fetch_barangay_transaction.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
              if (response.status !== 'success') {
                console.error('Failed to fetch data:', response);
                return;
              }
              const data = response.data; // Extract the data array
              let tbody = $("#barangay-transaction-history tbody");
              tbody.empty();

              if (Array.isArray(data) && data.length > 0) {
                data.forEach(transaction => {
                  let row = `
                    <tr>
                      <td><input type="checkbox" class="form-check-input"></td>
                      <td>${transaction.voucher_no || 'N/A'}</td>
                      <td>${transaction.fund_cluster_name || 'N/A'}</td>
                      <td>${transaction.entity_name || 'N/A'}</td>
                      <td>${transaction.ris_number || 'N/A'}</td>
                      <td>${transaction.purchase_request_no || 'N/A'}</td>
                      <td>${transaction.requisitioner || 'N/A'}</td>
                      <td>${transaction.purchase_order_no || 'N/A'}</td>
                      <td>₱${parseFloat(transaction.project_amount).toLocaleString()}</td>
                      <td>
                        <!-- View Details Button -->
                        <button class="btn btn-sm btn-primary view-details-btn" 
                                data-id="${transaction.id}" 
                                data-voucher="${transaction.voucher_no}" 
                                data-fund="${transaction.fund_cluster_name}" 
                                data-entity="${transaction.entity_name}" 
                                data-ris="${transaction.ris_number}" 
                                data-purchase-request="${transaction.purchase_request_no}" 
                                data-requisitioner="${transaction.requisitioner}" 
                                data-purchase-order="${transaction.purchase_order_no}" 
                                data-amount="${transaction.project_amount}" 
                                data-supplier="${transaction.supplier_name}" 
                                data-title="${transaction.project_title}" 
                                data-rationale="${transaction.background_rationale}" 
                                data-objectives="${transaction.objectives}" 
                                data-methodology="${transaction.methodology}" 
                                data-output="${transaction.expected_output}" 
                                data-proponents="${transaction.proponents}" 
                                data-venue="${transaction.venue}" 
                                data-date="${transaction.date}" 
                                data-items="${transaction.items}">
                          View Details
                        </button>                        

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-danger" onclick="confirmDelete(${transaction.id});">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  `;

                  tbody.append(row);
                });

                // Bind event dynamically after the table is populated
                $('.view-details-btn').on('click', function () {
                  const button = $(this);
                  
                  // Get suppliers information
                  let suppliers = button.data('suppliers');
                  if (!suppliers) {
                    // If no suppliers data attribute, try to use the single supplier
                    suppliers = button.data('supplier');
                  }
                  
                  showDetails(
                    button.data('id'),
                    button.data('voucher'),
                    button.data('fund'),
                    button.data('entity'),
                    button.data('ris'),
                    button.data('purchase-request'),
                    button.data('requisitioner'),
                    button.data('purchase-order'),
                    button.data('amount'),
                    suppliers,
                    button.data('title'),
                    button.data('rationale'),
                    button.data('objectives'),
                    button.data('methodology'),
                    button.data('output'),
                    button.data('proponents'),
                    button.data('venue'),
                    button.data('date'),
                    button.data('items')
                  );
                });
              } else {
                tbody.append(`<tr><td colspan="14" class="text-center">No transactions found.</td></tr>`);
              }
            },
            error: function () {
              console.error('Error fetching transactions.');
            }
          });
        }

        // 🟢 Filter transactions based on the search input
        $('#searchTransactions').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#barangay-transaction-history tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });

        // Select/Deselect all checkboxes
        $("#solid").on("change", function () {
            let isChecked = $(this).prop("checked");
            $("#barangay-transaction-history tbody tr:visible input[type='checkbox']").prop("checked", isChecked);
        });
    });
</script>

<script>
  // Updated form submission function to handle multiple suppliers
  $('#new_financialForm').on('submit', function(e) {
    e.preventDefault();

    const projectAmountRaw = $('#new_projectAmount').val() || '';
    const sanitizedAmount = projectAmountRaw.replace(/,/g, '');

    // Gather suppliers and their items
    const suppliers = [];
    $('.supplier-section').each(function() {
      const supplierId = $(this).data('supplier-id');
      const supplierName = $(this).find('.supplierName').val();
      
      const supplierItems = [];
      // For first supplier
      if (supplierId === 1) {
        $('#supplierItemsContainer .row').each(function() {
          const itemNo = $(this).find('.itemNo').val();
          const unit = $(this).find('.unit').val();
          const description = $(this).find('.description').val();
          const quantity = $(this).find('.quantity').val();
          const unitPrice = $(this).find('.unitPrice').val();
          const amount = $(this).find('.amount').val();

          // Only include rows with required values
          if (itemNo && description) {
            supplierItems.push({
              item_no: itemNo,
              unit,
              description,
              quantity,
              unit_price: unitPrice,
              amount
            });
          }
        });
      } 
      // For additional suppliers
      else {
        $(`#supplierItemsContainer${supplierId} .row`).each(function() {
          const itemNo = $(this).find('.itemNo').val();
          const unit = $(this).find('.unit').val();
          const description = $(this).find('.description').val();
          const quantity = $(this).find('.quantity').val();
          const unitPrice = $(this).find('.unitPrice').val();
          const amount = $(this).find('.amount').val();

          // Only include rows with required values
          if (itemNo && description) {
            supplierItems.push({
              item_no: itemNo,
              unit,
              description,
              quantity: quantity || null, // Handle empty values
              unit_price: unitPrice || null,
              amount: amount || null
            });
          }
        });
      }
      
      // Only add suppliers with a name and at least one item
      if (supplierName && supplierItems.length > 0) {
        suppliers.push({
          supplier_name: supplierName,
          items: supplierItems
        });
      }
    });

    // Validate that we have at least one supplier with items
    if (suppliers.length === 0) {
      Swal.fire('Validation Error', 'Please add at least one supplier with items', 'error');
      return;
    }

    const data = {
      voucher_no: $('#new_voucherNo').val(),
      fund_cluster: $('#new_fund').val(),
      entity_name: $('#new_entityName').val(),
      ris_number: $('#new_risNumber').val(),
      purchase_request_no: $('#new_purchaseRequestNo').val(),
      requisitioner: $('#new_requisitioner').val(),
      purchase_order_no: $('#new_purchaseOrderNo').val(),
      project_amount: sanitizedAmount,
      project_title: $('#projectTitle').val(),
      background_rationale: $('#backgroundRationale').val(),
      objectives: $('#objectives').val(),
      methodology: $('#methodology').val(),
      expected_output: $('#expectedOutput').val(),
      proponents: $('#proponents').val(),
      venue: $('#venue').val(),
      date: $('#date').val(),
      suppliers: JSON.stringify(suppliers) // Convert to JSON string
    };

    // Show loading state
    const submitButton = $(this).find('button[type="submit"]');
    const originalText = submitButton.html();
    submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Saving...');
    submitButton.prop('disabled', true);

    // console.log(data);

    fetch('mysql/add_new_brgy_transaction.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams(data)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(result => {
      // Reset button state
      submitButton.html(originalText);
      submitButton.prop('disabled', false);
      
      if (result.status === 'success') {
        $('#addTransactionModal').modal('hide');
        Swal.fire({
          title: 'Success!',
          text: result.message,
          icon: 'success',
          zIndex: 9999
        }).then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error!', result.message || 'An unknown error occurred', 'error');
      }
    })
    .catch(error => {
      // Reset button state
      submitButton.html(originalText);
      submitButton.prop('disabled', false);
      
      console.error('Error:', error);
      Swal.fire('Error!', 'An error occurred: ' + error.message, 'error');
    });
  });
</script>
<script>
  // Fixed code to prevent duplicate item rows
document.addEventListener('DOMContentLoaded', function() {
  // Remove any existing event listeners from the original addItemBtn to prevent duplicates
  const originalAddItemBtn = document.getElementById('addItemBtn');
  const newAddItemBtn = originalAddItemBtn.cloneNode(true);
  originalAddItemBtn.parentNode.replaceChild(newAddItemBtn, originalAddItemBtn);
  
  // Initial supplier counter
  let supplierCounter = 1;
  
  // Add event listener for the Add Supplier button
  document.getElementById('addSupplierBtn').addEventListener('click', function(e) {
    e.preventDefault();
    supplierCounter++;
    
    const suppliersContainer = document.getElementById('suppliersContainer');
    
    // Create a new supplier section
    const supplierSection = document.createElement('div');
    supplierSection.className = 'supplier-section mt-4 pb-3';
    supplierSection.dataset.supplierId = supplierCounter;
    supplierSection.innerHTML = `
      <hr>
      <div class="row align-items-center">
        <div class="col-md-10 d-flex">
          <div class="me-2" style="flex: 1;">
            <label for="supplierName${supplierCounter}" class="form-label">Supplier ${supplierCounter} Name:</label>
            <input type="text" class="form-control supplierName" id="supplierName${supplierCounter}" placeholder="Enter supplier name">
          </div>
        </div>
        <div class="col-md-2 d-flex align-items-end justify-content-end">
          <button class="btn btn-danger removeSupplierBtn mt-4">Remove Supplier</button>
        </div>
      </div>
      
      <div class="row align-items-center mt-2">
        <div class="col-md-12 d-flex justify-content-between">
          <button class="btn btn-primary addItemBtn mt-2" data-supplier="${supplierCounter}">Add Item</button>
        </div>
      </div>
      
      <div class="supplierItemsContainer" id="supplierItemsContainer${supplierCounter}">
        <div class="row mb-3 align-items-center mt-2">
          <div class="col-md-2">
            <label class="form-label">Item No:</label>
            <input type="text" class="form-control itemNo" placeholder="Enter item number">
          </div>
          <div class="col-md-2">
            <label class="form-label">Unit:</label>
            <input type="text" class="form-control unit" placeholder="Enter unit">
          </div>
          <div class="col-md-4">
            <label class="form-label">Description:</label>
            <input type="text" class="form-control description" placeholder="Enter description">
          </div>
          <div class="col-md-1">
            <label class="form-label">Quantity:</label>
            <input type="number" class="form-control quantity" placeholder="Enter quantity">
          </div>
          <div class="col-md-1">
            <label class="form-label">Unit Price:</label>
            <input type="number" class="form-control unitPrice" step="0.01" placeholder="Enter unit price">
          </div>
          <div class="col-md-1">
            <label class="form-label">Amount:</label>
            <input type="number" class="form-control amount" step="0.01" placeholder="Enter amount" readonly>
          </div>
          <div class="col-md-1 d-flex justify-content-center">
            <button type="button" class="btn btn-danger mt-4 removeItemBtn" title="Delete this row">Remove</button>
          </div>
        </div>
      </div>
    `;
    
    suppliersContainer.appendChild(supplierSection);
    
    // Add event listener for the Remove Supplier button
    supplierSection.querySelector('.removeSupplierBtn').addEventListener('click', function() {
      suppliersContainer.removeChild(supplierSection);
    });
    
    // Add event listener for the Add Item button within this supplier section
    supplierSection.querySelector('.addItemBtn').addEventListener('click', function(e) {
      e.preventDefault();
      const thisSupplierContainer = this.closest('.supplier-section').querySelector('.supplierItemsContainer');
      addItemRow(thisSupplierContainer);
    });
    
    // Add event listener for the initial Remove Item button
    supplierSection.querySelector('.removeItemBtn').addEventListener('click', function() {
      const parentRow = this.closest('.row');
      parentRow.parentNode.removeChild(parentRow);
    });
  });
  
  // Function to add an item row to a specific container
  function addItemRow(container) {
    const newRow = document.createElement('div');
    newRow.className = 'row mb-3 align-items-center';
    
    // Helper to create input columns
    function createInputCol(labelText, inputType, inputClass, placeholder, colSize = 2, stepValue = null) {
      const colDiv = document.createElement('div');
      colDiv.className = `col-md-${colSize}`;
      
      const label = document.createElement('label');
      label.className = 'form-label';
      label.innerText = labelText;
      
      const input = document.createElement('input');
      input.type = inputType;
      input.className = `form-control ${inputClass}`;
      input.placeholder = placeholder;
      
      if (stepValue !== null) {
        input.step = stepValue;
      }
      
      colDiv.appendChild(label);
      colDiv.appendChild(input);
      return colDiv;
    }
    
    const itemNoCol = createInputCol('Item No:', 'text', 'itemNo', 'Enter item number', 2);
    const unitCol = createInputCol('Unit:', 'text', 'unit', 'Enter unit', 2);
    const descriptionCol = createInputCol('Description:', 'text', 'description', 'Enter description', 4);
    const quantityCol = createInputCol('Quantity:', 'number', 'quantity', 'Enter quantity', 1);
    const unitPriceCol = createInputCol('Unit Price:', 'number', 'unitPrice', 'Enter unit price', 1, '0.01');
    const amountCol = createInputCol('Amount:', 'number', 'amount', 'Enter amount', 1, '0.01');
    
    const deleteCol = document.createElement('div');
    deleteCol.className = 'col-md-1 d-flex justify-content-center';
    
    const deleteBtn = document.createElement('button');
    deleteBtn.type = 'button';
    deleteBtn.className = 'btn btn-danger mt-4 removeItemBtn';
    deleteBtn.title = 'Delete this row';
    deleteBtn.innerHTML = 'Remove';
    
    deleteBtn.addEventListener('click', function() {
      container.removeChild(newRow);
    });
    
    deleteCol.appendChild(deleteBtn);
    
    newRow.appendChild(itemNoCol);
    newRow.appendChild(unitCol);
    newRow.appendChild(descriptionCol);
    newRow.appendChild(quantityCol);
    newRow.appendChild(unitPriceCol);
    newRow.appendChild(amountCol);
    newRow.appendChild(deleteCol);
    
    container.appendChild(newRow);
  }
  
  // Event listener for the original Add Item button - only attach once
  newAddItemBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const container = document.querySelector('#supplierItemsContainer');
    addItemRow(container);
  });
});
</script>
<script>
  $(document).on('input', '.quantity, .unitPrice', function() {
    const row = $(this).closest('.row');
    const quantity = parseFloat(row.find('.quantity').val()) || 0;
    const unitPrice = parseFloat(row.find('.unitPrice').val()) || 0;
    row.find('.amount').val((quantity * unitPrice).toFixed(2));
  });
</script>
<script>
    // Handle Export IMCD button click
    $(document).ready(function() {
        $('#export-ris').on('click', function() {
            // Get all checked checkboxes in the transaction history table
            let selectedCheckboxes = $('#barangay-transaction-history tbody input[type="checkbox"]:checked');
            
            // Check if any rows are selected
            if (selectedCheckboxes.length === 0) {
                // No rows selected, show alert
                Swal.fire({
                    title: "No Transactions Selected",
                    text: "Please select at least one transaction to export RIS.",
                    icon: "warning"
                });
            } else {
                // Collect the transaction IDs from all selected rows
                let selectedIds = [];
                
                selectedCheckboxes.each(function() {
                    let row = $(this).closest("tr"); // Get the parent row
                    let transactionId = row.find(".view-details-btn").data("id"); // Get ID from the edit button
                    
                    if (transactionId) {
                        selectedIds.push(transactionId);
                    }
                });

                // Log the selected IDs to console for debugging
                console.log("Selected Transaction IDs for RIS:", selectedIds);
                
                if (selectedIds.length > 0) {
                    // Convert array to a comma-separated string to pass as URL parameter
                    let params = new URLSearchParams({ ids: selectedIds.join(',') });
                    
                    // Show brief processing message
                    window.open("mysql/export_ris.php?" + params.toString(), "_blank");
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Could not retrieve any transaction IDs.",
                        icon: "error"
                    });
                }
            }
        });
    });
  </script>
  </body>
</html>

