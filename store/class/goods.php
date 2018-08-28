<?php
	class goods
	{
		public $goodsid;
		public $goodsname;
		public $typeid;
		public $goodsdetail;
		public $imageurl;
		public $price;
		public $starttime;
		public $num;
		public $clicktimes;
		
		
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","store");
			//mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getgoodsinfo1($id){
			$sql="select * from goods where goodsid=".$id.";";
			//echo($sql);
			$result=$this->conn->query($sql);
			
			/*if($row=$result->fetch_row()){
				//echo($sql);
				$this->goodsid=id;
				$this->typeid=$row[1];
				$this->goodsname=$row[2];
				$this->goodsdetail=$row[3];
				$this->imageurl=$row[4];
				$this->price=$row[5];
				$this->starttime=$row[6];
				$this->num=$row[7];
				$this->clicktimes=$row[8];
			}else{
				$goodsid=0;
			}*/
			return $result;
		}
		
		function getgoodsinfo($id){
			$sql="select * from goods where goodsid='".$id."';";
			//echo($sql);
			$result=$this->conn->query($sql);
			
			if($row=$result->fetch_row()){
				//echo($sql);
				$this->goodsid=id;
				$this->typeid=$row[1];
				$this->goodsname=$row[2];
				$this->goodsdetail=$row[3];
				$this->imageurl=$row[4];
				$this->price=$row[5];
				$this->starttime=$row[6];
				$this->num=$row[7];
				$this->clicktimes=$row[8];
			}else{
				$goodsid=0;
			}
			//return $result;
		}
		
		function getgoodslist($cond){//返回指定查询条件的商品   $cond 表示 查询条件
			$sql="select * from goods".$cond." order by starttime desc;";
			//echo($sql);
			//echo($sql);
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function getgoodslist1($tid){//返回指定查询条件的商品   $cond 表示 查询条件
			$sql="select * from goods where typeid=".$tid;
			//echo($sql);
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function gettopnnewgoods($n){
			$sql="select * from goods where num>0 order by starttime desc limit 0,".$n.";";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function gettopnmaxclick($n){
			$sql="select * from goods where num=0 order by clicktimes desc limit 0,".$n.";";//这里有可能出错！
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function havegoodstype($tid){
			$sql="select * from goods where typeid=".$tid.";";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		
		function insert(){
			$sql="insert into goods(typeid,goodsname,goodsdetail,imageurl,price,starttime,num,clicktimes) values(".$this->typeid.",'".$this->goodsname."','".$this->  goodsdetail."','".$this->imageurl."',".$this->price.",'".$this->starttime."',".$this->num.",0);";
			//echo($sql);
			$this->conn->query($sql);                                                                                                                                       
		}
		
		function update($id){
			$sql="update goods set goodsname='".$this->goodsname."',typeid=".$this->typeid.",goodsdetail='".$this->goodsdetail."',price='".$this->price.",num='".$this->num."',clicktimes='".$this->clicktimes."' where goodsid=".$id.";";
			$this->conn->query($sql);
		}
		
		function add_clicktimes($id){
			$sql="update goods set clicktimes=clicktimes+1 where goodsid=".$id.";";
			$this->conn->query($sql);
		}
		
		
		
		function delete($id){
			$sql="delete from goods where goodsid in (".$id.");";
			$this->conn->query($sql);
		}
	}
?>

