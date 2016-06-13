<? session_start(); ?>

<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?

    $id= $_POST['id'];
    $pw= $_POST['pw'];
    $name= $_POST['name'];
    $ph= $_POST['ph'];
    $gender= $_POST['gender'];
    $univ= $_POST['univ'];
    $grade= $_POST['grade'];
    $major= $_POST['major'];
    $recommander= $_POST['recommander'];
    $regdate = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    //$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
$point = 0;
$voucher = 0;


   include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "select * from user where email='$id'";
   $result = mysqli_query( $connect, $sql);
   $exist_id = mysqli_num_rows($result);
    
    
    
   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
    if($recommander != '없음') {
        $sql = "select * from user where email='$recommander'";
        $result = mysqli_query($connect, $sql);
        $exist_id = mysqli_num_rows($result);

        if ($exist_id == 0) {
            echo("
               <script>
                 window.alert('추천인을 확인해주세요.')
                 history.go(-1)
               </script>
             ");
            exit;
        }
        else{
            $point = 3000;
            $sql = "update user SET point = point+1000  where email='$recommander'";
            $result = mysqli_query( $connect, $sql);
        }
    }
    else $point = 2000;

   // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into user(email, pass, name, ph, gender, univ, grade, major, point, voucher, level, regdate )";
	$sql .= " values('$id', '$pw', '$name','$ph', '$gender', '$univ', '$grade', '$major', '$point', '$voucher', 0, '$regdate')";
		mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행

  // mysqli_close();                // DB 연결 끊기
   echo "
	   <script>
	    location.href = '../index.html';
          alert('회원가입 되었습니다.');
	   </script>
	";
?>

   
