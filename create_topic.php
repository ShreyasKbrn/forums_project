<?php
	include_once 'header.php';
	if(!isset($_GET['cid'])) {
		header('Location: index.php?error');
		exit();
	}
	
	$cid = $_GET['cid'];
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
					<form class="signup-form" action="create_topic_parse.php" method="post">
						<div class="form-group"><p><b>Topic title:</b></p> <input type="text" name="topic_title" size=98 maxlength=150 required><br></div>
						<div class="form-group"><p><b>Topic content:</b></p> <textarea name="topic_content" rows=5 cols=75 required></textarea><br><br></div>
						<input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
						<button type="submit" name="topic_submit" >Post topic</button>
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

