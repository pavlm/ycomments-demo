<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * @var User
	 */
	public $u;
	
	/**
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$this->u = $u = User::model()->findByAttributes(array('username' => $this->username, 'password' => $this->password));
		
		if(!$u)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->u->id;
	}
	
}