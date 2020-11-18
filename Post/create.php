<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body>
  <h1><a href="/Post/main.php">자유게시판</a></h1>
  <form action="process_create.php" method="post" enctype="multipart/form-data">
    <p><textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea></p>
    <p><textarea name="description" placeholder="내용" required></textarea></p>
    <p><input type="file" name="b_file" /></p>
    <p><button type="submit">글 작성</button></p>
  </form>
</body>
</html>
