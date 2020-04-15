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
                            }

                        ?>

                        <div class="user_details">
                            <h3>Shudent name <?php echo $name; ?></h3>
                            <h3>Class <?php echo $class; ?></h3>
                            <h3>Section <?php echo $section; ?></h3>
                            <h3>Roll number <?php echo $roll; ?></h3>
                            <h3>Guardian name <?php echo $guardian; ?></h3>
                        </div>

                        <div class="edit_profile">
                            <a href="edit_profile.php" class="btn">Edit profile</a>
                        </div>                      
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
<?php include"includes/footer.php"; ?>