<?php 
    include"include/config.php"; 
    session_start();

    if(isset($_POST['submit'])){
        $sql = mysqli_query($connection,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['username']."'");
        $num = mysqli_fetch_array($sql);
        if($num>0){
            $con = mysqli_query($connection,"update admin set password='".md5($_POST['newpassword'])."', updationDate=now() where username='".$_SESSION['username']."'");
            $_SESSION['msg']="Password Changed Successfully !!";
        }
        else{
            $_SESSION['msg']="Old Password not match !!";
        }
    }
?> 
     <script type="text/javascript">
        function valid()
        {
        if(document.chngpwd.password.value=="")
        {
        alert("Current Password Filed is Empty !!");
        document.chngpwd.password.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value=="")
        {
        alert("New Password Filed is Empty !!");
        document.chngpwd.newpassword.focus();
        return false;
        }
        else if(document.chngpwd.confirmpassword.value=="")
        {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        return true;
        }
    </script>
  
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
                            <div class="module-head"><h3>Admin Change Password</h3></div>
                            <div class="module-body">

                                <?php 
                                    if(isset($_POST['submit'])){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>
                                <br>

                                <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Current Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your current Password"  name="password" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">New Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your new current Password"  name="newpassword" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Submit</button>
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