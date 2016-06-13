<?
session_start();
?>
<meta charset="UTF-8">

<?
    $id= $_POST['id'];
    $pw= $_POST['pw'];
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   if(!$id) {
     echo("
           <script>
             window.alert('이메일을 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$pw) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "../lib/dbconn.php";

   $sql = "select * from user where email='$id'";
   $result = mysqli_query($connect, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 이메일입니다.');
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);

        $db_pass = $row['pass'];

        if($pw != $db_pass)
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

           $_SESSION['userid'] =  $row['num_id'];
           $_SESSION['username'] = $row['name'];

           echo("
              <script>
                location.href = '../index.html';
              alert('로그인 되었습니다.');
              </script>
           ");
        }
   }          
?>
