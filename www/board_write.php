<?
session_start();
include "lib/dbconn.php";
//$_GET['bno']이 있을 때만 $bno 선언
if(isset($_GET['bno'])) {
    $bNo = $_GET['bno'];
}

if(isset($bNo)) {
    $sql = 'select b_title, b_content, b_userid from board where num_id = ' . $bNo;
    $result = mysqli_query( $connect, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
 <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<head>

    <meta charset="utf-8" />
    <title>대학생을 위한 템플릿 제작소</title>
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
            <article class="boardArticle">
                <h3>상담게시판 글쓰기</h3>
                <div id="boardWrite">
                    <form enctype="multipart/form-data" action="./write_update.php" method="post">
                        <?php
                        if(isset($bNo)) {
                            echo '<input type="hidden" name="bno" value="' . $bNo . '">';
                        }
                        ?>
                        <table id="boardWrite" class="order-checkbox col-xs-12 col-sm-12" >
                            <caption class="readHide">* 포인트 충전 문의시에는 "입금자명"과 "충전금액"을 꼭 명시해주세요.</caption>
                            <tbody>
                            <tr class="order-checkbox-main">
                                <th scope="row"><label for="bTitle" >제목</label></th>
                                <td class="title"><input type="text" name="bTitle" id="bTitle"value="<?php echo isset($row['b_title'])?$row['b_title']:null?>" required></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bFile">파일</label></th>
                                <td class="content"><input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                                <input name="userfile" type="file" /></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bContent">내용</label></th>
                                <td class="content"><textarea name="bContent" id="bContent" cols="40" rows="10" required><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bContent" style="color: silver;">충전 입금계좌</label></th>
                                <td class="content" style="font-size: small; color: silver;" >입금계좌 : 기업은행 / 01054165447 / 예금주: 김태선
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="btnSet">
                            <button type="submit" class="btnSubmit btn"><?php echo isset($bNo)?'수정':'작성'?></button>
                            <a href="./board.php" class="btnList btn">목록</a>
                        </div>
                    </form>

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