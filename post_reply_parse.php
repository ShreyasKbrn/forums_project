<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	
	if($_SESSION['u_uid']) {
		if (isset($_POST['reply_submit'])) {
			$creator = $_SESSION['u_uid'];
			$cid = $_POST['cid'];
			$tid = $_POST['tid'];
			$reply_content = $_POST['reply_content'];
			

			
			$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
			
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
			$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
			$sql3= "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."'";
			$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
			
			if(($res)  && ($res2) && ($res3)) {
				echo "<p>Your reply has been posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic.</a></p>";
						$sql4 = "SELECT * FROM topics WHERE category_id='".$cid."' AND id = '".$tid."' LIMIT 1";
						
						$res4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
						
						$row4=mysqli_fetch_assoc($res4);				
				$old_replies = $row4['topic_replies'];
				$new_replies = $old_replies+1;
								
				$sql3 = "UPDATE topics SET topic_replies='".$new_replies."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
				$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
			} else {
				echo"<p>There was an error while posting your reply</p>";
			}
		} else {
			exit();
		}
	} else {
	
	}
?>
