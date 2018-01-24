<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Simple chat using PHP MySQL ADO and AJAX</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</head>
<body>

<div id="wrapper">
	<h1><?php session_start(); echo $_SESSION['username'];?>, welcome to chat</h1>
	<div class="chat_wrapper">
		<div id="abc"></div>
		<div id="chat"></div>
		<form method="POST" id="messageForm">
			<textarea name="message" cols="30" rows="7" class="textarea"></textarea>
		</form>
	</div>
</div>
<script type="text/javascript">
	loadChat();

	setInterval(function(){
		loadChat();
	}, 2000);

	function loadChat() {
		$.post('handlers/messages.php?action=getMessages', function(response) {
			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
			$('#chat').html(response);

			if(scrollpos < scrollHeight) {

			}
			else {
				$('#chat').scrollTop($(chat).prop('scrollHeight'));
			}
		});
	}
	$('.textarea').keyup(function(e){
		//alert($(this).val());
		//alert(e.which);
		if(e.which === 13){
			//alert($(this).val());
			$('form').submit();
		}
	});
	$('form').submit(function(){
		var message = $('.textarea').val();

		$.post('handlers/messages.php?action=sendMessage&message='+message, function(response) {
			//alert(response);
			if(response == 1) {
				document.querySelector("#messageForm").reset();
				loadChat();
			}
		});

		return false;
	});
</script>
</body>
</html>