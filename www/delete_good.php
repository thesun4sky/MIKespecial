<? session_start(); ?>

<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<?
    $userid = $_SESSION['userid'];
    $num= $_GET['num'];



   include "./lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "delete from carts where orderer='$userid' and num='$num'";
   $result = mysqli_query( $connect, $sql);
    
    
    
   if($result) {
     echo("
           <script>
             window.alert('삭제 되었습니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
    else
    {
        echo("
           <script>
             window.alert('삭제가 불가능합니다.')
             history.go(-1)
           </script>
         ");
        exit;

    }
?>

   
