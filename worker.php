<?php

    require_once('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Worker Management</title> -->
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
            <h1 class="h3">Worker Management</h1>
            <a href="add-worker.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Worker</a>
        </div>

        <!-- Message Section -->
        <!-- <div id="message" class="alert alert-success" style="display:none;">
            Action completed successfully.
        </div> -->
        <?php require_once('include/message.php'); ?>

        <!-- Worker Table -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Mobile 1</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>Wages</th>
                    <th>Post ID</th>
                    <th>Blood Group</th>
                    <th>Health Details</th>
                    <th>Nominal Details</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody id="worker-table-body">
                <!-- Sample data row -->
                <!-- <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Male</td>
                    <td>1990-01-01</td>
                    <td>1234567890</td>
                    <td>123 Street Name</td>
                    <td>New York</td>
                    <td>10001</td>
                    <td>$20/hour</td>
                    <td>101</td>
                    <td>O+</td>
                    <td>Good health</td>
                    <td>Nominal details here</td>
                    <td>
                        <a href="#" title='Edit Worker'><i class="fa fa-pencil-alt fa-lg text-primary"></i></a>
                        <a href="javascript:void(0);" title='Delete Worker' class='delete'><i
                                class="fa fa-trash-alt fa-lg text-danger"></i></a>
                    </td>
                </tr> -->
                <?php
                $sql = "select * from worker order by id desc";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                //fetch all rows 
                $table = $cmd->fetchAll();
                //var_dump($table);
                foreach ($table as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['mobile1']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['pincode']; ?></td>
                        <td><?php echo $row['wages']; ?></td>
                        <td><?php echo $row['postid']; ?></td>
                        <td><?php echo $row['bloodgroup']; ?></td>
                        <td><?php echo $row['healthdetail']; ?></td>
                        <td><?php echo $row['nominaldetail']; ?></td>
                        <td>
                            <a title='delete worker' class='delete'><i class="fa fa-trash fa-2x"></i></a>
                            <a href=""><i class="fa fa-pencil fa-2x"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".delete").click(function () {
                let choice = confirm("Are you sure you want to delete this worker?");
                if (choice === true) {
                    let row = $(this).closest("tr");
                    $(row).fadeOut(1000, function () {
                        $(row).remove();
                        $("#message").text("Worker deleted successfully.").show().delay(3000).fadeOut();
                    });
                }
            });
        });
    </script>
    <?php
    require_once('include/footer.php');
    ?>

</body>

</html>
