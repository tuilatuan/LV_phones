<main>
    <div class="">
        <div class="">
            <div class='add-user'>
                <label for=show-add-user class='btn btn-main mt-1' type=button>Thêm Người Dùng</label>
                <div class="card-body">
                    <table class="table add-user-info" style="margin-top: 1rem; ">
                        <thead class="add-user-info-header">
                            <tr>
                                <th>ID người dùng</th>
                                <th style="width:10%">Ảnh</th>
                                <th>Tên người dùng</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Phân quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <?php

                        $string = "SELECT * FROM account ";
                        $query = mysqli_query($con, $string);
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $accountID = $row['accountID'];
                            $fullname = $row['fullname'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $phone = $row['phone'];
                            $role = $row['role'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $count++;
                            echo "  
                                <tbody style= background-color: #fff;>
                                <tr style='text-align: center;'>
                                    <td class='acc$accountID'>$accountID  </td>
                                    <td><img src=./assets/img/img1.jpg alt=image for this user onError=this.src ='/OnlinePizzaDelivery/img/profilePic.jpg' width=100px height=100px></td>
                                    <td class='username$accountID'>$username</td>
                                    <td>
                                        <p class='fullname$accountID'>$fullname</p>
                                    </td>
                                    <td class='email$accountID'>$email</td>
                                    <td class='phone$accountID'>$phone</td>
                                    <td class='role$accountID'>$role</td>
                                    <td class=text-center>
                                        <div class=display style=width:112px>
                                            <label for=show-toggle class= 'btn btn-active'  type='button' onclick='updateAcc($accountID)'>Sửa</label>";

                            if ($managerole  == 2) {
                                echo "
                                        <form action='pages/_accountHandle.php' method='POST' onsubmit='return delitem()'>
                                        <button style='margin-bottom: .5rem; margin-left: .5rem; pointer-events: none;opacity: 0.6;' type='submit' name='DelAcc' class='btn  btn-danger' disabled >Xóa</button>
                                        <input type='hidden' name='AccId' value='$accountID'>
                                    </form>
                                    </div>
                                    </td>
                                    </tr>
                                    </tbody>";
                            } else {
                                if ($manageId == $accountID) {
                                    echo "
                                        <button style='margin-bottom: .5rem; margin-left: .5rem; pointer-events: none;opacity: 0.6;' type='submit' name='DelAcc' class='btn  btn-danger' disabled >Xóa</button>
                                    </div>
                                    </td>
                                    </tr>
                                    </tbody>";
                                } else {
                                    echo "
                                        <form action='pages/_accountHandle.php' method='POST' onsubmit='return delitem()'>
                                        <button style='margin-bottom: .5rem;
                                        margin-left: .5rem;' type='submit' name='DelAcc' class='btn  btn-danger'  >Xóa</button>
                                        <input type='hidden' name='AccId' value='$accountID'>
                                    </form>
                                    </div>
                                    </td>
                                    </tr>
                                    </tbody>";
                                }
                            }
                        }
                        ?>

                    </table>

                </div>
            </div>
        </div>
        <input type="checkbox" name="" id="show-toggle">
        <div class="overlay">
            <label for="show-toggle">
            </label>
        </div>
        <div class="modal">
            <div class="" role="document">
                <div class="modal-content">
                    <div class="modal-header add-user-header">
                        <h5 class="modal-title" id="editUser1">ID Tài khoản: <b id="accid">1</b></h5>
                    </div>
                    <div class="modal-body">

                        <div class="text-left display" style="border-bottom: 2px solid #dee2e6;">
                            <div class="form-group ">
                                <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                                    <b><label for="image">Profile Picture</label></b>
                                    <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                                    <small id="Info" class="form-text text-muted mx-3">Chọn file .jpg.</small>
                                    <input type="hidden" id="userId" name="userId" value="1">
                                    <button type="submit" class="btn btn-success" name="updateProfilePhoto">Cập
                                        nhật</button>
                                </form>
                            </div>
                            <div class="form-group">
                                <img class="img-style" src="/assets/img/img1.jpg" alt="Profile Photo" onError="this.src ='/OnlinePizzaDelivery/img/profilePic.jpg'">
                                <input type="hidden" id="userId" name="userId" value="1">
                                <button type="submit" class="btn btn-success" name="removeProfilePhoto">Xóa
                                    ảnh</button>
                                </form>
                            </div>
                        </div>
                        <form action="pages/_accountHandle.php" method="POST">
                            <div class="form-user">

                                <div class="form-user-left">
                                    <div class="form-group">
                                        <b><label for="username">Tên tài khoản</label></b>
                                        <input class="form-control" id="username" name="username" value="" type="text"  required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <b><label for="fullname">Tên người dùng</label></b>
                                            <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <b><label for="password">Mật khẩu</label></b>
                                            <input type="text" class="form-control" id="password" name="password" value="" placeholder="không đổi đừng nhập (*_*!)??">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-user-right">
                                    <div class="form-group ml-1">
                                        <b><label for="email">Email:</label></b>
                                        <input type="email" class="form-control" id="email" name="email" pattern="^\S+@\S+\.\S+" value="" required>
                                    </div>
                                    <div class="form-group ml-1">
                                        <div class="form-group ">
                                            <b><label for="phone">Số điện thoại:</label></b>
                                            <div class="input-group mb-3">
                                                <!-- <div class="input-group-prepend">
                                            </div> -->
                                                <input type="tel" class="form-control" id="phone" name="phone" value="" required pattern="^0(\d{9}|9\d{8})$" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <b><label for="userType">Phân quyền:</label></b>
                                            <select name="PQ" id="PQ" class="custom-select browser-default" required>
                                                <option hidden disabled selected value>---</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Staff</option>
                                                <option value="0">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="userID" name="userID" value="">
                            <button type="submit" name="editUser" class="btn btn-success" style="margin-left: 12rem;">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <input type="checkbox" name="" id="show-add-user">
        <div class="overlay1">
            <label for="show-add-user">
            </label>
        </div>
        <div class="show-add-users">
            <form action="pages/_accountHandle.php" method="POST" enctype="multipart/form-data" class="show-add-user">
                <div class="product-info-left-header">
                    Thêm Người Dùng
                </div>
                <div class="product-info-left-body">
                    <div class="form-group">
                        <label class="control-label" for="">Tên người dùng:</label>
                        <br>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="">Tên đăng nhập:</label>
                        <br>
                        <input type="text" class="form-control" id="username" name="username" pattern="^\S+$" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required min="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số thoại</label>
                        <input type="number" class="form-control" id="nphone" name="nphone" pattern="0[0-9]{9,10}" required min="1" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required min="3">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nhập lại nật khẩu</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" required min="3">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phân quyền</label>
                        <br>
                        <select name="PQ" id="PQ" class="custom-select browser-default" required>
                            <option hidden disabled selected value>---</option>
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                            <option value="0">User</option>
                        </select>
                    </div>
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
                    <button type="submit" class="btn-main btn-block btn" name="addUser" style="width: auto !important;">Thêm</button>
                </div>
            </form>
        </div>
</main>
<script>
    function updateAcc(id) {
        var accid = '.acc' + id;
        var accname = '.username' + id
        var accemail = '.email' + id
        var phone = '.phone' + id
        var role = '.role' + id
        var accfullname = '.fullname' + id
        document.querySelector('#accid').innerHTML = id;
        var accname = document.querySelector(accname).innerHTML;
        var accemail = document.querySelector(accemail).innerHTML;
        var accphone = document.querySelector(phone).innerHTML;
        var accrole = document.querySelector(role).innerHTML;
        var accfullname = document.querySelector(accfullname).innerHTML;
        document.querySelector('#userID').value = id;
        document.querySelector('#username').value = accname;
        document.querySelector('#fullname').value = accfullname;
        document.querySelector('#email').value = accemail;
        document.querySelector('#phone').value = accphone;
        document.querySelector('#PQ').value = accrole;
        console.log(accname + '/' + accemail + '/' + accphone + '/' + accrole + '/' + accfullname + '/' + "");

    }
    // updatePro();
</script>