  <?php include 'structure/check_cookies.php'; ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <title>Bulatok - Profile</title>
      <!-- Favicon icon-->
      <link rel="icon" href="./../../assets/img/brgylogo.png" type="image/x-icon"/>
      <link rel="shortcut icon" href="./../../assets/img/brgylogo.png" type="image/x-icon"/>
      <!-- Google font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
      <!-- Flag icon css -->
      <link rel="stylesheet" href="../assets/css/vendors/flag-icon.css">
      <!-- iconly-icon-->
      <link rel="stylesheet" href="../assets/css/iconly-icon.css">
      <link rel="stylesheet" href="../assets/css/bulk-style.css">
      <!-- iconly-icon-->
      <link rel="stylesheet" href="../assets/css/themify.css">
      <!--fontawesome-->
      <link rel="stylesheet" href="../assets/css/fontawesome-min.css">
      <!-- Whether Icon css-->
      <link rel="stylesheet" type="text/css" href="../assets/css/vendors/weather-icons/weather-icons.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/vendors/photoswipe.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css">
      <!-- App css -->
      <link rel="stylesheet" href="../assets/css/style.css">
      <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
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
          <!-- Page sidebar end-->
          <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-sm-6 col-12"> 
                    <h2>User Profile</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="user-profile">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-6 col-md-8 mt-2">
                           <div class="card hovercard text-center shadow-sm border-0">
                                <div class="user-image p-4">
                                    <div class="avatar">
                                        <img alt="User Image" id="user-image" src="../assets/images/user/7.jpg" class="img-fluid rounded-circle" style="border: 4px solid #007bff;">
                                    </div>
                                </div>
                                <div class="info p-3">
                                    <h4 class="user-name mb-3" id="user-name"></h4>
                                    <div class="ttl-info text-start mb-3">
                                        <h6><i class="fa-solid fa-envelope"></i> Email</h6>
                                        <span class="text-dark" id="user-email"></span>
                                    </div>
                                    <div class="ttl-info text-start mb-3">
                                        <h6><i class="fa-solid fa-calendar"></i> DOB</h6>
                                        <span class="text-dark" id="user-dob"></span>
                                    </div>
                                    <div class="ttl-info text-start mb-3">
                                        <h6><i class="fa-solid fa-user"></i> Role</h6>
                                        <span class="text-dark" id="user-role"></span>
                                    </div>
                                    <div class="ttl-info text-start mb-3">
                                        <h6><i class="fa-solid fa-location-arrow"></i> Location</h6>
                                        <span class="text-dark" id="user-address"></span>
                                    </div>
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
      <!-- scrollbar-->
      <script src="../assets/js/scrollbar/simplebar.js"></script>
      <script src="../assets/js/scrollbar/custom.js"></script>
      <!-- slick-->
      <script src="../assets/js/slick/slick.min.js"></script>
      <script src="../assets/js/slick/slick.js"></script>
      <!-- photo_swipe-->
      <script src="../assets/js/photoswipe/photoswipe.min.js"></script>
      <script src="../assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
      <script src="../assets/js/photoswipe/photoswipe.js"></script>
      <!-- counter-->
      <script src="../assets/js/counter/jquery.waypoints.min.js"></script>
      <script src="../assets/js/counter/jquery.counterup.min.js"></script>
      <script src="../assets/js/counter/counter-custom.js"></script>
      <!-- theme_customizer-->
      <script src="../assets/js/theme-customizer/customizer.js"></script>
      <!-- custom script -->
      <script src="../assets/js/script.js"></script>
      <script>
    // Function to get the value of a specific cookie by name
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Get the `brgy` cookie
    const brgyCookie = getCookie("brgy");

    if (brgyCookie) {
        try {
            // Decode the URL-encoded cookie
            const decodedCookie = decodeURIComponent(brgyCookie);
            
            // Parse the JSON string to an object
            const userData = JSON.parse(decodedCookie);
            
            // Extract the user_id
            const userId = userData.user_id;
            console.log("User ID from brgy cookie:", userId);

            // Send the userId to fetch_user_info.php
            fetch('mysql/fetch_user_info.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ user_id: userId }) // Send user_id as JSON
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('User Information:', data);
                // Check if data is an error
                if (data.error) {
                    console.error(data.error);
                    return;
                }
                
                // Update the HTML with user info
                document.getElementById('user-name').innerText = `${data.first_name} ${data.middle_name ? data.middle_name + ' ' : ''}${data.last_name}`;
                document.getElementById('user-email').innerText = data.gmail || "Not Available"; // Handle undefined email
                // Calculate age from date of birth
                if (data.dob) {
                    const dob = new Date(data.dob);
                    const age = new Date().getFullYear() - dob.getFullYear();
                    const dobString = dob.toLocaleDateString();
                    document.getElementById('user-dob').innerText = `${dobString} - ${age} years old`;
                } else {
                    document.getElementById('user-dob').innerText = "Not Available"; // Handle undefined DOB
                }
                document.getElementById('user-role').innerText = data.role || "Not Available";  // Handle undefined contact
                document.getElementById('user-address').innerText = data.address || "Not Available";  // Handle undefined address
                
                // If you have a field for image path
                if (data.image_path) {
                    document.getElementById('user-image').src = 'mysql/' + data.image_path;
                }
            })
            .catch(error => {
                console.error('Error fetching user info:', error);
            });
        } catch (error) {
            console.error("Failed to parse brgy cookie:", error);
        }
    } else {
        console.log("brgy cookie not found.");
    }
</script>
    </body>
  </html>