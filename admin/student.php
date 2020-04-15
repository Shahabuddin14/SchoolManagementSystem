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
                            <h2><strong>List of Students</strong></h2>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Guardian  Name</th>
                                        <th>Class/Section/Roll</th>
                                        <th>Student Email</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM student ";
                                        $select_query = mysqli_query($connection, $query);

                                        $cnt = 1;
                                        while($row = mysqli_fetch_assoc($select_query)){

                                        $name = $row['name'];
                                        $guardian = $row['guardian'];
                                        $class = $row['class'];
                                        $roll = $row['roll'];
                                        $section = $row['section'];
                                        $email = $row['email'];
                                    ?>

                                    <tr>
                                        <td><?php echo $cnt ;?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $guardian; ?></td>
                                        <td><?php echo $class." / ". $section." / ".$roll; ?></td>
                                        <td><?php echo $email; ?></td>
                                    </tr> <?php $cnt=$cnt+1; } ?>
                                </tbody>
                            </table>
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