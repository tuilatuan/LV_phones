<main>
    <div class="product-info">

        <form action="pages/_productHandle.php" method="POST" enctype="multipart/form-data" class="product-info-left" style="height: 630px !important;">
            <div class="product-info-left-header">
                Thêm Sản Phẩm Mới
            </div>
            <div class="product-info-left-body">
                <div class="form-group">
                    <label class="control-label" for="">Tên:</label>
                    <br>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label class=" control-label" for="">Mô tả:</label>
                    <br>
                    <input type="text" class="form-control" id="desc" name="desc" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" required min="1">
                </div>
                <div class="form-group">
                    <label class="control-label">Số lượng</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                </div>
                <div class="form-group">
                    <label class="control-label">Danh mục</label>
                    <br>
                    <select name="categoryId" id="categoryId" class="custom-select browser-default" required>
                        <option hidden disabled selected value>---</option>
                        <?php

                        $string = "SELECT * FROM category ";
                        $query = mysqli_query($con, $string);
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $categoryID = $row['categoryID'];
                            $categoryName = $row['categoryName'];
                            echo "<option value='$categoryID'>$categoryName</option>";
                        } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label
                            ">Ảnh</label>
                    <input type="file" name="img" id="img" accept=".jpg" class="form-control" required>
                    <small id="info" class="form-text">
                        Chọn file .jpg
                    </small>
                </div>
            </div>
            <div class="product-info-left-footer">
                <button type="submit" class="btn-main btn-block btn" name="addPro" style="width: auto !important;margin-top: -20px;">Thêm</button>
            </div>
        </form>
        <div class="product-info-right">
            <div class="product-info-right-body">
                <div class="boxaction">
                    <?php
                    $sort_str = "";
                    if(!empty($_GET['field'] ) && !empty($_GET['sort'] )){
                        $field = $_GET['field'];
                        $sort = $_GET['sort'];
                        $sort_str .= "ORDER BY `product`.`$field` $sort ";
                        
                    }
                    if (!empty($_POST)) {
                        $_SESSION['productadm_search'] = $_POST;
                    }
                    if (!empty($_SESSION['productadm_search'])) {
                        $where = "";
                        // var_dump($_SESSION['productadm_search']);exit();
                        foreach ($_SESSION['productadm_search'] as $type => $value) {
                            if (!empty($value)) {
                                switch ($type) {
                                    case 'productName':
                                        $where .= (!empty($where)) ? " AND `$type` LIKE '%$value%'" : "`$type` LIKE '%$value%'";
                                        break;
                                    default:
                                        $where .= (!empty($where)) ? " AND $type = $value" : "$type = $value";
                                        break;
                                }
                            }
                        }
                        extract($_SESSION['productadm_search']);
                        // var_dump($productID);exit();
                        
                    }
                    if(!empty($where)){
                        $str_where = "WHERE ".$where;
                        // var_dump($str_where);exit();
                    }
                    if (!empty($where) && !empty($sort_str)) {
                        $string = "SELECT * FROM `product` ".$str_where .$sort_str;

                       
                    }else if(!empty($sort_str)){
                        $string = "SELECT * FROM `product` $sort_str ";

                    }
                    else if(!empty($where) ){
                        $string = "SELECT * FROM `product` $str_where ORDER BY `product`.`productID` ASC ";
                    }
                     else {
                        $string = "SELECT * FROM `product` ORDER BY `product`.`productID` ASC ";
                    }
                    $query = mysqli_query($con, $string);
                    ?>
                    <form action="?chon=t&id=4" method="POST" class="formsearch">
                        <fieldset class="fm-gr">
                            <legend>Tìm kiếm sản phẩm</legend>
                            <div class="box-inp">
                            <div class="box box-id">
                                <label for="productID">ID:</label>
                                <input class="inputsearch" type="text" name="productID" id="productID" value="<?= !empty($productID) ? $productID : "" ?>" placeholder="Nhập id sản phẩm">
                            </div>
                            <div class="box box-name">
                                <label for="productName">Tên:</label>
                                <input class="inputsearch" type="text" name="productName" id="productName" value="<?= !empty($productName) ? $productName : "" ?>" placeholder="Nhập tên sản phẩm">
                            </div>
                            </div>
                            <div class="gr-btn">
                                <input type="submit" value="Tìm" class="btn btn-active">
                                <input type="submit" value="Tất cả" class="btn btn-danger" onclick="clearI()">
                            </div>
                        </fieldset>
                    </form>
                    <div class="sortpro">
                        <label for="sortpro">Sắp xế theo giá: </label>
                        <select name="sortpro" id="sortpro" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="?chon=t&id=4"  <?php if(isset($_GET['sort'])&& $_GET['sort']== ''){?> selected <?php }?> >---</option>
                            <option value="?chon=t&id=4&field=productPrice&sort=desc"  <?php if(isset($_GET['sort'])&& $_GET['sort']== 'desc'){?> selected <?php }?>>Giảm dần</option>
                            <option value="?chon=t&id=4&field=productPrice&sort=asc" <?php if(isset($_GET['sort'])&& $_GET['sort']== 'asc'){?> selected <?php }?>  >Tăng dần</option>
                        </select>
                    </div>
                </div>

                <table class="table table-product-info">
                    <thead class="table-product-info-header">
                        <tr>
                            <th class="text-center" style="width:7%;">ID</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center" style="width:58%;">Chi Tiết Sản Phẩm</th>
                            <th class="text-center" style="width:18%;">Hành động</th>
                        </tr>
                    </thead>
                    <?php
