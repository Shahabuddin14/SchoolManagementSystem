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
                            <span class="text-cursive h5 text-red">Welcome To Our Website</span>
                            <h1 class="mb-3 font-weight-bold text-teal">About Us</h1>
                            <p><a href="index.php" class="text-white">Home</a> <span class="mx-3">/</span> <strong>About</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    
                    <div class="col-md-5 ml-auto pl-md-5">
                        <span class="text-cursive h5 text-red">About Us</span>
                        <h3 class="text-black">Bring Fun Life To Your Kids</h3>
                        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et harum, magni sequi nostrum maxime enim.</span><span>Magnam id atque dicta deleniti, ipsam ipsum distinctio. Facilis praesentium voluptatem accusamus, earum veritatis, laudantium.</span></p>
                        <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">More About Us</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-teal">
            <div class="container">
                <div class="row justify-content-center text-center mb-2 section-2-title">
                    <div class="col-md-6">
                        <span class="text-cursive h5 text-red">The Teacher</span>
                        <h3 class="text-white text-center">Meet The Teacher</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    </div>
                </div>
                
                <div class="row align-items-stretch">
                    <?php 
                        $query = "SELECT * FROM teacher";
                        $select_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_query)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $subject = $row['subject'];
                        $text = $row['text'];
                        $class = $row['class'];
                        $image = $row['image'];
                    ?>

                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="post-entry-1 h-100 person-1 <?php echo $class; ?>">
                            <img src="images/teacher/<?php echo $image; ?>" alt="Image" class="img-fluid">
                            <div class="post-entry-1-contents">
                                <span class="meta"><?php echo $name; ?></span>
                                <h2><?php echo $subject; ?></h2>
                                <p><?php echo $text; ?></p>
                            </div>
                        </div>
                    </div><?php } ?>
                </div>
            </div>
        </div>
<?php include"files/footer.php" ?>

