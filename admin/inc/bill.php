<main>
    <div class="table-warpper">
        <div class="table-title">
            <div class="table-title-left">
                <span>Hóa Đơn</span>
            </div>
            <div class="table-title-right">
                <!-- <div class="button-print">
                    <a href="">
                        <i class="fa-solid fa-file"></i>
                        <span>In hóa đơn</span>
                    </a>
                </div> -->
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
                            <th>$billID</th>
                            <th>$accountID</th>
                            <th>$address</th>
                            <th>$totalProduct</th>
                            <th>$totalPrice</th>
                            <th>$billDate</th>
                            <th>
                            <form  id='bill$billID'>
                            <select class='custom-select status$billID' name='status' id='status' onchange='updateStatus($billID)'>
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
                                </select>
                                <input type='hidden' name='billid' id='billid' value='$billID'>
                                </form>
                                </th>
                            <th>
                                <button id='#bill-detail$billID'  class='btn btn-success'>Chi tiết
                                </button>
                            </th>
                        </tr>
                    </tbody>
                ";
            }
            ?>
        </table>
    </div>
   
    <?php 
    include('_billdetail.php')
    ?>
    <script>
        function updateStatus(billId) {
            $.ajax({
                url: 'pages/_billHandle.php',
                type: 'POST',
                data: $("#bill" + billId).serialize(),
                success: function(res) {
                    location.reload();

                }

            });

        }
    </script>

    <?php
    $string = "SELECT * FROM bill ";
    $query = mysqli_query($con, $string);
    while ($row = mysqli_fetch_array($query)) {
        $billID = $row['billID'];
        $billStatus = $row['billStatus'];
        echo "
            <script>
            document.querySelector('.status$billID').value = $billStatus;
            </script>
    ";
    }

    ?>