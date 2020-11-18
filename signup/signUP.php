<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>Sign Up</title>

</head>
<body>
  <h1>회원가입</h1>
  <form action="memberSave.php" method="post" >
    <p>아이디</p>
      <input type="text" name="id" />
    <p>비밀번호</p>
      <input type="password" name="pwd" />
    <p>비밀번호 재입력</p>
      <input type="password" name="pwd2" />
    <p>닉네임</p>
      <input type="text" name="author_id" />
    <input type="submit" value="가입하기" />
  </form>
</body>
</html>
