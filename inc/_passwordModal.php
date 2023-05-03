<div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passModal">Đặt lại mật khẩu</h5>
                <button type="button" class="btn-close btn" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="page/xulytaikhoan.php" method="post" onsubmit="return checkpass()">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <label for="inputPassword6" class="col-form-label">Mật khẩu cũ</label>
                        </div>
                        <div class="col-6">
                            <input type="password" id="oldPass" name="oldPass" class="form-control" aria-labelledby="passwordHelpInline" required>
                        </div>
                    </div>
                    <div class="row align-items-center my-md-1">
                        <div class="col-4">
                            <label for="inputPassword6" class="col-form-label">Mật khẩu mới</label>
                        </div>
                        <div class="col-6">
                            <input type="password" min="4" id="newPass" name="newPass" class="form-control" aria-labelledby="passwordHelpInline" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <label for="inputPassword6" class="col-form-label">Nhạp lại mật khẩu</label>
                        </div>
                        <div class="col-6">
                            <input type="password" min="4" id="renewPass" name="renewPass" class="form-control" aria-labelledby="passwordHelpInline" required>
                        </div>
                        <div id="noterepasss"></div>
                    </div>
                    <div class="row mt-2 align-items-center justify-content-center">
                        <button type="submit" name="rePass" class="btn btn-success col-3">Xác nhận</button>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    function checkpass() {
        repass = document.getElementById("newPass").value;
        recpass = document.getElementById("renewPass").value;
        console.log(repass + recpass);

        function validatePass(repass, recpass) {
            var pass = repass;
            var cpass = recpass;
            if (pass == recpass) {
                return true;
            } else {
                return false;
            }
        }
        if (!validatePass(repass, recpass)) {
            document.getElementById("noterepasss").innerText = "Mật khẩu nhập lại không trung khớp";
            document.getElementById("noterepasss").style.color = "red";
            return false;

        }
        return true;
    }
</script>