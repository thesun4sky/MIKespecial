<?
session_start();
include "./lib/dbconn.php";
$category = $_GET['category'];
?>
<!DOCTYPE html>

<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title> </title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/archive.css" rel="stylesheet" type="text/css" media="all">
	<style> 
		.row { margin-top:100px;}

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

        /*.item-block col-xs-12 col-sm-4 img{width:400; height:250;}*/
        /*.item-block col-xs-12 col-sm-4 p{text-align:center;}*/

    </style>


</head>

<body>
    <? include "./header.php"; ?>

    <div class="container">
    	<div class="row">



            <h1 align="center">PPT 리스트</h1>

            <ul>
                <li><a href="category.php?category=0">전체</a></li>
                <li><a href="category.php?category=1"> 인문</a></li>
                <li><a href="category.php?category=2"> 사회</a></li>
                <li><a href="category.php?category=3"> 과학</a></li>
                <li><a href="category.php?category=4"> 공학</a></li>
                <li><a href="category.php?category=5">예술</a></li>
                <li><a href="category.php?category=6"> 기타</a></li>
            </ul>

            <br />
            <br />
<!---->
<!---->
<!--            <form class="array"  action="#" align="right">-->
<!--                <select name="array">-->
<!--                    <option value="popular" selected>인기순</option>-->
<!--                    <option value="lasted">최근등록순</option>-->
<!--                </select>-->
<!--            </form>-->
<!---->
            
            <?php
            if($category == 0 || $category  == NULL)  $sql="select * from product" ;
            else                $sql="select * from product where p_category = '$category'" ;
            $result=mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {

                ?>
                <div class="item-block col-xs-12 col-sm-4">

                    <a href="goods.php?num_id=<? echo $row['num_id'] ?>">
                    <img style="height: 200px" border="1" src="img/template_<? echo $row['num_id'] ?>.png" > <br>
                    <p> <? echo $row['p_name']?><br/> <? echo $row['p_engname']?></p></a>
                    <? echo $row['p_price']?> Point

                </div>
                <?php
            }
            ?>
            

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