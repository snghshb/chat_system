<?php

include('../config.php');

switch($_REQUEST['action']) {
	case "sendMessage":	//echo 'sending response back from php page';
						session_start();
						$query = $db->prepare("INSERT INTO messages SET user=?, message =?");
						$run = $query->execute([$_SESSION['username'],$_REQUEST['message']]);
						if($run) {
							echo 1;
							exit;
						}
						break;
	case "getMessages":	//echo 'response from handlers page';
						$query = $db->prepare("SELECT * FROM messages");
						$run = $query->execute();

						$rs = $query->fetchAll(PDO::FETCH_OBJ);

						//echo var_dump($rs);
						$chat = '';

						foreach($rs as $message) {
							//$chat .= $message->message.'<br />';
							$chat .= 	'<div class="single-message">
										<strong>'.$message->user.': </strong>'.$message->message.'
										<span>'.date('m-d-Y h:i a', strtotime($message->date)).'<span>
										</div>
										<div class="clear"></div>';
						}

						echo $chat;

						break;
}

?>