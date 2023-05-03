<div id="banner">
    <div class="container">
        <div class="banner-carousel">
            <?php 
            require('./db/connect.php');
           
            $str_slide = "SELECT * FROM slideshow";
            $query = mysqli_query($con ,$str_slide);
            while($row = mysqli_fetch_array($query)){
                $img = $row['slideImage'];
                echo " <div class='carousel-cell item' style=''>
                <a class='' href=''><img src='./images/$img' alt='' /></a>
            </div>";
            }
            ?>
            <!-- <div class="carousel-cell">
                <a class="" href=""><img src="./images/banner-2.png" alt="" /></a>
            </div>
            <div class="carousel-cell">
                <a class="" href=""><img src="./images/banner-1.png" alt="" /></a>
            </div>
            <div class="carousel-cell">
                <a class="" href=""><img src="./images/banner-4.png" alt="" /></a>
            </div>
            <div class="carousel-cell">
                <a class="" href=""><img src="./images/banner-5.png" alt="" /></a>
            </div> -->
        </div>
        <div class="banner_right">
            <div class="box box1">
                <a href=""><img src="./images/box-banner-1.png" alt="" /></a>
            </div>
            <div class="box box2">
                <a href=""><img src="./images/box-banner.png" alt="" /></a>
            </div>
        </div>
    </div>
</div>