//  var_dump($string);exit();
                    while ($row = mysqli_fetch_array($query)) {
                        $productID = $row['productID'];
                        $categoryID = $row['categoryID'];
                        $productName = $row['productName'];
                        $productPrice = number_format($row['productPrice'], 0, ".", ".");
                        $productImage = $row['productImage'];
                        $productDetail = $row['productDetail'];
                        $productQuantity = $row['productQuantity'];
                        echo "
                                <tbody>
                                <tr class='table-product-info-body'>
                                    <td class='text-center' ><b id='proid$productID'>$productID</b></td>
                                    <td><img src='../images/$productImage' alt='image for this Category' width='150px' height='150px'></td>
                                    <td class='detail-product'>
                                        <p class='namepageproduct'>Tên: <b  id='proname$productID' title='$productName'>$productName</b></p>
                                        <p>Giá: <b class='truncate' id='proPri$productID'>$productPrice</b> VND</p>
                                            <p>Số lượng: <b id='proQty$productID'>$productQuantity</b></p>
                                            <p>Mô tả: <b id='proDetail$productID'>$productDetail</b></p>
                                            <p      >Mã loại: <b id='catepro$productID'>$categoryID</b></p>
                                    </td>
                                    <td class='text-center'>
                                        <div class='action' style='width:112px'>
                                            <div>

                                            <label class='btn btn-active edit-text' for='edit-toggle' onclick='updatePro($productID)'>
                                            <input type='hidden' id='proreIn' name='catereIn'  value='$productID'>
                                                Sửa
                                            </label>
                                            </div>
                                                
                                            <form action='pages/_productHandle.php' method='POST' onsubmit='return delitem()'>
                                                <button type='submit' name='delPro' class='btn  btn-danger'>Xóa</button>
                                                <input type='hidden' name='proId' value='$productID'>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                                ";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <input type="checkbox" id="edit-toggle">
    <div class="overlay">
        <label for="edit-toggle">
        </label>
    </div>
    <div class="modal-dialog1" id="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCat2">ID Sản Phẩm: <b id='editproid'>1</b></h5>
            </div>
            <div class="modal-body">
                <form action="pages/_productHandle.php" method="post" enctype="multipart/form-data">
                    <div class="display" style="border-bottom: 2px solid #dee2e6;">
                        <div class="form-group ">
                            <b><label for="image">Ảnh</label></b>
                            <input type="file" name="proimage" id="proimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                            <small id="Info" class="form-text ">Chọn file .jpg</small>
                            <input type="hidden" id="proimgId" name="proimgId" value="">
                            <button type="submit" class="btn btn-success my-1" name="updateproPhoto">Cập
                                nhật</button>
                        </div>
                        <div class="form-group ">
                            <img src="./assets/img/img1.jpg" style="width: 50px; height: 50px;" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
                        </div>
                    </div>
                </form>
                <form action="pages/_productHandle.php" method="post">
                    <div class="text-left">
                        <b><label for="name">Tên</label></b>
                        <input class="form-control" id="namepro" name="name" value="" type="text" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <b><label for="price">Price</label></b>
                        <input class="form-control" id="pricepro" name="price" value="" type="number" min="1" required>
                    </div>
                    <div class="form-group">
                        <b><label for="quantity">Số lượng</label></b>
                        <input class="form-control" id="quantitypro" name="quantity" value="" type="number" min="0" required>
                    </div>
                    <div class="form-group">
                        <b><label for="catId">Loại sản phẩm</label></b>
                        <!-- <input class="form-control" id="catId" name="catId" value="" type="number" min="1" required> -->
                        <select name="cateId" id="cateId" class="custom-select browser-default" "  required>
                        <option hidden disabled selected value>---</option>
                        <?php

                        $string = "SELECT * FROM category ";
                        $query = mysqli_query($con, $string);
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $categoryID = $row['categoryID'];
                            $categoryName = $row['categoryName'];
                            echo "<option value='$categoryID'>$categoryName</option>";
                        } ?>

                    </select>
                    </div>
                    <div class=" text-left">
                            <b><label for="desc">Mô tả</label></b>
                            <textarea class="form-control" id="descpro" name="desc" rows="2" required minlength="6" value=""></textarea>
                    </div>
                    <br>
                    <input type="hidden" id="proId" name="proId" value="">
                    <button type="submit" class="btn btn-success" name="updatePro">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    function updatePro(id) {
        var proid = '#proid' + id;
        var proname = '#proname' + id
        var pri = '#proPri' + id
        var qty = '#proQty' + id
        var detail = '#proDetail' + id
        var cateid = '#catepro' + id
        document.querySelector('#editproid').innerHTML = id;
        var cate = document.querySelector(cateid).innerHTML;
        var proidd = document.querySelector(proid).innerHTML;
        var pronamee = document.querySelector(proname).innerHTML;
        var prii = document.querySelector(pri).innerHTML;
        var qtyy = document.querySelector(qty).innerHTML;
        var detaill = document.querySelector(detail).innerHTML;
        document.querySelector('#namepro').value = pronamee;
        document.querySelector('#pricepro').value = parseInt(prii.replace(/\./g, ""));
        document.querySelector('#descpro').value = detaill;
        document.querySelector('#quantitypro').value = qtyy;
        document.querySelector('#proId').value = id;
        document.querySelector('#proimgId').value = id;
        // document.querySelector('#cateId').value = id;
        $('#cateId').val(cate);



        console.log(proidd + '/' + pronamee + '/' + prii + '/' + qtyy + '/' + detaill + '/' + cate);

    }

    function clearI() {
         var inp = document.querySelectorAll('.inputsearch');
        inp.forEach(function(item){
            item.value=''
        })
    }
</script>