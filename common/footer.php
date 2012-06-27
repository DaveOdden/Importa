		</div>
	</div> 
<footer>
  </footer>
</div>
  <!-- scripts concatenated and minified via build script -->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
	<script type="text/javascript" charset="utf-8">
		$("#dropdown_options").hide();
		$("#login_container").hide();
		$("#signup_container").hide();
	   $(document).ready(function() {
			//$("body").click(function(){ $("#login_container, #signup_container").fadeOut(200); });
			if ( $(window).width() < 830) {
				$('#menu').toggle( 
				    function() {
				        $('#left_nav').animate({ left: 0 }, 'slow', function() {});
						$('#main').animate({ left: 240 }, 'slow', function() {});
				    }, 
				    function() {
				        $('#left_nav').animate({ left: -240 }, 'slow', function() {});
						$('#main').animate({ left: 0 }, 'slow', function() {});
				    }
				);
			}
			else
			{
				$('#dropdown_options').css("display", "inline");
			}
			
			$('#opt1').click(function() {
				$('#unicode_char_3').animate({ marginTop:'60px' });
				$(this).addClass("optsel");
				$('#opt2').removeClass("optsel");
				$('#opt3').removeClass("optsel");
				$('#opt4').removeClass("optsel");
				$('#opt5').removeClass("optsel");
				//$('#slide_container').css('opacity','0.2');
				$('#slide_container').animate({ marginTop:'0px'}, 300);
			});
			
			$('#opt2').click(function() {
				$('#unicode_char_3').animate({ marginTop:'114px' });
				$(this).addClass("optsel");
				$('#opt1').removeClass("optsel");
				$('#opt3').removeClass("optsel");
				$('#opt4').removeClass("optsel");
				$('#opt5').removeClass("optsel");
				$('#slide_container').animate({ marginTop:'-324px'}, 300);
			});
			
			$('#opt3').click(function() {
				$('#unicode_char_3').animate({ marginTop:'162px' });
				$(this).addClass("optsel");
				$('#opt1').removeClass("optsel");
				$('#opt2').removeClass("optsel");
				$('#opt4').removeClass("optsel");
				$('#opt5').removeClass("optsel");
				$('#slide_container').animate({ marginTop:'-650px'}, 300);
			});
			
			$('#opt4').click(function() {
				$('#unicode_char_3').animate({ marginTop:'212px' });
				$(this).addClass("optsel");
				$('#opt1').removeClass("optsel");
				$('#opt2').removeClass("optsel");
				$('#opt3').removeClass("optsel");
				$('#opt5').removeClass("optsel");
				$('#slide_container').animate({ marginTop:'-977px'}, 300);
			});
			
			$('#opt5').click(function() {
				$('#unicode_char_3').animate({ marginTop:'260px' });
				$(this).addClass("optsel");
				$('#opt1').removeClass("optsel");
				$('#opt2').removeClass("optsel");
				$('#opt3').removeClass("optsel");
				$('#opt4').removeClass("optsel");
				$('#slide_container').animate({ marginTop:'-1303px'}, 300);
			});

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
			
			$('#dropdown_menu_btn').toggle(
			    function()
			    {
				//$("#dropdown_options").fadeOut(200).delay(1800);
				$('#dropdown_options').animate({opacity: 'show', height: 'show'}, 340);
				},
			    function()
			    {
				$('#dropdown_options').animate({opacity: 'hide', height: 'hide'}, 340); 
			});
			
			$('#app_manager_list_view_btn').click(function() {
				//$("#dropdown_options").fadeOut(200).delay(1800);
				$('.placeholder').css({width: '75', height: '75'});
				$('.placeholder').addClass('placeholder_list');
				$('.app_title').css({'width': 'inherit', 'margin-top': '17px', 'padding':'0'});
				$('.app_desc').addClass('app_desc_list');
				$('.activate_app_text').addClass('activate_app_text_list');
				$('.deactivate_app_text').addClass('deactivate_app_text_list');
			});
			
			$('#app_manager_icon_view_btn').click(function() {
				//$("#dropdown_options").fadeOut(200).delay(1800);
				$('.placeholder').css({width: '200', height: '140'});
				$('.placeholder').removeClass('placeholder_list');
				$('.app_title').css({'margin-top': '0px', 'padding':'0'});
				$('.app_desc').removeClass('app_desc_list');
				$('.activate_app_text').removeClass('activate_app_text_list');
				$('.deactivate_app_text').removeClass('deactivate_app_text_list');
			});
			
			$( "#accordion" ).accordion({ header: 'h4',active: false, collapsible: true });
			/*
			$('.guideline_rules').click(function(e) {
					$('.guideline_rules').siblings('.guideline_arrow').css('display', 'none');
				});
				*/
				
				$('.guideline_rules').toggle(
				    function()
				    {
						$(this).find('.guideline_arrow').each(function() {
							$(this).addClass('rotate_arrow');
						});
					},
				    function()
				    {
						$(this).find('.guideline_arrow').each(function() {
							$(this).removeClass('rotate_arrow');
						}); 
				});
	   });
	
	</script>
  <!-- end scripts -->
</body>
</html>