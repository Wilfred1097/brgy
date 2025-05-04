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
    <title>Bulatok - Income Report</title>
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
                  <h2>Income Report</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Add Income Report Transaction -->
          <div class="modal fade" id="addIncomeReportModal" tabindex="-1" aria-labelledby="addIncomeReportModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="addIncomeReportModalLabel">Add Income Report</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Income Report Form -->
                              <div class="col-md-12">
                                  <form id="addIncomeReportForm">
                                      <div class="mb-3">
                                          <label for="incomeDate" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="incomeDate" placeholder="Select date" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="orNumber" class="form-label">OR Number</label>
                                          <input type="text" class="form-control" id="orNumber" placeholder="Enter OR Number" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="incomeName" class="form-label">Name</label>
                                          <input type="text" class="form-control" id="incomeName" placeholder="Enter full name" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="transactionType" class="form-label">Type of Transaction</label>
                                          <select class="form-control" id="transactionType" required>
                                              <option value="" disabled selected>Select Transaction Type</option>
                                              <option value="IRA">IRA</option>
                                              <option value="RPT">RPT</option>
                                              <option value="Business Tax">Business Tax</option>
                                              <option value="Brgy. Clearance">Brgy. Clearance</option>
                                              <option value="Miscellaneous Fee">Miscellaneous Fee</option>
                                              <option value="Other Service Income">Other Service Income</option>
                                              <option value="Business Permit Fee">Business Permit Fee</option>
                                              <option value="Subsidy from LGU">Subsidy from LGU</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="incomeAmount" class="form-label">Amount</label>
                                          <input type="number" class="form-control" id="incomeAmount" placeholder="Enter amount" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="docStamp" class="form-label">Doc Stamp</label>
                                          <input type="text" class="form-control" id="docStamp" placeholder="Enter Doc Stamp" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="rcdNumber" class="form-label">RCD No.</label>
                                          <input type="text" class="form-control" id="rcdNumber" placeholder="Enter RCD No." required>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Submit Transaction</button>
                                  </form>
                              </div>
                          </div> <!-- End of row -->
                      </div>
                  </div>
              </div>
          </div>

          <!-- Edit Income Report Modal -->
          <div class="modal fade" id="editRaoProgramModal" tabindex="-1" aria-labelledby="editRaoProgramModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editRaoProgramModalLabel">Edit Income Report</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Edit Income Report Form -->
                              <div class="col-md-12">
                                  <form id="editIncomeReportForm">
                                      <input type="hidden" id="editIncomeReportId"> <!-- Hidden ID Field -->
                                      <div class="mb-3">
                                          <label for="editIncomeDate" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="editIncomeDate" placeholder="Select date" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editOrNumber" class="form-label">OR Number</label>
                                          <input type="text" class="form-control" id="editOrNumber" placeholder="Enter OR Number" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editIncomeName" class="form-label">Name</label>
                                          <input type="text" class="form-control" id="editIncomeName" placeholder="Enter full name" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editTransactionType" class="form-label">Type of Transaction</label>
                                          <select class="form-control" id="editTransactionType" required>
                                              <option value="" disabled>Select Transaction Type</option>
                                              <option value="IRA">IRA</option>
                                              <option value="RPT">RPT</option>
                                              <option value="Business Tax">Business Tax</option>
                                              <option value="Brgy. Clearance">Brgy. Clearance</option>
                                              <option value="Miscellaneous Fee">Miscellaneous Fee</option>
                                              <option value="Other Service Income">Other Service Income</option>
                                              <option value="Business Permit Fee">Business Permit Fee</option>
                                              <option value="Subsidy from LGU">Subsidy from LGU</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editIncomeAmount" class="form-label">Amount</label>
                                          <input type="number" class="form-control" id="editIncomeAmount" placeholder="Enter amount" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editDocStamp" class="form-label">Doc Stamp</label>
                                          <input type="text" class="form-control" id="editDocStamp" placeholder="Enter Doc Stamp" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editRcdNumber" class="form-label">RCD No.</label>
                                          <input type="text" class="form-control" id="editRcdNumber" placeholder="Enter RCD No." required>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Update Income Report</button>
                                  </form>
                              </div>
                          </div> <!-- End of row -->
                      </div>
                  </div>
              </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xxl-12 col-xl-12 proorder-xxl-12 col-md-12 box-col-12">
                <button id="add-cedula-transaction" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIncomeReportModal">Add Income Report</button>
                <div class="card height-equal">
                  <div class="row">
                    <!-- Title - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                      <h3>Cedula</h3>
                    </div>
                    
                    <!-- Search box - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6">
                      <label for="searchTransactions" class="form-label">Search Transactions</label>
                      <input type="text" id="searchIncomeReportProgram" class="form-control" placeholder="Search Income Report...">
                    </div>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="income-reports" style="width:100%">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>OR Number</th>
                            <th>Name</th>
                            <th>Transaction Type</th>
                            <th>Amount</th>
                            <th>Doc Stamp</th>
                            <th>RDC Number</th>
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

        </div>
        <!-- Page header start-->
        <?php include 'structure/footer.php'; ?>
        <!-- Page header end-->
      </div>
    </div>
    <!-- Sweetalert js-->
    <script src="../assets/js/sweetalert/sweetalert2.min.js"></script>
    <script src="../assets/js/sweetalert/sweetalert-custom.js"></script>
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
        // Initial fetch on page load
        fetchIncomeReports();

        document.getElementById('addIncomeReportForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Gather all input values
            const date = document.getElementById('incomeDate').value;
            const orNumber = document.getElementById('orNumber').value;
            const name = document.getElementById('incomeName').value;
            const transactionType = document.getElementById('transactionType').value;
            const amount = document.getElementById('incomeAmount').value;
            const docStamp = document.getElementById('docStamp').value;
            const rcdNumber = document.getElementById('rcdNumber').value;

            // Debugging: Log the form data values
            console.log({ date, orNumber, name, transactionType, amount, docStamp, rcdNumber });

            // AJAX request to send data to the server
            $.ajax({
                url: 'mysql/add_income_report.php', // Update the URL to your server endpoint
                type: 'POST',
                data: {
                    date: date,
                    orNumber: orNumber,
                    name: name,
                    transactionType: transactionType,
                    amount: amount,
                    docStamp: docStamp,
                    rcdNumber: rcdNumber,
                },
                success: function (response) {
                    // console.log('Income Report Submitted:', response);
                    if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Income report added successfully',
                        }).then(() => {
                            // Reset the form
                             $('#addIncomeReportModal').modal('hide');
                             $('#addIncomeReportForm')[0].reset();
                             fetchIncomeReports(); // Refresh the table data
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Failed to add income report.',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error submitting Income Report:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add income report. Please try again.',
                    });
                },
            });
        });

        // Handle Income Report Edit button click
        $(document).on('click', '.edit-btn.income-edit-btn', function () {
          // Retrieve data attributes from the clicked edit button
          const id = $(this).data('id');
          const date = $(this).data('date');
          const orNumber = $(this).data('or-number');
          const name = $(this).data('name');
          const transactionType = $(this).data('transaction-type');
          const amount = $(this).data('amount');
          const docStamp = $(this).data('doc-stamp');
          const rcdNumber = $(this).data('rcd-number');

          // Populate the Edit Income Report modal fields
          $('#editIncomeReportId').val(id);
          $('#editIncomeDate').val(date);
          $('#editOrNumber').val(orNumber);
          $('#editIncomeName').val(name);
          $('#editTransactionType').val(transactionType);
          $('#editIncomeAmount').val(amount);
          $('#editDocStamp').val(docStamp);
          $('#editRcdNumber').val(rcdNumber);

          // Show the Edit Income Report modal
          $('#editRaoProgramModal').modal('show');
      });

      // Handle Income Report Edit form submission
      $('#editIncomeReportForm').on('submit', function (event) {
          event.preventDefault();

          // Retrieve form data
          const id = $('#editIncomeReportId').val();
          const date = $('#editIncomeDate').val();
          const orNumber = $('#editOrNumber').val();
          const name = $('#editIncomeName').val();
          const transactionType = $('#editTransactionType').val();
          const amount = $('#editIncomeAmount').val();
          const docStamp = $('#editDocStamp').val();
          const rcdNumber = $('#editRcdNumber').val();

          // AJAX request to update the Income Report
          $.ajax({
              url: 'mysql/edit_income_report.php', // Update endpoint
              type: 'POST',
              data: {
                  id: id,
                  date: date,
                  orNumber: orNumber,
                  name: name,
                  transactionType: transactionType,
                  amount: amount,
                  docStamp: docStamp,
                  rcdNumber: rcdNumber,
              },
              success: function (response) {
                  console.log('Income Report Updated:', response);
                  Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: response.message || 'Income report updated successfully',
                  }).then(() => {
                      // Reset the form and close the modal
                      $('#editRaoProgramModal').modal('hide');
                      $('#editIncomeReportForm')[0].reset();
                      fetchIncomeReports(); // Refresh the table data
                  });
              },
              error: function (xhr, status, error) {
                  console.error('Error updating Income Report:', error);
                  Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: 'Failed to update income report. Please try again.',
                  });
              },
          });
      });

        // 🟢 Filter transactions based on the search input
        $('#searchIncomeReportProgram').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#income-reports tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });

    // 🟢 Fetch RAO Programs from the server
    function fetchIncomeReports() {
        $.ajax({
            url: 'mysql/fetch_income_reports.php', // Updated to the new endpoint
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#income-reports tbody");
                tbody.empty();

                if (data.length > 0) {
                    data.forEach(incomeReports => {
                        let row = `
                            <tr>
                                <td>${new Date(incomeReports.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: '2-digit' })}</td>
                                <td>${incomeReports.or_number || 'N/A'}</td>
                                <td>${incomeReports.name || 'N/A'}</td>
                                <td>${incomeReports.transaction_type || 'N/A'}</td>
                                <td>₱${incomeReports.amount ? parseFloat(incomeReports.amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A'}</td>
                                <td>${incomeReports.doc_stamp || 'N/A'}</td>
                                <td>${incomeReports.rcd_number || 'N/A'}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn income-edit-btn"
                                      data-id="${incomeReports.id}"
                                      data-date="${incomeReports.date}"
                                      data-or-number="${incomeReports.or_number}"
                                      data-name="${incomeReports.name}"
                                      data-transaction-type="${incomeReports.transaction_type}"
                                      data-amount="${incomeReports.amount}"
                                      data-doc-stamp="${incomeReports.doc_stamp}"
                                      data-rcd-number="${incomeReports.rcd_number}">
                                      <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" onclick="confirmDeleteIncomeReport(${incomeReports.id});"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="8" class="text-center">No income reports found.</td></tr>`);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching income reports:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to fetch income reports. Please try again.',
                });
            }
        });
    }

    // 🟢 Confirm & Delete RAO Program
    function confirmDeleteIncomeReport(programId) {
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
                $.post("mysql/delete_income_report.php", { id: programId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success");
                    fetchIncomeReports();
                }, "json");
            }
        });
    }
</script>
  </body>
</html>