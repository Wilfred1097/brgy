<header class="page-header row">
  <div class="logo-wrapper d-flex align-items-center col-auto"><a href="dashboard.php"><img class="light-logo img-fluid" src="../assets/images/logo/bulatok-clear.png" alt="logo"/><img class="dark-logo img-fluid" src="../assets/images/logo/bulatok-dark.png" alt="logo"/></a><a class="close-btn toggle-sidebar" href="javascript:void(0)">
      <svg class="svg-color">
        <use href="../assets/svg/iconly-sprite.svg#Category"></use>
      </svg></a></div>
  <div class="page-main-header col">
    <div class="header-left">
    </div>
    <div class="nav-right">
      <ul class="header-right">
        <li class="search d-lg-none d-flex"> <a href="javascript:void(0)">
            <svg>
            </svg></a></li>
        <li>  <a class="dark-mode" href="javascript:void(0)">
            <svg>
              <use href="../assets/svg/iconly-sprite.svg#moondark"></use>
            </svg></a></li>
        <li class="profile-nav custom-dropdown">
          <div class="user-wrap">
            <div class="user-img"><img src="../assets/images/profile.png" alt="user"/></div>
            <div class="user-content">
              <h6>Wil Fred</h6>
              <p class="mb-0">Admin<i class="fa-solid fa-chevron-down"></i></p>
            </div>
          </div>
          <div class="custom-menu overflow-hidden">
            <ul class="profile-body">
              <li class="d-flex">
                <svg class="svg-color">
                  <use href="../assets/svg/iconly-sprite.svg#Profile"></use>
                </svg><a class="ms-2" href="user-profile.php">Account</a>
              </li>
              <li class="d-flex">
                <svg class="svg-color">
                  <use href="../assets/svg/iconly-sprite.svg#Login"></use>
                </svg><a class="ms-2" href="./mysql/logout.php">Log Out</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<script>
  document.addEventListener("DOMContentLoaded", function () {
      // Function to get cookie by name
      function getCookie(name) {
          let cookies = document.cookie.split("; ");
          for (let cookie of cookies) {
              let [key, value] = cookie.split("=");
              if (key === name) {
                  return decodeURIComponent(value);
              }
          }
          return null;
      }

      // Fetch "brgy" cookie and parse JSON data
      let userData = getCookie("brgy");
      if (userData) {
          let user = JSON.parse(userData);

          // Ensure image path has "./" before it
          let imagePath = user.image_path ? `./mysql/${user.image_path}` : "./mysql/uploads/profile/unkown.jpg";

          const roleDisplay = user.role === "treasurer" ? "Treasurer" :
                    user.role === "encoder" ? "Encoder" :
                    user.role || "User";

          // Update user profile elements
          document.querySelector(".user-img img").src = imagePath; // Default image if none
          document.querySelector(".user-content h6").textContent = user.full_name;
          document.querySelector(".user-content p").textContent = roleDisplay; // Default role if none
      }
  });
</script>