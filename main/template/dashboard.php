<?php
// Include the script to check cookies
include 'structure/check_cookies.php';

// Decode the JSON-encoded cookie value
$brgyData = json_decode($_COOKIE['brgy'], true);

// Check if 'full_name' exists in the decoded data
$firstName = "Guest"; // Default value if no cookie or first_name is found
if (isset($_COOKIE['brgy'])) {
    $brgyData = json_decode($_COOKIE['brgy'], true);
    if (isset($brgyData['full_name'])) {
        // Trim and extract the first value from full_name as first_name
        $firstName = explode(' ', trim($brgyData['full_name']))[0];
    }
}
?>
<!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities."/>
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app"/>
    <meta name="author" content="pixelstrap"/>
    <title>Bulatok - Dashboard</title>
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
    <!-- <link rel="stylesheet" href="../assets/css/themify.css"/> -->
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
                <div class="col-sm-6 col-12"> 
                  <h2>Dashboard</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xl-12 col-sm-12 box-col-12">
                <div class="card welcome-banner">
                  <div class="card-header p-0 card-no-border">
                    <div class="welcome-card"><img class="w-100 img-fluid" src="../assets/images/dashboard-1/welcome-bg.png" alt=""/><img class="position-absolute img-1 img-fluid" src="../assets/images/dashboard-1/img-1.png" alt=""/><img class="position-absolute img-2 img-fluid" src="../assets/images/dashboard-1/img-2.png" alt=""/><img class="position-absolute img-3 img-fluid" src="../assets/images/dashboard-1/img-3.png" alt=""/><img class="position-absolute img-4 img-fluid" src="../assets/images/dashboard-1/img-4.png" alt=""/><img class="position-absolute img-5 img-fluid" src="../assets/images/dashboard-1/img-5.png" alt=""/></div>
                  </div>
                  <div class="card-body">
                      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                          <div class="d-flex align-items-center">
                              <h1 class="mb-0">
                                  Hello, <?php echo htmlspecialchars($firstName); ?>
                                  <img src="../assets/images/dashboard-1/hand.png" alt=""/>
                              </h1>
                          </div>
                          <p class="mb-0 ms-md-3">Welcome back! Let’s start from where you left.</p>
                          <span id="currentDateTime" class="d-flex align-items-center ms-md-3">
                              <span class="ms-1">Loading...</span>
                          </span>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                  <div class="card growthcard">
                      <div class="card-header card-no-border pb-0">
                      <div class="header-top">
                        <h3>Cedula Transactions Reports</h3>
                        <div class="filter-controls">
                          <div class="input-group">
                            <input type="month" name="month_year" id="CedulamonthPicker" class="form-control">
                            <div class="input-group-append">
                              <button onclick="resetCedulaMonthPicker()" class="btn btn-primary">Reset</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="card-body pb-0">
                          <div id="cedula-chart"></div>
                      </div>
                  </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card growthcard">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Income Reports</h3>
                      <div class="filter-controls">
                          <div class="input-group">
                            <input type="month" name="month_year" id="IncomemonthPicker" class="form-control">
                            <div class="input-group-append">
                              <button onclick="resetIncomeMonthPicker()" class="btn btn-primary">Reset</button>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-body pb-0">
                    <div id="income-report-chart"></div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                  <div class="row p-2 m-2">
                    <!-- Title - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                      <h3>Transaction History</h3>
                    </div>
                    
                    <!-- Search box - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6">
                      <input type="text" id="searchTransactions" class="form-control" placeholder="Search transactions...">
                    </div>
                  </div>
                  <div class="card-body transaction-history pt-0">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone" id="transactions" style="width:100%">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Cheque No.</th>
                            <th>Voucher No.</th>
                            <th>Fund</th>
                            <th>Payee</th>
                            <th>Particulars</th>
                            <th>Gross Amount</th>
                            <th>Vat</th>
                            <th>eVat</th>
                            <th>Net Amount</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                  <div class="row p-2 m-2">
                    <!-- Title - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                      <h3>Cedula Transaction History</h3>
                    </div>
                    
                    <!-- Search box - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6">
                      <input type="text" id="searchRaoProgram" class="form-control" placeholder="Search Released Cedula...">
                    </div>
                  </div>
                  <div class="card-body transaction-history pt-0">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="cedula-transaction" style="width:100%">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Amount</th>
                            <th>Date Added</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                  <div class="row p-2 m-2">
                    <!-- Title - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                      <h3>Upcoming Events</h3>
                    </div>
                    
                    <!-- Search box - full width on mobile, half width on larger screens -->
                    <div class="col-12 col-md-6">
                      <input type="text" id="searchEvent" class="form-control" placeholder="Search events...">
                    </div>
                  </div>
                  <div class="card-body transaction-history pt-0">
                    <div class="table-responsive theme-scrollbar">
                      <div class="mb-3 mt-2">
                      </div>
                      <table class="table display table-bordernone">
                          <thead>
                              <tr>
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Start DateTime</th>
                                  <th>End DateTime</th>
                                  <th>Image</th>
                              </tr>
                          </thead>
                          <tbody id="eventsTableBody">
                              <!-- Events will be dynamically inserted here -->
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- VIEW EVENT IMAGE MODAL -->
        <div class="modal fade" id="viewEventImageModal" tabindex="-1" aria-labelledby="viewEventImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewEventImageModalLabel">Event Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="eventImageModalContent" src="" alt="Event Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page header start-->
        <?php include 'structure/footer.php'; ?>
        <!-- Page header end-->
      </div>
    </div>
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
    <!-- chartjs-->
    <script src="../assets/js/chart/chartjs/chart.min.js"></script>
    <!-- page_chartjs-->
    <script src="../assets/js/chart/chartjs/chart.custom.js"></script>
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
        // Fetch events data using AJAX
        $.ajax({
            url: 'mysql/fetch_events.php', // Endpoint for fetching events
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#eventsTableBody"); // Select the table body by ID
                tbody.empty(); // Clear existing table rows

                if (data.status === "success" && data.events && data.events.length > 0) {
                    data.events.forEach(event => {
                        let startDateTime = formatDateTime(event.start); // Format start datetime
                        let endDateTime = formatDateTime(event.end); // Format end datetime

                        let row = `
                            <tr>
                                <td>${event.title}</td>
                                <td>${event.description}</td>
                                <td>${startDateTime}</td>
                                <td>${endDateTime}</td>
                                <td>
                                    <img 
                                        src="mysql/uploads/${event.image}" 
                                        alt="${event.title}" 
                                        class="event-image" 
                                        style="cursor: pointer; width: 30px; height: auto;" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewEventImageModal" 
                                        data-image="mysql/uploads/${event.image}">
                                </td>
                            </tr>`;
                        tbody.append(row); // Append the newly created row to the tbody
                    });
                } else {
                    tbody.append(`<tr><td colspan="5" class="text-center">No events found</td></tr>`);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching events:", error);
                $("#eventsTableBody").append(`<tr><td colspan="5" class="text-center">Error loading events.</td></tr>`);
            }
        });

        // Search functionality
        $("#searchEvent").on("keyup", function () {
            let value = $(this).val().toLowerCase();
            $("#eventsTableBody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });

    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("event-image")) {
            let imageUrl = event.target.getAttribute("data-image");

            // Set the modal image source
            document.getElementById("eventImageModalContent").src = imageUrl;

            // Set the modal title (optional)
            document.getElementById("viewEventImageModalLabel").textContent = "Event Image";
        }
    });

    function formatDateTime(dateTime) {
            return new Date(dateTime).toLocaleString("en-US", {
                month: "long",
                day: "numeric",
                year: "numeric",
                hour: "numeric",
                minute: "numeric",
                hour12: true,
            });
        }

    $(document).ready(function () {
        // Fetch data using AJAX
        $.ajax({
            url: 'mysql/fetch_transaction.php', // Fetch from PHP script
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#transactions tbody");
                tbody.empty(); // Clear existing table rows

                if (data.length > 0) {
                    data.forEach(transaction => {
                        let row = `
                            <tr>
                                <td>${new Date(transaction.date).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: '2-digit'
                                })}</td>
                                <td>${transaction.cheque_no || 'N/A'}</td>
                                <td>${transaction.dv_no || 'N/A'}</td>
                                <td>${transaction.fund || 'N/A'}</td>
                                <td>${transaction.payee || 'N/A'}</td>
                                <td>${transaction.particulars || 'N/A'}</td>
                                <td>₱${transaction.gross_amount ? parseFloat(transaction.gross_amount).toLocaleString('en-PH', {minimumFractionDigits: 2}) : 'N/A'}</td>
                                <td>${transaction.vat ? parseFloat(transaction.vat).toFixed(2) + '%' : 'N/A'}</td>
                                <td>${transaction.evat ? parseFloat(transaction.evat).toFixed(2) + '%' : 'N/A'}</td>
                                <td>₱${transaction.net_amount ? parseFloat(transaction.net_amount).toLocaleString('en-PH', {minimumFractionDigits: 2}) : 'N/A'}</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="10" class="text-center">No transactions found.</td></tr>`);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching transactions:", error);
            }
        });

        // Search functionality
        $("#searchTransactions").on("keyup", function () {
            let value = $(this).val().toLowerCase();
            $("#transactions tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
    </script>

    <script>
      function updateDateTime() {
          const now = new Date();

          // Options for formatting the date and time
          const options = {
              year: "numeric",
              month: "long",
              day: "numeric",
              hour: "2-digit",
              minute: "2-digit",
              second: "2-digit",
              hour12: true,
          };

          // Format date and time
          const formattedDateTime = now.toLocaleString("en-US", options);

          // Update the span with the current date and time
          document.getElementById("currentDateTime").innerHTML = `
              ${formattedDateTime}
          `;
      }

      // Run the function once on page load
      updateDateTime();

      // Update the time every second
      setInterval(updateDateTime, 1000);
  </script>
  <script>
    fetchCedulaTransaction();

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
                                  <td>₱${cedula_transaction.amount ? parseFloat(cedula_transaction.amount).toLocaleString('en-PH', { minimumFractionDigits: 2 }) : 'N/A'}</td>
                                  <td>${new Date(cedula_transaction.date_added).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: '2-digit' })}</td>
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

      $('#searchRaoProgram').on('keyup', function () {
          let searchValue = $(this).val().toLowerCase();
          $('#cedula-transaction tbody tr').filter(function () {
              $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
          });
      });
  </script>
  <script>
  // Function to fetch data with optional month-year filter
  function fetchCedulaAnalytics(monthYear = '') {
      let url = 'mysql/fetch_cedula_analytics.php';
      if (monthYear) {
          url += `?month=${monthYear}`;
      }

      fetch(url)
          .then(response => response.json())
          .then(data => {
              renderChart(data, monthYear);
          })
          .catch(error => console.error('Error fetching data:', error));
  }

  // Format date to 'Mon DD'
  function formatDate(dateString) {
      const options = { month: 'short', day: 'numeric' };
      return new Date(dateString).toLocaleDateString('en-US', options);
  }

  // Generate chart title based on selected month-year
  function generateChartTitle(monthYear) {
      if (!monthYear) {
          // If no month selected, use current month and year
          const now = new Date();
          return `Cedula Transactions for ${now.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      } else {
          // Format the selected month-year (YYYY-MM) to "Month YYYY" format
          const [year, month] = monthYear.split('-');
          const date = new Date(year, month - 1); // Month is 0-indexed in JavaScript Date
          return `Cedula Transactions for ${date.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      }
  }

  function renderChart(data, monthYear) {
      const categories = data.map(item => formatDate(item.transaction_date));
      const seriesData = data.map(item => Number(item.total_amount));
      
      // Generate chart title based on the selected month/year
      const chartTitle = generateChartTitle(monthYear);

      const options = {
          chart: { 
              type: 'bar', 
              height: 350
          },
          title: {
              text: chartTitle,
              align: 'center',
              style: {
                  fontSize: '16px',
                  fontWeight: 'bold'
              }
          },
          series: [{ 
              name: 'Transaction Amount', 
              data: seriesData 
          }],
          xaxis: { 
              categories 
          },
          yaxis: { 
              title: { 
                  text: 'Total Amount Collected' 
              } 
          }
      };

      document.querySelector("#cedula-chart").innerHTML = ''; // Clear previous chart
      const chart = new ApexCharts(document.querySelector("#cedula-chart"), options);
      chart.render();
  }

  // Function to reset the month picker and reload default data
  function resetCedulaMonthPicker() {
      // Clear the month picker input
      document.getElementById('CedulamonthPicker').value = '';
      
      // Fetch data without month filter (default to current month)
      fetchCedulaAnalytics();
      
      // Optional: provide user feedback
      // console.log('Filter reset to current month');
  }

  // Fetch data on page load
  document.addEventListener('DOMContentLoaded', function () {
      fetchCedulaAnalytics();
  });

  // Fetch data when month is changed
  document.getElementById('CedulamonthPicker').addEventListener('change', function () {
      const selectedMonth = this.value; // format: YYYY-MM
      fetchCedulaAnalytics(selectedMonth);
  });
</script>

<script>
  // Function to fetch data with optional month-year filter
  function fetchCedulaAnalytics(monthYear = '') {
      let url = 'mysql/fetch_cedula_analytics.php';
      if (monthYear) {
          url += `?month=${monthYear}`;
      }

      fetch(url)
          .then(response => response.json())
          .then(data => {
              renderChart(data, monthYear);
          })
          .catch(error => console.error('Error fetching data:', error));
  }

  // Format date to 'Mon DD'
  function formatDate(dateString) {
      const options = { month: 'short', day: 'numeric' };
      return new Date(dateString).toLocaleDateString('en-US', options);
  }

  // Generate chart title based on selected month-year
  function generateChartTitle(monthYear) {
      if (!monthYear) {
          // If no month selected, use current month and year
          const now = new Date();
          return `Cedula Transactions for ${now.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      } else {
          // Format the selected month-year (YYYY-MM) to "Month YYYY" format
          const [year, month] = monthYear.split('-');
          const date = new Date(year, month - 1); // Month is 0-indexed in JavaScript Date
          return `Cedula Transactions for ${date.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      }
  }

  function renderChart(data, monthYear) {
      const categories = data.map(item => formatDate(item.transaction_date));
      const seriesData = data.map(item => Number(item.total_amount));
      
      // Generate chart title based on the selected month/year
      const chartTitle = generateChartTitle(monthYear);

      const options = {
          chart: { 
              type: 'bar', 
              height: 350
          },
          title: {
              text: chartTitle,
              align: 'center',
              style: {
                  fontSize: '16px',
                  fontWeight: 'bold'
              }
          },
          series: [{ 
              name: 'Transaction Amount', 
              data: seriesData 
          }],
          xaxis: { 
              categories 
          },
          yaxis: {
              title: {
                  text: 'Total Amount Collected',
              },
              labels: {
                  formatter: function(value) {
                      return '₱' + value.toLocaleString('en-PH');
                  }
              }
          }
      };

      document.querySelector("#cedula-chart").innerHTML = ''; // Clear previous chart
      const chart = new ApexCharts(document.querySelector("#cedula-chart"), options);
      chart.render();
  }

  // Function to reset the month picker and reload default data
  function resetCedulaMonthPicker() {
      // Clear the month picker input
      document.getElementById('CedulamonthPicker').value = '';
      
      // Fetch data without month filter (default to current month)
      fetchCedulaAnalytics();
      
      // Optional: provide user feedback
      console.log('Filter reset to current month');
  }

  // Fetch data on page load
  document.addEventListener('DOMContentLoaded', function () {
      fetchCedulaAnalytics();
  });

  // Fetch data when month is changed
  document.getElementById('CedulamonthPicker').addEventListener('change', function () {
      const selectedMonth = this.value; // format: YYYY-MM
      fetchCedulaAnalytics(selectedMonth);
  });
</script>
  <script>
  // Function to fetch data with optional month-year filter
  function fetchIncomeReportAnalytics(monthYear = '') {
      let url = 'mysql/fetch_income_reports_analytics.php';
      if (monthYear) {
          url += `?month=${monthYear}`;
      }

      fetch(url)
          .then(response => response.json())
          .then(data => {
              renderIncomeReportChart(data, monthYear);
          })
          .catch(error => console.error('Error fetching income report data:', error));
  }

  // Format date to 'Mon DD'
  function formatDate(dateString) {
      const options = { month: 'short', day: 'numeric' };
      return new Date(dateString).toLocaleDateString('en-US', options);
  }

  // Generate chart title based on selected month-year
  function generateIncomeReportTitle(monthYear) {
      if (!monthYear) {
          // If no month selected, use current month and year
          const now = new Date();
          return `Income Reports for ${now.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      } else {
          // Format the selected month-year (YYYY-MM) to "Month YYYY" format
          const [year, month] = monthYear.split('-');
          const date = new Date(year, month - 1); // Month is 0-indexed in JavaScript Date
          return `Income Reports for ${date.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
      }
  }

  // Function to render the Apex chart for income reports
  function renderIncomeReportChart(data, monthYear) {
      const categories = data.map(item => formatDate(item.transaction_date));
      const seriesData = data.map(item => Number(item.total_amount));
      
      // Generate chart title based on the selected month/year
      const chartTitle = generateIncomeReportTitle(monthYear);

      document.querySelector("#income-report-chart").innerHTML = ''; // Clear previous chart

      const options = {
          chart: { 
              type: 'bar', 
              height: 350
          },
          title: {
              text: chartTitle,
              align: 'center',
              style: {
                  fontSize: '16px',
                  fontWeight: 'bold'
              }
          },
          series: [{ 
              name: 'Income Amount', 
              data: seriesData 
          }],
          xaxis: { 
              categories 
          },
          yaxis: {
              title: {
                  text: 'Total Amount Collected',
              },
              labels: {
                  formatter: function(value) {
                      return '₱' + value.toLocaleString('en-PH');
                  }
              }
          }
      };

      const chart = new ApexCharts(document.querySelector("#income-report-chart"), options);
      chart.render();
  }
  
  // Function to reset the month picker and reload default data
  function resetIncomeMonthPicker() {
      // Clear the month picker input
      document.getElementById('IncomemonthPicker').value = '';
      
      // Fetch data without month filter (default to current month)
      fetchIncomeReportAnalytics();
      
      // Optional: provide user feedback
      // console.log('Income Reports filter reset to current month');
  }

  // Initialize everything when the DOM is loaded
  document.addEventListener('DOMContentLoaded', function () {
      // Initial data load
      fetchIncomeReportAnalytics();
      
      // Set up event listener for month picker changes
      document.getElementById('IncomemonthPicker').addEventListener('change', function () {
          const selectedMonth = this.value; // format: YYYY-MM
          fetchIncomeReportAnalytics(selectedMonth);
      });
  });
</script>
  </body>
</html>