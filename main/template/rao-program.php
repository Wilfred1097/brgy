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
    <title>Bulatok - Rao Program</title>
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
                  <h2>RAO/Sub Program</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal for RAO Program -->
          <div class="modal fade" id="addRaoProgramModal" tabindex="-1" aria-labelledby="addRaoProgramModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addRaoProgramModalLabel">RAO Program</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row"> <!-- Bootstrap Grid Row -->
                    <!-- RAO Program Form-->
                    <div class="col-md-12">
                      <form id="raoProgramForm">
                        <h4 class="fw-bolder mb-3">RAO Program</h4>
                        <div class="mb-3">
                          <label for="raoYear" class="form-label">Year</label>
                          <select class="form-control" id="raoYear" required>
                            <option value="" disabled selected>Select Year</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="raoProgramName" class="form-label">Program Name</label>
                          <input type="text" class="form-control" id="raoProgramName" placeholder="Enter program name" required>
                        </div>
                        <div class="mb-3">
                          <label for="raoAmount" class="form-label">Amount</label>
                          <input type="number" class="form-control" id="raoAmount" placeholder="Enter amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-4">Submit RAO Program</button>
                      </form>
                    </div>
                  </div> <!-- End of row -->
                </div>
              </div>
            </div>
          </div>

          <!-- Modal for Sub Program -->
          <div class="modal fade" id="addSubProgramModal" tabindex="-1" aria-labelledby="addSubProgramModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addSubProgramModalLabel">Sub Program</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <!-- Sub Program Form (Right Side) -->
                    <div class="col-md-12">
                      <form id="subProgramForm">
                        <h4 class="fw-bolder mb-3">Sub Program</h4>
                        <div class="mb-3">
                          <label for="raoProgramSelect" class="form-label">Select RAO Program</label>
                          <select class="form-control" id="raoProgramSelect" required>
                            <!-- Options will be populated dynamically -->
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="subProgramName" class="form-label">Program Name</label>
                          <input type="text" class="form-control" id="subProgramName" placeholder="Enter program name" required>
                        </div>
                        <div class="mb-3">
                          <label for="subAmount" class="form-label">Amount</label>
                          <input type="number" class="form-control" id="subAmount" placeholder="Enter amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit Sub Program</button>
                      </form>
                    </div>
                  </div> <!-- End of row -->
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Modal for RAO Program -->
          <div class="modal fade" id="editRaoProgramModal" tabindex="-1" aria-labelledby="editRaoProgramModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editRaoProgramModalLabel">Edit RAO Program</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row"> <!-- Bootstrap Grid Row -->
                    <!-- Edit RAO Program Form-->
                    <div class="col-md-12">
                      <form id="editRaoProgramForm">
                        <!-- <h4 class="fw-bolder mb-3">Edit RAO Program</h4> -->
                        <input type="hidden" id="editRaoProgramId">
                        <div class="mb-3">
                          <label for="editRaoYear" class="form-label">Year</label>
                          <select class="form-control" id="editRaoYear" required>
                            <option value="" disabled>Select Year</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="editRaoProgramName" class="form-label">Program Name</label>
                          <input type="text" class="form-control" id="editRaoProgramName" placeholder="Enter program name" required>
                        </div>
                        <div class="mb-3">
                          <label for="editRaoAmount" class="form-label">Amount</label>
                          <input type="number" class="form-control" id="editRaoAmount" placeholder="Enter amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-4">Update RAO Program</button>
                      </form>
                    </div>
                  </div> <!-- End of row -->
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Modal for Sub Program -->
          <div class="modal fade" id="editSubProgramModal" tabindex="-1" aria-labelledby="editSubProgramModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editSubProgramModalLabel">Edit Sub Program</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <!-- Edit Sub Program Form -->
                    <div class="col-md-12">
                      <form id="editSubProgramForm">
                        <input type="hidden" id="editSubProgramId">
                        <div class="mb-3">
                          <label for="editRaoProgramSelect" class="form-label">Select RAO Program</label>
                          <select class="form-control" id="editRaoProgramSelect" required>
                            <!-- Options will be populated dynamically -->
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="editSubProgramName" class="form-label">Program Name</label>
                          <input type="text" class="form-control" id="editSubProgramName" placeholder="Enter program name" required>
                        </div>
                        <div class="mb-3">
                          <label for="editSubAmount" class="form-label">Amount</label>
                          <input type="number" class="form-control" id="editSubAmount" placeholder="Enter amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Sub Program</button>
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
              <div class="col-xxl-6 col-xl-6 proorder-xxl-5 col-md-6 box-col-6">
                <button id="add-rao-program" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRaoProgramModal">Add RAO Program</button>
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                      <h3>RAO Program</h3>
                      <input type="text" id="searchRaoProgram" class="form-control w-25" placeholder="Search RAO Program...">
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="rao-program" style="width:100%">
                        <thead>
                          <tr>
                            <th>Program Name</th>
                            <th>Amount</th>
                            <th>Year</th>
                            <th>Date Added</th>
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

              <div class="col-xxl-6 col-xl-6 proorder-xxl-5 col-md-6 box-col-6">
                <button id="add-sub-program" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSubProgramModal">Add Sub Program</button>
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                      <h3>Sub Program</h3>
                      <input type="text" id="searchSubProgram" class="form-control w-25" placeholder="Search Sub Program...">
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="sub-program" style="width:100%">
                        <thead>
                          <tr>
                            <th>RAO Program</th>
                            <th>Program Name</th>
                            <th>Amount</th>
                            <th>Date Added</th>
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
        fetchRao();
        fetchSub();

        // Handle RAO Program form submission
        document.getElementById('raoProgramForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const year = document.getElementById('raoYear').value;
            const programName = document.getElementById('raoProgramName').value;
            const amount = document.getElementById('raoAmount').value;

            // AJAX request to send data to the server
            $.ajax({
                url: 'mysql/add_rao_program.php',
                type: 'POST',
                data: {
                    year: year,
                    programName: programName,
                    amount: amount
                },
                success: function(response) {
                    console.log('RAO Program Submitted:', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'RAO Program added successfully',
                    }).then(() => {
                        // Reset the form
                        document.getElementById('raoProgramForm').reset();
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting RAO Program:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add RAO Program. Please try again.',
                    });
                }
            });
        });

        // Fetch RAO Programs for the select input in Sub Program modal
        function fetchRaoProgramsForSelect(selectElementId) {
            $.ajax({
                url: 'mysql/fetch_rao_program.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let raoProgramSelect = $(selectElementId);
                    raoProgramSelect.empty();
                    raoProgramSelect.append('<option value="" disabled selected>Select RAO Program</option>');
                    data.forEach(rao_program => {
                        let option = `<option value="${rao_program.id}" data-amount="${rao_program.amount}">${rao_program.name}</option>`;
                        raoProgramSelect.append(option);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching RAO Programs:', error);
                }
            });
        }

        // Call this function when the Sub Program modal is opened
        $('#addSubProgramModal').on('show.bs.modal', function () {
            fetchRaoProgramsForSelect('#raoProgramSelect');
        });

        // Handle Sub Program form submission
        document.getElementById('subProgramForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const raoProgramSelect = document.getElementById('raoProgramSelect');
            const raoProgramId = raoProgramSelect.value;
            const raoProgramAmount = parseFloat(raoProgramSelect.options[raoProgramSelect.selectedIndex].getAttribute('data-amount'));
            const programName = document.getElementById('subProgramName').value;
            const amount = parseFloat(document.getElementById('subAmount').value);

            // Validate the amount
            if (amount > raoProgramAmount) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'The amount for the Sub Program cannot be greater than the selected RAO Program.',
                });
                return; // Stop form submission
            }

            // AJAX request to send data to the server
            $.ajax({
                url: 'mysql/add_sub_program.php',
                type: 'POST',
                data: {
                    raoProgramId: raoProgramId,
                    programName: programName,
                    amount: amount
                },
                success: function (response) {
                    console.log('Sub Program Submitted:', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Sub Program added successfully',
                    }).then(() => {
                        // Reset the form
                        document.getElementById('subProgramForm').reset();
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error submitting Sub Program:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add Sub Program. Please try again.',
                    });
                }
            });
        });

        // Handle RAO Program edit button click
        $(document).on('click', '.edit-btn.rao-edit-btn', function() {
            $('#editRaoProgramId').val($(this).data('id'));
            $('#editRaoProgramName').val($(this).data('name'));
            $('#editRaoYear').val($(this).data('year'));
            $('#editRaoAmount').val($(this).data('amount'));
            $('#editRaoProgramModal').modal('show');
        });

        // Handle Sub Program edit button click
        $(document).on('click', '.edit-btn.sub-edit-btn', function() {
            $('#editSubProgramId').val($(this).data('id'));
            $('#editSubProgramName').val($(this).data('name'));
            $('#editSubAmount').val($(this).data('amount'));
            $('#editRaoProgramSelect').val($(this).data('rao-program-id'));
            $('#editSubProgramModal').modal('show');
            fetchRaoProgramsForSelect('#editRaoProgramSelect');
        });

        // Handle RAO Program edit form submission
        $('#editRaoProgramForm').on('submit', function(event) {
            event.preventDefault();
            const id = $('#editRaoProgramId').val();
            const year = $('#editRaoYear').val();
            const programName = $('#editRaoProgramName').val();
            const amount = $('#editRaoAmount').val();

            $.ajax({
                url: 'mysql/edit_rao_program.php',
                type: 'POST',
                data: { id, year, programName, amount },
                success: function(response) {
                    console.log(response); // Log the response for debugging
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'RAO Program updated successfully',
                    }).then(() => {
                        $('#editRaoProgramForm')[0].reset();
                        $('#editRaoProgramModal').modal('hide');
                        fetchRao();
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log the error response for debugging
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update RAO Program. Please try again.',
                    });
                }
            });
        });

        // Handle Sub Program edit form submission
        $('#editSubProgramForm').on('submit', function(event) {
            event.preventDefault();
            const id = $('#editSubProgramId').val();
            const raoProgramId = $('#editRaoProgramSelect').val();
            const programName = $('#editSubProgramName').val();
            const amount = $('#editSubAmount').val();
            const raoProgramAmount = parseFloat($('#editRaoProgramSelect option:selected').data('amount'));

            // Validate the amount
            if (amount > raoProgramAmount) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'The amount for the Sub Program cannot be greater than the selected RAO Program.',
                });
                return; // Stop form submission
            }

            $.ajax({
                url: 'mysql/edit_sub_program.php',
                type: 'POST',
                data: { id, raoProgramId, programName, amount },
                success: function(response) {
                    console.log(response); // Log the response for debugging
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Sub Program updated successfully',
                    }).then(() => {
                        $('#editSubProgramForm')[0].reset();
                        $('#editSubProgramModal').modal('hide');
                        fetchSub();
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log the error response for debugging
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update Sub Program. Please try again.',
                });
            }
        });
    });

        // 🟢 Filter transactions based on the search input
        $('#searchRaoProgram').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#rao-program tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });

        // 🟢 Filter transactions based on the search input
        $('#searchSubProgram').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#sub-program tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });

    // 🟢 Fetch RAO Programs from the server
    function fetchRao() {
        $.ajax({
            url: 'mysql/fetch_rao_program.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#rao-program tbody");
                tbody.empty();

                if (data.length > 0) {
                    data.forEach(rao_program => {
                        let row = `
                            <tr>
                                <td>${rao_program.name || 'N/A'}</td>
                                <td>₱${rao_program.amount ? parseFloat(rao_program.amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A'}</td>
                                <td>${rao_program.year || 'N/A'}</td>
                                <td>${new Date(rao_program.date_added).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: '2-digit' })}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn rao-edit-btn"
                                      data-id="${rao_program.id}"
                                      data-name="${rao_program.name}"
                                      data-year="${rao_program.year}"
                                      data-amount="${rao_program.amount}">
                                      <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" onclick="confirmDeleteRao(${rao_program.id});"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="5" class="text-center">No programs found.</td></tr>`);
                }
            }
        });
    }

    // 🟢 Fetch Sub Programs from the server
    function fetchSub() {
        $.ajax({
            url: 'mysql/fetch_sub_program.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#sub-program tbody");
                tbody.empty();

                if (data.length > 0) {
                    data.forEach(sub_program => {
                        let row = `
                            <tr>
                                <td>${sub_program.rao_program_name || 'N/A'}</td>
                                <td>${sub_program.name || 'N/A'}</td>
                                <td>₱${sub_program.amount ? parseFloat(sub_program.amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A'}</td>
                                <td>${new Date(sub_program.date_added).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: '2-digit' })}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn sub-edit-btn"
                                      data-id="${sub_program.id}"
                                      data-rao-program-id="${sub_program.rao_program_id}"
                                      data-name="${sub_program.name}"
                                      data-amount="${sub_program.amount}">
                                      <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" onclick="confirmDeleteSub(${sub_program.id});"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="4" class="text-center">No programs found.</td></tr>`);
                }
            }
        });
    }

    // 🟢 Confirm & Delete RAO Program
    function confirmDeleteRao(programId) {
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
                $.post("mysql/delete_rao.php", { id: programId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success");
                    fetchRao();
                }, "json");
            }
        });
    }

    // 🟢 Confirm & Delete Sub Program
    function confirmDeleteSub(programId) {
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
                $.post("mysql/delete_sub.php", { id: programId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success");
                    fetchSub();
                }, "json");
            }
        });
    }
</script>
  </body>
</html>