
<!DOCTYPE html>
<html>
<head>
	<title>ChatBox</title>
	<style>
		.h1{
			margin:100px;
			fontsize:100px;
		}
		.chat-container {
			margin:0px;
			border: 2px solid black;
			border-radius: 10px;
			padding: 10px;
			height: 500px;
			width:500px;
			overflow-y: scroll;
		}
		.chat-input {
			margin-top: 10px;
			width:500px;
			
		}
		.chat-input:focus {
			outline: none;
		}
		.chat-input::placeholder {
			color: gray;
		}
		.chat-message {
			margin-bottom: 10px;
			font-size: 50px;
		}
		.chat-message:last-child {
			margin-bottom: 0;
		}
		.chat-message strong {
			font-weight: bold;
		}
		.chat-message span {
			color: gray;
			font-size: 50px;
			margin-left: 10px;
		}
		nav {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100vh;
    width: 100px;
    background-color: #080000;
    position: fixed;
    top: 0;
    left: 0;
  }
  
  ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  li {
    margin: 10px 0;
    text-align: center;
  }
	</style>
</head>
<body>
	<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">LocalBuddy</h2>
            </div>

            <div class="menu">
                <ul>

                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">Brochure</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="feedback/feedback/index1.php">FEEDBACK</a></li>
                </ul>
            </div>

            

        </div> 
	<center>
		<div class ="h1">
	<h1>ChatBox</h1>
</div>
	<div class="chat-container">
		<?php
		include 'navbar.php';
// Check if a message has been sent
if (isset($_POST['message']) && !empty($_POST['message'])) {
	// Get the message and sanitize it
	$message = htmlspecialchars($_POST['message']);

	// Open the chat log file in append mode
	$file = fopen('chatlog.txt', 'a');
	// Write the message to the file with the current timestamp
	fwrite($file, 'Rajshekar['.date('Y-m-d').']: '.$message."\n");

	// Close the file
	fclose($file);
}

// Read the chat log file and display the messages
$file = file('chatlog.txt');
foreach ($file as $line) {
	echo htmlspecialchars($line).'<br>';
}
?>
		<!-- Chat messages will be displayed here -->
	
	<form action="chatbox8.php" method="post">
		</div>
		<input type="text" name="message" class="chat-input">
		<button type="submit">Send</button>
	</form>
	<center>
</body>
</html>
