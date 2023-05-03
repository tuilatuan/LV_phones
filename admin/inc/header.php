<header class="main-content-header ">
    <div>
        <label class="button-hiden" for="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <?php
        if ($page = isset($_GET['id']) ? $_GET['id'] : '1') {
            switch ($page) {
                case '1':
                    echo '<a href="" class="main-content_link ">
        <i class="fa-solid fa-house"></i>
        <span>Trang Chủ</span>
    </a>';
                    break;
                case '2':
                    echo '<a href="" class="main-content_link ">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Hóa đơn</span>
    </a>';
                    break;
                case '3':
                    echo '<a href="" class="main-content_link ">
        <i class="fa-sharp fa-solid fa-folder"></i>
        <span>Danh mục sản phẩm</span>
    </a>';
                    break;
                case '4':
                    echo ' <a href="" class="main-content_link ">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Sản phẩm</span>
    </a>';
                    break;
                case '5':
                    echo ' <a href="" class="main-content_link ">
        <i class=" fa-solid fa-comment"></i>
        <span>Phản hồi</span>
    </a>';
                    break;
                case '6':
                    echo '<a href="" class="main-content_link ">
        <i class="fa-solid fa-user"></i>
        <span>Tài khoản</span>
    </a>';
                    break;
                case '7':
                    echo ' <a href="" class="main-content_link ">
        <i class="fa-solid fa-gear"></i>
        <span>Cài đặt</span>
    </a>';
                    break;
            }
        }
        ?>

    </div>
    <div class="main-content-header-avartar">
        <div>
            <img src="./assets/img/img1.jpg" alt="">
        </div>
        <div class="main-content-header-avartar-info">
            <div>
                <h4><?php echo $managename ?></h4>
            </div>
        </div>
    </div>
</header>