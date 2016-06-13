<?
session_start();
include "./lib/dbconn.php";
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<head>

    <meta charset="utf-8" />
    <title>대학생을 위한 템플릿 제작소</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="./css/archive.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="join.js"></script>   <!--Ajax를 통한 비동기 처리-->

</head>

<body>
<div class="container">
    <div class="row">
        <?

        $sql= "SELECT P.num_id, P.p_name, P.p_engname, P.p_price ";
        $sql.="FROM buy ";
        $sql.="INNER JOIN product as P ";
        $sql.="ON P.num_id = buy.b_pnum ";
        $sql.="WHERE buy.b_userid = '$userid' AND buy.b_state = 1";
        $result = mysqli_query( $connect, $sql)or die(mysqli_error($connect));
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            ?>
            <div class="item-block col-xs-6 col-sm-4">
                <a href="./filedown.php?file_id=<? echo 'template_'.$row['num_id'] ?>"><img src="./img/template_<?echo $row['num_id']?>.png" style="height: 150px"></a>
                <h5><?echo $row['p_name']?></h5>
                <p><?echo $row['p_engname']?><p>
                <p><?echo $row['p_price']?></p>Point
            </div>
        <? } ?>
    </div>
</div>



<footer>
    <div class="footer-text">
        <a href="category.php" target="_parent"><p style="font-size: large; color: purple">다양한 상품을 구매해보세요!</p></a>
    </div>
</footer>

</body>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/archive.js"></script>

</html>