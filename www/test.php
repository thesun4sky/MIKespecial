<?php

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';

$id= $_GET['id'];

if(!$id)
{
    echo '4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.';
}
else
{
    include "./lib/dbconn.php";
    $sql = "select * from user where email='$id'";
    $result = mysqli_query($connect, $sql);
    $num_record = mysqli_num_rows($result);

    if(strlen($id) > 30){
        echo '이메일이 너무 깁니다.';
    }
    else if ($num_record)
    {
        echo '이메일이 중복됩니다! 다른 이메일을 사용하세요.';
    }
    else
    {
        echo '사용가능한 이메일입니다.';
    }

    mysqli_close();
}

echo '</response>';

?>