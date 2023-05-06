<main>
    <div class="container-fluid" id='empty'>
        <div>
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
                            if(!empty($row['answer'])){
                                echo" <th>$answer</th>";
                            }else{
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
                                </tr>
                            </tbody>
                        ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
