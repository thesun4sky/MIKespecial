<? session_start(); ?>

<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?

    $userid = $_SESSION['userid'];
    $goods= $_GET['goods_num'];
    $amount= $_GET['amount'];
    $total_price= $_GET['price'];
    $regdate = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    //$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장



   include "./lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "select * from goods where num='$goods' and stock>='$amount'";
   $result = mysqli_query( $connect, $sql);
   $stock = mysqli_fetch_row($result);
    

   if(!$stock) {
     echo("
           <script>
             window.alert('재고가 부족합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {
       $sql = "select * from member where email='$userid'";
       $result = mysqli_query( $connect, $sql);
       $row = mysqli_fetch_assoc($result);
       $num_id = $row['num_id'] * 10000;

       // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into carts(cart_num, goods_num, goods_amount, orderer, total_price, date)";
	    $sql .= "values('$num_id', '$goods', '$amount', '$userid', '$total_price', '$regdate' )";
		mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행
       /*$sql = "update goods set stock = stock-$amount where num = $goods";
       mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행
       $sql = "update goods set num_sales = num_sales+$amount where num = $goods";
       mysqli_query($connect, $sql);*/
   }
    $sql = "select * from carts where orderer ='$userid'";
    $result = mysqli_query( $connect, $sql);
    $carts = mysqli_fetch_assoc($result);

   echo "
	   <script>
	    location.href = 'order_detail.php';
	   </script>
	";
?>

   
