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
						include_once 'includes/dbh.inc.php';
						$cid = $_GET['cid'];
						$tid = $_GET['tid'];
						
						$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id = '".$tid."' LIMIT 1";
						
						$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						
						$row=mysqli_fetch_assoc($res);
						if($row!=null) {
							echo "<table width='100%'>";
							if($_SESSION['u_uid']) {
								echo "<tr><td colspan='2'><form method='GET' action='post_reply.php'><input type='submit' value='Add reply'>
								<input type='hidden' name='cid' value='".$cid."'>
								<input type='hidden' name='tid' value='".$tid."'>
								</form></td></tr><hr />";
							} 
							
							else {
								echo "<tr><td colspan='2'>Please login to reply.</td></tr><hr />";
							}
							$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($row=mysqli_fetch_assoc($res)) {
		
								$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
								$res2 = mysqli_query($conn, $sql2) or die(mysqli_query($conn));
								while($row2 = mysqli_fetch_assoc($res2)) {
									echo "<tr><td style='border: 1px solid #000;'><div style='min-height: 125px;'>".$row['topic_title']."<br />by ".$row2['post_creator']." - ".$row2['post_date']."<br />".$row2['post_content']."</div></td><td width='200' align='center' style='border: 1px solid #000'>User info here</td></tr><tr><td colspan='2'><hr /></td></tr>";
								}
								$old_views = $row['topic_views'];
								$new_views = $old_views+1;
								
								$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
								$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
							}
							
							
						} else {
							echo "Topic does not exist";
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

