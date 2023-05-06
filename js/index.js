$(document).ready(function(){
    // alert("hello");
     console.log("hello world");
     cat();
     brand();
     products();

     function cat() {
      $.ajax({
             url:'action.php',
             method:'post',
             data:{category:1},
             success:function (data,success) {
               // console.log(data);
               $("#category").html(data);

             }
      });//end of $.ajax call
   }//end of function cat()

     function brand() {
        $.ajax({
                url:'action.php',
                method:'post',
                data:{brand:1},
                success:function (data,success) {
                  // console.log(data);
                  $("#get_brand").html(data);
                }
               })
     }//end of function brand()
  
     function products(){
        $.ajax({
          url: 'action.php',
          method:'post',
          data:{products:1},
          success:function (data,success) {
           // console.log(data);
            $("#get_products").html(data);
          }
        })
     }//end of function products()




     

     $("body").delegate(".category","click",function(event){
      event.preventDefault();
      var cid=$(this).attr('cid');
         console.log(cid);
  
         $.ajax({
          url:'action.php',
          method:'post',
          data:{'get_selected_category':1,'cat_id':cid},
          success:function (data,success) {
            console.log(data);
            $("#get_products").html(data);
          }
        })//end of ajax method
  
      })//end of delegate class here

      //-------------------------------number of pages shown at footer starts----------------------------
    page();
    function page(){
      
      $.ajax({
        url:'action.php',
        method:'post',
        data:{page:1},
        success:function(data,success){
          console.log(data);
          $("#pageno").html(data);
        }

      })//end of ajax
    }
  
  
















})