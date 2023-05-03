<main>
    <div class="product-info">
        <form action="pages/_cateHandle.php" method="POST" class="product-info-left">
            <div class="product-info-left-header">
                Thêm danh mục mới
            </div>
            <div class="product-info-left-body">
                <div class="form-group">
                    <label class="control-label" for="">Thêm danh mục:</label>
                    <br>
                    <input type="text" class="form-control" name="nameCate" required>
                </div>
                <!-- <div class="form-group">
                            <label class=" control-label" for="">Mô tả:</label>
                            <br>
                            <input type="text" class="form-control" name="desc" required> -->
                <!-- </div> -->
                <!-- <div class="form-group">
                            <label for="image" class="control-label
                            ">Ảnh</label>
                            <input type="file" name="img" id="img" accept=".jpg" class="form-control" required>
                            <small id="info" class="form-text">
                                Chọn file .jpg
                            </small>
                        </div> -->
            </div>
            <div class="product-info-left-footer">
                <button type='submit' name="cateadd" class="btn-main btn-block btn " style="width: auto !important;">Thêm</button>
            </div>
        </form>

        <div class="product-info-right">
            <div class="product-info-right-body">
                <table class="table table-product-info">
                    <thead class="table-product-info-header">
                        <tr>
                            <th class="text-center" style="width:7%;">ID</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center" style="width:58%;">Chi tiết danh mục</th>
                            <th class="text-center" style="width:18%;">Hành động</th>
                        </tr>
                    </thead>
                    <?php

                    $string = "SELECT * FROM category ";
                    $query = mysqli_query($con, $string);
                    $count = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $categoryID = $row['categoryID'];
                        $categoryName = $row['categoryName'];
                        $count++;
                        echo " <tbody>
                                <tr class='table-product-info-body'>
                                    <td class='text-center'>$categoryID</b></td>
                                    <td><img src='assets/img/img1.jpg' alt='image for this Category' width='150px' height='150px'></td>
                                    <td>
                                        <p>Tên: <b id='catename$categoryID'>$categoryName</b></p>
                                            </b></p>
                                    </td>
                                    <td class='text-center'>
                                        <div class='action' style='width:112px'>
                                            <div>
                                                <label class='btn btn-active edit-text' for='edit-toggle' onclick='updateCate($categoryID)'>
                                                <input type='hidden' id='catereIn' name='catereIn'  value='$categoryID'>
                                                    Sửa
                                                </label>
                                            </div>
                                            <form action='pages/_cateHandle.php' method='POST' onsubmit='return delitem()'>
                                                <button name='removeCategory' class='btn  btn-danger'>Xóa</button>
                                                <input type='hidden' name='catere' value='$categoryID'>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>";
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
    <div class="modal-dialog" id="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCat2">ID Danh mục: <b id='idcate'>1</b></h5>
            </div>
            <div class="modal-body">
                <form action="pages/_cateHandle.php" method="post">
                    <div class="text-left">
                        <b><label for="name">Tên</label></b>
                        <input class="form-control" id="namecatefr" name="namecatefr" value="" type="text" required>
                    </div>
                    <br>
                    <input type="hidden" id="catID" name="catID" value="">
                    <button type="submit" class="btn btn-success" name="updateCategory">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

</main>
<script>
    function updateCate(cateID) {
        var cur = '#catename' + cateID;
        var data = cateID;
        document.querySelector('#catID').value = data;
        document.querySelector('#idcate').innerHTML = data
        var p = document.querySelector(cur).innerHTML;
        document.querySelector('#namecatefr').value = p
    }
    updateCate()
</script>