<!--- 게시글 수정 -->
<?php
	include "../include/dbConnect.php";

	$bno = $_GET['post_id'];
	$sql = "select * from post where post_id='$bno';";
	$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
 ?>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
  <h1><a href="/Post/main.php">자유게시판</a></h1>
  <h4>글을 수정합니다.</h4>
  <form action="process_update.php?post_id=<?= $bno; ?>" method="post">
    <p><textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required><?= $result['title']; ?></textarea></p>
    <p><textarea name="description"  placeholder="내용" required><?= $result['description']; ?></textarea></p>
    <input type="hidden" name="p_id" value="<?= $bno; ?>" />
    <p><button type="submit">글 작성</button></p>
  </form>
</body>
</html>
