<?php 
    include"include/config.php"; 
    session_start();


   if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $class = $_POST['class'];
        $text = $_POST['text'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_temp, "../images/teacher/$image" );
       
        $sql = mysqli_query($connection,"INSERT INTO teacher (name, subject, class, text, image) values('$name', '$subject', '$class', '$text', '$image')");
        $_SESSION['msg']="Teacher Added";
    }
    

    if(isset($_GET['del'])){
        mysqli_query($connection,"DELETE FROM teacher WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Teacher deleted";
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
                                    <h3>Add Teacher</h3>
                                </div>
                                
                                <div class="module-body">
                                    <form class="form-horizontal row-fluid" name="Category" method="post" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter teacher Name"  name="name" class="span8 tip" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Subject</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter teacher Name"  name="subject" class="span8 tip" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Details</label>
                                            <div class="controls">
                                               <textarea name="text" id="" cols="20" rows="7" class="span8 tip"></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Photo</label>
                                            <div class="controls">
                                                <input type="file" placeholder="Select teacher photo"  name="image" class="span8 tip" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Frame Color</label>
                                            <div class="controls">
                                                <select class="form-control" name="class">
                                                    <option value="yellow" name="class">Select Frame Color</option>
                                                    <option value="yellow" name="class">yellow</option>
                                                    <option value="teal" name="class">teal</option>
                                                    <option value="red" name="class">red</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn">Add Teacher</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                                            
                            <div class="module">
                                <div class="module-head">
                                    <h2>Manage Teachers</h2>
                                </div>
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Teacher Name</th>
                                            <th>Subject</th>
                                            <th>Frame Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM teacher ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $subject = $row['subject'];
                                            $class = $row['class'];
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $subject; ?></td>
                                            <td><?php echo $class; ?></td>
                                            <td>
                                                <a href="edit-teacher.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
                                                <a href="teacher.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-remove-sign"></i></a>
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