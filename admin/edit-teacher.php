<?php 
    include"include/config.php"; 
    session_start();

     if(isset($_POST['update'])){
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $class = $_POST['class'];
        $text = $_POST['text'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_temp, "../images/teacher/$image" );

        $id = intval($_GET['id']);
        $sql = mysqli_query($connection,"UPDATE teacher SET name='$name',subject='$subject',class='$class',text='$text',image='$image' WHERE id='$id'");
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
                                            $query = mysqli_query($connection,"SELECT * FROM teacher WHERE id='$id'");
                                        
                                            while($row=mysqli_fetch_array($query)){
                                                $name = $row['name'];
                                                $subject = $row['subject'];
                                                $class = $row['class'];
                                                $text = $row['text'];
                                                $image = $row['image'];
                                        ?>
                                       
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter teacher Name"  name="name" value="<?php echo $name;?>" class="span8 tip" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Subject</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter teacher Name"  name="subject" value="<?php echo $subject;?>" class="span8 tip" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Details</label>
                                            <div class="controls">
                                               <textarea name="text" id="" cols="20" rows="7" class="span8 tip" placeholder="<?php echo $text;?>"></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Teacher Photo</label>
                                            <div class="controls">
                                                <input type="file" placeholder="Select teacher photo"  name="image" class="span8 tip" value="<?php echo $image;?>" required>
                                            </div>
                                        </div>
                                        
                                         <div class="control-group">
                                            <label class="control-label" for="basicinput">Frame Color</label>
                                            <div class="controls">
                                                <select class="form-control" name="class">
                                                    <option value="<?php echo $class;?>" name="class"><?php echo "Previous Color : ". $class;?></option>
                                                    <option value="yellow" name="class">yellow</option>
                                                    <option value="teal" name="class">teal</option>
                                                    <option value="red" name="class">red</option>
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