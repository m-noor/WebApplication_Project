<!-- all we want in this PHP script are as follows:

1. get data from login.html (email+password) and do SQL stuff
2. if OK, then (i) write cookie with user name, (ii) redirect to index.html and make sure the top displays 'welcome back xxx!'
3. if not OK, then redirect to login.html and put a note/message somewhere incorrect details entered

-->

<?php
		//session_register();
		session_start();                 
	
		// get values from the login webpage
		$entered_email = $_POST["entered_email"];
		$entered_password = $_POST["entered_password"];
		
		//Step 1:  Create a database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "outdoor_adventures_db";
		$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		//Test if connection occurred
		if(mysqli_connect_errno()){
			die("DB connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() . ")"
					);
		}

		if (!$connection)
			{
				die('Could not connect: ' . mysqli_error());
			}
	
		//Step 2: Perform Database Query
		
		//2. compare the InputPassword1.value to the selected password. if OK, then proceed to write cookies and redirect to homepage.
		//3. if not OK, return to this webpage and inform user accordingly

		// $result = mysqli_query($connection,"SELECT * FROM login_details WHERE email='" . $_POST["entered_email"] . "'");
		// $result = mysqli_query($connection,"SELECT * FROM login_details WHERE email='{$_POST["entered_email"]}'"); // easier string concatenation
		$result = mysqli_query($connection,"SELECT * FROM login_details WHERE email='{$entered_email}'");
		$fetched_result = mysqli_fetch_array($result);

		//echo mysqli_fetch_array($result)[1]; // this echoes correctly - can use either number [1] or associative ['email']
		//echo $fetched_result['email'] . " " . $fetched_result['password'];
		//setcookie("email",$fetched_result['email']);
		
		// 3 possible scenarios for validation
		// (i) correct email and password
		// (ii) correct email, wrong password
		// (iii) wrong email, password is irrelevant
		// so first check if email exists
		if (mysqli_num_rows($result) == 0) { 
			// results are empty - email doesn't exist 
			// send back to login.html with message 'User doesn't exist
			//echo "User does not exist";

			echo '<script>';
			echo 'window.open("login.php", "_self")';
			echo '</script';
					
			$login_state = "User does not exist";

		} else {
			// user exists - now check if password is correct or not
			// $result is an array, we just want the corresponding password
			$password_from_DB = $fetched_result['password'];
			$email_from_DB = $fetched_result['email'];
						
			if ($entered_password == $fetched_result['password']) { // correct password
				
				setcookie("user", $fetched_result['real_name']); // write cookie
				$login_state = "";

				echo '<script>';
				echo 'window.open("index.html", "_self")'; // or better to redirect to collections.html? // redirect to index.html
				echo '</script';

				// instead of using PHP file(), echo JS window.open("https://www.youraddress.com","_self")
				//$url='index.html';
				// using file() function to get content
				//$lines_array=file($url);
				// turn array into one variable
				//$lines_string=implode('',$lines_array);
				//output, you can also save it locally on the server
				//echo $lines_string;
				
			} else {
				//echo "Wrong password - try again";
				//echo "<br>";
				//echo $password_from_DB;
				// redirect to login.html with message
				$login_state = "Wrong password - try again";
				
				echo '<script>';
				echo 'window.open("login.php", "_self")';
				echo '</script';
				
			}
		} 

		$_SESSION['login_state'] = $login_state;

		//4.  Release returned data and Close database connection
		mysqli_free_result($result);		
		mysqli_close($connection);
		
	?>

<html>
<body>
<!--
	<form action="login.php" method="post">
		<input type="hidden" name="input" value="<?php echo $login_state; ?>">
	<!-- <input type="submit" value="Edit"> -->
	</form> -->
</body>
</html>