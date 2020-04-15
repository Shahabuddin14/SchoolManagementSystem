<?php 
    include"includes/config.php"; 
    session_start();
?>
<?php include"includes/header.php"; ?>

<body>
    <?php include"includes/nav.php"; ?>

    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include"includes/side_bar.php"; ?>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <h2>Student Details</h2>
                        <?php 
                            if(isset($_SESSION['username'])){ 
                                $username = $_SESSION['username'];
                            }

                            $query = "SELECT * FROM student WHERE username = '$username' ";
                            $select_query = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_query)){
                                $name = $row['name'];
                                $guardian = $row['guardian'];

                                $class = $row['class'];
                                $section = $row['section'];

                                $roll = $row['roll'];
                                $email = $row['email'];
                            }
                        ?>

                        <?php
                            if(isset($_POST['update-profile'])){
                                $guardian = $_POST['guardian'];
                                $email = $_POST['email'];
                                
                                $query = "UPDATE student SET email = '$email', guardian = '$guardian' WHERE username = '$username' ";
                                $update_query = mysqli_query($connection, $query);

                                if (!$update_query){
                                    die("Connection failed: ". mysqli_connect_error());
                                }

                            }
                        ?>
                        
                        <form class="form-horizontal row-fluid" method="post">
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Student Name</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $name; ?>" disabled>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Class</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $class; ?>" disabled>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Section</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $section; ?>" disabled>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Roll number</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $roll; ?>" disabled>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Guardian name</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $guardian; ?>" name="guardian">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Email Address</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" value="<?php echo $email; ?>" name="email">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn" name="update-profile">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
<?php include"includes/footer.php"; ?>