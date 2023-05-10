<main>
    <div class="analytics">
        <?php
        $str_bill = " SELECT * FROM bill  ";
        $query = mysqli_query($con, $str_bill);
        $totalProbill = 0;
        $totalPri = 0;
        while ($row = mysqli_fetch_array($query)) {
            $pro = $row['totalProduct'];
            $pri = $row['totalPrice'];
            $totalProbill = $totalProbill + $pro;
            $totalPri = $totalPri + $pri;
        }
        ?>
        <div class="analytic">
            <div class="boxtext">
                <div class="analytic-icon">
                    <i class="fa-solid fa-mobile-screen"></i>
                </div>
                <h4>Tổng sản phẩm bán được</h4>
            </div>
            <div class="analytic-info">
                <h1><?php echo  $totalProbill ?></h1>
            </div>
        </div>
        <div class="analytic">
            <div class="boxtext">
                <div class="analytic-icon">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <h4>Tổng thu (chưa trừ vốn)</h4>
            </div>
            <div class="analytic-info">
                
                <h1><?php echo  number_format( $totalPri, 0, ".", "."); ?> VND </h1>
            </div>
        </div>
        <div class="analytic">
            <div class="boxtext">
                <div class="analytic-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h4>Top sản phẩm bán chạy</h4>
            </div>
            <div class="analytic-info">
                
                <div class="selbox">
                    <select class="custom-select" name="queryTop" id="queryTop" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="?chon=t&id=1&top=1" <?php if (isset($_GET['top']) && $_GET['top'] == '1') { ?> selected <?php } ?>>Top 1</option>
                        <option value="?chon=t&id=1&top=5" <?php if (isset($_GET['top']) && $_GET['top'] == '5') { ?> selected <?php } ?>>Top 5</option>
                        <option value="?chon=t&id=1&top=10" <?php if (isset($_GET['top']) && $_GET['top'] == '10') { ?> selected <?php } ?>>Top 10</option>
                    </select>
                    <button class="btn btn-danger" id="open-modal-btn">Xem</button>
                </div>
            </div>
        </div>
        <!-- <div class="analytic">
            <div class="analytic-icon">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="analytic-info">
                <h4>Lượt yêu thích</h4>
                <h1>2M</h1>
            </div>
        </div> -->
        <?php
        $top = isset($_GET['top']) ? $_GET["top"] : "1";
        $strTop = "SELECT product.productID, product.productName, SUM(billdetails.productQuantity) AS total_quantity
                FROM product
                JOIN billdetails ON product.productID = billdetails.productID
                JOIN bill ON billdetails.billID = bill.billID
                GROUP BY product.productID, product.productName
                ORDER BY total_quantity DESC
                LIMIT $top;";
        $queryTop = mysqli_query($con, $strTop);
        ?>

        <!-- Modal -->
        <div id="modall" class="modall">
            <div class="modal-contentt">
                <span class="close">&times;</span>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Mã sản phẩm</strong></td>
                            <td class="text-center"><strong>Ảnh</strong></td>
                            <td class="text-center"><strong>Tên sản phẩm</strong></td>
                            <td class="text-center"><strong>Giá tiền sản phẩm</strong></td>
                            <td class="text-center"><strong>Số lượng bán được</strong></td>
                        </tr>
                    </thead>
                    <?php
                    while ($row_Top = mysqli_fetch_assoc($queryTop)) {
                        $Proid = $row_Top['productID'];
                        $ProQty = $row_Top['total_quantity'];
                        $proName = $row_Top['productName'];
                        $str_Pro = "SELECT * FROM product WHERE productID= $Proid";
                        $query_Pro = mysqli_query($con, $str_Pro);
                        $row = mysqli_fetch_assoc($query_Pro);
                        $img = $row['productImage'];
                        $proPri = number_format($row['productPrice'], 0, ".", ".");
                        echo "<tbody>
							<tr >
												<td class='text-center'><strong>$Proid</strong></td>
												<td class='text-center'><img src='../images/$img' alt='' style='max-width:60px;'></td>
												<td class='text-center'><strong>$proName</strong></td>
												<td class='text-center'><strong>$proPri</strong></td>
												<td class='text-center'><strong>$ProQty</strong></td>
											</tr>
										</tbody>";
                    } ?>
                </table>
            </div>
        </div>
    </div>
</main>
<style>
    /* Hiển thị modal */
    .modall {
        display: none;
        /* Ẩn modal ban đầu */
        position: fixed;
        /* Không thể di chuyển modal */
        z-index: 1;
        /* Đặt modal trên top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Cho phép trượt nội dung modal */
        background-color: rgba(0, 0, 0, 0.4);
        /* Tạo hiệu ứng mờ nền */
    }

    /* Hiển thị nội dung của modal */
    .modal-contentt {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 55%;
        border-radius: 5px;
        box-shadow: 0px 1px 6px 1px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 0px 1px 6px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 1px 6px 1px rgba(0, 0, 0, 0.75);

    }

    /* Đóng modal */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<script>
    // Lấy button mở modal
    var openModalBtn = document.getElementById("open-modal-btn");

    // Lấy modal
    var modal = document.getElementById("modall");

    // Lấy nút đóng modal
    var closeBtn = document.getElementsByClassName("close")[0];

    // Khi người dùng click vào button, hiển thị modal
    openModalBtn.onclick = function() {
        modal.style.display = "block";
    }

    // Khi người dùng click vào nút đóng, ẩn modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Khi người dùng click ra ngoài modal, ẩn modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>   