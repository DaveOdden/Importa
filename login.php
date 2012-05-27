<?php require "common/header.php"; ?>
<div id="main_wrapper" role="main wrapper">
	<div id="main" role="main content">
		<br/>
		<br/>
		<div id="home_sections" style="margin-left:-260px">
			<div id="section_1">
				<div id="intro">
					<h2 id="intro_header">A Web-based Business &amp; Consumer Productivity Suite</h2>
					<h3 id="intro_body">Cum sociis natoque penttes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit .<br/>
					<br/>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctorsed posuer</h3>
					<div id="btn_container">
						<div class="btn_house" id="house1"><a href="#" id="join_btn">Join <span id="italic_for">for</span> Free</a></div>
						<div class="btn_house" id="house2"><a id="tour_btn">Take a Tour</a></div>
					</div>
				  </div>
				  <div id="img_placeholder">
				  </div>
			  </div>
			
			<div id="section_2">
				<div id="s2_options">
					<ul id="home_options">
						<li><a href="#">Activate Tools</a></li>
						<li><a href="#">Upload a Tool</a></li>
						<li><a href="#">Build a Tool</a></li>
						<li><a href="#">Smart Tools</a></li>
						<li><a href="#">Take a Tour</a></li>
					</ul>
				</div>
				<div id="option_display">
					<!-- ><span id="unicode_char_3">&#9664;</span>
					<div class="arrow-left"></div> -->
					<div id="option_line"></div>
					<div id="option_info">
						<div id="img_placeholder_2"></div>
						<div id="option_info_text">
							<h3>Morbi leo risus, porta ac conse setetur
							accvest ibusorus fotrys</h3>
							<p>Vestibulum id ligula porta felis euismod semper. Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>
							<ul>
								<li>- Duis mollis, est non commodo<li>
								<li>- Erat porttitor ligula, eget lacinia odio sem <li>
								<li>- Felis euismod semper. Donec sed odio dui. Duis<li>
								<li>- Erat porttitor ligula, eget lacinia odio sem<li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="section_3">
				<h3>Five-star, Customizable Tools that Adapt to your Needs</h3>
			
				<div id="mrkt_icon_1">
					<img src="img/home_icon1.png">
					<p>Powerful Analytics</p>
				</div>
				<div id="mrkt_icon_2">
					<img src="img/home_icon2.png">
					<p>Secure Cloud Services</p>
				</div>
				<div id="mrkt_icon_3">
					<img src="img/home_icon3.png">
					<p>Advanced Social Tools</p>
				</div>
				<div id="mrkt_icon_4">
					<img src="img/home_icon4.png">
					<p>Standard Support</p>
				</div>
			</div>
			
			<div id="login_footer">
				<p>Terms of Service | Privacy Policy | © 2012 My Parent Company Name LLC</p>
				<p>Login | Signup</p>
			</div>
			</div>
			<?php

			if('http://localhost:8888/webapp/login.php' != $_SERVER['HTTP_REFERER'] && 'http://localhost:8888/webapp/common/logout.php' != $_SERVER['HTTP_REFERER'])
			{
			$_SESSION['SESS_PAGE'] = $_SERVER['HTTP_REFERER'];
			}

			if(isset($_REQUEST['loginAttempt']))
			{
				$username = mysql_real_escape_string($_POST['username']);
				$password = mysql_real_escape_string(md5($_POST['password']));
				$query = mysql_query("SELECT * FROM UserAccounts WHERE username='$username' AND password='$password'");
				$total = mysql_num_rows($query);
				if($total > 0)
				{
					session_start();
					$_SESSION['SESS_USERNAME'] = $username;

					if(isset($_SESSION['SESS_PAGE']))
					{
					?>
					    <script type="text/javascript">
						<!--
						window.location = "appmanager.php"
						//-->
						</script>
					<?php	
					}
					else
					{
					?>
					    <script type="text/javascript">
						<!--
						window.location = "index.php"
						//-->
						</script>
					<?php
					}
				}
				else
				{
					errorMsg('Username or password does not match what we have on file');
				}
			}

			//This code runs if the form has been submitted
			if (isset($_POST['new_user_submit']))
			{
				//form validation: empty fields
				if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] )
				{
			 		die(errorMsg('You did not complete all of the required fields'));
			 	}

				//grabbing username from user
				if (!get_magic_quotes_gpc())
				{
			 		$_POST['username'] = addslashes($_POST['username']);
			 	}

			 $usercheck = $_POST['username'];

			 //checks for a username match
			 $check = mysql_query("SELECT username FROM UserAccounts WHERE username = '$usercheck'") 
				or die(errorMsg('Cannot connect to the database.. : /'));
			 $check2 = mysql_num_rows($check);

			 //form validation: if username exists
			 if ($check2 != 0)
			 {
				errorMsg('Sorry, the username '.$_POST['username'].' is already in use.');
			 }

			 //form validation: password match
			 if ($_POST['pass'] != $_POST['pass2'])
			 {
				errorMsg('Your passwords did not match. ');
			 }

			$_POST['pass'] = md5($_POST['pass']);

			 	if (!get_magic_quotes_gpc())
				{
			 		$_POST['pass'] = addslashes($_POST['pass']);
			 		$_POST['username'] = addslashes($_POST['username']);
			 	}
					{
					$insert = "INSERT INTO UserAccounts (username, password, users_apps)
								VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".''."')";

					$_SESSION['SESS_USERNAME'] = $_POST['username'];
					$add_member = mysql_query($insert);
					?>
					    <script type="text/javascript">
						<!--
						window.location = "index.php?newUser"
						//-->
						</script>
					<?php
					}
				}
				?>
<?php include_once "common/footer.php"; ?>