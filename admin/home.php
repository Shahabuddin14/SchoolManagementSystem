<?php 
    include"include/config.php"; 
    session_start();
?>

<?php include"include/header.php"; ?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php include"include/sidebar.php"; ?>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                            <?php 
                                $query = "SELECT * FROM student ";

                                if ($select_query = mysqli_query($connection, $query)){
                                    $rowcount=mysqli_num_rows($select_query);
                                }
                            ?>

                            <a href="student.php" class="btn-box big span4"><i class="icon-group"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Students</p>
                            </a>

                            <?php 
                                $query = "SELECT * FROM teacher ";

                                if ($select_query = mysqli_query($connection, $query)){
                                    $rowcount=mysqli_num_rows($select_query);
                                }
                            ?>

                            <a href="teacher.php" class="btn-box big span4"><i class="icon-user"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Teacher</p>
                            </a>

                            <?php 
                                $query = "SELECT SUM(total) AS value_sum FROM payment ";
                                $select_query = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($select_query); 
                                $sum = $row['value_sum'];
                            ?>

                            <a href="#" class="btn-box big span4"><i class="icon-money"></i><b><?php echo $sum; ?></b>
                                <p class="text-muted">Total payment by student</p>
                            </a>
                        </div>
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
<?php include"include/footer.php"; ?>