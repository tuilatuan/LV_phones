<main>
    <div class="analytics">
        <?php 
        $str_bill =" SELECT * FROM bill  ";
        $query = mysqli_query($con, $str_bill);
        $totalProbill = 0;
        $totalPri = 0;
    while($row = mysqli_fetch_array($query)){
        $pro = $row['totalProduct'];
        $pri =$row['totalPrice'];
        $totalProbill = $totalProbill+$pro;
        $totalPri = $totalPri+$pri;
       
    }
        ?>
        <div class="analytic">
            <div class="analytic-icon">
            <i class="fa-solid fa-mobile-screen"></i>
            </div>
            <div class="analytic-info">
                <h4>Tổng sản phẩm bán được</h4>
                <h1><?php echo  $totalProbill ?></h1>
            </div>
        </div>
        <div class="analytic">
            <div class="analytic-icon">
                <i class="fa-regular fa-clock"></i>
            </div>
            <div class="analytic-info">
                <h4>Tổng thu (chưa trừ vốn)</h4>
                <h1><?php echo  $totalPri ?></h1>
            </div>
        </div>
        <div class="analytic">
            <div class="analytic-icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="analytic-info">
                <h4>Người theo dõi</h4>
                <h1>1.3k</h1>
            </div>
        </div>
        <div class="analytic">
            <div class="analytic-icon">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="analytic-info">
                <h4>Lượt yêu thích</h4>
                <h1>2M</h1>
            </div>
        </div>
    </div>
</main>