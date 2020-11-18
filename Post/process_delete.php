<?php//파일 업로드시킨것도 삭제해야징
include "../include/dbConnect.php";

settype($_POST['post_id'], 'integer');
$filtered =array(
  'post_id'=>mysqli_real_escape_string($dbConnect, $_POST['post_id'])
);

$sql ="
  DELETE
    FROM post
    WHERE post_id = {$filtered['post_id']}";

$result = mysqli_query($dbConnect, $sql);
if($result === false)
{
  error_log(mysqli_error($dbConnect));
  echo '<script>
        alert("삭제 실패! 관리자에게 문의바랍니다.");
        history.back();</script>';
}
else {
  echo '<script>
        alert("삭제 성공!");
        location.href="/Post/main.php";</script>';
}
?>
