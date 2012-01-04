<?php

class Model_User
{

	/**
	 * Pass in the $_POST variable as $info
	 * Create a salt and then md5 hash the password
	 **/
	
	public function add($info)
	{
		$salt = date('Y-m-d H:i:s');
		
		$md5Pwd = md5($info['password'].$salt);		
		
		$query = sprintf("INSERT INTO users (fname,lname,email,salt,password)
							VALUES ('%s', '%s', '%s', '%s', '%s')",
							mysql_real_escape_string($info['fname']),
							mysql_real_escape_string($info['lname']),
							mysql_real_escape_string($info['email']),
							mysql_real_escape_string($salt),
							mysql_real_escape_string($md5Pwd));
		
		mysql_query($query);
		
		return true;
	}
	
	/**
	 * Pass in the $_POST variable as $info
	 * Retrieves the user information in one go by using the unique key Email
	 **/
	
	public function get($info)
	{
		$query = sprintf("SELECT fname, lname, email, salt, password FROM users
							WHERE email = '%s'",
							mysql_real_escape_string($info['email']));
		
		$result = mysql_query($query);
		
		$row = mysql_fetch_object($result);
		
		return $row;
	}

	/**
	 * Pass in the $_POST variable as $info
	 * Retrieve the user's salt & then create a temporary password using a GUID.
	 **/
	
	public function resetPassword($info)
	{
		$user = $this->get($info);
		
		$info['new_password'] = uniqid();
		
		$md5Pwd = md5($info['new_password'].$user->salt);
		
		$query = sprintf("UPDATE users SET password = '%s' WHERE email = '%s'",
							mysql_real_escape_string($md5Pwd),
							mysql_real_escape_string($info['email']));
		
		if(mysql_query($query))
		{
			return $info['new_password'];
		} else
		{
			return false;
		}
	}
}

