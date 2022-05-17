<?php 
#Class for registration and manipulating input form values
class User
{
	public $id;
	public $first_name;
	public $last_name;
	public $username;
	public $email;
	public $password;
	public $password1;

	public function __construct($first_name, $last_name, $username, $email, $password, $password1)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->password1 = $password1;
	}

	public static function test_input($input) : string
	{
		$input = trim($input);
		$input = stripcslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}

	public function validate($first_name, $last_name, $username, $email, $password, $password1) : bool
	{
		$errors = array();
		//Validation for first_name
		if(!preg_match("/^[a-zA-Z\pL]+$/u", $first_name))
		{
			$errors[]='Only letters are allowed.';
		}
		else 
		{
			$first_name = $this->test_input($first_name);
		}
		//Validating for last name
		if(!preg_match("/^[a-zA-Z\pL]+$/u",$last_name)) 
		{
            $errors[] = "Only letters are allowed for last name. Please fix it!";
      	}
		else 
		{
			$last_name = $this->test_input($last_name);
        }
		
		//Validation for username
		if(!preg_match("/^[a-zA-Z0-9_\pL]+$/u",$username)) 
		{
            $errors[]  = "Only letters, numbers and underscore are allowed!";
        }
		else 
		{
            $username = $this->test_input($username);
        }

		//Validation for email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{			
          	$errors[] ="Format of your email address is wrong! Please try again!";
      	}
		else 
		{
          	$email = $this->test_input($email);
      	}
	
		//Validation for password
        if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $password)) 		 {
           //Checking if passwords provided match
			if($password != $password1) 
			{
       	    	$errors[] = 'Passwords you provided do not match. Please fix that!';
            }
            $errors[] = "Your password must include at least one uppercase, one lowercase let    ter and a digit!";
            echo "<a href=register.php></a>";
        }
		else 
		{
           $password = $this->test_input($password);
           $password1 = $this->test_input($password1);
        }

		if(empty($errors))
		{
			return true;
		}
		else 
		{
			foreach($errors as $msg)
			{
				echo "<p> $msg </p>";
			}
		}

			
	return false;
	}


}

?>
