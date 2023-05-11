<main>
    <div class="table-warpper">
        <div class="table-title">
        <?php
                    $sort_str = "";
                    if(!empty($_GET['field'] ) && !empty($_GET['sort'] )){
                        $field = $_GET['field'];
                        $sort = $_GET['sort'];
                        $sort_str .= "ORDER BY `bill`.`$field` $sort ";
                        
                    }
                    if (!empty($_POST)) {
                        $_SESSION['billadm_search'] = $_POST;
                        // var_dump($_SESSION['billadm_search']);exit();
                    }
                    if (!empty($_SESSION['billadm_search'])) {
                        $where = "";
                        // var_dump($_SESSION['billadm_search']);exit();
                        foreach ($_SESSION['billadm_search'] as $type => $value) {
                            if (!empty($value)) {
                                switch ($type) {
                                    case 'fullname':
                                        $where .= (!empty($where)) ? " AND `$type` LIKE '%$value%'" : "`$type` LIKE '%$value%'";
                                        break;
                                    default:
                                        $where .= (!empty($where)) ? " AND $type = $value" : "$type = $value";
                                        break;
                                }
                            }
                        
                        // var_dump($_SESSION['billadm_search'] );exit();
                        }
                        extract($_SESSION['billadm_search']);
                        // var_dump();exit();
                        
                    }
                    if(!empty($where)){
                        $str_where = "WHERE ".$where;
                        // var_dump($str_where);exit();
                    }
                    if (!empty($where) && !empty($sort_str)) {
                        $string = "SELECT * FROM `bill` ".$str_where .$sort_str;

                       
                    }else if(!empty($sort_str)){
                        $string = "SELECT * FROM `bill` $sort_str ";

                    }
                    else if(!empty($where) ){
                        $string = "SELECT * FROM `bill` $str_where ORDER BY `bill`.`billID` ASC ";
                        // var_dump($string);exit();

                    }
                     else {
                        $string = "SELECT * FROM `bill` ORDER BY `bill`.`billID` ASC ";
                    }
                    $query = mysqli_query($con, $string);
                    ?>
            <div class="table-title-left">
                <span>Hóa Đơn</span>
            </div>
            <form action="?chon=t&id=2" method="POST" class="formsearch">
                <fieldset class="fm-gr">
                    <legend>Tìm kiếm sản phẩm</legend>
                    <div class="box-inp" style="flex-direction: column;">
                        <div class="box box-id">
                            <label for="billID">ID:</label>
                            <input class="inputsearch" type="text" name="billID" id="billID" value="<?= !empty($billID) ? $billID : "" ?>" placeholder="Nhập id hóa đơn">
                        </div>
                        <div class="box box-name">
                            <label for="fullname">Tên:</label>
                            <input class="inputsearch" type="text" name="fullname" id="fullname" value="<?= !empty($fullname) ? $fullname : "" ?>" placeholder="Nhập tên khách hàng">
                        </div>
                    </div>
                    <div class="gr-btn">
                        <input type="submit" value="Tìm" class="btn btn-active">
                        <input type="submit" value="Tất cả" class="btn btn-danger" onclick="clearI()">
                    </div>
                </fieldset>
            </form>
            <div class="sortpro">
                        <label for="sortpro">Sắp xếp theo tổng tiền: </label>
                        <select name="sortpro" id="sortpro" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="?chon=t&id=2"  <?php if(isset($_GET['sort'])&& $_GET['sort']== ''){?> selected <?php }?> >---</option>
                            <option value="?chon=t&id=2&field=totalPrice&sort=desc"  <?php if(isset($_GET['sort'])&& $_GET['sort']== 'desc'){?> selected <?php }?>>Giảm dần</option>
                            <option value="?chon=t&id=2&field=totalPrice&sort=asc" <?php if(isset($_GET['sort'])&& $_GET['sort']== 'asc'){?> selected <?php }?>  >Tăng dần</option>
                        </select>
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
                    <th>TÊN KHÁCH HÀNG </th>
                    <th>ĐỊA CHỈ </th>
                    <th>TONG SAN PHAM</th>
                    <th>TỔNG TIỀN</th>
                    <th>NGÀY ĐẶT HÀNG </th>
                    <th>TRẠNG THÁI </th>
                    <th>SẢN PHẨM</th>
                </tr>
            </thead>
            <?php

            $count = 0;
            while ($row = mysqli_fetch_array($query)) {
                $accountID = $row['accountID'];
                $name= $row['fullname'];
                $billID = $row['billID'];
                $address = $row['address'];
                $totalProduct = $row['totalProduct'];
                $totalPrice =  number_format($row['totalPrice'], 0, ".", ".");
                $billDate = $row['billDate'];
                $billStatus = $row['billStatus'];
                $count++;
                echo " <tbody class='table-tbody'>
                        <tr>
                            <th>$billID</th>
                            <th>$name</th>
                            <th>$address</th>
                            <th>$totalProduct</th>
                            <th>$totalPrice VND</th>
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
                                <button id='#bill-detailbtn$billID'  class='btn btn-success' onclick='openModal($billID)'>Chi tiết
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
    include('_billdetail.php');
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
        function clearI() {
         var inp = document.querySelectorAll('.inputsearch');
        inp.forEach(function(item){
            item.value=''
        })
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