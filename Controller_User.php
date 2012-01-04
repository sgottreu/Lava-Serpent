<?php


class Controller_User
{
	/** $this->data is the data sent to the view
	 * $info is the $_POST info passed into the controller
	 * $view is the name of the view to be rendered on completion
	 * */
	
	protected $view;
	private $info = array();
	private $data = array();
	
	/**
	 * Pass in the view
	 * Pass in the $_POST variable as $info
	 * 
	 **/
	
	public function __construct($_POST, $view = '')
	{
		$this->_view = $view;
		$this->info = $_POST;
	}

	/**
	  * Form for the user to register
	 **/
	
	public function registration()
	{
		$view = new View($this->_view);
		$view->render($this->data);
	}
	
	/**
	  Hand off that information to the Model
	 * Let the user know if their registration was successful
	 **/
	
	public function register()
	{
		$user = new Model_User();
		
		$view = new View($this->_view);
		
		if($user->add($this->info))
		{
			$this->data['success'] = 'You registration was successful.';
		}
		else{
			$this->data['success'] = 'You registration was not successful. Please try again in a few minutes';
		}
		
		$view->render($this->data);
	}
	
		/**
	  Hand off that information to the Model
	 * Let the user know if their registration was successful
	 **/
	
	public function logininfo()
	{
		$view = new View($this->_view);
		$view->render($this->data);
	}
	
	/**
	 * Pull the users information.
	 * Check their password and email to verify they match up.
	 **/
	
	public function login()
	{
		$user = new Model_User();
		
		$u = $user->get($this->info);
		
		$md5Pwd = md5($this->info['password'].$u->salt);
		
		$view = new View($this->_view);
		
		if($md5Pwd == $u->password && $this->info['email'] == $u->email)
		{
			$this->data['success'] = "Welcome {$u->fname} {$u->lname}";
		}
		else{
			$this->data['success'] = 'The password and email do not match';
		}
		
		$view->render($this->data);
	}
	
	public function forgotPassword()
	{
		$view = new View($this->_view);
		$view->render($this->data);
	}
	
	/**
	 * Create a temp password with the model and then email the user
	 **/
	
	public function retrievePassword()
	{
		$user = new Model_User();
		
		$this->info['new_password'] = $user->resetPassword($this->info);
				
		$view = new View($this->_view);
		
		if($this->sendTempPassword($this->info))
		{
			$this->data['success'] = "Your password has been reset.";
		}
		else{
			$this->data['success'] = 'An error occurred. Please try resetting your password again.';
		}
		
		$view->render($this->data);
	}
	
	/**
	 * Pass in $info with the new password and the email address
	 * Send the new temp password to the user
	 **/
	
	public function sendTempPassword($info)
	{
		$msg = "We have reset your password.\nYour new password is:\n".$info['new_password'];
		
		if(@mail($info['email'], 'Password Reset', $msg))
		{
			return true;
		} else {
			return false;
		}
	}
	
}

