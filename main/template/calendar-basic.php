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
    <title>Bulatok - Events</title>
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
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/calendar.css"/>
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
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Events Management</h2>
                        <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid calendar-basic mt-3">
              <div class="card">
                  <div class="card-body">
                      <div class="row" id="wrap">
                          <div class="col-md-12 col-lg-7">
                              <div class="d-flex justify-content-between align-items-center">
                                  <h2>Events List</h2>
                                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">Add Event</button>
                              </div>
                              <!-- Calendar Container -->
                                <h4>Upcoming Events</h4>

                                <!-- Events Table -->
                                <div class="table-responsive theme-scrollbar">
                                  <div class="mb-3 mt-2">
                                      <input type="text" id="searchEvent" class="form-control" placeholder="Search events...">
                                  </div>
                                    <table class="table display table-bordernone">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Start DateTime</th>
                                                <th>End DateTime</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="eventsTableBody">
                                            <!-- Events will be dynamically inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                          <div class="col-md-12 col-lg-5">
                              <!-- Calendar Container -->
                              <div id="calendar"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Container-fluid ends-->
        </div>

        <!-- ADD EVENT MODAL -->
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="eventForm" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="eventName" name="eventName" required placeholder="enter event name">
                            </div>
                            <div class="mb-3">
                                <label for="eventDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" required placeholder="enter description"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="startTime" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="startTime" name="startTime" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="endTime" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="endTime" name="endTime" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="eventLocation" class="form-label">Location</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation" required placeholder="enter event location">
                            </div>
                            <div class="mb-3">
                                <label for="eventImage" class="form-label">Event Image</label>
                                <input type="file" class="form-control" id="eventImage" name="eventImage" accept=".png, .jpeg, .jpg">
                                <small class="text-muted">Only PNG, JPEG, and JPG formats are allowed.</small>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT EVENT MODAL -->
        <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="editEventForm" enctype="multipart/form-data">
                            <input type="hidden" id="editEventId" name="eventId">
                            <div class="mb-3">
                                <label for="editEventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="editEventName" name="eventName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEventDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editEventDescription" name="eventDescription" rows="3" required></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editStartDate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="editStartDate" name="startDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="editStartTime" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="editStartTime" name="startTime" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editEndDate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="editEndDate" name="endDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="editEndTime" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="editEndTime" name="endTime" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editEventLocation" class="form-label">Location</label>
                                <input type="text" class="form-control" id="editEventLocation" name="eventLocation" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEventImage" class="form-label">Event Image</label>
                                <input type="file" class="form-control" id="editEventImage" name="eventImage" accept=".png, .jpeg, .jpg">
                                <small class="text-muted">Only PNG, JPEG, and JPG formats are allowed.</small>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </div>
                        </form>
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
    <!-- scrollbar-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- slick-->
    <script src="../assets/js/slick/slick.min.js"></script>
    <script src="../assets/js/slick/slick.js"></script>
    <!-- theme_customizer-->
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- calendar-->
    <script src="../assets/js/calendar/fullcalendar.min.js"></script>
    <script src="../assets/js/calendar/fullcalendar-custom.js"></script>
    <!-- custom script -->
    <script src="../assets/js/script.js"></script>

    <script>
      document.addEventListener("click", function (event) {
          if (event.target.classList.contains("edit-event")) {
              let eventId = event.target.getAttribute("data-id");

              fetch(`mysql/get_event.php?id=${eventId}`)
                  .then(response => response.json())
                  .then(data => {
                      if (data.status === "success") {
                          let event = data.event;

                          // Populate modal fields
                          document.getElementById("editEventId").value = event.id;
                          document.getElementById("editEventName").value = event.title;
                          document.getElementById("editEventDescription").value = event.description;
                          document.getElementById("editStartDate").value = event.start_date;
                          document.getElementById("editStartTime").value = event.start_time;
                          document.getElementById("editEndDate").value = event.end_date;
                          document.getElementById("editEndTime").value = event.end_time;
                          document.getElementById("editEventLocation").value = event.location;

                          // Show the modal
                          let editModal = new bootstrap.Modal(document.getElementById("editEventModal"));
                          editModal.show();
                      } else {
                          Swal.fire("Error", data.message, "error");
                      }
                  })
                  .catch(() => Swal.fire("Error", "Could not fetch event details.", "error"));
          }
      });

      document.getElementById("editEventForm").addEventListener("submit", function(event) {
          event.preventDefault(); // Prevent default form submission

          let formData = new FormData(this); // Collect form data

          // Convert FormData to JSON (for debugging)
          let jsonObject = {};
          formData.forEach((value, key) => { jsonObject[key] = value; });

          console.log("Submitting Edited Event Data:", jsonObject); // Log to console

          // Send data to server (optional)
          fetch("mysql/update_event.php", {
              method: "POST",
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              console.log("Server Response:", data); // Log server response

              if (data.status === "success") {
                  Swal.fire({
                      title: "Success!",
                      text: data.message,
                      icon: "success",
                      confirmButtonText: "OK"
                  }).then(() => {
                      document.getElementById("editEventModal").classList.remove("show");
                      location.reload(); // Reload page to reflect changes
                  });
              } else {
                  Swal.fire({ title: "Error!", text: data.message, icon: "error" });
              }
          })
          .catch(error => console.error("Fetch Error:", error));
      });


      document.addEventListener("DOMContentLoaded", function () {
          const calendarEl = document.getElementById("calendar");
          const eventsTableBody = document.getElementById("eventsTableBody");
          const searchInput = document.getElementById("searchEvent");

          const startDateInput = document.getElementById("startDate");
          const startTimeInput = document.getElementById("startTime");
          const endDateInput = document.getElementById("endDate");
          const endTimeInput = document.getElementById("endTime");
          const eventForm = document.getElementById("eventForm");

          let calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: "dayGridMonth",
              headerToolbar: {
                  left: "prev,next today",
                  center: "title",
                  right: "dayGridMonth,timeGridWeek,timeGridDay",
              },
              eventTimeFormat: { hour: "2-digit", minute: "2-digit", meridiem: "short" },
              events: (fetchInfo, successCallback, failureCallback) => fetchEvents(successCallback, failureCallback),
              eventDidMount: (info) => {
                  new bootstrap.Tooltip(info.el, {
                      title: info.event.extendedProps.description,
                      placement: "top",
                      trigger: "hover",
                  });
              },
          });

          calendar.render();
          fetchEvents();

          function fetchEvents(successCallback = null, failureCallback = null) {
              fetch("mysql/fetch_events.php")
                  .then(response => response.json())
                  .then(data => {
                      if (data.status === "success") {
                          eventsTableBody.innerHTML = "";
                          let calendarEvents = data.events.map(event => ({
                              title: event.title,
                              description: event.description,
                              start: event.start,
                              end: event.end,
                          }));

                          data.events.forEach(event => {
                              let startDateTime = formatDateTime(event.start);
                              let endDateTime = formatDateTime(event.end);

                              eventsTableBody.innerHTML += `
                                  <tr>
                                      <td>${event.title}</td>
                                      <td>${event.description}</td>
                                      <td>${startDateTime}</td>
                                      <td>${endDateTime}</td>
                                      <td>
                                          <img src="mysql/uploads/${event.image}" alt="${event.title}" class="event-image" style="cursor: pointer; width: 30px; height: auto;" data-image="mysql/uploads/${event.image}">
                                      </td>
                                      <td>
                                          <i class="fas fa-edit text-primary me-2 edit-event" style="cursor: pointer;" data-id="${event.id}"></i>
                                          <i class="fas fa-trash-alt delete-event" style="cursor:pointer; color:red; margin-left:10px;" data-id="${event.id}"></i>
                                      </td>
                                  </tr>`;
                          });

                          if (successCallback) successCallback(calendarEvents);
                      } else {
                          console.error("Error fetching events:", data.message);
                          if (failureCallback) failureCallback();
                      }
                  })
                  .catch(error => {
                      console.error("Fetch error:", error);
                      if (failureCallback) failureCallback();
                  });
          }

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

          searchInput.addEventListener("keyup", function () {
              let searchValue = this.value.toLowerCase();
              document.querySelectorAll("#eventsTableBody tr").forEach(row => {
                  let title = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                  let description = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                  row.style.display = title.includes(searchValue) || description.includes(searchValue) ? "" : "none";
              });
          });

          function validateDateTime() {
              let now = new Date();
              let today = now.toISOString().split("T")[0];
              let currentTime = now.toTimeString().split(":").slice(0, 2).join(":");

              startDateInput.setAttribute("min", today);
              endDateInput.setAttribute("min", today);

              startDateInput.addEventListener("change", () => {
                  if (startDateInput.value < today) {
                      Swal.fire("Invalid Date", "Start date cannot be in the past.", "warning");
                      startDateInput.value = today;
                  }
                  endDateInput.setAttribute("min", startDateInput.value);
              });

              startTimeInput.addEventListener("change", () => {
                  if (startDateInput.value === today && startTimeInput.value < currentTime) {
                      Swal.fire("Invalid Time", "Start time cannot be in the past.", "warning");
                      startTimeInput.value = currentTime;
                  }
              });

              endDateInput.addEventListener("change", () => {
                  if (endDateInput.value < startDateInput.value) {
                      Swal.fire("Invalid Date", "End date cannot be before the start date.", "warning");
                      endDateInput.value = startDateInput.value;
                  }
              });

              endTimeInput.addEventListener("change", () => {
                  let startDateTime = new Date(`${startDateInput.value}T${startTimeInput.value}`);
                  let endDateTime = new Date(`${endDateInput.value}T${endTimeInput.value}`);

                  if (endDateTime <= startDateTime) {
                      Swal.fire("Invalid Time", "End time must be after start time.", "warning");
                      endTimeInput.value = startTimeInput.value;
                  }
              });
          }

          validateDateTime();

          eventForm.addEventListener("submit", function (event) {
              event.preventDefault();

              let startDate = startDateInput.value;
              let endDate = endDateInput.value;

              console.log("Checking conflict with:", { startDate, endDate });

              let params = new URLSearchParams();
              params.append("startDate", startDate);
              params.append("endDate", endDate);

              fetch("mysql/check_event_conflict.php", {
                  method: "POST",
                  headers: { "Content-Type": "application/x-www-form-urlencoded" },
                  body: new URLSearchParams({ startDate: startDateInput.value, endDate: endDateInput.value }).toString()
              })
              .then(response => response.text()) // Change .json() to .text() to see raw output
              .then(data => {
                  console.log("Raw response:", data);

                  try {
                      let jsonData = JSON.parse(data); // Try converting response to JSON
                      if (jsonData.error) {
                          console.error("Server Error:", jsonData.error);
                          Swal.fire("Error!", "Server Error: " + jsonData.error, "error");
                      } else if (jsonData.exists) {
                          Swal.fire("Conflict!", "An event already exists on this date range. Please choose another date.", "error");
                      } else {
                          submitEvent(new FormData(eventForm));
                      }
                  } catch (error) {
                      console.error("JSON Parse Error:", error, "Response:", data);
                      Swal.fire("Error!", "Invalid server response.", "error");
                  }
              })
              .catch(error => {
                  console.error("Fetch Error:", error);
                  Swal.fire("Error!", "Failed to check event conflict.", "error");
              });
          });

          function submitEvent(formData) {
              fetch("mysql/add_event.php", { method: "POST", body: formData })
                  .then(response => response.json())
                  .then(data => {
                      if (data.status === "success") {
                          closeModalAndShowSuccess("addEventModal", data.message);
                      } else {
                          Swal.fire("Error!", data.message, "error");
                      }
                  })
                  .catch(() => Swal.fire("Error!", "An unexpected error occurred.", "error"));
          }

          function closeModalAndShowSuccess(modalId, message) {
              let modalElement = document.getElementById(modalId);
              let modalInstance = bootstrap.Modal.getInstance(modalElement);
              modalInstance.hide();

              modalElement.addEventListener("hidden.bs.modal", function () {
                  Swal.fire("Success!", message, "success").then(() => {
                      fetchEvents();
                      calendar.refetchEvents();
                  });
              }, { once: true });
          }

          document.addEventListener("click", function (event) {
              if (event.target.classList.contains("delete-event")) {
                  let eventId = event.target.getAttribute("data-id");

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
                          fetch("mysql/delete_event.php", {
                              method: "POST",
                              headers: { "Content-Type": "application/x-www-form-urlencoded" },
                              body: `eventId=${eventId}`,
                          })
                          .then(response => response.json())
                          .then(data => {
                              if (data.status === "success") {
                                  Swal.fire("Deleted!", data.message, "success").then(fetchEvents);
                                  location.reload();
                              } else {
                                  Swal.fire("Error!", data.message, "error");
                              }
                          })
                          .catch(() => Swal.fire("Error!", "Something went wrong.", "error"));
                      }
                  });
              }
          });
      });
    </script>
    <script>
      // Assuming you have other similar code for fetching and displaying events
      document.addEventListener("click", function (event) {
          if (event.target.classList.contains("event-image")) {
              let imageUrl = event.target.getAttribute("data-image");
              window.open(imageUrl, '_blank');
          }
      });
    </script>
  </body>
</html>