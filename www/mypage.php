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
    <style>

    </style>
    <script>

        function check_coupon() {
            var first = document.getElementById("first_code").value;
            var second = document.getElementById("second_code").value;
            if(first == '910807'&& second == '94e0222k'){
                alert("포인트 쿠폰이 등록되었습니다.")
            }
            else if(first == '874920' && second == '94e0222k'){
                alert("바우처 쿠폰이 등록되었습니다.")
            }
            else{
                alert("잘못된 쿠폰번호 입니다.")
            }
        }
    </script>
</head>

<body>
    <? include "./header.php"; ?>


    <div class="container">
        <div class="row">
            <br/><br/><br/>
            <a href="mypage.php"><div  class="detail-order-bu" >MyPage</div></a>
            <div class="jumbotron" style="text-align: center">
               <img src="img/someone.png" style="width: 120px; height: 120px">
                <h4><?
                    if($userid == NULL){ echo "로그인해주세요";}
                    else{
                    $sql = "select * from user where num_id='$userid'";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);

                    echo $username ?>
                    <? if($row['major'] == '인대') {echo "인대"?> <span class="glyphicon glyphicon-book" aria-hidden="true"></span> <? } ?>
                    <? if($row['major'] == '사대') {echo "사대"?> <span class="glyphicon glyphicon-education" aria-hidden="true"></span> <? } ?>
                    <? if($row['major'] == '공대') {echo "공대"?> <span class="glyphicon glyphicon-print" aria-hidden="true"></span> <? } ?>
                    <? if($row['major'] == '예대') {echo "예대"?> <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> <? } ?>
                    <? if($row['major'] == '기타') {?> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <? } ?>
                    <br/><? echo $row['email'] ?></h4>
                <span>POINT : <? echo $row['point'] ?></span>&nbsp; &nbsp;<apan>VOUCHER : <? echo $row['voucher']; } ?></apan>
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </div>
            <a href="order_detail.php" target="iframe1"><div  class="detail-order-bu" style="background-color: darkred">나의 PPT</div></a>
            <iframe name="iframe1" src="order_detail.php" width="100%" height="300" seamless></iframe>
            <a href="order_check.php" target="iframe2"><div  class="detail-order-bu" style="background-color: darkred">PPT 제작소</div></a>
            <iframe name="iframe2" src="order_check.php" width="100%" height="300" seamless></iframe>
        </div>

    </div>
<br><br>
    <center>
        <form name="coupon" method="post">
        <div style="color: #2e6da4"> <h3>쿠폰번호 : </h3>
            <input type="number" id="first_code" placeholder="First Code"> - <input type="password" id="second_code" placeholder="Second Code">
        </div> 
        <div style="margin-top: 20px">
        <input type="button" onclick="check_coupon()" value="입력" style="background-color: #2e6da4; color: white; width: 100px">
        </div>
        </form></center>

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