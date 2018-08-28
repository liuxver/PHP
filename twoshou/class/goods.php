<?php
	class goods
	{
		public $goodsid;
		public $goodsname;
		public $typeid;
		public $saleorbuy;
		public $goodsdetail;
		public $imageurl;
		public $price;
		public $starttime;
		public $oldnew;
		public $invoice;
		public $repaired;
		public $carriage;
		public $paymode;
		public $delivermode;
		public $isover;
		public $ownerid;
		
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","twoshou");
			//mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getgoodsinfo($id){
			$sql="select * from goods where goodsid=".$id.";";
			$result=$this->conn->query($sql);
			
			if(($row=$result->fetch_row())){
				$this->goodsid=id;
				$this->typeid=$row[1];
				$this->saleorbuy=$row[2];
				$this->goodsname=$row[3];
				$this->goodsdetail=$row[4];
				$this->imageurl=$row[5];
				$this->price=$row[6];
				$this->starttime=$row[7];
				$this->oldnew=$row[8];
				$this->invoice=$row[9];
				$this->repaired=$row[10];
				$this->carriage=$row[11];
				$this->paymode=$row[12];
				$this->delivermode=$row[13];
				$this->isover=$row[14];
				$this->ownerid=$row[15];
				$this->clicktimes=$row[16];
			}else{
				$goodsid=0;
			}
		}
		
		function getgoodslist($cond){//返回指定查询条件的商品   $cond 表示 查询条件
			$sql="select * from goods ".$cond." order by starttime desc;";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function gettopnnewgoods($n){
			$sql="select * from goods where isover=0 order by starttime desc limit 0,".$n.";";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function gettopnmaxclick($n){
			$sql="select * from goods where isover=0 order by clicktimes desc limit 0,".$n.";";//这里有可能出错！
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
			$sql="insert into goods(typeid,saleorbuy,goodsname,goodsdetail,imageurl,price,starttime,oldnew,invoice,repaired,carriage,paymode,delivermode,isover,ownerid,clicktimes) values(".$this->typeid.",".$this->saleorbuy.",'".$this->goodsname."','".$this->  goodsdetail."','".$this->imageurl."','".$this->price."','".$this->starttime."','".$this->oldnew."','".$this->invoice."','".$this->repaired."','".$this->carriage."','".$this->paymode."','".$this->delivermode."',0,'".$this->ownerid."',0);";
			$this->conn->query($sql);                                                                                                                                       
		}
		
		function update($id){
			$sql="update goods set goodsname='".$this->goodsname."',typeid=".$this->typeid.",goodsdetail='".$this->goodsdetail."',price='".$this->price."',oldnew=.'".$this->oldnew."',invoice='".$this->invoice."',repaired='".$this->repaired."',carriage='".$this->carriage."',paymode='".$this->paymode."',delivermode='".$this->delivermode."' where goodsid=".$id.";";
			$this->conn->query($sql);
		}
		
		function add_clicktimes($id){
			$sql="update goods set clicktimes=clicktimes+1 where goodsid=".$id.";";
			$this->conn->query($sql);
		}
		
		function setover($id){
			$sql="update goods set isover=1 where goodsid=".$id.";";
			$this->conn->query($sql);
		}
		
		function delete($id){
			$sql="delete from goods where goodsid in (".$id.");";
			$this->conn->query($sql);
		}
	}
?>









