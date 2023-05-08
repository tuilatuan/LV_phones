<main>
    <div class="container-fluid" id='empty'>
        <div>

            <?php
            $string = "SELECT COUNT(*) FROM feedback";
            $query = mysqli_query($con, $string);
            $count = 0;
            $row = mysqli_fetch_array($query);
            if ($row[0] == 0) {
                echo "
                <div class='no-feedback'>
                Bạn không có phản hồi nào!
            </div>";
            } else {
            ?>
                <div class="modal-content mt-1">
                    <div class="table">
                        <table class="text-center table" style="width: 100%;">
                            <thead class="modal-content-header" style="border-bottom:1px solid;">
                                <tr>
                                    <th>ID</th>
                                    <th>ID Tài khoản</th>
                                    <th>Email</th>
                                    <th>Nội dung</th>
                                    <th>Ngày gửi</th>
                                    <th>Phản hồi</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <?php

                            $string = "SELECT * FROM feedback ";
                            $query = mysqli_query($con, $string);
                            $count = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                $feedbackID = $row['feedbackID'];
                                $accountID = $row['accountID'];
                                $email = $row['email'];
                                $content = $row['content'];
                                $time = $row['time'];
                                $answer = $row['answer'];
                                echo " <tbody class='feedback-user'>
                        <tr>
                            <th>$feedbackID</th>
                            <th>$accountID</th>
                            <th>$email</th>
                            <th>$content</th>
                            <th>$time</th>
                            ";
                                if (!empty($row['answer'])) {
                                    echo " <th>$answer</th>";
                                } else {
                                    echo "<th>
                                <form action='pages/_feedbackHandle.php' method='post' class='form'>
                                <textarea style='width: 100%;' name='answer' id='answer' cols='30' rows='10'>
                                $answer</textarea>
                                <input type='hidden' name='feedid' value='$feedbackID'>
                                <button type='submit' name='PH' class='btn btn-success btn-size'>Phản hồi</button>
                                </form>
                                 </th>";
                                }
                                echo "
                            <th> 
                            <form action='pages/_feedbackHandle.php' method='POST' onsubmit='return delitem()'>
                                                <button type='submit' name='DelFeed' class='btn  btn-danger'>Xóa</button>
                                                <input type='hidden' name='feedbackID' value='$feedbackID'>
                                            </form>
                            </th>
                                </tr>
                            </tbody>
                        ";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>