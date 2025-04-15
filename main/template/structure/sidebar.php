<?php
// Assume the user's role is stored in a session variable
$userRole = $_SESSION['role'] ?? 'User'; // Default to 'User' if role is not set
?>

<aside class="page-sidebar">
  <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
  <div class="main-sidebar" id="main-sidebar">
    <ul class="sidebar-menu" id="simple-bar">
      <li class="pin-title sidebar-main-title">
        <div>
          <h5 class="sidebar-title f-w-700">Pinned</h5>
        </div>
      </li>
      <li class="sidebar-main-title">
        <div>
          <h5 class="lan-1 f-w-700 sidebar-title">General</h5>
        </div>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="dashboard.php">
              <i class="fa-solid fa-chart-line"></i> <!-- Font Awesome Icon for Dashboard -->
              <h6 class="f-w-600">Dashboards</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="Calendar-basic.php">
              <i class="fa-solid fa-calendar-days"></i> <!-- Font Awesome Icon for Calendar -->
              <h6 class="f-w-600">Events</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="transaction.php">
              <i class="fa-solid fa-money-bill-transfer"></i> <!-- Font Awesome Icon for Transactions -->
              <h6 class="f-w-600">Transaction</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="rao-program.php">
              <i class="fa-solid fa-money-bill-transfer"></i> <!-- Font Awesome Icon for Transactions -->
              <h6 class="f-w-600">RAO Program</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="cedula.php">
              <i class="fa-solid fa-money-bill-transfer"></i> <!-- Font Awesome Icon for Transactions -->
              <h6 class="f-w-600">Cedula Transaction</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="officials-management.php">
              <i class="fa-solid fa-users"></i> <!-- Font Awesome Icon for Transactions -->
              <h6 class="f-w-600">Officials Profile</h6>
          </a>
      </li>

      <!-- Show User Management only if the role is Treasurer -->
      <?php if ($userRole === "treasurer"): ?>
      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="user-management.php">
              <i class="fa-solid fa-users"></i> <!-- Font Awesome Icon for User Management -->
              <h6 class="f-w-600">User Management</h6>
          </a>
      </li>
      <?php endif; ?>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="file-management.php">
              <i class="fa-solid fa-folder"></i> <!-- Manage Files Icon -->
              <h6 class="f-w-600">Manage Files</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="setting-configuration.php">
              <i class="fa-solid fa-gear"></i> <!-- Settings Icon -->
              <h6 class="f-w-600">Settings</h6>
          </a>
      </li>

      <li class="sidebar-list">
          <i class="fa-solid fa-thumbtack"></i>
          <a class="sidebar-link" href="chatbot.php">
              <i class="fa-solid fa-robot"></i> <!-- ChatBot Icon -->
              <h6 class="f-w-600">ChatBot Configuration</h6>
          </a>
      </li>

    </ul>
  </div>
  <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</aside>
