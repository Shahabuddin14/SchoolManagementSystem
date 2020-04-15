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
                            <h1 class="mb-3 font-weight-bold text-teal">Bring Fun Life To Your Kids</h1>
                            <p class="mt-5"><a href="#" class="btn btn-primary py-4 btn-custom-1">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                      <?php 
                        $query = "SELECT * FROM facilities";
                        $select_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_query)){
                        $id = $row['id'];
                        $icon = $row['icon'];
                        $heading = $row['heading'];
                        $text = $row['text'];
                        $class = $row['class'];
                    ?>
                   
                    <div class="col-lg-4">
                        <div class="block-2 <?php echo $class; ?>">
                            <span class="wrap-icon">
                                <?php echo $icon; ?>
                            </span>
                            <h2><?php echo $heading; ?></h2>
                            <p><?php echo $text; ?></p>
                        </div>
                    </div><?php } ?>
                </div>
            </div>
        </div>

        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-5 ml-auto pl-md-5">
                        <span class="text-cursive h5 text-red">About Us</span>
                        <h3 class="text-black">Bring Fun Life To Your Kids</h3>
                        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et harum, magni sequi nostrum maxime enim.</span><span>Magnam id atque dicta deleniti, ipsam ipsum distinctio. Facilis praesentium voluptatem accusamus, earum veritatis, laudantium.</span></p>
                        <p class="mt-5"><a href="about.php" class="btn btn-warning py-4 btn-custom-1">More About Us</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <span class="text-cursive h5 text-red d-block">Our Gallery</span>
                        <h2 class="text-black">Gallery Of The Kids</h2>
                    </div>
                </div>
                
                <div class="row">
                    
                    <?php 
                        $query = "SELECT * FROM gallery LIMIT 4";
                        $select_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_query)){
                        $id = $row['id'];
                        $img_1 = $row['img_1'];
                        $img_2 = $row['img_2'];
                    ?>


                    <div class="col-md-3 mb-4">
                        <a href="images/<?php echo $img_1; ?>" data-fancybox="gal">
                            <img src="images/<?php echo $img_1; ?>" alt="Image" class="img-fluid">
                        </a>
                    </div><?php } ?>
                </div>
                <p class="mt-5 text-center"><a href="gallery.php" class="btn btn-warning py-4 btn-custom-1">View All</a></p>
            </div>
        </div>

<?php include"files/footer.php" ?>
