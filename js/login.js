$(document).ready(function() {
		
	$('#btnlogin').on('click', function() {
		var username = $('#name_log').val();
		var password = $('#password_log').val();
		if(username!="" && password!="" ){
			$.ajax({
				url: "includes/user.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "home.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid username or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
