<?php
	include_once 'header.php';
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style>

		
	</style>
</head>

<section class="main-container">
	<div class="main-wrapper">
		<?php
			if(isset($_SESSION['u_id'])){
				echo "<div class='user_info'><p>Hello, ".$_SESSION['u_uid']."</p> <br /><font size='4'><i>".$_SESSION['u_email']."</i></font></div>";
				?>
				<div class="content">
					<h1>Categories</h1>
					<?php
						include_once 'includes/dbh.inc.php';
						$sql = "SELECT * FROM categories ORDER BY category_title ASC";
						$res = mysqli_query($conn,$sql) or die(mysqli_error());
						$categories = "";
						if(mysqli_num_rows($res) > 0) {
							while($row= mysqli_fetch_assoc($res)) {
								$id=$row['id'];
								$title = $row['category_title'];
								$description = $row['category_description'];
								$categories .="<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." -<font size='-1'>".$description."</font></a>";
							}
							
							echo $categories;
						} else {
							echo "<p>There are no categories</p>";
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

