<?php 
    include"include/config.php"; 
    session_start();


    if(isset($_GET['del'])){
        mysqli_query($connection,"UPDATE payment SET status=$status WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Updated";
    }

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
                                                            
                            <div class="module">
                                <div class="module-head">
                                    <h2>Payment List</h2>
                                </div>
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Month</th>
                                            <th>Total Amount</th>
                                            <th>Payment method</th>
                                            <th>Payment Status</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT student.name, payment.month, payment.total, payment.method, payment.status, payment.id FROM payment,student WHERE payment.username = student.username ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $month = $row['month'];
                                            $total = $row['total'];
                                            $method = $row['method'];
                                            $status = $row['status'];
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $month; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $method; ?></td>
                                            <td><?php echo $status; ?></td>
                                            
                                        </tr> <?php $cnt=$cnt+1; } ?>
                                    </tbody>
                                </table>
                            </div>
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