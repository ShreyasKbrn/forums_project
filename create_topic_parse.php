<?php
	include_once 'header.php';
	
	if(isset($_POST['topic_submit'])) {
		if($_POST['topic_title']=="" && $_POST['topic_content']=="") {
			echo "Required fields not filled";
			echo "Redirecting....";
			header("Location: create_topic.php?field_err");
			exit();
		} else {
			include_once 'includes/dbh.inc.php';
			$title = $_POST['topic_title'];
			$content= $_POST['topic_content'];
			$cid=$_POST['cid'];
			$creator = $_SESSION['u_uid'];
			
			
			$sql = "INSERT INTO topics(category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES('".$cid."', '".$title."', '".$creator."', now(), now())";
			
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			$new_topic_id = mysqli_insert_id($conn);
			$sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";
			$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
			$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
			$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
			
			if(($res) && ($res2) && ($res3)) {
				header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
			} else {
				echo "There was a problem creating your post. Please try again";
			}
			
		}
	} else {
	
	}
?>
