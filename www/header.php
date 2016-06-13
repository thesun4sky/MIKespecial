

<div id="login-cover"></div>
<script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.1.js"></script>
<script type="text/javascript" src="./jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    if(naver_id_login.get_naver_userprofile()){
        email = naver_id_login.getProfileData('email');
        name = naver_id_login.getProfileData('name');
        age = naver_id_login.getProfileData('age');
        window.alert("email = " + email + "name = " + name);
    }
	
	


</script>

<div id="header" class="hidden-xs">
    <div id="header-inner">

        <div id="header-inner-logo">

            <a href="index.html"><div id="header-inner-logo-icon"><span class="logo"></span></div></a>

            <div id="header-inner-logo-text">

                <div id="header-inner-nav">

               <a href="category.php"> <p data-button="1" class="item-ka">카테고리</p></a>
                <div id="item-ka">
                	<li>모자</li>
                    <li>맨투맨s</li>
                </div>
                    <a href="event.html"><p data-button="3">이벤트</p></a>
                <a href="board.php"><p data-button="4">문의사항</p></a>
                <a href="mypage.php"><p data-button="5">마이페이지</p></a>
                    <?
                    if(!empty($_SESSION['userid']))
                    {
                        $userid = $_SESSION['userid'];
                        ?>
                        <a href="member/logout.php"><p data-button="6">로그아웃</p></a>
                        <?
                    }
                    else
                    {
                        ?>
                        <a href="/login.html"><p data-button="6">로그인</p></a>
                        <?
                    }
                    ?>
                    </p>

                </div>
            </div>
        </div>

      </div>
    </div>
    
    <div id="m-header" class="visible-xs">
		<a href="http://mikespeical.woobi.co.kr/"><img class="m-logo" src="./img/m-logo.png" width="70px" height="60px"></a>
        <?
                    if(!empty($_SESSION['userid']))
                    {
                        $userid = $_SESSION['userid'];
                        ?>
                        <a href="member/logout.php"><img class="m-login" src="./img/m-logout.png" width="30px" height="35px"></a>
                        <?
                    }
                    else
                    {
                        ?>
                        <a href="login.html"><img class="m-login" src="./img/m-login.png" width="30px" height="30px"></a>
                        <?
                    }
                    ?>
        <img class="m-menu" src="./img/m-menu.png" width="30px" height="30px">
        		<div class="m-sideform">
                	<div class="m-side-back">
                    </div>
                    
                    <div class="m-sidemenu">
                    	<div class="m-side-top">
                        	<a href="order_detail.php"><img class="m-cart" src="./img/m-cart.png" width="40px" height="40px"></a>
                        	<a href="order_check.php"><img class="m-order" src="./img/m-order.png" width="40px" height="40px"></a>
                        </div>
                   		 <a href="category.php"><li class="side-m1">카테고리</li></a>
                        <a href="event.html"><li class="side-m3">이벤트</li></a>
                        <a href="board.php"><li class="side-m4" >문의사항</li></a>
                        <a href="mypage.php"><li class="side-m4" >마이페이지</li></a>
                    <?
                    if(!empty($_SESSION['userid']))
                    {
                        $userid = $_SESSION['userid'];
                        ?>
                        <a href="member/logout.php"><li class="side-m5">로그아웃</li></a>
                        <?
                    }
                    else
                    {
                        ?>
                        <a href="/login.html"><li class="side-m5">로그인</li></a>
                        <?
                    }
                    ?>
                    <div class="m-side-footer">
                     	© MikEspecial Corp. Since 2016
                    </div>
                    </div>

                    
                </div>
        
        
   	 </div>  

<!-- 로그인 폼 시작 -->


<!-- 로그인 폼 끝 -->