	$(document).ready(function(){
		$("#btnSubmit").click(function()
		{
//			alert($(this).text());
			console.log('submit...');
//			return false;
//			$("#authForm").submit();
			
	 
		});
		$('#IDtype li').click(function() {
			//alert($(this).text());
			$('#buttondropdown2').val($(this).text());
		});
		$('#optInstitution li').click(function() {
			//alert($(this).text());
			$('#buttondropdown1').val($(this).text());
		});		
/*
		$('.dropdown-toggle').dropdown(function() {
			alert($(this).text());
		});
*/		
	});