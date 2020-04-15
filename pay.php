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
                        </div>

                        <?php
                            if(isset($_SESSION['username'])){ 
                                $username = $_SESSION['username'];
                            }

                            if(isset($_POST['payment'])){
                                $month = $_POST['month'];
                                $amount = $_POST['amount'];
                                $fine = $_POST['fine'];
                                $total = $amount + $fine;
                                $method = $_POST['method'];
                                

                                $query = "INSERT INTO payment (username, month, amount, fine, total, method, status, date) ";
                                $query .= "VALUES( '{$username}','{$month}', '{$amount}', '{$fine}', '{$total}', '{$method}','Pending', now() ) ";
                                $pay_query = mysqli_query($connection, $query);

                                if($pay_query){
                                    echo "<script>alert('Payment successfully Complete');</script>";
                                }
                                else{
                                    echo "<script>alert('Not register something went worng');</script>";
                                }

                            }
                        ?>
                        
                        <form class="form-horizontal row-fluid" method="post">
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Month Name</label>
                                <div class="controls">
                                    <select name="month" class="span8">
                                        <option value="select" selected>Select month</option>
                                        <?php 
                                            $query = "SELECT * FROM months";
                                            $month_query = mysqli_query($connection, $query);

                                            if(!$month_query){
                                                die("Not Connected" . mysqli_error($connection));
                                            }

                                            while($row = mysqli_fetch_assoc($month_query)){
                                                $month_name = $row['name'];
                                                echo "<option value ='$month_name' >{$month_name}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Fees</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" name="amount">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Fine</label>
                                <div class="controls">
                                    <input type="text" id="basicinput" placeholder="Type something here..." class="span8" name="fine">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Radiobuttons</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="method" id="optionsRadios1" value="Bkash" checked="">
                                        Bkash
                                    </label>
                                     
                                    <label class="radio">
                                        <input type="radio" name="method" id="optionsRadios2" value="Rocket">
                                        Rocket
                                    </label> 
                                    
                                    <label class="radio">
                                        <input type="radio" name="method" id="optionsRadios3" value="Bank">
                                        Bank
                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn" name="payment">Make Payment</button>
                                </div>
                            </div>
                        </form>              
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
