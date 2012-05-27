		</div>
	</div> 
<footer>
  </footer>
</div>
  <!-- scripts concatenated and minified via build script -->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
	<script type="text/javascript" charset="utf-8">
		$("#login_container").hide();
		$("#signup_container").hide();
	   $(document).ready(function() {
			//$("body").click(function(){ $("#login_container, #signup_container").fadeOut(200); });

			$('#login_btn').toggle(
			    function()
			    {
				$("#signup_container").fadeOut(200).delay(1800);
				$('#login_container').animate({opacity: 'show', height: 'show'}, 340);
				},
			    function()
			    {
				$('#login_container').animate({opacity: 'hide', height: 'hide'}, 340); 
			});
			
			$('#signup_btn').toggle(
			    function()
			    {
				$("#login_container").fadeOut(200).delay(1800);
				$('#signup_container').animate({opacity: 'show', height: 'show'}, 340); 
				},
			    function()
			    {
				$('#signup_container').animate({opacity: 'hide', height: 'hide'}, 340); 
			});
			
			$('#join_btn').click(function() {
				$("#login_container").fadeOut(200).delay(1800);
				$('#signup_container').animate({opacity: 'show', height: 'show'}, 340); 
			});
	   });
	</script>
  <!-- end scripts -->
</body>
</html>