<?php 
    include"include/config.php"; 
    session_start();


    if(isset($_GET['del'])){
        mysqli_query($connection,"DELETE FROM contact WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Mail deleted";
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
                                    <h2>Contact List</h2>
                                </div>
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM contact ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                            $id = $row['id'];
                                            $first_name = $row['first_name'];
                                            $last_name = $row['last_name'];
                                            $email = $row['email'];
                                            $message = $row['message'];
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $first_name." ".$last_name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $message; ?></td>
                                            <td>
                                                <a href="contact.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-remove-sign"></i></a>
                                            </td>
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