<?php
	class user{
		public $username;
		static private $online_count=0;
		
		function __construct($name=""){
			$this->username=$name;
			self::$online_count++;
		}
		
		function __destruct(){
			self::$online_count--;
		}
		
		static function getcount(){
			return self::$online_count;
		}
	}
	
	$myuser1=new user("liuxv");
	$myuser2=new user("limi");
	echo(user::getcount());
?>