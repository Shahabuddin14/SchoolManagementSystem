<?php 
    include"includes/config.php";
    include"files/header.php" 
?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap" id="home-section">
       
        <?php include"files/nav.php" ?>

        <div class="ftco-blocks-cover-1">
            <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
                <div class="container">
                    <div class="row align-items-center ">
                        <div class="col-md-5 mt-5 pt-5">
                            <span class="text-cursive h5 text-red">Contact</span>
                            <h1 class="mb-3 font-weight-bold text-teal">Get In Touch</h1>
                            <p><a href="index.php" class="text-white">Home</a> <span class="mx-3">/</span> <strong>Contact</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-light" id="contact-section">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-7 text-center mb-5">
                        <h2>Get In Touch Using The Contact Form</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                    </div>
                </div>

                <?php

                    if(isset($_POST['submit'])){
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($message)){
                            $first_name = mysqli_real_escape_string($connection, $first_name);
                            $last_name = mysqli_real_escape_string($connection, $last_name);
                            $email = mysqli_real_escape_string($connection, $email);
                            $message = mysqli_real_escape_string($connection, $message);

                            $query = "INSERT INTO contact (first_name, last_name, email, message, send_date ) ";
                            $query .= "VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$message}', now() )";
                            $contact_query = mysqli_query($connection, $query);

                            if(!$contact_query){
                                die("Query Failed !" .mysqli_error($connection));
                            } 
                        } 
                    }
                ?>

                <div class="row">
                    <div class="col-lg-8 mb-5" >
                        <form action="#" method="post">
                            <div class="form-group row">
                                <div class="col-md-6 mb-4 mb-lg-0">
                                    <input type="text" class="form-control" placeholder="First name" name="first_name">
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="First name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" placeholder="Email address" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="message" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6 mr-auto">
                                    <button type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-auto">
                        <div class="bg-white p-3 p-md-5">
                            <h3 class="text-black mb-4">Contact Info</h3>
                            <ul class="list-unstyled footer-link">
                                <li class="d-block mb-3">
                                    <span class="d-block text-black">Address:</span>
                                    <span>34 Street Name, Dhaka, Bangladesh</span></li>
                                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>1 242 4942 290</span></li>
                                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@kdds.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include"files/footer.php" ?>

