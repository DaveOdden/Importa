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
		<h3>Tool Guidelines &amp; Development Tutelage</h3>
		<form id="guidleline_search_form">
		<input type="text" name="field" class="textInput" value="Search Guidelines" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
		</form>
		<hr/>
		<div class="guideline_options" id="accordion">
			<!-- INTRODUCTION -->
			<div class="guideline_rules">
				<span class="guideline_arrow"></span>
				<span class="topic_text">TOPICS</span><span class="topic_number">26</span>
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
				<span class="topic_text">TOPICS</span><span class="topic_number">4</span>
				<h4><a>File Structure</a></h4>
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
			<!-- REQUIRED CODE SNIPPETS -->
			<div class="guideline_rules">
				<span class="guideline_arrow"></span>
				<span class="topic_text">TOPICS</span><span class="topic_number">12</span>
				<h4><a>Required Code Snippets</a></h4>
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
			
		</div>
<?php include_once "common/footer.php"; ?>