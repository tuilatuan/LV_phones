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
	<!-- <script src="js/lib/jquery.min.js"></script>
  <script src="js/lib/popper.min.js"></script>
  <script src="js/lib/bootstrap.min.js"></script>
  <script src="js/lib/jquery-3.1.1.min.js"></script> -->
	<title>Bill</title>
</head>

<body>
	<?php
	include('inc/load.php');
	include('db/connect.php');
	include('inc/header.php');
	?>
	<div class="container">
		<!-- Hóa đơn -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Hóa đơn thanh toán</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td class="text-center"><strong>Mã hóa đơn</strong></td>
										<td class="text-center"><strong>Email</strong></td>
										<td class="text-center"><strong>Địa chỉ</strong></td>
										<td class="text-center"><strong>Số lượng sản phẩm</strong></td>
										<td class="text-center"><strong>Thành tiền</strong></td>
										<td class="text-center"><strong>Ngày lập</strong></td>
										<td class="text-center"><strong>Trạng thái</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php
									$str = "SELECT * FROM `bill` WHERE accountID= $userId";
									$query = mysqli_query($con, $str);
									while ($row_bill = mysqli_fetch_array($query)) {
										$billID = $row_bill['billID'];
										$address = $row_bill['address'];
										$totalPro = $row_bill['totalProduct'];
										$totalPri = number_format($row_bill['totalPrice'], 0, ".", ".");
										$date = $row_bill['billDate'];
										$status = $row_bill['billStatus'];
										echo "<tr>
									<td class='text-center'>$billID</td>
									<td class='text-center'></td>
									<td class='text-center' style='display: -webkit-box;
									-webkit-line-clamp: 1;
									-webkit-box-orient: vertical;
									text-overflow: ellipsis;
									overflow: hidden;'>$address</td>
									<td class='text-center'>$totalPro</td>
									<td class='text-center'>$totalPri VND</td>
									<td class='text-center'>$date</td>";
					
									  switch ($status) {
										case '0':
										  echo "<td class='text-center'>
										  Đã đặt hàng</td>";
										  break;
										case '1':
										  echo "<td class='text-center'>
										  Xác nhận đơn đặt hàng </td>";
										  break;
										case '2':
										  echo "<td class='text-center'>
										  Đang chuẩn bị đơn đặt hàng </td>";
										  break;
										case '3':
										  echo "<td class='text-center'>
										  Đang giao hàng </td>";
										  break;
										case '4':
										  echo "<td class='text-center'>
										  Đã giao hàng </td>";
										  break;
										case '5':
										  echo "<td class='text-center'>
										  Đơn hàng bị từ chối </td>";
									      break;
										case '6':
										  echo "<td class='text-center'>
										  Đơn hàng bị hủy </td>";
										  break;
									  }
									
						
									echo "<td><a href='' class='btn-lg' style='font-size:13px;' data-toggle='modal' data-target='#bill-detail$billID'>Chi tiết hóa đơn</a></td>
								</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Chi tiết hóa đơn -->
		<?php
		$str_bill = "SELECT * FROM `bill` WHERE accountID= $userId";
		$query = mysqli_query($con, $str);
		$query = mysqli_query($con, $str_bill);
		while ($row_bill = mysqli_fetch_array($query)) {
			$billID = $row_bill['billID'];
			// $billID = $row_billdetail['billID'];

		?>
			<div class="modal fade " id="bill-detail<?php echo $billID ?>">
				<div class="bill-detail-modal panel-body ">
					<div class="container bill-detail-content table-responsive">
						<table class="table table-condensed">
							<div class="modal-headerr row justify-content-between	align-items-center">
								<h2 style="padding: 16px 0;">Chi tiết hóa đơn</h2>
								<button type="button" class="btn btn-warning" data-dismiss="modal" style="height:40px;">Đóng</button>
							</div>

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
								$proPri = number_format($row['productPrice'], 0, ".", ".");
								echo "<tbody>
							<tr >
												<td class='text-center'><strong>$billID</strong></td>
												<td class='text-center'><img src='images/$img' alt='' style='max-width:60px;'></td>
												<td class='text-center'><strong>$proName</strong></td>
												<td class='text-center'><strong>$ProQty</strong></td>
												<td class='text-center'><strong>$proPri VND</strong></td>
											</tr>
										</tbody>";
							} ?>
						</table>

					</div>
				</div>
			</div>
		<?php } ?>
	</div>
+
	<?php
	include('inc/_loginModal.php');
	include('inc/_sigupModal.php');
	include('inc/footer.php');
	?>

	
</body>

</html>