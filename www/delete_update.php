<?php
session_start();
include "lib/dbconn.php";

//$_POST['bno']이 있을 때만 $bno 선언
if(isset($_POST['bno'])) {
    $bNo = $_POST['bno'];
}

//글 삭제
if(isset($bNo)) {
    //삭제할 글 가져오기
    $sql = 'select count(num_id) as cnt from board where num_id = ' . $bNo;
    $result = mysqli_query( $connect, $sql);
    $row = mysqli_fetch_assoc($result);

    //비밀번호가 맞다면 삭제 쿼리 작성
    if($row['cnt']) {
        $sql = 'delete from board where num_id = ' . $bNo;
        //틀리다면 메시지 출력 후 이전화면으로
    } else {
        $msg = '게시글이 존재하지 않습니다.';
        ?>
        <script>
            alert("<?php echo $msg?>");
            history.back();
        </script>
        <?php
        exit;
    }
}

$result =  mysqli_query( $connect, $sql);

//쿼리가 정상 실행 됐다면,
if($result) {
    $msg = '정상적으로 글이 삭제되었습니다.';
    $replaceURL = './';
} else {
    $msg = '글을 삭제하지 못했습니다.';
    ?>
    <script>
        alert("<?php echo $msg?>");
        history.back();
    </script>
    <?php
    exit;
}


?>
<script>
    alert("<?php echo $msg?>");
    location.replace("<?php echo $replaceURL?>");
</script>