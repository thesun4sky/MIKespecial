
<?php

session_start();
include "./lib/dbconn.php";
$userid = $_SESSION['userid'];

if($userid == NULL){ echo("
               <script>
                 window.alert('로그인 해주세요.')
                 history.go(-1)
               </script>
             ");
    exit;}
else{
    $sql = "select * from user where num_id='$userid'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

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
        $sql = "update user SET point = point-3500 where num_id='$userid'";
        $result = mysqli_query( $connect, $sql);
    }
}
?>