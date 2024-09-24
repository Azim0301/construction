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
                    <h2 class="text-primary">Add Worker</h2>
                    <a href="worker.php" class="btn btn-secondary">BACK</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post" action="submit/insert_worker.php">
                            <div class="form-group">
                                <label for="id">Worker ID</label>
                                <input type="text" name="id" id="id" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" id="surname" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth (DOB)</label>
                                <input type="date" name="dob" id="dob" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="mobile1">Mobile</label>
                                <input type="text" name="mobile1" id="mobile1" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="text" name="pincode" id="pincode" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="wages">Wages</label>
                                <input type="number" name="wages" id="wages" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="postid">Post ID</label>
                                <input type="text" name="postid" id="postid" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="bloodgroup">Blood Group</label>
                                <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="healthdetail">Health Details</label>
                                <textarea name="healthdetail" id="healthdetail" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominaldetail">Nominal Details</label>
                                <textarea name="nominaldetail" id="nominaldetail" class="form-control" rows="3" required></textarea>
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
