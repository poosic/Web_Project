<?php
include "../include/dbConnect.php";

$bno = $_GET['post_id'];
$sql = "delete from post where post_id='$bno';";
$result = mysqli_query($dbConnect,$sql);
?>
<script type="text/javascript">
  alert("삭제되었습니다.");
  location.href="./main.php"
</script>
