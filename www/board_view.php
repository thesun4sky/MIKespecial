<?
session_start();
include "lib/dbconn.php";

$userid = $_SESSION['userid'];
$bNo = $_GET['bno'];

if(!empty($bNo) && empty($_COOKIE['board' . $bNo])) {
    $sql = "update board set b_hit = b_hit + 1 where num_id = '$bNo'" ;
    $result = mysqli_query( $connect, $sql);
    if(empty($result)) {
        ?>
        <script>
            alert('오류가 발생했습니다.');
            history.back();
        </script>
        <?php
    } else {
        //setcookie('board' . $bNo, TRUE, time() + (60 * 60 * 24), '/'); //하루에 한번만 조회 가능
    }
}
$sql = "select board.b_title, board.b_content, board.b_regdate, board.b_hit, user.name , user.num_id, board.b_answer from board INNER JOIN user ON board.b_userid = user.num_id where board.num_id = '$bNo'";
$result = mysqli_query( $connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
 <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<head>

    <meta charset="utf-8" />
    <title>Identified Best 18</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/archive.css" rel="stylesheet" type="text/css" media="all">
    <script>

		
	
    </script>

</head>

<body>

<? include "header.php"; ?> <br/> <br/><br/><br/> <br/><br/><br/><br/>


    <div class="container">
    	<div class="row">
            <article class="boardArticle"  class="order-checkbox col-xs-12 col-sm-12 ">
                <h3>상담게시판</h3>
                <div id="boardView">
                    <caption class="readHide" id="boardTitle"><?php echo $row['b_title']?></caption>
                    <div id="boardInfo" class="order-checkbox-main">
                        <span id="boardID">작성자: <?php echo $row['name']?></span>
                        <span id="boardDate">작성일: <?php echo $row['b_date']?></span>
                        <span id="boardHit">조회: <?php echo $row['b_hit']?></span>
                    </div>
                    <br/> <br/>
                    <div id="boardContent"><?php echo $row['b_content']?></div>
                </div>
                <br/> <br/>
                <? if($row['b_answer']){ ?>
                    <div id="answer" style="background-color:lightgray">
                    <caption class="readHide" id="boardAnswerTitle"><?php echo '답변'?></caption><br/><br/>
                    <div id="boardAnswer"><?php echo $row['b_answer']?></div>
                    </div>
                <?
                }
                ?>
                <br/> <br/>
                <div class="btnSet">
                    <? if($row['num_id'] == $userid){ ?>
                    <a href="./board_write.php?bno=<?php echo $bNo?>">수정</a>
                    <a href="./board_delete.php?bno=<?php echo $bNo?>">삭제</a>
                    <? } ?>
                    <a href="./board.php">목록</a>
                </div>
            </article>
    </div>
            </div>

<footer>
    <div class="footer-text">
        <b>MIK especial</b>
        <br> 학성대학교 CRM 프로젝트<p>
        </p>
        <b> © Make It Especial Corp. Since 2016 </b>
    </div>
</footer>
    <script>


   </script>
</body>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/archive.js"></script>

</html>