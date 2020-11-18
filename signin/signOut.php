<?php
ini_set('display_errors','0');
include "../include/session.php";

unset($_SESSION['ses_userid']);

if($_SESSION['ses_userid'] == null){
    echo '<script>alert("로그아웃 완료!");
          location.href="login_page.php"</script>';
}
?>
