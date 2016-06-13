<?
session_start();
include "lib/dbconn.php";

$num_id = $_GET['num_id'];
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
     
		
    $(window).load(function () {
		
				$('.need-login').click(function() {
		   alert('로그인 해주세요');
		});

		
	});
		
	
    </script>

</head>

<body onload="process()">

<? include "header.php"; ?> <br/> <br/><br/><br/> <br/><br/><br/><br/>


    <div class="container">
    	<div class="row">


            <table align="center" width="1000">
                <?
    $sql = "select * from product where num_id='$num_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    ?>


                <div class="item-block col-xs-12 col-sm-6">
                <img width="100%" height="100%" border="1" src="img/template_<? echo $row['num_id'] ?>.png" > <br>
</div>
                    <div class="item-block col-xs-12 col-sm-6">
                <p style="font-size: large"><a href="goods.php?num_id=<? echo $row['num_id'] ?>"> <? echo $row['p_name']?><br/> <? echo $row['p_engname']?></a></p>
<br/>
                        
      <p style="font-size: medium">색상 1: <span style="color: <? echo $row['p_color1']?>">■</span></p>
      <p style="font-size: medium">색상 2: <span style="color: <? echo $row['p_color2']?>">■</span></p>
      <p style="font-size: medium">색상 3: <span style="color: <? echo $row['p_color3']?>">■</span></p>

                <br/>
                        <div class="item-block col-xs-6 col-sm-6">
                <form method="get" action="buy.php">
                <p style="font-size: medium"><? echo $row['p_price']?> Point</p>
                    <input type="hidden" value="<? echo $row['num_id'] ?>" name="num_id">
                    <input type="hidden" value="0" name="buy">
                    <input type="submit" class="login-bu"  value="포인트로 구매하기" align="center"/>
                </form>
                            </div>

                        <div class="item-block col-xs-6 col-sm-6">
                        <form method="get" action="buy.php">
                            <p style="font-size: medium">1 Voucher</p>
                            <input type="hidden" value="<? echo $row['num_id'] ?>" name="num_id">
                            <input type="hidden" value="1" name="buy">
                            <input type="submit" class="login-bu" value="쿠폰으로 구매하기" align="center"/>
                        </form>
            </div>
                        </div>
                <div class="item-block col-xs-12 col-sm-12">
            <br />
            <br />
            <br />

            <hr color="red"/>
            <br />


            <h2 align="center">페이지구성</h2>

            <br />

<div class="col-lg-6">
    <img src="img/template_<? echo $row['num_id'] ?>_1.PNG"   height="auto"/>
</div>
                    <div class="col-lg-6">
                        <img src="img/template_<? echo $row['num_id'] ?>_2.PNG" height="auto"/>
                    </div>
                    <div class="col-lg-6">
                        <img src="img/template_<? echo $row['num_id'] ?>_3.PNG"  height="auto"/>
                    </div>
                    <div class="col-lg-6">
                        <img src="img/template_<? echo $row['num_id'] ?>_4.PNG" height="auto"/>
                    </div>
</div>
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