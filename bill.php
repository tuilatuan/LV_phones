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
    <title>Document</title>
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
        							<td><strong>Mã hóa đơn</strong></td>
        							<td class="text-center"><strong>Mã tài khoản</strong></td>
        							<td class="text-center"><strong>Địa chỉ</strong></td>
        							<td class="text-right"><strong>Số lượng sản phẩm</strong></td>
        							<td class="text-right"><strong>Thành tiền</strong></td>
        							<td class="text-right"><strong>Ngày lập</strong></td>
        							<td class="text-right"><strong>Trạng thái</strong></td>
                                </tr>
    						</thead>
    						<tbody>

    							<tr>
    								<td>1</td>
    								<td class="text-center">1</td>
    								<td class="text-center">273 An Dương Vương</td>
    								<td class="text-right">50</td>
    								<td class="text-right">1.000.000VNĐ</td>
    								<td class="text-right">4/5/2023</td>
    								<td class="text-right">Chưa có</td>
									<td><a href="" class="btn-lg" style="font-size:13px;" data-toggle="modal" data-target="#bill-detail">Chi tiết hóa đơn</a></td>
    							</tr>
    							
								<tr>
    								<td>2</td>
    								<td class="text-center">2</td>
    								<td class="text-center">273 An Dương Vương</td>
    								<td class="text-right">50</td>
    								<td class="text-right">1.000.000VNĐ</td>
    								<td class="text-right">4/5/2023</td>
    								<td class="text-right">Chưa có</td>
									<td><a href="" class="btn-lg" style="font-size:13px;" data-toggle="modal" data-target="#bill-detail">Chi tiết hóa đơn</a></td>
    							</tr>

								<tr>
    								<td>3</td>
    								<td class="text-center">3</td>
    								<td class="text-center">273 An Dương Vương</td>
    								<td class="text-right">50</td>
    								<td class="text-right">1.000.000VNĐ</td>
    								<td class="text-right">4/5/2023</td>
    								<td class="text-right">Chưa có</td>
									<td><a href="" class="btn-lg" style="font-size:13px;" data-toggle="modal" data-target="#bill-detail">Chi tiết hóa đơn</a></td>
    							</tr>
                                
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>



	<!-- Chi tiết hóa đơn -->
	<div class="modal fade " id="bill-detail">
        <div class="bill-detail-modal panel-body ">
          <div class="container bill-detail-content table-responsive" >
            <table class="table table-condensed">
              <h2 style="padding: 16px 0;">Chi tiết hóa đơn</h2>
              <thead>
                                <tr>
        							<td><strong>Mã hóa đơn</strong></td>
        							<td class="text-center"><strong>Mã tài khoản</strong></td>
        							<td class="text-center"><strong>Địa chỉ</strong></td>
        							<td class="text-right"><strong>Số lượng sản phẩm</strong></td>
        							<td class="text-right"><strong>Thành tiền</strong></td>
        							<td class="text-right"><strong>Ngày lập</strong></td>
        							<td class="text-right"><strong>Trạng thái</strong></td>
                                </tr>
    						</thead>
		</table>
		<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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