<?
session_start();
include "lib/dbconn.php";
?>

<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?

$userid = $_SESSION['userid'];
$num_id = $_GET['num_id'];
$buy = $_GET['buy'];



$sql = "select * from product where num_id='$num_id'";
$result = mysqli_query( $connect, $sql);
$row = mysqli_fetch_array($result);
$price = $row['p_price'];

$sql = "select * from user where num_id='$userid'";
$result = mysqli_query( $connect, $sql);
$row = mysqli_fetch_array($result);

if($buy == 0){
    if($row['point'] < 3000) {
        echo("
               <script>
                 window.alert('포인트가 부족합니다.')
                 history.go(-1)
               </script>
             ");
        exit;
    }
    else{
        $sql = "update user SET point = point-'$price'  where num_id='$userid'";
        $result = mysqli_query( $connect, $sql);
    }
}
else{
    if($row['voucher'] < 1) {
        echo("
               <script>
                 window.alert('쿠폰이 부족합니다.')
                 history.go(-1)
               </script>
             ");
        exit;
    }
    else{
        $sql = "update user SET voucher = voucher-1 where num_id='$userid'";
        $result = mysqli_query( $connect, $sql);
    }
}

   // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into buy(b_userid, b_pnum, b_pay, b_price, b_state)";
	    $sql .= " values('$userid', '$num_id','$buy', '$price', 1)";
		mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행

  // mysqli_close();                // DB 연결 끊기
   echo "
	   <script>
	    location.href = './mypage.php';
          alert('구매가 완료 되었습니다.');
	   </script>
	";
?>

   
