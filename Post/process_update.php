<?php
include "../include/dbConnect.php";

settype($_POST['p_id'], 'integer');
$filtered =array(
  'post_id'=>mysqli_real_escape_string($dbConnect, $_POST['p_id']),
  'title'=>mysqli_real_escape_string($dbConnect, $_POST['title']),
  'description'=>mysqli_real_escape_string($dbConnect,$_POST['description'])
);

$sql ="
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE
      post_id = {$filtered['post_id']};
";

$result = mysqli_query($dbConnect, $sql);
if($result === false)
{
  error_log(mysqli_error($dbConnect));
  echo '<script>
        alert("수정 실패! 관리자에게 문의바랍니다.");
        history.back();</script>';
}
else {
  echo '<script>
        alert("삭제 성공!");
        location.href="/Post/main.php";</script>';
}
?>
