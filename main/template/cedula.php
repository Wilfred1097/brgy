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
    <title>Bulatok - Cedula Transaction</title>
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
                  <h2>Cedula Transaction</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Add Cedula Transaction -->
          <div class="modal fade" id="addRaoProgramModal" tabindex="-1" aria-labelledby="addRaoProgramModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="addRaoProgramModalLabel">Cedula Transaction</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Cedula Transaction Form-->
                              <div class="col-md-12">
                                  <form id="addCedulaTransaction">
                                      <div class="mb-3">
                                          <label for="raoDate" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="raoDate" placeholder="Select date" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="raoName" class="form-label">Name</label>
                                          <input type="text" class="form-control" id="raoName" placeholder="Enter full name" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="raoGender" class="form-label">Gender</label>
                                          <select class="form-control" id="raoGender" required>
                                              <option value="" disabled selected>Select Gender</option>
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="raoAmount" class="form-label">Amount</label>
                                          <input type="number" class="form-control" id="raoAmount" placeholder="Enter amount" required>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Submit Transaction</button>
                                  </form>
                              </div>
                          </div> <!-- End of row -->
                      </div>
                  </div>
              </div>
          </div>

          <!-- Edit Cedula Transaction -->
          <div class="modal fade" id="editRaoProgramModal" tabindex="-1" aria-labelledby="editRaoProgramModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editRaoProgramModalLabel">Edit Cedula Transaction</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Edit RAO Program Form-->
                              <div class="col-md-12">
                                  <form id="editRaoProgramForm">
                                      <input type="hidden" id="editRaoProgramId">
                                      <div class="mb-3">
                                          <label for="editRaoDate" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="editRaoDate" placeholder="Select date" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editRaoName" class="form-label">Name</label>
                                          <input type="text" class="form-control" id="editRaoName" placeholder="Enter full name" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editRaoGender" class="form-label">Gender</label>
                                          <select class="form-control" id="editRaoGender" required>
                                              <option value="" disabled>Select Gender</option>
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editRaoAmount" class="form-label">Amount</label>
                                          <input type="number" class="form-control" id="editRaoAmount" placeholder="Enter amount" required>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Update Cedula Transaction</button>
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
                <button id="add-cedula-transaction" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRaoProgramModal">Add Cedula Transaction</button>
                <div class="card height-equal">
                  <div class="row">
                  <!-- Title - full width on mobile, half width on larger screens -->
                  <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <h3>Cedula</h3>
                  </div>
                  
                  <!-- Search box - full width on mobile, half width on larger screens -->
                  <div class="col-12 col-md-6">
                    <label for="searchTransactions" class="form-label">Search Transactions</label>
                    <input type="text" id="searchRaoProgram" class="form-control" placeholder="Search Released Cedula...">
                  </div>
                </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                      <div class="table-responsive theme-scrollbar">
                          <table class="table display table-bordernone mt-0" id="cedula-transaction" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Gender</th>
                                      <th>Amount</th>
                                      <th>Amount</th>
                                      <th class="action-column">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- Assuming data will be inserted here by your JavaScript -->
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
        fetchCedulaTransaction();

        // Handle RAO Program form submission
        document.getElementById('addCedulaTransaction').addEventListener('submit', function (event) {
            event.preventDefault();
            const date = document.getElementById('raoDate').value;
            const name = document.getElementById('raoName').value;
            const gender = document.getElementById('raoGender').value;
            const amount = document.getElementById('raoAmount').value;

            // AJAX request to send data to the server
            $.ajax({
                url: 'mysql/add_cedula_transaction.php',
                type: 'POST',
                data: {
                    date: date,
                    name: name,
                    gender: gender,
                    amount: amount,
                },
                success: function (response) {
                    console.log('Cedula Transaction Submitted:', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Cedula transaction added successfully',
                    }).then(() => {
                        // Reset the form
                        document.getElementById('addCedulaTransaction').reset();
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error submitting Cedula Transaction:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add Cedula transaction. Please try again.',
                    });
                },
            });
        });

        // Handle Cedula Transaction Edit button click
          $(document).on('click', '.edit-btn.rao-edit-btn', function () {
              // Retrieve data attributes from the clicked edit button
              const id = $(this).data('id');
              const date = $(this).data('date');
              const name = $(this).data('name');
              const gender = $(this).data('gender');
              const amount = $(this).data('amount');

              // Populate the Edit Cedula Transaction modal fields
              $('#editRaoProgramId').val(id);
              $('#editRaoDate').val(date);
              $('#editRaoName').val(name);
              $('#editRaoGender').val(gender);
              $('#editRaoAmount').val(amount);

              // Show the Edit Cedula Transaction modal
              $('#editRaoProgramModal').modal('show');
          });   

        // Handle Cedula Transaction Edit form submission
        $('#editRaoProgramForm').on('submit', function (event) {
            event.preventDefault();

            // Retrieve form data
            const id = $('#editRaoProgramId').val();
            const date = $('#editRaoDate').val();
            const name = $('#editRaoName').val();
            const gender = $('#editRaoGender').val();
            const amount = $('#editRaoAmount').val();

            // AJAX request to update the Cedula transaction
            $.ajax({
                url: 'mysql/edit_cedula_transaction.php', // Update endpoint
                type: 'POST',
                data: {
                    id: id,
                    date: date,
                    name: name,
                    gender: gender,
                    amount: amount,
                },
                success: function (response) {
                    console.log('Cedula Transaction Updated:', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Cedula transaction updated successfully',
                    }).then(() => {
                        // Reset the form and close the modal
                        $('#editRaoProgramForm')[0].reset();
                        $('#editRaoProgramModal').modal('hide');
                        fetchCedulaTransaction(); // Refresh the table data
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error updating Cedula Transaction:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update Cedula transaction. Please try again.',
                    });
                },
            });
        });

        // 🟢 Filter transactions based on the search input
        $('#searchRaoProgram').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#cedula-transaction tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });

    // 🟢 Fetch RAO Programs from the server
    function fetchCedulaTransaction() {
        $.ajax({
            url: 'mysql/fetch_cedula_transaction.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#cedula-transaction tbody");
                tbody.empty();

                if (data.length > 0) {
                    data.forEach(cedula_transaction => {
                        let row = `
                            <tr>
                                <td>${new Date(cedula_transaction.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: '2-digit' })}</td>
                                <td>${cedula_transaction.name || 'N/A'}</td>
                                <td>${cedula_transaction.gender || 'N/A'}</td>
                                <td>₱${cedula_transaction.amount !== null && cedula_transaction.amount !== undefined ? parseFloat(cedula_transaction.amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A'}</td>
                                <td>${cedula_transaction.amount || 'N/A'}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn rao-edit-btn"
                                      data-id="${cedula_transaction.id}"
                                      data-date="${cedula_transaction.date}"
                                      data-name="${cedula_transaction.name}"
                                      data-gender="${cedula_transaction.gender}"
                                      data-amount="${cedula_transaction.amount}">
                                      <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" onclick="confirmDeleteTransaction(${cedula_transaction.id});"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="6" class="text-center">No transactions found.</td></tr>`); // Update to colspan="6" to match column count
                }
            },
            error: function (xhr, status, error) {
                console.error("An error occurred while fetching transactions: ", error);
                // Optionally handle error display
            }
        });
    }

    // 🟢 Confirm & Delete RAO Program
    function confirmDeleteTransaction(programId) {
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
                $.post("mysql/delete_cedula_transaction.php", { id: programId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success");
                    fetchCedulaTransaction();
                }, "json");
            }
        });
    }
</script>
  </body>
</html>