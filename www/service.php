<?
session_start();
include "./lib/dbconn.php";
$category = $_GET['category'];
?>
<!DOCTYPE html>

<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>대학생을 위한 템플릿 제작소</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="./css/archive.css" rel="stylesheet" type="text/css" media="all">


    <style>

        * {font-family: sans-serif; }

        img.a {            float: left        }

        #target1 {
            font-family: sans-serif;
            width: 67px;
            height: 26px;
            background-color: rgba(7, 6, 6, 0.14);
            border: 1px; border-radius: 5px;
            padding: 20px;

            margin-left: auto; margin-right: auto;}

        #target3 {padding: 20px;
            margin-left: auto; margin-right: auto;}

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
<? include "./header.php"; ?>
<br/><br/><br/><br/>

<ul>
    <li><a style="color: #5e5e5e"> 문의사항  |  </a></li>
    <li><a href="make_order.php"> 견적의뢰</a></li>
    <li><a href="board.php"> 상담게시판</a></li>
    <li><a href="service.php"> 고객센터</a></li>
</ul><br>

</br>
<div>
<center><p style="text-decoration: underline; color: hotpink">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<br><p style="font-size: xx-large">문의사항</p></center></div></br></br></br>


    <table style="margin-left: auto; margin-right: auto; width: 50%"" cellpadding="0" cellspacing="0" width="462">
        <tr><td style="border:1px so">
                <a href="http://map.naver.com/?menu=location&mapMode=0&lat=37.5825419&lng=127.0102894&dlevel=12&searchCoord=126.6518877%3B37.3911657&query=7ZWc7ISx64yA7ZWZ6rWQ&mpx=11185820%3A37.3911657%2C126.6518877%3AZ11%3A0.0154704%2C0.0114805&tab=1&enc=b64"target="_blank">
                <img src="http://prt.map.naver.com/mashupmap/print?key=p1463104508420_-140585661" width="900" height="500" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a>
        </td> </tr> 
        <tr><td>  
            <table cellpadding="0" cellspacing="0" width="100%">  
                <tr>
                    <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;">
                        <span style="font-family: tahoma; font-size: 11px; color:#666;">2016.5.13</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;
<a style="font-family:dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?menu=location&mapMode=0&lat=37.5825419&lng=127.0102894&dlevel=12&searchCoord=126.6518877%3B37.3911657&query=7ZWc7ISx64yA7ZWZ6rWQ&mpx=11185820%3A37.3911657%2C126.6518877%3AZ11%3A0.0154704%2C0.0114805&tab=1&enc=b64" target="_blank">지도 크게 보기</a>
                    </td>
                    <td width="98"bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;">                           <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com"target="_blank">NAVER Corp.</a></span>  
                    </td>
                </tr>
            </table>
        </td></tr>
    </table>


<center>
<img src="./img/top-banner1.png" style="height: 200px">

</br>
<label style="color: red" >ADDRESS</label><br>
</br>
<label>서울특별시 성북구 삼선동3가 389 </label><br>
<label>TEL</label><br>
<label>02-3446-5246</label><br>
<label>FAX</label><br>
<label>02-3446-5245</label><br>
<label>E-mail</label><br>
<label>gksmfdl554@naver.com</label><br>


</center>
</br>
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