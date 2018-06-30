<?php
	include_once 'header.php';
	if(!isset($_GET['cid']) & !isset($_GET['tid'])) {
		header('Location: index.php?error');
		exit();
	}
	
	$cid = $_GET['cid'];
	$tid = $_GET['tid'];
?>

<head>
	<style>
		.signup-form p {
			margin-left: -300px;
			text-align: left;
			float: left;
		}
	
		.signup-form input{
					float: left;
			border: 1px solid black;
			height: 40px;

		}
		
		
		
		.form-group {	
			display: inline-block;
			padding-bottom: 20px;
		}
	</style>
</head>

<section class="main-container">
	<div class="main-wrapper">
		<?php
			if(isset($_SESSION['u_id'])){
				echo "<div class='user_info'><p>Hello, ".$_SESSION['u_uid']."</p> <br /><font size='4'><i>".$_SESSION['u_email']."</i></font></div>";
				?>
				<div class="content">
					 <form class="signup-form" action="post_reply_parse.php" method="post">
					 	<p><b>Reply</b></p>
					 	<textarea name="reply_content" rows="5" cols="75" required></textarea><br /><br />
					 	<input type="hidden" name="cid" value="<?php echo $cid;?>">
					 	<input type="hidden" name="tid" value="<?php echo $tid;?>">
					 	<button type="submit" name="reply_submit" value="Submit reply">Post reply</button>
					 </form>
				</div>
			<?php
			}		
		?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>

