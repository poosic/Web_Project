<?php
	include "../include/dbConnect.php";
	include "../include/session.php";
	$uid = $_SESSION['ses_userid'];
	$sql = "select * from account_info where id='$uid'";
	$level = mysqli_query($dbConnect,$sql);
	$level = mysqli_fetch_array($level);
	$level = $level['level'];
?>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
	<?php
	$bno = $_GET['post_id'];
  $sql = "select * from post where post_id ='$bno'";
	$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
	$hit = $result['hit'] + 1;
  $sql = "update post set hit = '$hit' where post_id = '".$bno."'";
	$fet = mysqli_query($dbConnect,$sql);
	$sql = "select * from post where post_id ='$bno'";
	$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
	?>
  <h2><?php echo $result['title']; ?></h2>
	<p><?= $result['created']; ?> 조회:<?= $result['hit']; ?> 작성자:<?=$result['author_id']?></p>
  <p><?php echo nl2br("$result[description]"); ?></p>
  <p>파일 : <a href="./upload/<?= $result['file'];?>" download><?=$result['file']; ?></a></p>

	<a href="/Post/main.php">[목록으로]</a>
	<?php
		if($level >= 1 or $_SESSION['ses_userid'] == $result['author_id']){//process 파일에도 막아놓을까...
				echo "<a href='update.php?post_id=$result[post_id]'>[수정]</a>
							<a href='delete.php?post_id=$result[post_id]'>[삭제]</a>";
		}
?>

	<h3>댓글목록</h3>
		<?php
			$sql2 = "select * from reply where post_id='$bno' order by post_id desc";
      $sql2 = mysqli_query($dbConnect,$sql2);

			while($reply = mysqli_fetch_array($sql2)){
		?>
			<p><b>작성자:<?= $reply['author_id'];?> </b> 작성일:<?= $reply['created']; ?></p>
			<p><?php echo nl2br("$reply[content]"); ?></p>

			<a href="">수정</a>
      <form action="reply_delete.php" method="post">
        <input type="hidden" name="reply_id" value="<?=$reply['reply_id']?>" />
        <input type="hidden" name="author_id" value="<?=$reply['author_id']?>" />
        <input type="hidden" name="post_id" value="<?=$reply['post_id']?>" />
        <button>삭제</button>
      </form>
	<?php } ?>
		<form action="reply_create.php?post_id=<?= $bno; ?>" method="post">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button>댓글</button>

		</form>
</body>
</html>
