<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Attendance Management</title> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php

        require_once('include/header.php');
        require_once('include/menu.php');
    ?>

    <!-- Heading -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Attendance Management</h1>
            <a href="add-attendance.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAttendanceModal">
                <i class="fa fa-plus"></i> Add Attendance
            </a>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search attendance..." id="attendanceSearch">
            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> Search</button>
        </div>

        <!-- Message Section -->
        <div id="message" class="alert alert-success" style="display:none;">
            Action completed successfully.
        </div>

        <!-- Attendance Table -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Worker Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody id="attendance-table-body">
                <!-- Sample data row 1 -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>2024-08-15</td>
                    <td>Present</td>
                    <td>
                        <a href="edit_attendance.php" title='Edit Attendance' class='edit' data-bs-toggle="modal" data-bs-target="#editAttendanceModal">
                            <i class="fa fa-pencil-alt fa-lg text-primary"></i>
                        </a>
                    </td>
                </tr>
             
            </tbody>
        </table>
    </div>

    <!-- Add Attendance Modal -->
    <div class="modal fade" id="addAttendanceModal" tabindex="-1" aria-labelledby="addAttendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAttendanceModalLabel">Add Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAttendanceForm">
                        <div class="mb-3">
                            <label for="workerName" class="form-label">Worker Name</label>
                            <input type="text" class="form-control" id="workerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="attendanceDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="attendanceDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="attendanceStatus" class="form-label">Status</label>
                            <select class="form-select" id="attendanceStatus" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Leave">Leave</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Attendance Modal -->
    <div class="modal fade" id="editAttendanceModal" tabindex="-1" aria-labelledby="editAttendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAttendanceModalLabel">Edit Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAttendanceForm">
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="editWorkerName" class="form-label">Worker Name</label>
                            <input type="text" class="form-control" id="editWorkerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAttendanceDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="editAttendanceDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAttendanceStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAttendanceStatus" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Leave">Leave</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add Attendance Form Submission
            $("#addAttendanceForm").submit(function (e) {
                e.preventDefault();
                // Collect form data and send it to the server
                // For demo purposes, just show a success message
                $("#message").text("Attendance added successfully.").show().delay(3000).fadeOut();
                $("#addAttendanceModal").modal('hide');
            });

            // Edit Attendance Form Submission
            $("#editAttendanceForm").submit(function (e) {
                e.preventDefault();
                // Collect form data and send it to the server
                // For demo purposes, just show a success message
                $("#message").text("Attendance updated successfully.").show().delay(3000).fadeOut();
                $("#editAttendanceModal").modal('hide');
            });

            // Delete Attendance
            $(".delete").click(function () {
                let choice = confirm("Are you sure you want to delete this attendance record?");
                if (choice === true) {
                    let row = $(this).closest("tr");
                    $(row).fadeOut(1000, function () {
                        $(row).remove();
                        $("#message").text("Attendance deleted successfully.").show().delay(3000).fadeOut();
                    });
                }
            });

            // Edit button click - Populate form with data
            $(".edit").click(function () {
                let row = $(this).closest("tr");
                $("#editId").val(row.find("td").eq(0).text());
                $("#editWorkerName").val(row.find("td").eq(1).text());
                $("#editAttendanceDate").val(row.find("td").eq(2).text());
                $("#editAttendanceStatus").val(row.find("td").eq(3).text());
            });

            // Search function
            $("#attendanceSearch").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#attendance-table-body tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
    <?php
        require_once('include/footer.php');
    ?>

</body>

</html>
