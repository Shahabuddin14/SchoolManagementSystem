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
                            <span class="text-cursive h5 text-red">Gallery</span>
                            <h1 class="mb-3 font-weight-bold text-teal">Gallery Of Kids</h1>
                            <p><a href="index.php" class="text-white">Home</a> <span class="mx-3">/</span> <strong>Gallery</strong></p>
                        </div>
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
                        $query = "SELECT * FROM gallery";
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
            </div>
        </div>

<?php include"files/footer.php" ?>

