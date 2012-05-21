<?php include_once ("../../common/app_header.php"); ?>
<?php require ("../../common/app_nav.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("div.foo").append("Hello World!").css("color","red");
	$(".link").click(function(){  
		$("div.foo").css("color","black").show("slow");
		//$("div.foo").load("app_functions.php"); 
	});
});
</script>
<div class="foo">Diamond Dust</div>
<a class="link" href="#">Slip a Ruphee</a>
<?php include_once ("../../common/app_footer.php"); ?>