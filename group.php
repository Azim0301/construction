<?php
    require_once('include/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Group Management</title> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Menu -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Group Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user-cog"></i> Worker Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marked-alt"></i> Site Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa fa-users"></i> Group Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-calendar-check"></i> Attendance Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-money-check-alt"></i> Payment Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-chart-bar"></i> Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav> -->
    <?php
    require_once('include/header.php');
    require_once('include/menu.php');
    ?>

    <!-- Heading -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Group Management</h1>
            <a href="add-group.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Group</a>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search group..." id="groupSearch">
            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> Search</button>
        </div>

        <!-- Message Section -->
        <div id="message" class="alert alert-success" style="display:none;">
            Action completed successfully.
        </div>

        <!-- Group Table -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Group Name</th>
                    <th>Description</th>
                    <th>Manager</th>
                    <th>Location</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody id="group-table-body">
               
            <?php
                $sql = "select * from groupmanagement order by id desc";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                //fetch all rows 
                $table = $cmd->fetchAll();
                //var_dump($table);
                foreach ($table as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['groupname']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['manager']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        
                        <td>
                            <a title='delete site' class='delete'><i class="fa fa-trash fa-2x"></i></a>
                            <a href=""><i class="fa fa-pencil fa-2x"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".delete").click(function () {
                let choice = confirm("Are you sure you want to delete this group?");
                if (choice === true) {
                    let row = $(this).closest("tr");
                    $(row).fadeOut(1000, function () {
                        $(row).remove();
                        $("#message").text("Group deleted successfully.").show().delay(3000).fadeOut();
                    });
                }
            });

            // Search function
            $("#groupSearch").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#group-table-body tr").filter(function () {
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
