<?php
include "../include/dbConnect.php";
include "../include/session.php";
$uid = $_SESSION['ses_userid'];
$filtered =array(
  'title'=>mysqli_real_escape_string($dbConnect, $_POST['title']),
  'description'=>mysqli_real_escape_string($dbConnect,$_POST['description'])
);

$tmpfile = $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "./upload/".$filename;

move_uploaded_file($tmpfile,$folder);

$sql = "INSERT INTO post (title,description,created,author_id,hit,file) VALUES('{$filtered['title']}','{$filtered['description']}',NOW(),'$uid',0,'$o_name');";
$result = mysqli_query($dbConnect, $sql);
if($result === false)//authorid가 비어서 문제가 생김->NULL허용해서 해결
{
  echo '<script>
        alert("글쓰기에 실패했습니다.");
        history.back();</script>';
  error_log(mysqli_error($dbConnect));
}
else {
  echo '<script>
        alert("글쓰기 완료!");
        location.href="/Post/main.php";</script>';
}
?>
