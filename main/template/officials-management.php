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
    <title>Bulatok - Officials Management</title>
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
                  <h2>Officials Management</h2>
                  <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-auto">
                      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#addUserModal">Add Officials</button>
                  </div>
              </div>
            </div>
          </div>

        <!-- Add Officials Modal -->
         <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Added modal-lg for larger width -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Officials</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form id="addOfficialForm" enctype="multipart/form-data">
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-4">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
                                </div>
                                <!-- Middle Name -->
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter middle name">
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                                </div>
                                <!-- Date of Birth -->
                                <div class="col-md-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dateOfBirth" required>
                                </div>
                                <!-- Age -->
                                <div class="col-md-3">
                                    <label class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" readonly>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Position -->
                                <div class="col-md-6">
                                    <label class="form-label">Position</label>
                                    <select class="form-select" id="position" name="position">
                                        <option value="punong_barangay" selected="">Punong Barangay</option>
                                        <option value="sb_member">Sangguniang Barangay Member</option>
                                        <option value="sk">SK Chairperson</option>
                                        <option value="secretary">Barangay Secretary</option>
                                    </select>
                                </div>
                                <!-- Gmail -->
                                <div class="col-md-6">
                                    <label class="form-label">Gmail</label>
                                    <input type="text" class="form-control" id="gmail" name="gmail" placeholder="Enter gmail">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Username -->
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" required>
                                </div>
                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>

                            <button class="btn btn-primary mt-2 float-end" type="submit">Add Officials</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Officials Modal -->

        <!-- Edit Officials Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Officials</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm" enctype="multipart/form-data">
                            <input type="hidden" id="editUserId" name="userId"> <!-- Hidden User ID -->

                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-4">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="editFirstName" name="firstName" required>
                                </div>
                                <!-- Middle Name -->
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="editMiddleName" name="middleName">
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editLastName" name="lastName" required>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" id="editAddress" name="address" required>
                                </div>
                                <!-- Date of Birth -->
                                <div class="col-md-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="editDob" name="dateOfBirth" required>
                                </div>
                                <!-- Age -->
                                <div class="col-md-3">
                                    <label class="form-label">Age</label>
                                    <input type="number" class="form-control" id="editAge" name="age" readonly>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Position -->
                                <div class="col-md-6">
                                    <label class="form-label">Position</label>
                                    <select class="form-select" id="editPosition" name="position"> <!-- Changed name to "position" -->
                                        <option value="punong_barangay">Punong Barangay</option>
                                        <option value="sb_member">Sangguniang Barangay Member</option>
                                        <option value="sk">SK Chairperson</option>
                                        <option value="secretary">Barangay Secretary</option>
                                    </select>
                                </div>
                                <!-- Gmail -->
                                <div class="col-md-6">
                                    <label class="form-label">Gmail</label>
                                    <input type="text" class="form-control" id="editGmail" name="gmail">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Contact Number -->
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="editPhoneNumber" name="phone_number" placeholder="Enter phone number" required>
                                </div>
                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label class="form-label">Upload New Image</label>
                                    <input type="file" class="form-control" id="editImageUpload" name="imageUpload" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>

                            <button class="btn btn-primary mt-2 float-end" type="submit">Update Officials</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Officials Modal -->

          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
              <div class="col-xxl-12 col-xl-12 proorder-xxl-5 col-md-12 box-col-12">
                <div class="card height-equal">
                  <div class="card-header card-no-border pb-0">
                    <h3>Officials List</h3>
                  </div>
                  <div class="card-body pt-0 manage-invoice filled-checkbox">
                    <div class="table-responsive theme-scrollbar">
                      <table class="table display table-bordernone mt-0" id="users-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Complete Name</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Position</th>
                            <th>Gmail</th>
                            <th>Phone Number</th>
                            <th>Profile</th>
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
        <!-- VIEW OFFICIAL PROFILE MODAL -->
        <div class="modal fade" id="viewOfficialModal" tabindex="-1" aria-labelledby="viewOfficialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewOfficialModalLabel">Official's Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Official's Image -->
                            <div class="col-md-12">
                                <img id="officialImage" src="" alt="Official Image" class="img-fluid rounded-circle">
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
        document.addEventListener("click", function (event) {
        // Check if the clicked element is an edit-official button
        if (event.target.classList.contains("edit-official")) {
            console.log("Edit button clicked!");

            let button = event.target; // Get the clicked button

            // Log dataset values for debugging
            console.log("Dataset Values:", button.dataset);

            // Assign values to modal inputs
            document.getElementById("editUserId").value = button.dataset.id;
            document.getElementById("editFirstName").value = button.dataset.firstname;
            document.getElementById("editMiddleName").value = button.dataset.middlename;
            document.getElementById("editLastName").value = button.dataset.lastname;
            document.getElementById("editAddress").value = button.dataset.address;
            document.getElementById("editDob").value = button.dataset.dob;
            document.getElementById("editAge").value = button.dataset.age;
            document.getElementById("editPosition").value = button.dataset.position; // Updated here
            document.getElementById("editGmail").value = button.dataset.gmail;
            document.getElementById("editPhoneNumber").value = button.dataset.phone;

            // Show modal
            let editUserModal = new bootstrap.Modal(document.getElementById("editUserModal"));
            editUserModal.show();
        }
    });

    // Handle Edit User Form Submission
    document.getElementById("editUserForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Create FormData object to handle file upload as well
        let form = document.getElementById("editUserForm");
        let formData = new FormData(form);

        // Log each form field
        for (let [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }

        // Send the data via AJAX to update_user.php
        fetch('mysql/update_user.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response:", data); // Log server response

            if(data.status === "success"){
                $('#editUserModal').modal('hide');

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    timer: 2000,
                    showConfirmButton: true
                }).then(() => {
                    location.reload();  // Reload the page after the alert disappears
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while updating the user.'
            });
        });
    });

    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("event-image")) {
            let imageUrl = event.target.getAttribute("data-image");

            // Populate the modal with the official's details
            document.getElementById("officialImage").src = imageUrl;
        }
    });

    // Auto-calculate age in edit form when date changes
    document.getElementById("editDob").addEventListener("change", function() {
        let dob = new Date(this.value);
        let today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        let monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        document.getElementById("editAge").value = age;
    });
    </script>

    <script>
      // Auto-calculate age when Date of Birth is entered
      document.getElementById("dob").addEventListener("change", function() {
          let dob = new Date(this.value);
          let today = new Date();
          let age = today.getFullYear() - dob.getFullYear();
          let monthDiff = today.getMonth() - dob.getMonth();
          if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
              age--;
          }
          document.getElementById("age").value = age;
      });

      // Toggle password visibility using Feather icons
      function togglePassword(fieldId, iconId) {
          let field = document.getElementById(fieldId);
          let icon = document.getElementById(iconId);
          if (field.type === "password") {
              field.type = "text";
              icon.setAttribute("data-feather", "eye-off");
          } else {
              field.type = "password";
              icon.setAttribute("data-feather", "eye");
          }
          feather.replace();
      }

      // Form submission with AJAX (using Fetch API)
        document.getElementById("addOfficialForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form element
            let form = document.getElementById("addOfficialForm");
            let formData = new FormData(form);

            // Debug: Log FormData entries before submission
            console.log("Submitting Form Data:");
            for (let [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }

            // Send the data via AJAX to insert_user.php
            // console.log("Sending data to mysql/insert_user.php...");

            fetch('mysql/insert_official.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log("Received response from server:", response);
                return response.json();
            })
            .then(data => {
                console.log("Parsed JSON Response:", data);

                if (data.status === "success") {
                    console.log("User added successfully:", data);

                    // Hide modal and reset form
                    $('#addUserModal').modal('hide');
                    $("#addOfficialForm")[0].reset();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer: 2000,  // Auto-close after 2 seconds
                        showConfirmButton: true  // Hide "OK" button
                    }).then(() => {
                        location.reload();  // Reload the page after the alert disappears
                    });

                } else {
                    console.error("Error from server:", data);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message
                    });
                }
            })
            .catch(error => {
                console.error("Fetch error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while submitting the form.'
                });
            });
        });

      $(document).ready(function () {
            function fetchUsers() {
                $.ajax({
                    url: "mysql/fetch_officials.php",
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            let usersTableBody = $("#users-table tbody");
                            usersTableBody.empty(); // Clear existing rows

                            // Define position mapping
                            const positionMap = {
                                "punong_barangay": "Punong Barangay",
                                "sb_member": "Sangguniang Barangay Member",
                                "sk": "SK Chairperson",
                                "secretary": "Barangay Secretary"
                            };

                            // Check if data exists and has items
                            if (response.data && response.data.length > 0) {
                                response.data.forEach(user => {
                                    let row = `
                                        <tr>
                                            <td>${user.first_name} ${user.middle_name} ${user.last_name}</td>
                                            <td>${user.address}</td>
                                            <td>${new Date(user.date_of_birth).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}</td>
                                            <td>${user.age}</td>
                                            <td>${positionMap[user.position] || "Unknown"}</td>
                                            <td>${user.gmail}</td>
                                            <td>${user.phone_number}</td>
                                            <td>
                                            <img 
                                                src="mysql/uploads/officials/${user.image}" 
                                                alt="Profile" 
                                                class="rounded-circle event-image" 
                                                style="cursor: pointer; width: 30px; height: auto;" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#viewOfficialModal" 
                                                data-image="mysql/uploads/officials/${user.image}">
                                        </td>
                                            <td>
                                                <i data-feather="edit" class="text-primary edit-official"
                                                    data-id="${user.id}"
                                                    data-firstname="${user.first_name}"
                                                    data-middlename="${user.middle_name}"
                                                    data-lastname="${user.last_name}"
                                                    data-address="${user.address}"
                                                    data-dob="${user.date_of_birth}"
                                                    data-age="${user.age}"
                                                    data-position="${user.position}"
                                                    data-gmail="${user.gmail}"
                                                    data-phone="${user.phone_number}"
                                                    data-image="mysql/uploads/officials/${user.image}"
                                                    style="cursor: pointer;">
                                                </i>
                                                <i data-feather="trash" style="cursor:pointer;" class="text-danger delete-officials" data-id="${user.id}"></i>
                                            </td>
                                        </tr>
                                    `;
                                    usersTableBody.append(row);
                                });

                                // Reinitialize Feather icons after adding content
                                feather.replace();
                            } else {
                                usersTableBody.append('<tr><td colspan="9" class="text-center">No officials found</td></tr>');
                            }
                        } else {
                            console.error("Error fetching officials:", response.message);
                            $("#users-table tbody").html('<tr><td colspan="9" class="text-center">Error loading officials data</td></tr>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.error("Status:", status);
                        console.error("Response Text:", xhr.responseText);
                        $("#users-table tbody").html('<tr><td colspan="9" class="text-center">Error connecting to server</td></tr>');
                    }
                });
            }

            // Call function to fetch users when the page loads
            fetchUsers();

           // Re-add the event handlers for edit button
            $(document).on("click", ".edit-official", function() {
                // Retrieve data attributes from the clicked edit button
                $("#editUserId").val($(this).data("id"));
                $("#editFirstName").val($(this).data("firstname"));
                $("#editMiddleName").val($(this).data("middlename"));
                $("#editLastName").val($(this).data("lastname"));
                $("#editAddress").val($(this).data("address"));
                $("#editDob").val($(this).data("dob"));
                $("#editAge").val($(this).data("age"));
                $("#editRole").val($(this).data("position"));  // Updated to `position` based on your initial code
                $("#editGmail").val($(this).data("gmail"));
                $("#editPhoneNumber").val($(this).data("phone"));  // Added to populate phone number

                // Show modal
                let editUserModal = new bootstrap.Modal(document.getElementById("editUserModal"));
                editUserModal.show();
            });

            // Auto-calculate age in edit form
            $("#editDob").on("change", function() {
                let dob = new Date(this.value);
                let today = new Date();
                let age = today.getFullYear() - dob.getFullYear();
                let monthDiff = today.getMonth() - dob.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                $("#editAge").val(age);
            });
        });

      document.addEventListener("click", function (event) {
          if (event.target.classList.contains("delete-officials")) {
              let userId = event.target.getAttribute("data-id");

              Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#d33",
                  cancelButtonColor: "#3085d6",
                  confirmButtonText: "Yes, delete it!",
              }).then((result) => {
                  if (result.isConfirmed) {
                      fetch("mysql/delete_official.php", {
                          method: "POST",
                          headers: { "Content-Type": "application/x-www-form-urlencoded" },
                          body: `userId=${userId}`,
                      })
                      .then(response => response.json())
                      .then(data => {
                          if (data.status === "success") {
                              Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                                timer: 2000,  // Auto-close after 2 seconds
                                showConfirmButton: true  // Hide "OK" button
                              }).then(() => {
                                  location.reload();  // Reload the page after the alert disappears
                              });
                          } else {
                              Swal.fire("Error!", data.message, "error");
                          }
                      })
                      .catch(() => Swal.fire("Error!", "Something went wrong.", "error"));
                  }
              });
          }
      });

      // Initialize Feather Icons
      feather.replace();
    </script>
  </body>
</html>