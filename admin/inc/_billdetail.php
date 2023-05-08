
<?php
    $str_bill = "SELECT * FROM bill";
    $query = mysqli_query($con, $str_bill);
    while ($row_bill = mysqli_fetch_array($query)) {
        $billID = $row_bill['billID'];
        // $billID = $row_billdetail['billID'];

    ?>


        <div id="bill-detail<?php echo $billID ?>" class="modall">
            <div class="modal-contentt">
                <!-- <span class="close ">&times;</span> -->
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Mã hóa đơn</strong></td>
                            <td class="text-center"><strong>Ảnh</strong></td>
                            <td class="text-center"><strong>Tên sản phẩm</strong></td>
                            <td class="text-center"><strong>Số lượng sản phẩm</strong></td>
                            <td class="text-center"><strong>Giá tiền</strong></td>
                        </tr>
                    </thead>
                    <?php
                    $str_billdetail = "SELECT * FROM `billdetails` WHERE billID=$billID";
                    $query_billdetail = mysqli_query($con, $str_billdetail);
                    while ($row_billdetail = mysqli_fetch_assoc($query_billdetail)) {
                        $Proid = $row_billdetail['productID'];
                        $ProQty = $row_billdetail['productQuantity'];
                        $str_Pro = "SELECT * FROM product WHERE productID= $Proid";
                        $query_Pro = mysqli_query($con, $str_Pro);
                        $row = mysqli_fetch_assoc($query_Pro);
                        $proName = $row['productName'];
                        $img = $row['productImage'];
                        $proPri = $row['productPrice'];
                        echo "<tbody>
							<tr >
												<td class='text-center'><strong>$billID</strong></td>
												<td class='text-center'><img src='../images/$img' alt='' style='max-width:60px;'></td>
												<td class='text-center'><strong>$proName</strong></td>
												<td class='text-center'><strong>$ProQty</strong></td>
												<td class='text-center'><strong>$proPri</strong></td>
											</tr>
										</tbody>";
                    } ?>
                </table>
            </div>
        </div>
    <?php } ?>
    <style>
        .modall {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(255, 255, 255, 0.5);
        }

        /* Nội dung của modal */
        .modal-contentt {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: max-content;
            border-radius: 20px;
        }

        /* Nút đóng modal */
        /* .close {
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
        } */
    </style>
    <script>
        function openModal(id) {
            console.log(1);
            // Lấy thẻ modal
            var modalid = "#bill-detail" + id
            var modal = document.querySelector(modalid);

            // Lấy thẻ button để mở modal
            var modalbtn = "#bill-detailbtn" + id
            var btn = document.getElementById(modalbtn);


            // Lấy phần tử <span> đóng modal
            var span = document.getElementsByClassName("close<?php echo $billID ?>");
            // Khi người dùng nhấp vào nút, mở modal

            modal.style.display = "block";
            console.log(1);


            // Khi người dùng nhấp vào <span> (x), đóng modal
            // span.onclick = function() {
            //     modal.style.display = "none";
            // }

            // Khi người dùng nhấp bất kỳ đâu bên ngoài modal, đóng modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>