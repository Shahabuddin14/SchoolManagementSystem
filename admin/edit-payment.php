<?php 
    include"include/config.php"; 
    session_start();

     if(isset($_POST['update'])){
        $status = $_POST['status'];
    
        $id = intval($_GET['id']);
        $sql = mysqli_query($connection,"UPDATE payment SET status='$status' WHERE id='$id'");
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
                                    <h3>Update Teacher Information</h3>
                                </div>
                                
                                <div class="module-body">
                                    <form class="form-horizontal row-fluid" name="Category" method="post" enctype="multipart/form-data">

                                        <?php
                                            $id = intval($_GET['id']);
                                            $query = mysqli_query($connection,"SELECT * FROM payment WHERE id='$id'");
                                        
                                            while($row=mysqli_fetch_array($query)){
                                                $status = $row['status'];
                                        ?>
                                       
                          
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Payment Status</label>
                                            <div class="controls">
                                                <select class="form-control" name="status">
                                                    <option value="<?php echo $status;?>" name="status"><?php echo "Previous status : ". $status;?></option>
                                                    <option value="successful" name="status">successful</option>
                                                    <option value="pending" name="status">pending</option>
                                                </select>
                                            </div>
                                        </div><?php } ?>	
                                        
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="update" class="btn">Upadete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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