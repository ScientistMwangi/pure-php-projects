<?php
set_time_limit(120);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

date_default_timezone_set('Africa/Nairobi');

require_once "lib/Rest.inc.php";

class Server extends Rest {
	private $queryType;
	private $fields;
	private $callback;

	function __construct($get, $post) {
		parent::__construct();
		$this->queryType = $get["query"];
		if (!empty($get["callback"]) && $get["callback"] != "") {
			$this->callback = $get["callback"];
		} else {
			$this->callback = "";
		}

		$this->fields = json_decode($post, true);
	}

	public function processRequest() {
		
		$func = $this->queryType;
		if (method_exists($this, $func)) {
			$this->$func();
		}
	}
	
	private function Aunthenticate($name,$pass){
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "banksystem";

		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		$sql = "SELECT user_id FROM users where name='$name'and password='$pass'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$user_id=$row["user_id"];
				
				
				return $user_id;
				
		}}
		else{
		
		//$handcodeduser="username";
		//$handcodedpass="password";
		return 0;
		
		//return $handcodeduser==$name && $handcodedpass==$pass;
		}
	}


	private function accountBalance() {
		
		

		/*
						Request Body     http://localhost/bankSystem/api/request/accountBalance
						{
							"api_username":"username",
							"api_password":"password",
							"api_account":"1",
							
			            }

		*/
		
		//get fields
		$fields = $this->fields;
		$api_username = $fields["api_username"];
		$api_password = $fields["api_password"];
		$api_account=$fields["api_account"];
		
		if($this->Aunthenticate($api_username,$api_password)==0){
			echo "fail";
			$this->response(json_encode(array("error"=>"unknown username or password","username"=>$api_username,"password"=>$api_password,"acount"=>$api_account)), 200, $this->callback);
			
		}
		else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "banksystem";
		$account_balance=0;
		$user_id=$this->Aunthenticate($api_username,$api_password);

		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="SELECT account_balance,accout_number FROM accounts where user_id=$user_id and accout_number=$api_account";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$account_number=$row["accout_number"];
				$account_balance=$row["account_balance"];
		

		
			
			
			echo "success";
			$this->response(json_encode(array("success"=>"you are logged in","user_id"=>$user_id,"Account Number"=>$account_number,"Account_Balance: "=>$account_balance)), 200, $this->callback);
		}}
		else{
			
			$this->response(json_encode(array("Results"=>"Unknown account","user_id"=>$user_id)), 200, $this->callback);
			
		}
		
		}
	}
			
}
error_reporting(0);
$server = new Server($_GET, file_get_contents("php://input"));
$server->processRequest();
?>