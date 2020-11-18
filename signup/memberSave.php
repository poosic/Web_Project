<?php
include "../include/dbConnect.php";
ini_set('display_errors','0');//error or warning 안보이게 하기

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$author_id = $_POST['author_id'];

$sql = "SELECT * FROM account_info WHERE id = '{$id}'";
$result = mysqli_query($dbConnect,$sql);
if(mysqli_num_rows($result) >= 1){
    echo '<script>alert("이미 존재하는 아이디입니다.");
          history.back();</script>';
    exit;
}

if($pwd !== $pwd2){
    echo '<script>alert("비밀번호를 다시 확인해주세요.");
          history.back();</script>';
    exit;
}
else{
    $pwd = md5($pwd);
}

if($author_id === '' ){
    echo '<script>alert("닉네임을 입력해주세요.");
          history.back();</script>';
    exit;
}

$sql = "SELECT * FROM account_info WHERE author_id = '{$author_id}'";
$result = mysqli_query($dbConnect,$sql);

if(mysqli_num_rows($result) >= 1){
    echo '<script>alert("이미 존재하는 닉네임입니다.");
          history.back();</script>';
    exit;
}

$sql = "INSERT INTO account_info(id,pwd,name,level) VALUES('{$id}','{$pwd}','{$author_id}','0'4);";
if(mysqli_query($dbConnect,$sql)){
    echo '<script>alert("회원가입 성공! 로그인 해주세요!");
          location.href="/signin/login_page.php";</script>';
}
?>
