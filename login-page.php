<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Bulatok - Login</title>
    <!-- Favicons -->
    <link href="assets/img/brgylogo.png" rel="icon">
    <link href="assets/img/brgylogo.png" rel="apple-touch-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="main/assets/css/vendors/flag-icon.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="main/assets/css/iconly-icon.css">
    <link rel="stylesheet" href="main/assets/css/bulk-style.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="main/assets/css/themify.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="main/assets/css/fontawesome-min.css">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="main/assets/css/vendors/weather-icons/weather-icons.min.css">
    <!-- App css -->
    <link rel="stylesheet" href="main/assets/css/style.css">
    <link id="color" rel="stylesheet" href="main/assets/css/color-1.css" media="screen">
  </head>
  <style>
    .login-dark {
        background: url('assets/img/officialshmpg.png') no-repeat center center;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
  </style>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div class="login-main"> 
                <form class="theme-form" id="loginForm">
                  <h2 class="text-center">Sign in to account</h2>
                  <p class="text-center">Enter your username &amp; password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input class="form-control" type="text" id="username" required placeholder="username">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" id="password" name="login[password]" required placeholder="password">
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="text-end mt-3">
                      <button class="btn btn-danger btn-block w-100" id="loginButton" type="submit">Sign in</button>
                    </div>
                  </div>
                  <div class="login-social-title">
                    <h6><a href="index.php">Go back to Home Page</a></h6>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- jquery-->
      <script src="main/assets/js/vendors/jquery/jquery.min.js"></script>
      <!-- bootstrap js-->
      <script src="main/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
      <script src="main/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
      <!--fontawesome-->
      <script src="main/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
      <!-- password_show-->
      <script src="main/assets/js/password.js"></script>
      <!-- custom script -->
      <script src="main/assets/js/script.js"></script>
      <!-- Sweetalert js-->
      <script src="main/assets/js/sweetalert/sweetalert2.min.js"></script>
      <script>
          document.getElementById("loginForm").addEventListener("submit", function(event) {
              event.preventDefault(); // Prevent default form submission

              let username = document.getElementById("username").value;
              let password = document.getElementById("password").value;
              let loginButton = document.getElementById("loginButton");

              // Change the login button text to "Logging in..."
              loginButton.textContent = "Logging in...";
              loginButton.disabled = true; // Disable the button to prevent multiple submissions

              fetch("main/template/mysql/login.php", {
                  method: "POST",
                  headers: { "Content-Type": "application/x-www-form-urlencoded" },
                  body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status === "success") {
                      // Redirect to dashboard on successful login
                      window.location.href = "./main/template/dashboard.php";
                  } else {
                      // Reset button text and re-enable it
                      loginButton.textContent = "Sign in";
                      loginButton.disabled = false;

                      // Show error message
                      Swal.fire({
                          icon: "error",
                          title: "Login Failed",
                          text: data.message
                      });
                  }
              })
              .catch(() => {
                  // Reset button text and re-enable it
                  loginButton.textContent = "Sign in";
                  loginButton.disabled = false;

                  Swal.fire("Error!", "Something went wrong. Please try again.", "error");
              });
          });
      </script>
    </div>
  </body>
</html>