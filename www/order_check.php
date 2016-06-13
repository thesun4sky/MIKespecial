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
       
        .join-postcode {
            margin:0;
            font-size:16px;
            margin-bottom:20px;
            width:200px;
            line-height:16px;
            height:60px;
            padding-left:20px;
            border: 1px solid #C1C1C1;
        }
        .join-post-bu {
            cursor:pointer;
            color:white;
            font-weight:bold;
            font-size:12px;
            width:100px;
            line-height:45px;
            height:50px;
            margin-bottom:4px;
            border-top:2px;
            border-bottom:0px;
            border-style:solid;
            border-color:#292929;
            background-color:#292929;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }
    </style>
    <script>
    </script>
</head>

<body>

    <div class="container">
        <div class="row">
            <?

            $sql= "SELECT o_title, o_mikppt, o_mikppt_img, o_deadline ,o_regdate, o_option ";
            $sql.="FROM orders ";
            $sql.="WHERE o_userid = '$userid'";
            $result = mysqli_query( $connect, $sql)or die(mysqli_error($connect));
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                ?>
                <div class="item-block col-xs-6 col-sm-4">
                    <? if($row['o_mikppt'] == null){ ?>
                        <img src="./img/no_ppt.png">
                        <?
                    }
                    else {
                        ?>
                        <a href="./filedown.php?file_id=<? echo $row['o_mikppt'] ?>"><img
                                src="./img/mikppt<? echo $row['o_mikppt_img'] ?>"></a>
                        <?
                    }
                    ?>
                    <h5>주문명 : <?echo $row['o_title']?></h5><p style="font-size: small"> option : <? echo $row['o_option'] ?></p>
                    <p> 의뢰일자 : <?echo date($row['o_regdate'])?></p>
                    <p> 마감일자 : <?echo date($row['o_deadline'])?><p>
                    <p>
                        <? $state = 25*$row['o_state'];
                            echo "진행률 : ".$state.'%';
                        ?>
                    </p>
                </div>
            <? } ?>
        </div>
    </div>

    <footer>
        <div class="footer-text">
            <a href="make_order.php" target="_parent"><p style="font-size: large; color: purple">주문제작 하기!</p></a>
        </div>
    </footer>

    
   </body>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/archive.js"></script>

</html>