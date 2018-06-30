<?php
	include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<?php
			if(isset($_SESSION['u_id'])){
				echo "<div class='user_info'><p>Hello, ".$_SESSION['u_uid']."</p> <br /><font size='4'><i>".$_SESSION['u_email']."</i></font></div>";
				?>
				<div class="content">
					<?php
						$topics="";
						include_once 'includes/dbh.inc.php';
						$cid = $_GET['cid'];
						
						$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
						$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						
						if(mysqli_num_rows($res)==1) {
							$sql = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
							$res1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							
							if(mysqli_num_rows($res1)>0) {
								$topics.="<table width='100%' style='border-collapse:collapse;'>";
								$topics.="<tr><td><a href='index.php'>Return to the home page</a></td></tr><tr><td><br></td></tr><tr><td><br></td></tr>";
								$topics.="<br /><tr style='background-color=#ddd;';><td colspan ='1'>Title</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views</td></tr>";
								$topics.="<tr><td colspan='3'><hr /></td></tr>";
								while($row=mysqli_fetch_assoc($res1)) {
									$tid = $row['id'];
									$title = $row['topic_title'];
									$views = $row['topic_views'];
									$replies = $row['topic_replies'];
									$date = $row['topic_date'];
									$creator = $row['topic_creator'];
									$topics.="<tr><td><a href='view_topic.php?cid=".$cid." & tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td  align='center'>".$replies."</td><td  align='center'width='65' >".$views."</td></tr>";
									$topics.="<tr><td colspan='3'><hr /></td></tr>";
								}
								$topics.="<tr><td><a href='create_topic.php?cid=".$cid."'>Create a topic.</a></td></tr>";
								$topics.="</table>";
								echo $topics;
							} else {
							echo "<a href='index.php'>Return to forum collection.</a> <hr />";
							echo "There are no topics in the categories yet. | <a href='create_topic.php?cid=".$cid."'>Create a topic.</a>";							
							}
						} else {
							echo "<a href='index.php'>Return to forum collection.</a> <hr />";
							echo "You are trying to view category which doesn't exist yet.";
						}
					?>
				</div>
			<?php
			}		
		?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>

