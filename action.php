<?php
session_start();
include('db/connect.php');

$ip_add = getenv("REMOTE_ADDR");

if(isset($_POST['category'])){

    $cat_query="SELECT * FROM category";
    $result=mysqli_query($con,$cat_query);
    

    if(mysqli_num_rows($result)>0)
    {
        while ($row=mysqli_fetch_array($result)) 
        {
            $cat_id=$row['categoryID'];
            $cat_name=$row['categoryName'];

            echo "<a href='#' class='catalory_item-name' cid='$cat_id'>$cat_name</a>
                ";
        }   
        
    }

}



// POST PRODUCT

if(isset($_POST['product'])){

    $limit=12;
  
    if(isset($_POST['setpage'])){
      $pageno=$_POST['pageno'];
      $start=($pageno*$limit) - $limit;
    }else{
      $start=0;
    }
    $product_query="SELECT * FROM product LIMIT $start,$limit"  ;
    $result=mysqli_query($con,$product_query);
  
  echo "<div class='row'>";
  
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
  
        $productId = $row['productID'];
        $productCategorieId = $row['categoryID'];
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $productImage = $row['productImage'];
        $productDetail = $row['productDetail'];



  
        echo "
        <div class='product_item'>
        <div class='product_item-img'>
            <a href='' class='aimg'><img src='images/$productImage ' alt='' /></a>
        </div>
        <a href='' class='product_item-content'>
            <span class='name'>
                $productName
            </span>
            <p class='price'>
                $productPrice
            </p>
        </a>
        ";
      }
    }
  
    echo "</div>";
  }//end of isset($_POST['products'])



//  
if(isset($_POST['get_selected_category']))
{
  $cid=$_POST['cat_id'];

  $selected_product_query="SELECT * FROM product WHERE categoryID= '$cid'";
  $result=mysqli_query($con,$selected_product_query);

  echo "<div class='row'>";
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

        $productId = $row['productID'];
        $productCategorieId = $row['categoryID'];
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $productImage = $row['productImage'];
        $productDetail = $row['productDetail'];

        echo "
        <div class='product_item'>
        <div class='product_item-img'>
            <a href='' class='aimg'><img src='images/$productImage ' alt='' /></a>
        </div>
        <a href='' class='product_item-content'>
            <span class='name'>
                $productName
            </span>
            <p class='price'>
                $productPrice
            </p>
        </a>
        ";
      }
    }  
    echo "</div>";
}//end of isset($_POST['get_selected_category'])
