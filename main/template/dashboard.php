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
                                  Hello, Wil Fred
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
             <!--  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card growthcard">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Monthly Revenue Growth</h3>
                      <ul class="simple-wrapper nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#yearly" role="tab" aria-selected="true">Yearly</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-tabs" data-bs-toggle="tab" href="#monthly" role="tab" aria-selected="false">Monthly</a></li>
                        <li class="nav-item"><a class="nav-link active" id="contact-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-selected="false">Weekly</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body pb-0">
                    <div id="growth-chart"></div>
                  </div>
                </div>
              </div> -->
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                      <h3>Transaction History</h3>
                      <input type="text" id="searchTransactions" class="form-control w-25" placeholder="Search transactions...">
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
                  <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                      <h3>Upcoming Events</h3>
                      <input type="text" id="searchEvent" class="form-control w-25" placeholder="Search events...">
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
        <!--       <div class="col-xxl-6 col-xl-6 proorder-xxl-2 col-sm-12">
                <div class="card earning-card">
                  <div class="card-header pb-0 card-no-border">
                    <div class="header-top">
                      <h3>Earnings Trend </h3>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown3" type="button" data-bs-toggle="dropdown" aria-expanded="false">Monthly</button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown3"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-0">
                    <div class="d-flex align-center gap-3">
                      <h2>$4,875</h2><span class="text-primary">
                         36.28%
                        <svg class="stroke-icon stroke-primary">
                          <use href="../assets/svg/icon-sprite.svg#arrow-down"></use>
                        </svg></span>
                    </div>
                    <div id="earnings-chart"></div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-xxl-6 col-xl-6 proorder-xxl-7 col-lg-12 box-col-12">
                <div class="card job-card">
                  <div class="card-header pb-0 card-no-border">
                    <div class="header-top">
                      <h3>Job Today</h3>
                      <div>  
                        <p>Wednesday 6, <span>Dec 2022</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-2">
                    <ul class="d-flex align-center justify-content-center gap-3"> 
                      <li>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0 bg-light-primary">
                            <svg class="stroke-icon">
                              <use href="../assets/svg/icon-sprite.svg#job-bag"></use>
                            </svg>
                          </div>
                          <div class="flex-grow-1"> 
                            <h3>40</h3>
                            <p>Total Jobs </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0 bg-light-secondary">
                            <svg class="stroke-icon">
                              <use href="../assets/svg/icon-sprite.svg#employees"></use>
                            </svg>
                          </div>
                          <div class="flex-grow-1"> 
                            <h3>30</h3>
                            <p>Employees</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0 bg-light-warning">
                            <svg class="stroke-icon">
                              <use href="../assets/svg/icon-sprite.svg#hours-work"></use>
                            </svg>
                          </div>
                          <div class="flex-grow-1"> 
                            <h3>40</h3>
                            <p>Hours of work</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display" style="width:100%">
                        <thead>
                          <tr> 
                            <th>Time </th>
                            <th>Job </th>
                            <th>Company</th>
                            <th class="text-center">Employee </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>10:AM</td>
                            <td>Maintenace</td>
                            <td>Apple Inc.</td>
                            <td> 
                              <div class="d-flex align-items-center gap-2">
                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-1/user/1.png" alt=""/></div>
                                <div class="flex-grow-1">
                                  <h6>Michele Ronaldo</h6>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>07:AM</td>
                            <td>General</td>
                            <td>Hewlett packard</td>
                            <td> 
                              <div class="d-flex align-items-center gap-2">
                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-1/user/2.png" alt=""/></div>
                                <div class="flex-grow-1">
                                  <h6>Naomi watson</h6>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>03:AM</td>
                            <td>Cleaning</td>
                            <td>Microsoft</td>
                            <td> 
                              <div class="d-flex align-items-center gap-2">
                                <div class="flex-shrink-0"><img src="../assets/images/dashboard-1/user/3.png" alt=""/></div>
                                <div class="flex-grow-1">
                                  <h6>Dann Petty</h6>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> -->

              <!-- <div class="col-xxl-3 col-xl-4 proorder-xxl-9 col-md-6 box-col-5">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Audit log</h3>
                      <div class="dropdown icon-dropdown">
                        <button class="btn" id="userdropdown4" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body audit-log"> 
                    <ul> 
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-success"><img src="../assets/images/dashboard-1/icon/checked.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>Route P204_salesfores created</h6></a>
                          <p>Andre Sluczka</p>
                        </div><span>2 hours</span>
                      </li>
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-warning"><img src="../assets/images/dashboard-1/icon/danger.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>R304_salesforece undeployed</h6></a>
                          <p>Fabian Beliza</p>
                        </div><span>4 hours </span>
                      </li>
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-danger"><img src="../assets/images/dashboard-1/icon/cancel.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>R304_salesforece failed...</h6></a>
                          <p>Michael Ganatra</p>
                        </div><span>10 Jun</span>
                      </li>
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-success"><img src="../assets/images/dashboard-1/icon/checked.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>New environment DEV created</h6></a>
                          <p>Wade Warren</p>
                        </div><span>22 Jun </span>
                      </li>
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-success"><img src="../assets/images/dashboard-1/icon/checked.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>Project salesforce created</h6></a>
                          <p>Bessie Cooper</p>
                        </div><span>10 july </span>
                      </li>
                      <li class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 bg-warning"><img src="../assets/images/dashboard-1/icon/danger.png" alt=""/></div>
                        <div class="flex-grow-1"><a href="product-page.php">
                            <h6>G202_Salesforce undeployed</h6></a>
                          <p>Andre Sluczka</p>
                        </div><span>22 Jun </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
        <!--       <div class="col-xxl-3 col-xl-4 proorder-xxl-3 col-md-6">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Total Investment</h3>
                      <div class="dropdown icon-dropdown">
                        <button class="btn" id="userdropdown5" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown5"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body investment-card">
                    <div id="investment"></div>
                    <ul class="d-flex align-center justify-content-center">
                      <li class="text-center">
                        <p class="mb-0">Total</p>
                        <h6>$45,9760</h6>
                      </li>
                      <li class="text-center">
                        <p class="mb-0">Monthly</p>
                        <h6>$12,263</h6>
                      </li>
                      <li class="text-center">
                        <p class="mb-0">Daily</p>
                        <h6>$32600</h6>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->


              <!-- <div class="col-xxl-4 col-xl-5 proorder-xxl-4 col-md-6">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Top Users</h3>
                      <div class="dropdown icon-dropdown">
                        <button class="btn" id="userdropdown7" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body top-user pt-2">
                    <ul>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/01.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Alice Goodwin</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-success border-light-success text-success">Completed</button><span>$250.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/02.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Smith Lovell</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-success border-light-success text-success">Completed</button><span>$682.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/03.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Jones Brooks</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-warning border-light-warning text-warning">Pending</button><span>$387.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/04.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Brown Acum</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-danger border-light-danger text-danger">Canceled</button><span>$355.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/05.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Evans Mayo</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-success border-light-success text-success">Completed</button><span>$584.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/06.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Wilson Pipes</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-success border-light-success text-success">Completed</button><span>$954.00</span>
                      </li>
                      <li class="d-flex align-items-center justify-content-between gap-2"> 
                        <div class="d-flex gap-2">
                          <div class="flex-shrink-0 comman-round"><img src="../assets/images/dashboard-1/user/07.png" alt=""/></div>
                          <div><a href="#"> 
                              <h6>Alice Pindar</h6></a>
                            <p> 
                              <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#map-icon"></use>
                              </svg>Texas
                            </p>
                          </div>
                        </div>
                        <button class="btn bg-light-danger border-light-danger text-danger">Canceled</button><span>$756.00</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
           <!--    <div class="col-xxl-4 col-xl-4 proorder-xxl-10 col-md-6">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>News & Update</h3>
                      <div class="dropdown icon-dropdown">
                        <button class="btn" id="userdropdown8" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body news-update"> 
                    <ul> 
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/1.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Google project apply reviwe</h6></a>
                          <p class="text-truncate">Today’s news headlines,Breaking...</p>
                        </div><span>2 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/2.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Business logo create</h6></a>
                          <p class="text-truncate">check out the latest news from...</p>
                        </div><span>4 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/3.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Business project research</h6></a>
                          <p class="text-truncate">News in english: get all Breaking...</p>
                        </div><span>6 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/4.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Recruitment in it Department</h6></a>
                          <p class="text-truncate">Technology and indian business</p>
                        </div><span>8 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/5.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Business project research</h6></a>
                          <p class="text-truncate">Contributions private repositories</p>
                        </div><span>1 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/6.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Submit riverfront project</h6></a>
                          <p class="text-truncate">check out the latest news from...</p>
                        </div><span>3 hours</span>
                      </li>
                      <li class="d-flex gap-2"> 
                        <div class="flex-shrink-0"><img class="img-fluid" src="../assets/images/dashboard-1/news-update/7.png" alt=""/></div>
                        <div class="flex-grow-1"> <a href="private-chat.php">
                            <h6>Added new work</h6></a>
                          <p class="text-truncate">Today’s news headlines,Breaking...</p>
                        </div><span>5 hours</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
       <!--        <div class="col-xxl-4 col-xl-4 proorder-xxl-11 col-md-6">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h3>Total Invest</h3>
                      <div class="dropdown icon-dropdown">
                        <button class="btn" id="userdropdown1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown1"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body total-invest">
                    <div class="row"> 
                      <div class="col-6 col-md-12 income-chart">
                        <div class="Incomechrt" id="Incomechrt"></div>
                      </div>
                      <div class="col-6 col-md-12 invest-content text-center">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#chart-invest"></use>
                        </svg>
                        <div class="btn btn-pill btn-primary"> <span> </span>Live</div>
                        <p class="mb-0 des-title">This Invest Cycle</p>
                        <h3>7,48,000</h3>
                        <p class="description-title">Current Balance this invest cycle</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
           <!--    <div class="col-xxl-12 col-xl-12 col-md-12">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <h3>Manage Invoice</h3>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="manage-invoice" style="width:100%">
                        <thead>
                          <tr> 
                            <th>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid" type="checkbox"/>
                                <label class="form-check-label" for="solid"> </label>
                              </div>
                            </th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Id No</th>
                            <th>Amount</th>
                            <th class="text-center">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid1" type="checkbox"/>
                                <label class="form-check-label" for="solid1"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Comelune</h6></a></td>
                            <td>
                              <p class="f-w-600">27 Nov</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Private</h6>
                            </td>
                            <td>
                              <p class="f-w-600">9605</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$2,500</h6>
                            </td>
                            <td class="text-end">
                              <div class="btn bg-light-success border-light-success text-success">Completed  </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid2" type="checkbox" checked=""/>
                                <label class="form-check-label" for="solid2"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Diagnos</h6></a></td>
                            <td>
                              <p class="f-w-600">30 Nov</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Bill Payment</h6>
                            </td>
                            <td>
                              <p class="f-w-600">9548</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$4,560</h6>
                            </td>
                            <td class="text-end">
                              <div class="btn bg-light-success border-light-success text-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid3" type="checkbox"/>
                                <label class="form-check-label" for="solid3"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Saturan</h6></a></td>
                            <td>
                              <p class="f-w-600">27 Jun</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Bill Payment</h6>
                            </td>
                            <td>
                              <p class="f-w-600">2950</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$4,876</h6>
                            </td>
                            <td class="text-end">
                              <div class="btn bg-light-warning border-light-warning text-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid4" type="checkbox" checked=""/>
                                <label class="form-check-label" for="solid4"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Williams</h6></a></td>
                            <td>
                              <p class="f-w-600">16 Dec</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Private</h6>
                            </td>
                            <td>
                              <p class="f-w-600">1552</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$3,876</h6>
                            </td>
                            <td class="text-end">
                              <div class="btn bg-light-danger border-light-danger text-danger">Canceled</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid5" type="checkbox" checked=""/>
                                <label class="form-check-label" for="solid5"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Davies</h6></a></td>
                            <td>
                              <p class="f-w-600">10 Nov</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Bill Payment</h6>
                            </td>
                            <td>
                              <p class="f-w-600">9567</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$2,986</h6>
                            </td>
                            <td class="text-end">
                              <div class="btn bg-light-success border-light-success text-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check checkbox checkbox-solid-primary">
                                <input class="form-check-input" id="solid6" type="checkbox"/>
                                <label class="form-check-label" for="solid6"> </label>
                              </div>
                            </td>
                            <td><a href="list-products.php">
                                <h6 class="f-w-600">Smith</h6></a></td>
                            <td> 
                              <p class="f-w-600">30 Nov</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">Private</h6>
                            </td>
                            <td> 
                              <p class="f-w-600">8992</p>
                            </td>
                            <td>
                              <h6 class="f-w-600">$6,789</h6>
                            </td>
                            <td class="text-end"> 
                              <div class="btn bg-light-success border-light-success text-success">Completed</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
                                <a href="mysql/uploads/${event.image}" target="_blank">
                                    <img src="mysql/uploads/${event.image}" alt="${event.title}" class="event-image" style="cursor: pointer; width: 30px; height: auto;">
                                </a>
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
              <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#watch"></use>
              </svg>
              ${formattedDateTime}
          `;
      }

      // Run the function once on page load
      updateDateTime();

      // Update the time every second
      setInterval(updateDateTime, 1000);
  </script>
  </body>
</html>