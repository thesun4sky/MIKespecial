<?
session_start();
include "lib/dbconn.php";
//$_GET['bno']이 있어야만 글삭제가 가능함.
if(isset($_GET['bno'])) {
    $bNo = $_GET['bno'];
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
    

</head>

<body>

<? include "header.php"; ?> <br/> <br/><br/><br/> <br/><br/><br/><br/>


    <div class="container">
    	<div class="row">
            <article class="boardArticle">
                <h3>자유게시판 글삭제</h3>
                <?php
                if(isset($bNo)) {
                    $sql = 'select count(num_id) as cnt from board where num_id = ' . $bNo;
                    $result = mysqli_query( $connect, $sql);
                    $row = mysqli_fetch_assoc($result);
                if(empty($row['cnt'])) {
                    ?>
                    <script>
                        alert('글이 존재하지 않습니다.');
                        history.back();
                    </script>
                <?php
                exit;
                }

                $sql = 'select b_title from board where num_id = ' . $bNo;
                $result = mysqli_query( $connect, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                    <div id="boardDelete">
                        <form action="./delete_update.php" method="post">
                            <input type="hidden" name="bno" value="<?php echo $bNo?>">
                            <table>
                                <caption class="readHide">자유게시판 글삭제</caption>
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2">정말 삭제하시겠습니까?</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>    
                                    <th scope="row">글 제목</th>
                                    <td><?php echo $row['b_title']?></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="btnSet">
                                <button type="submit" class="btnSubmit btn">삭제</button>
                                <a href="./board.php" class="btnList btn">목록</a>
                            </div>
                        </form>
                    </div>
                <?php
                //$bno이 없다면 삭제 실패
                } else {
                ?>
                    <script>
                        alert('정상적인 경로를 이용해주세요.');
                        history.back();
                    </script>
                    <?php
                    exit;
                }
                ?>
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
</body>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/archive.js"></script>

</html>