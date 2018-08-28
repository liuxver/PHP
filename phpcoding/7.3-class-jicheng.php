<?php
	date_default_timezone_set("Asia/Chongqing");
    class user{
    	public $username;
    	function __construct($name=""){
    		$this->username=$name;
    	}
    	public function displayusername(){
    		echo($this->username);
    	}
    }
    
    class userlogin extends user{
    	private $lastlogintime;
    	
    	function __construct($name=""){
    		$this->username=$name;
    		$curtime=getdate();
    		$this->lastlogintime=$curtime['year']."-".$curtime['mon']."-".$curtime['mday']."  ".$curtime['hours'].":".$curtime['minutes'].":".$curtime['seconds']."<br>";
    	}
    	
    	function displaylogintime(){
    		echo("登录时间为：".$this->lastlogintime);
    	}
    }
    
    $myuser1=new userlogin("liuxv");
    $myuser2=new userlogin('limi');
    $myuser1->displayusername();
    $myuser1->displaylogintime();
    $myuser2->displayusername();
    $myuser2->displaylogintime();
    
    
    
    
    
    
    
    //抽象类
    abstract class shape{
    	var $color;
    	abstract function draw();
    }
    
    class circle extends shape{
    	public $x,$y;
    	function draw(){
    		echo("circle");
    	}
    }
?>