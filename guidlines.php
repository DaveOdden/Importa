<?php require "common/session_start_login_check.php"; ?>
<?php include_once "common/header.php"; ?>
<!-- Page Heading -->
<?php
if (isset($_REQUEST["success"])) { successMsg('Your application has been uploaded!'); }
if (isset($_REQUEST["failed"])) { errorMsg('Upload a zip!'); }
?>

<!-- User's application navigation & DB info -->
	<?php include_once "common/app_nav.php"; ?>
	<?php
		$dbname="webapp";
		$tables = mysql_list_tables( $dbname );
		$num_rows = mysql_num_rows($tables);
	?>
		<h3>Tool Guidelines &amp; Development Instructions</h3>
		<hr/>
		<div class="guideline_options" id="accordion">
			<!-- INTRODUCTION -->
			<div class="guideline_rules">
				<span class="guideline_arrow"></span>
				<span class="topic_text">TOPICS</span><span class="topic_number">12</span>
				<h4><a>Introduction</a></h4>
				<div id="topic_list">
					<div class="each_topic">
						<h5>Pre-Existing Files</h5>
						<p>
							est. completion time:<span>30 minutes</span>
						</p>
						<img src="img/icons/go.png" class="go_icon" />
					</div>
					
					<div class="each_topic">
						<h5>[App_Name].php</h5>
						<p>
							est. completion time:<span>40 minutes</span>
						</p>
						<img src="img/icons/go.png" class="go_icon" />
					</div>
					
					<div class="each_topic">
						<h5>app_functions.php</h5>
						<p>
							est. completion time:<span>20 minutes</span>
						</p>
						<img src="img/icons/go.png" class="go_icon" />
					</div>
				</div>
			</div>
			<!-- FILE STRUCTURE -->
			<div class="guideline_rules">
				<span class="guideline_arrow"></span>
				<span class="topic_text">TOPICS</span><span class="topic_number">6</span>
				<h4><a>File Structure</a></h4>
				<div>
					Curabitur blandit tempus porttitor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
				</div>
			</div>
			<!-- REQUIRED CODE SNIPPETS -->
			<div class="guideline_rules">
				<span class="guideline_arrow"></span>
				<span class="topic_text">TOPICS</span><span class="topic_number">14</span>
				<h4><a>Required Code Snippets</a></h4>
				<div>
					Curabitur blandit tempus porttitor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
				</div>
			</div>
		</div>
<?php include_once "common/footer.php"; ?>