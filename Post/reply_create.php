<?php
	include "../include/dbConnect.php";
  include "../include/session.php";
    $bno = $_GET['post_id'];

    if($bno && $_POST['content']){
        $sql = "insert into reply(post_id,content,author_id) values('$bno','$_POST[content]','$_SESSION[ses_userid]')";
        $result = mysqli_query($dbConnect,$sql);
        echo "<script>alert('댓글이 작성되었습니다.');
        location.href='./read.php?post_id=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }
?>
