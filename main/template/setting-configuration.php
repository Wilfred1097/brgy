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
    <title>Bulatok - Transaction</title>
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
                  <h2>Settings Configuration</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Settings Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Edit Barangay Details</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="" id="editSettingsForm">
                              <input type="hidden" id="edit_id" name="id" value="1">

                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="edit_barangay_name" class="form-label">Barangay Name:</label>
                                      <input type="text" class="form-control" id="edit_barangay_name" name="barangay_name" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="edit_barangay_captain" class="form-label">Barangay Captain:</label>
                                      <input type="text" class="form-control" id="edit_barangay_captain" name="barangay_captain" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                <div class="col-md-6">
                                      <label for="edit_barangay_city" class="form-label">Barangay City:</label>
                                      <input type="text" class="form-control" id="edit_barangay_city" name="barangay_city" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="edit_barangay_province" class="form-label">Barangay Province:</label>
                                      <input type="text" class="form-control" id="edit_barangay_province" name="barangay_province" required>
                                  </div>
                              </div>

                              <div class="row mt-2">
                                <div class="col-md-6">
                                      <label for="edit_province_no" class="form-label">Province No.:</label>
                                      <input type="text" class="form-control" id="edit_province_no" name="province_no" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="edit_city_accountant" class="form-label">City Accountant:</label>
                                      <input type="text" class="form-control" id="edit_city_accountant" name="city_accountant" required>
                                  </div>

                              </div>

                              <div class="row mt-2">
                                  <div class="col-md-5">
                                      <label for="edit_barangay_treasurer" class="form-label">Barangay Treasurer:</label>
                                      <input type="text" class="form-control" id="edit_barangay_treasurer" name="barangay_treasurer" required>
                                  </div>
                                  <div class="col-md-5">
                                      <label for="edit_encoder" class="form-label">Encoder:</label>
                                      <input type="text" class="form-control" id="edit_encoder" name="barangay_encoder" required>
                                  </div>
                                  <div class="col-md-2">
                                      <label for="edit_scki" class="form-label">SCKI No.:</label>
                                      <input type="text" class="form-control" id="edit_scki" name="current_scki_no" required>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary mt-3 float-end">
                                  Update Details
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
                      <h3>Settings Table</h3>
                      <!-- <input type="text" id="searchTransactions" class="form-control w-25" placeholder="Search transactions..."> -->
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="settings-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Barangay Name</th>
                            <th>Barangay Captain</th>
                            <th>Barangay City</th>
                            <th>Barangay Province</th>
                            <th>Province No.</th>
                            <th>Barangay Treasurer</th>
                            <th>City Accountant</th>
                            <th>Encoder</th>
                            <th>Current SCKI No.</th>
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
       $(document).ready(function () {
          // Initial fetch on page load
          fetchSettings();

          // 🟢 Handle clicking the edit button
          $(document).on('click', '.edit-btn', function () {
              let row = $(this).closest('tr'); // Get the closest table row

              // Bind table row data to modal inputs
              $('#edit_barangay_name').val(row.find('td:eq(0)').text().trim());
              $('#edit_barangay_captain').val(row.find('td:eq(1)').text().trim());
              $('#edit_barangay_city').val(row.find('td:eq(2)').text().trim());
              $('#edit_barangay_province').val(row.find('td:eq(3)').text().trim());
              $('#edit_province_no').val(row.find('td:eq(4)').text().trim());
              $('#edit_barangay_treasurer').val(row.find('td:eq(5)').text().trim());
              $('#edit_city_accountant').val(row.find('td:eq(6)').text().trim());
              $('#edit_encoder').val(row.find('td:eq(7)').text().trim());
              $('#edit_scki').val(row.find('td:eq(8)').text().trim());

              var editModal = new bootstrap.Modal(document.getElementById('editModal'));
              editModal.show();
          });

          // 🟢 Handle checkbox change for enabling/disabling VAT and EVAT
          $('#edit_vatable').change(function () {
              $('#edit_vat, #edit_evat').prop('disabled', !this.checked);
              if (this.checked) {
                  if (!$('#edit_vat').val()) $('#edit_vat').val('3');
                  if (!$('#edit_evat').val()) $('#edit_evat').val('1');
              } else {
                  $('#edit_vat, #edit_evat').val('');
              }
          });

          // 🟢 Handle form submission for editing transactions
          $('#editSettingsForm').submit(function (event) {
              event.preventDefault();

              let formData = $(this).serializeArray();

              // console.log(formData);

              $.ajax({
                  url: "mysql/update_settings.php",
                  type: "POST",
                  data: formData,
                  success: function (response) {
                      if (response.status === "success") {
                          $('#editModal').modal('hide');
                          Swal.fire({ title: "Success!", text: response.message, icon: "success", timer: 2000, showConfirmButton: true });
                          setTimeout(fetchSettings, 500);
                      } else {
                          Swal.fire({ title: "Error!", text: response.message, icon: "error" });
                      }
                  },
                  error: function () {
                      Swal.fire({ title: "Error!", text: "An error occurred.", icon: "error" });
                  }
              });
          });
      });

      // 🟢 Fetch transactions from the server
      function fetchSettings() {
          $.ajax({
              url: 'mysql/fetch_settings.php',
              type: 'GET',
              dataType: 'json',
              success: function (data) {
                  let tbody = $("#settings-table tbody");
                  tbody.empty();

                  if (data.length > 0) {
                      data.forEach(transaction => {
                          let row = `
                              <tr>
                                  <td>${transaction.barangay_name || 'N/A'}</td>
                                  <td>${transaction.barangay_captain || 'N/A'}</td>
                                  <td>${transaction.barangay_city || 'N/A'}</td>
                                  <td>${transaction.barangay_province || 'N/A'}</td>
                                  <td>${transaction.province_no || 'N/A'}</td>
                                  <td>${transaction.barangay_treasurer || 'N/A'}</td>
                                  <td>${transaction.city_accountant || 'N/A'}</td>
                                  <td>${transaction.barangay_encoder || 'N/A'}</td>
                                  <td>${transaction.current_scki_no || 'N/A'}</td>
                                  <td>
                                      <button class="btn btn-sm btn-primary edit-btn">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                  </td>
                              </tr>
                          `;
                          tbody.append(row);
                      });
                  } else {
                      tbody.append(`<tr><td colspan="8" class="text-center">No transactions found.</td></tr>`);
                  }
              }
          });
      }
  </script>
  </body>
</html>