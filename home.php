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
                        <div class="btn-controls">
                            <div class="btn-box-row row-fluid">
                                <?php
                                
                                    if(isset($_SESSION['username'])){ 
                                        $username = $_SESSION['username'];
                                    }

                                    $query = "SELECT total FROM payment WHERE username = '$username'";
                                
                                    if ($select_query = mysqli_query($connection, $query)){
                                        $rowcount = mysqli_num_rows($select_query);
                                    }

                                ?>
                                
                                <a href="#" class="btn-box big span4">
                                    <i class="icon-user"></i><b><?php echo $rowcount; ?></b>
                                    <p class="text-muted">Total Months</p>
                                </a>


                                <?php 
                                    if(isset($_SESSION['username'])){ 
                                        $username = $_SESSION['username'];
                                    }

                                    $query = "SELECT * FROM payment WHERE username = '$username' ORDER BY id DESC LIMIT 1 ";
                                    $select_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_query)){
                                        $total = $row['total'];
                                    }
                                ?>

                                <a href="#" class="btn-box big span4">
                                    <i class="icon-money"></i><b><?php echo $total; ?></b>
                                    <p class="text-muted">Last Month Payment</p>
                                </a>
                                
                                <?php 
                                    if(isset($_SESSION['username'])){ 
                                        $username = $_SESSION['username'];
                                    }

                                    $query = "SELECT * FROM payment WHERE username = '$username' ORDER BY id DESC LIMIT 1 ";
                                    $select_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_query)){
                                        $status = $row['status'];
                                    }
                                ?>
                                <a href="#" class="btn-box big span4">
                                    <i class="icon-exchange"></i><b><?php echo $status; ?></b>
                                    <p class="text-muted">Payment Status</p>
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

<?php include"includes/footer.php"; ?>
