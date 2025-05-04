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
    <title>Bulatok - User login History</title>
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
                  <h2>User login History</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xxl-12 col-xl-12 proorder-xxl-5 col-md-12 box-col-12">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <h3>User Logs</h3>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="files-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>User Name</th>
                            <th>User Role</th>
                            <th>IP Address</th>
                            <th>City</th>
                            <th>Region</th>
                            <th>Country</th>
                            <th>Device Information</th>
                            <th>Datetime</th>
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

    <!-- jQuery -->
    <script src="../assets/js/vendors/jquery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to fetch files and populate the table

        function formatDate(dateString) {
          const date = new Date(dateString);
          return date.toLocaleString("en-US", {
            month: "short",
            day: "2-digit",
            year: "numeric",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
            hour12: true,
            timeZone: "Asia/Manila"
          });
        }


        function fetchFiles() {
            fetch('mysql/get_logs.php') // Adjust the path if needed
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const filesTableBody = document.querySelector('#files-table tbody');
                        filesTableBody.innerHTML = ''; // Clear the table body

                        // Populate the table rows
                        data.data.forEach(logs => {
                            const row = document.createElement('tr');
                            const formattedDate = formatDate(logs.login_time);
                            row.innerHTML = `
                                <td>${logs.first_name} ${logs.middle_name} ${logs.last_name}</td>
                                <td>${logs.role.charAt(0).toUpperCase() + logs.role.slice(1)}</td>
                                <td>${logs.ip_address}</td>
                                <td>${logs.city}</td>
                                <td>${logs.region}</td>
                                <td>${logs.country}</td>
                                <td>${logs.device_info}</td>
                                <td>${formattedDate}</td>
                            `;
                            filesTableBody.appendChild(row);
                        });
                    } else {
                        console.error('Failed to fetch files:', data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error fetching files:', error);
                });
        }

        // Call fetchFiles to load the files when the page is loaded
        document.addEventListener('DOMContentLoaded', fetchFiles);
    </script>
  </body>
</html>