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
      <title>Bulatok - Chatbot Configuration</title>
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
                    <h2>Chatbot Configuration</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add Cedula Transaction -->
          <div class="modal fade" id="addChatbotQuestionsModal" tabindex="-1" aria-labelledby="addChatbotQuestionsModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="addChatbotQuestionsModalLabel">Add Chatbot Questions</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Cedula Transaction Form-->
                              <div class="col-md-12">
                                  <form id="addChatbotQuestions">
                                      <div class="mb-3">
                                          <label for="questions" class="form-label">Questions</label>
                                          <textarea class="form-control" id="questions" rows="3" placeholder="Enter questions" required></textarea>
                                      </div>
                                      <div class="mb-3">
                                          <label for="response" class="form-label">Response</label>
                                          <textarea class="form-control" id="response" rows="3" placeholder="Enter response" required></textarea>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Submit Questions</button>
                                  </form>
                              </div>
                          </div> <!-- End of row -->
                      </div>
                  </div>
              </div>
          </div>

          <!-- Edit Cedula Transaction -->
          <div class="modal fade" id="editChatbotQuestionsModal" tabindex="-1" aria-labelledby="editChatbotQuestionsModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editChatbotQuestionsModalLabel">Update Chatbot Questions</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row"> <!-- Bootstrap Grid Row -->
                              <!-- Edit RAO Program Form-->
                              <div class="col-md-12">
                                  <form id="editChatbotQuestions">
                                      <input type="hidden" id="editQuestionsId">
                                      <div class="mb-3">
                                          <label for="edit-questions" class="form-label">Questions</label>
                                          <textarea class="form-control" id="edit-questions" rows="3" placeholder="Enter questions" required></textarea>
                                      </div>
                                      <div class="mb-3">
                                          <label for="edit-response" class="form-label">Response</label>
                                          <textarea class="form-control" id="edit-response" rows="5" placeholder="Enter response" required></textarea>
                                      </div>
                                      <button type="submit" class="btn btn-primary w-100 mb-4">Update Cedula Transaction</button>
                                  </form>
                              </div>
                          </div> <!-- End of row -->
                      </div>
                  </div>
              </div>
          </div>

            <!-- Container-fluid starts-->
              <div class="container-fluid default-dashboard">
                <div class="row">
                  <div class="col-xxl-12 col-xl-12 proorder-xxl-12 col-md-12 box-col-12">
                    <button id="add-chatbot-questions" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addChatbotQuestionsModal">Add Chatbot Questions</button>
                    <div class="card height-equal">
                      <div class="card-header card-no-border pb-0 d-flex justify-content-between align-items-center">
                          <h3>Chatbot Questions</h3>
                          <input type="text" id="searchQuestions" class="form-control w-25" placeholder="Search Chatbot Questions...">
                      </div>
                      <div class="card-body pt-0 manage-invoice filled-checkbox">
                          <div class="table-responsive theme-scrollbar">
                              <table class="table display table-bordernone mt-0" id="chatbot-questions" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Questions</th>
                                          <th>Response</th>
                                          <th class="action-column">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <!-- Assuming data will be inserted here by your JavaScript -->
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
    $(document).ready(function () {
        // Initial fetch on page load
        fetchCedulaTransaction();

        // Handle RAO Program form submission
        document.getElementById('addChatbotQuestions').addEventListener('submit', function (event) {
            event.preventDefault();
            const questions = document.getElementById('questions').value;
            const response = document.getElementById('response').value;

            // console.log(questions);
            // console.log(response);

            // AJAX request to send data to the server
            $.ajax({
                url: 'mysql/add_chatbot_questions.php',
                type: 'POST',
                data: {
                    questions: questions,
                    response: response
                },
                success: function (response) {
                    // console.log('Chatbot Questions Submitted:', response);
                    $('#addChatbotQuestionsModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Chatbot Questions added successfully',
                    }).then(() => {
                        // Reset the form
                        document.getElementById('addChatbotQuestions').reset();
                        fetchCedulaTransaction();
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error submitting Cedula Transaction:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add Cedula transaction. Please try again.',
                    });
                },
            });
        });

        // Handle Cedula Transaction Edit button click
          $(document).on('click', '.edit-btn.rao-edit-btn', function () {
              // Retrieve data attributes from the clicked edit button
              const id = $(this).data('id');
              const questions = $(this).data('questions');
              const response = $(this).data('response');
              // Populate the Edit Chatbot Quastions modal fields
              $('#editQuestionsId').val(id);
              $('#edit-questions').val(questions);
              $('#edit-response').val(response);

              // Show the Edit Cedula Transaction modal
              $('#editChatbotQuestionsModal').modal('show');
          });   

        // Handle Cedula Transaction Edit form submission
        $('#editChatbotQuestions').on('submit', function (event) {
            event.preventDefault();

            // Retrieve form data
            const id = $('#editQuestionsId').val();
            const edit_questions = $('#edit-questions').val();
            const edit_response = $('#edit-response').val();

            // console.log(id);
            // console.log(edit_questions);
            // console.log(edit_response);

            // AJAX request to update the Cedula transaction
            $.ajax({
                url: 'mysql/edit_chatbot_questions.php', // Update endpoint
                type: 'POST',
                data: {
                    id: id,
                    edit_questions: edit_questions,
                    edit_response: edit_response,
                },
                success: function (response) {
                    $('#editChatbotQuestionsModal').modal('hide');
                    // console.log('Chatbot Quantity Updated:', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Chatbot Quantity updated successfully',
                    }).then(() => {
                        // Reset the form and close the modal
                        $('#editChatbotQuestions')[0].reset();
                        fetchCedulaTransaction(); // Refresh the table data
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error updating Chatbot Quantity:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update Cedula transaction. Please try again.',
                    });
                },
            });
        });

        // 🟢 Filter transactions based on the search input
        $('#searchQuestions').on('keyup', function () {
            let searchValue = $(this).val().toLowerCase();
            $('#chatbot-questions tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });

    // 🟢 Fetch RAO Programs from the server
    function fetchCedulaTransaction() {
        $.ajax({
            url: 'mysql/fetch_chatbot_questions.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let tbody = $("#chatbot-questions tbody");
                tbody.empty();

                if (data.length > 0) {
                    data.forEach(chatbot_questions => {
                        let row = `
                            <tr>
                                <td style="width: 30%; word-wrap: break-word; white-space: normal;">${chatbot_questions.questions || 'N/A'}</td>
                                <td style="width: 50%; word-wrap: break-word; white-space: normal;">${chatbot_questions.response || 'N/A'}</td>
                                <td style="width: 35%; word-wrap: break-word; white-space: normal;">
                                    <button class="btn btn-sm btn-primary edit-btn rao-edit-btn"
                                      data-id="${chatbot_questions.id}"
                                      data-questions="${chatbot_questions.questions}"
                                      data-response="${chatbot_questions.response}">
                                      <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" onclick="confirmDeleteChatbotQuestions(${chatbot_questions.id});"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append(`<tr><td colspan="6" class="text-center">No transactions found.</td></tr>`); // Update to colspan="6" to match column count
                }
            },
            error: function (xhr, status, error) {
                console.error("An error occurred while fetching transactions: ", error);
                // Optionally handle error display
            }
        });
    }

    // 🟢 Confirm & Delete RAO Program
    function confirmDeleteChatbotQuestions(programId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("mysql/delete_chatbot_questions.php", { id: programId }, function (response) {
                    Swal.fire("Deleted!", response.message, "success");
                    fetchCedulaTransaction();
                }, "json");
            }
        });
    }
</script>
    </body>
  </html>