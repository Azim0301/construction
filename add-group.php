<?php
   // require_once("inc/verify_login.php");
    require_once('include/header.php');
?>
</head>

<body>
    <?php require_once('include/menu.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary">Add Group</h2>
                    <a href="group.php" class="btn btn-secondary">BACK</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post" action="submit/insert_group.php">
                          
                            <div class="form-group">
                                <label for="name">Group Name</label>                                <input type="text" name="groupname" id="groupname" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="surname">Description</label>
                                <input type="text" name="description" id="description" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="surname">Manager</label>
                                <input type="text" name="manager" id="manager" class="form-control" required />
                            </div>
                             <div class="form-group">
                                <label for="surname">Location</label>
                                <input type="text" name="location" id="location" class="form-control" required />
                            </div>
                
                            <div class="text-center">
                                <button name="submit" type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Clear All
                                </button>
                            </div>
                            <div class="mt-3">
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once('include/footer.php');
?>
