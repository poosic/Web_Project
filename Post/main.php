<?php
include "../include/dbConnect.php";
include "../include/session.php";
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>게시판</title>
</head>
<body>
  <?=$_SESSION['ses_userid'].'님 안녕하세요'?>
  <?='<a href="../signin/signOut.php">로그아웃</a>'?>
  <div id="board_area">
  <h1>자유게시판</h1>
  <table class="list-table">
    <thead>
      <tr>
        <th width="70">post_num</th>
        <th width="500">title</th>
        <th width="120">author</th>
        <th width="100">created</th>
        <th width="100">hit</th>
      </tr>
    </thead>
    <?php
    // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
    $sql = "select * from post order by post_id desc";
    $result = mysqli_query($dbConnect, $sql);
    while($row = mysqli_fetch_array($result))
    {
    //title변수에 DB에서 가져온 title을 선택
        $title=$row["title"];
        if(strlen($title)>30)
        {
          //title이 30을 넘어서면 ...표시
          $title=str_replace($row["title"],mb_substr($row["title"],0,30,"utf-8")."...",$row["title"]);
        }
        //댓글 수 카운트
    $sql2 = "select * from reply where post_id='".$row['post_id']."'";
    $sql2 = mysqli_query($dbConnect, $sql2); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
    $rep_count = mysqli_num_rows($sql2); //num_rows로 정수형태로 출력
    ?>
    <tbody>
      <tr>
        <td width="70"><?php echo $row['post_id']; ?></td>
        <td width="500"><a href="read.php?post_id=<?= $row["post_id"];?>"><?php echo $title;?></a><?= "[$rep_count]";?></td>
        <td width="120"><?php echo $row['author_id']?></td>
        <td width="100"><?php echo $row['created']?></td>
        <td width="100"><?php echo $row['hit']; ?></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
    <a href="create.php"><button>글쓰기</button></a>
</div>
</body>
</html>
