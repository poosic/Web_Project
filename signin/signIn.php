<?php
include "../include/session.php";
include "../include/dbConnect.php";

$memberId = $_POST['memberId'];
$memberPw = md5($memberPw = $_POST['memberPw']);

if($memberId == ''){
  echo '<script>alert("아이디를 입력해 주세요!");
        location.href="login_page.php";</script>';
}
if($memberPw == ''){
  echo '<script>alert("패스워드를 입력해 주세요!");
        location.href="login_page.php";</script>';
}
$sql = "SELECT * FROM account_info WHERE id = '{$memberId}' AND pwd = '{$memberPw}'";
$result = mysqli_query($dbConnect,$sql);
$row = mysqli_fetch_array($result);
if ($row != null) {
    $_SESSION['ses_userid'] = $row['id'];
    header( 'Location: ../Post/main.php' );
}
if($row == null){
  echo '<script>alert("로그인 실패! 아이디와 비밀번호가 일치하지 않습니다!");
        location.href="login_page.php";</script>';
}
?>
