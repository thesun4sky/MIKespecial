<? session_start();
$userid = $_SESSION['userid'];?>

<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?

    $title= $_POST['title'];
    $content= $_POST['content'];
    $color1= $_POST['color1'];
    $color2= $_POST['color2'];
    $color3= $_POST['color3'];
    $opt1= $_POST['opt1'];
    $opt2= $_POST['opt2'];
    $opt3= $_POST['opt3'];
    $opt4= $_POST['opt4'];
    $opt5= $_POST['opt5'];
    $opt6= $_POST['opt6'];
    $deadline= $_POST['deadline'];
    //$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장


do
{
    $RandomFileName = md5(rand());
}
while (file_exists("upload/" .  $RandomFileName ));
$file_name = $RandomFileName;
$order_name = $userid.'_'.$title;
   include "./lib/dbconn.php";       // dconn.php 파일을 불러옴


        $sql = "insert into files(f_storedname, f_originalname) VALUE('$file_name','$order_name')";
        mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행 

        $sql = "SELECT * FROM files WHERE f_storedname = '$file_name'";
        $result = mysqli_query( $connect, $sql)or die(mysqli_error($connect));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $file_num = $row['num_id'];
        //주문 테이블에 주문내용 삽입
	    $sql = "insert into orders(o_userid, o_title, o_filenum, o_content, o_color1, o_color2, o_color3, o_option, o_deadline) ";
	    $sql .= "VALUES('$userid','$title', '$file_num', '$content', '$color1', '$color2' , '$color3' , '$opt1.$opt2.$opt3.$opt4.$opt5.$opt6' ,'$deadline')";
		mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행

move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$RandomFileName.".ppt" );

echo '<script language="javascript">';
echo 'alert(" ';
echo $opt1.$opt2.$opt3.$opt4.$opt5.$opt6;
echo '")';
echo '</script>';
//구매가능여부
$sql = "select * from user where num_id='$userid'";
$result = mysqli_query( $connect, $sql);
$row = mysqli_fetch_array($result);

if($buy == 0){
    if($row['point'] < 3500) {
        echo("
               <script>
                 window.alert('포인트가 부족합니다.')
                 history.go(-1)
               </script>
             ");
        exit;
    }
    else{
        $sql = "update user SET point = point-3500  where num_id='$userid'";
        $result = mysqli_query( $connect, $sql);
    }
}
else{
    if($row['voucher'] < 2) {
        echo("
               <script>
                 window.alert('쿠폰이 부족합니다.')
                 history.go(-1)
               </script>
             ");
        exit;
    }
    else{
        $sql = "update user SET voucher = voucher-2 where num_id='$userid'";
        $result = mysqli_query( $connect, $sql);
    }
}





   echo "
	   <script>
	    location.href = 'index.html';
	   </script>
	";
?>

   
