<?
session_start();
include "lib/dbconn.php";


$userid = $_SESSION['userid'];
$bTitle = $_POST['bTitle'];
$bContent = $_POST['bContent'];

//$_POST['bno']이 있을 때만 $bno 선언
if(isset($_POST['bno'])) {
    $bNo = $_POST['bno'];
}

//bno이 없다면(글 쓰기라면) 변수 선언
if(empty($bNo)) {
    $date = date('Y-m-d H:i:s');
}

//글 수정
if(isset($bNo)) {
    //수정 할 글의 아이디가 입력된 아이디와 맞는지 체크
    $sql = 'select b_userid from board where num_id = ' . $bNo;
    $result = mysqli_query( $connect, $sql);
    $row = mysqli_fetch_assoc($result);

    //아이디가 맞다면 업데이트 쿼리 작성
    if($userid == $row['b_userid']) {
        $sql = 'update board set b_title="' . $bTitle . '", b_content="' . $bContent . '" where num_id = ' . $bNo;
        $msgState = '수정';
        //틀리다면 메시지 출력 후 이전화면으로
    } else {
        $msg = '작성자만 수정 가능합니다.';
        ?>
        <script>
            alert("<?php echo $msg?>");
            history.back();
        </script>
        <?php
        exit;
    }

//글 등록
} else {
    $sql = 'insert into board (b_userid, b_title, b_content, b_hit) values( "' . $userid . '", "' . $bTitle . '", "' . $bContent . '", 0)';
    $msgState = '등록';
}


$result = mysqli_query($connect, $sql);
if($result) { // query가 정상실행 되었다면,
    $msg = '정상적으로 글이 ' . $msgState . '되었습니다.';
    //$bNo = $db->insert_id;
    $replaceURL = 'board.php';//'./board_view.php?bno=' . $bNo;
} else {
    $msg = "글을 등록하지 못했습니다.";
    ?>
    <script>
        alert("<?php echo $msg?>");
        history.back();
    </script>
    <?php
}

?>
<script>
    alert("<?php echo $msg?>");
    location.replace("<?php echo $replaceURL?>");
</script>