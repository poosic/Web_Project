<?php
include "../include/dbConnect.php";
include "../include/session.php";
$p_id=$_POST['post_id'];

settype($_POST['reply_id'], 'integer');
$filtered =array(
  'reply_id'=>mysqli_real_escape_string($dbConnect, $_POST['reply_id'])
);
if($_SESSION['ses_userid'] === $_POST['author_id']){
  $sql="DELETE FROM reply WHERE reply_id = {$filtered['reply_id']};";
}else{
  echo "<script>
        alert('작성자가 아닙니다!');
        location.href='/Post/read.php?post_id=$p_id';</script>";
}
$result = mysqli_query($dbConnect, $sql);

if($result === false)
{
  error_log(mysqli_error($dbConnect));
  echo '<script>
        alert("삭제 실패! 관리자에게 문의바랍니다.");
        history.back();</script>';
}
else {
  echo "<script>
        alert('삭제 성공!');
        location.href='/Post/read.php?post_id=$p_id';</script>";
}
?>
