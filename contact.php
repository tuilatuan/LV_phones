<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/grid.css">
	<link rel="stylesheet" href="./css/responsive.css">
	<link rel="stylesheet" href="./css/headnav.css">
	<link rel="stylesheet" href="./css/var.css">
	<link rel="stylesheet" href="./css/lib/flickity.css" media="screen">
	<link rel="stylesheet" href="./font/fontawesome-free-6.3.0-web/css/all.min.css" />
	<link rel="stylesheet" href="css/lib/bootstrap.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/bill.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/popper.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <title>Liên hệ</title>
</head>

<body>
    <?php
    include('inc/load.php');
    include('db/connect.php');
    include('inc/header.php');
    ?>
    <div class="container">
        <div class="form">
            <div class="left" style="width:400px; padding-right: 10px; border-right: 1px solid var(--green-cl)">
                <form action="page/xulyfeedback.php" method="post" style="width: 100% ">
                    <input id="mail" type="text" name="email" placeholder="Email" style="border:1px solid var(--green-cl); border-radius: 5px; margin-bottom: 5px"><br />
                    <textarea placeholder="Nhập vào nội dung" name="content" id="content" class="note" cols="30" rows="10" style="width:100% ;border-radius: 5px;border:1px solid var(--green-cl); resize:none;"></textarea>
                    <!-- <input type="text" class="note" name="content" placeholder="Nhập vào nội dung"><br /> -->
                    <input type="submit" class="sbmbtn btn btn-success" style="width: 100%;" name="btnsub" value="Gửi góp ý">
                </form>
            </div>
            <div class="right" style="width: 70%">
                <div class="right-contact">
                <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">	
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Người dùng phản hồi</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td class="text-center"><strong>Email</strong></td>
										<td class="text-center"><strong>Nội dung</strong></td>
										<td class="text-center"><strong>Ngày gửi</strong></td>
										<td class="text-center"><strong>Phản hồi</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php 
									 $string = "SELECT * FROM feedback WHERE accountID  = $userId";
									 $query = mysqli_query($con, $string);
									 $count = 0;
									 while ($row = mysqli_fetch_array($query)) {
										$feedbackID = $row['feedbackID'];
										$accountID = $row['accountID'];
										$email = $row['email'];
										$content = $row['content'];
										$time = $row['time'];
										$answer = $row['answer'];
										echo "
										<tr>
										<td class='text-center'>$email</td>
										<td class='text-center'>$content</td>
										<td class='text-center'>$time</td>";
										if(!empty($row['answer'])){
											echo "<td class='text-center'>$answer</td>";
										}else{
											echo "<td class='text-center'>Chưa có phản hồi</td>";
										}
										echo "</tr>";
									 }
									?>
													
                            </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('inc/footer.php');
    ?>
</body>

</html>