<?
session_start();
include "./lib/dbconn.php";
$userid = $_SESSION['userid'];

$userid = $_SESSION['userid'];

if($userid == NULL){ echo("
               <script>
                 window.alert('로그인 해주세요.')
                 history.go(-1)
               </script>
             ");
    exit;}
else{
    $sql = "select * from user where num_id='$userid'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    if($row['point'] < 3500) {
        echo("
               <script>
                 window.alert('포인트가 부족합니다.')
                 history.go(-1)
               </script>
             ");
        exit;
    }
}
?>
<!DOCTYPE html>
 <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<head>

    <meta charset="utf-8" />
    <title>대학생을 위한 템플릿 제작소</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	


	<link href="./css/archive.css" rel="stylesheet" type="text/css" media="all">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="join.js"></script>   <!--Ajax를 통한 비동기 처리-->
   <style>
		body {
			background-color:#E8E8E8;
		}


        * {font-family: sans-serif; }

        #target1 {
            font-family: sans-serif;
            width: 67px;
            height: 26px;
            background-color: rgba(7, 6, 6, 0.14);
            border: 1px; border-radius: 5px;
            padding: 20px;

            margin-left: auto; margin-right: auto; width: 50%
        }
        td {
            text-align: center; /* center checkbox horizontally */
            vertical-align: middle; /* center checkbox vertically */
        }
        #target2 {
            font-family: sans-serif;
            width: 100px;
            height: 25px;
            color: white;
            padding: 5px;
            background-color: rgba(64, 106, 249, 0.98);
            border: 1px; border-radius: 5px; }


        #target3 {
            font-family: sans-serif;

            width: 100px;
            height: 25px;
            color: white;
            background-color: rgba(249, 42, 8, 0.98);
            border: 1px; border-radius: 5px; }

        #target4 {
            font-family: sans-serif;

            width: 100px;
            height: 25px;
            color: white;
            background-color: rgba(18, 231, 161, 0.98);
            border: 1px; border-radius: 5px; }
	</style>
</head>

<body>
    <? include "./header.php"; ?>

    <div class="container">
    	<div class="row">
            <div class="login-grid col-xs-12 col-sm-12">
            
        <form name="order_form" enctype="multipart/form-data" method="post" action="order.php">
    <div id="order">
        <br/><br/><br/><br/>
        <center> <h2>주문제작하기</h2></center>
       	  <div class="join-form">

              <center>
              <table border="0">
              <tr>
                  <td colspan="3">
                      <input type="text" name="title" id="title" class="join-id" maxLength="200" placeholder='제목' required>
                  </td>
              </tr>
              <tr>
                  <td colspan="3">
                      <input type="hidden" name="MAX_FILE_SIZE" value="3276800">
                    <a id="target2">PPT첨부</a> <center><input type="file"  name="file" id="file" accept=".ppt,.pptx"></center>
                  </td>
              </tr>
              <tr>
                  <td colspan="3">
                <textarea name="content" style="width:100%; height:200px" id="content" required>원하시는 템플릿 디자인을 간단히 적어주세요.</textarea>
                  </td>
              </tr>
              <tr>
                  <td id="target2"> 원하는색상 </td>
                  <td>
                      <label></label>
                      <input type="color" id="color1" name="color1"/>
                      <input type="color" id="color2" name="color2"/>
                      <input type="color" id="color3" name="color3"/>
                  </td>
              </tr>
                  <tr>
                      <td id="target3" rowspan=3> 제작옵션 </td>
                      <label for="opt1">
                      <td> <input type="checkbox" id="opt1" name="opt1" value="로고 ">  로고 디자인(+1000) </td>
                      </label>
                      <label for="opt2">
                          <td> <input type="checkbox" id="opt2" name="opt2" value="애니 "> 애니메이션 추가(+1000) </td>
                      </label>
                  </tr>
                  <tr>
                      <label for="opt3">
                      <td> <input type="checkbox" id="opt3" name="opt3" value="배경 " checked> 배경디자인 </td>
                      </label>
                          <label for="opt4">
                              <td> <input type="checkbox" id="opt4" name="opt4" value="글씨체 " checked> 글씨체 변경 </td>
                          </label>
                  </tr>
                  <tr>
                      <label for="opt5">
                      <td> <input type="checkbox" id="opt5" name="opt5" value="요약 " checked> 내용 요약 </td>
                      </label>
                          <label for="opt6">
                      <td> <input type="checkbox" id="opt6" name="opt6" value="맞춤법 " checked> 맞춤법 검사 </td>
                          </label>
                  </tr>
                  <tr>
                      <td id="target4"> 제작기한<br>(최소3일) </td>
                      <td colspan=2>
                          <input type="date" name="deadline" id="deadline" value="원하는 완료일자를 입력해 주세요.">
                      </td>
                  </tr>
                  </div></table>
        </center>
                <div class="join-guide"> <input type="checkbox" name="guide_checkbox" id="guide-checkbox" > <label for="guide-checkbox" class="glyphicon glyphicon-ok"></label>  MikEspecial의 <a>이용약관</a>에 동의합니다. </div>
				<button class="join-bu" type="submit">제작하기</button>
                <p>* 제작비용 : 3500 Point 또는 2 Voucher</p>
            </div>
        </div>
        </form>
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



   </body>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/archive.js"></script>

</html>