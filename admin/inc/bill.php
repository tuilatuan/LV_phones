<main>
    <div class="table-warpper">
        <div class="table-title">
            <div class="table-title-left">
                <span>Hóa Đơn</span>
            </div>
            <div class="table-title-right">
                <div class="button-print">
                    <a href="">
                        <i class="fa-solid fa-file"></i>
                        <span>In hóa đơn</span>
                    </a>
                </div>
                <div class="button-resset">
                    <a href="">
                        <i class="fa-solid fa-rotate-right"></i>
                        <span>Làm mới</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="alert">
                    <span class="alert-text">Bạn không có đơn hàng nào!</span>
                </div> -->
        <table class="table-content">
            <thead class="table-thead">
                <tr>
                    <th>ID HÓA ĐƠN </th>
                    <th>ID KHÁCH HÀNG </th>
                    <th>ĐỊA CHỈ </th>
                    <th>TONG SAN PHAM</th>
                    <th>TỔNG TIỀN</th>
                    <th>NGÀY ĐẶT HÀNG </th>
                    <th>TRẠNG THÁI </th>
                    <th>SẢN PHẨM</th>
                </tr>
            </thead>
            <?php

            $string = "SELECT * FROM bill ";
            $query = mysqli_query($con, $string);
            $count = 0;
            while ($row = mysqli_fetch_array($query)) {
                $accountID = $row['accountID'];
                $billID = $row['billID'];
                $address = $row['address'];
                $totalProduct = $row['totalProduct'];
                $totalPrice = $row['totalPrice'];
                $billDate = $row['billDate'];
                $billStatus = $row['billStatus'];
                $count++;
                echo " <tbody class='table-tbody'>
                        <tr>
                            <th>$count</th>
                            <th>$accountID</th>
                            <th>$address</th>
                            <th>$totalProduct</th>
                            <th>$totalPrice</th>
                            <th>$billDate</th>
                            <th><select class='custom-select' name='status' id='status'>
                                    <option value='0'>
                                        Đã đặt hàng
                                    </option>
                                    <option value='1'>
                                        Xác nhận đơn hàng.
                                    </option>
                                    <option value='2'>
                                        Đang chuẩn bị đơn hàng.
                                    </option>
                                    <option value='3'>
                                        Đang giao hàng.
                                    </option>
                                    <option value='4'>
                                        Đã giao hàng.
                                    </option>
                                    <option value='5'>
                                        Đơn hàng bị từ chối.
                                    </option>
                                    <option value='6'>
                                        Đơn hàng bị hủy.
                                    </option>
                                </select></th>
                            <th>
                                <span>
                                    <img src='assets/img/img1.jpg' alt='' class='img-style'>
                                </span>
                            </th>
                        </tr>
                    </tbody>
                ";
            }
            ?>
        </table>
    </div>
    <div class="show-product">
        <div class="show-product-header">
            <h5>Sản phẩm (ID hóa đơn: 4)
            </h5>
        </div>
        <div class="show-product-body">
            <div class="container">
                <div class="container-product">
                    <thead>
                        <tr>
                            <th>
                                <div class="display">
                                    <div class="product-text">Sản phẩm
                                    </div>
                                    <div class="product-quality">
                                        Số lượng
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <div class="display">
                                    <div class="product-textt">Hinh Sản phẩm
                                    </div>
                                    <div class="product-qualityy" > 
                                        x1
                                    </div>
                                </div>
                            </th>
                </div>
                </tr>
                </tbody>
            </div>
        </div>
    </div>
