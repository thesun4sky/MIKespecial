
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?
  session_start();
session_destroy();
  echo("
       <script>
          location.href = '../index.html'; 
          alert('로그아웃 되었습니다.');
         </script>
       ");
?>
