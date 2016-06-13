<?
           session_start();
?>
<meta charset="UTF-8">
<?
    $pw= $_POST['pw'];
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력


   include "../lib/dbconn.php";

    if($pw != 'rlaxodid23')
    {
       echo("
          <script>
            window.alert('비밀번호가 틀립니다.')
            history.go(-1)
          </script>
       ");

       exit;
    }
    else
    {

       $_SESSION['userid'] =  'owner';

       echo("
          <script>
            location.href = '../owner_main.php';
          alert('관리자 승인');
          </script>
       ");
   }          
?>
