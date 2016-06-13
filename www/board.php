<?
include "lib/dbconn.php";
session_start();


/* 페이징 시작 */
//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$sql = 'select count(*) as cnt from board order by num_id desc';
$result = mysqli_query( $connect, $sql);
$row = mysqli_fetch_assoc($result);

$allPost = $row['cnt']; //전체 게시글의 수

$onePage = 15; // 한 페이지에 보여줄 게시글의 수.
$allPage = ceil($allPost / $onePage); //전체 페이지의 수

if($page < 1 && $page > $allPage) {
    ?>
    <script>
        alert("존재하지 않는 페이지입니다.");
        history.back();
    </script>
    <?php
    exit;
}

$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
$currentSection = ceil($page / $oneSection); //현재 섹션
$allSection = ceil($allPage / $oneSection); //전체 섹션의 수

$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지

if($currentSection == $allSection) {
    $lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
} else {
    $lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
}

$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.

$paging = '<ul>'; // 페이징을 저장할 변수

//첫 페이지가 아니라면 처음 버튼을 생성
if($page != 1) {
    $paging .= '<li class="page page_start"><a href="./board.php?page=1">처음</a></li>';
}
//첫 섹션이 아니라면 이전 버튼을 생성
if($currentSection != 1) {
    $paging .= '<li class="page page_prev"><a href="./board.php?page=' . $prevPage . '">이전</a></li>';
}

for($i = $firstPage; $i <= $lastPage; $i++) {
    if($i == $page) {
        $paging .= '<li class="page current">' . $i . '</li>';
    } else {
        $paging .= '<li class="page"><a href="./board.php?page=' . $i . '">' . $i . '</a></li>';
    }
}

//마지막 섹션이 아니라면 다음 버튼을 생성
if($currentSection != $allSection) {
    $paging .= '<li class="page page_next"><a href="./board.php?page=' . $nextPage . '">다음</a></li>';
}

//마지막 페이지가 아니라면 끝 버튼을 생성
if($page != $allPage) {
    $paging .= '<li class="page page_end"><a href="./board.php?page=' . $allPage . '">끝</a></li>';
}
$paging .= '</ul>';

/* 페이징 끝 */
$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문

$sql = 'select * from board order by num_id desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
$result = mysqli_query( $connect, $sql);
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

    <style>

        ul {
            margin: auto;
            list-style: none;
            text-align: center;
            border-top: 2px solid gray;
            border-bottom: 2px solid gray;
            width: 810px;
            padding: 10px 0;
        }

        ul li {
            display: inline;
            padding: 0 30px;
            font-size: 20px;
            text-decoration: none;
        }

        .list{text-align:center; width:810px;}

        .array{
            test-align:right;
            margin-right:550px;
        }
    </style>
</head>

<body>

<? include "header.php"; ?> <br/><br/><br/><br/><br/>

<ul>
    <li><a style="color: #5e5e5e"> 문의사항  |  </a></li>
    <li><a href="make_order.php"> 견적의뢰</a></li>
    <li><a href="board.php"> 상담게시판</a></li>
    <li><a href="service.php"> 고객센터</a></li>
</ul>



    <div class="container">
    	<div class="row">
            <article class="boardArticle">
                <h3>상담게시판</h3>
                <table class="order-checkbox col-xs-12 col-sm-12 ">
                    <caption class="readHide">* 포인트 충전 문의도 상담게시판을 이용해주세요.</caption>
                    <thead>
                    <tr class="order-checkbox-main">
                        <th scope="col" class="no">번호</th>
                        <th scope="col" class="title">제목</th>
                        <th scope="col" class="author">작성자</th>
                        <th scope="col" class="date">작성일</th>
                        <th scope="col" class="hit">조회</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
						$sql = 'select board.num_id , board.b_regdate, board.b_title, board.b_answer, board.b_hit, user.name from board INNER JOIN user ON board.b_userid = user.num_id order by board.num_id desc';
						 $result = mysqli_query( $connect, $sql)or die(mysqli_error($connect));
                     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                     {
                            $datetime = explode(' ', $row['b_regdate']);
                            $date = $datetime[0];
                            $time = $datetime[1];
                            if($date == Date('Y-m-d'))
                            $row['b_regdate'] = $time;
                            else
                            $row['b_regdate'] = $date;
                            ?>
                            <tr>
                        <td class="no"><?php echo $row['num_id']?></td>
                        <td class="title"><a href="./board_view.php?bno=<?php echo $row['num_id']?>"><?php echo $row['b_title']; if($row['b_answer'])echo ' : 답변완료' ?></a></td>
                        <td class="author"><?php echo $row['name']?></td>
                        <td class="date"><?php echo $row['b_regdate']?></td>
                        <td class="hit"><?php echo $row['b_hit']?></td>
                    </tr>
                    <?php
						}
					?>
                    </tbody>
                </table>
                <a href="board_write.php">v 작성하기</a>
            </article>
    </div>
        <div class="paging">
            <?php echo $paging ?>
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