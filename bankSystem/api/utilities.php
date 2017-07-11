<?php

/**
 * @author Nicholas N. Chege
 * @copyright 2015
 */
require_once "lib/Database.php";
require_once "lib/Rest.inc.php";
class Utilities {
	private $rest;
	private static $instance;
	function __construct() {
		$this->rest = new Rest();

	}
	private function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	private function getRest() {
		return $this->rest;
	}
	public static function logMessage($msg) {
		$date = date('Y-m-d\TH:i:sP');
		file_put_contents("log.txt", $date . '   :  ' . $msg . "\r\n", FILE_APPEND);
	}
	public static function getCountryDetails($country_name) {
		$con = Database::getInstance()->getConnection();
		$stmt = $con->prepare("SELECT * FROM countries WHERE country_name like ? LIMIT 1");
		$stmt->bindParam(1, $country_name);
		if ($stmt->execute()) {
			if ($stmt->rowCount() == 1) {
				$result = $stmt->fetch(PDO::FETCH_OBJ);
				$response = array("status_code" => "0000", "country_name" => $result->country_name, "country_code" => strtoupper($result->country_code),
					"dailing_code" => $result->dailing_code, "currency_code" => $result->currency_code, "active" => $result->active);
				//self::getInstance()->getRest()->response(json_encode($response),200);
				return json_encode($response);
			} else {
				$response = array("status_code" => "1000", "message" => "Country not found");
				//self::getInstance()->getRest()->response(json_encode($response),200);
				return json_encode($response);
			}
		} else {
			$error = $stmt->errorInfo();
			$response = array("status_code" => "1034", "message" => "" . $error[2]);
			//self::getInstance()->getRest()->response(json_encode($response),200);
			return json_encode($response);
		}
	}
	public static function getForexRates($country_code) {
		$con = Database::getInstance()->getConnection();
		$query = "CALL GET_EXCHANGE_RATE(:country_code,@status)";
		$stmt = $con->prepare($query);
		$stmt->bindParam(":country_code", $country_code);
		if ($stmt->execute()) {
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			$stmt->closeCursor();
			$status = $con->query("SELECT @status as status")->fetch(PDO::FETCH_OBJ);
			if ($status->status == "0000") {
				$response = array("status_code" => "0000", "impala_rate" => $result->exchange_rate,
					"kcb_rate" => $result->kcb_rate, "cbk_rate" => $result->cbk_rate);
				//self::getInstance()->getRest()->response(json_encode($response),200);
				return json_encode($response);
			} else {
				$response = array("status_code" => "0059", "message" => "Forex for that country is not set");
				//self::getInstance()->getRest()->response(json_encode($response),200);
				return json_encode($response);
			}
		} else {
			$error = $stmt->errorInfo();
			$response = array("status_code" => $stmt->errorCode(), "message" => "Error inserting to the database." . $error[2]);
			//self::getInstance()->getRest()->response(json_encode($response),200);
			return json_encode($response);
		}
	}
	public function confirmPin($userId, $pin) {
		$con = Database::getInstance()->getConnection();
		$query = "SELECT * FROM users WHERE user_id = :userId AND pin = :pin";
		$stmt = $con->prepare($query);
		$stmt->bindParam(":userId", $userId);
		$stmt->bindParam(":pin", sha1($pin));
		if ($stmt->execute()) {
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			if ($stmt->rowCount() == 1) {
				$response = array("status_code" => "0000", "message" => "Pin is correct");
				return json_encode($response);
			} else {
				$response = array("status_code" => "0250", "message" => "Pin is correct");
				return json_encode($response);
			}
		} else {
			$error = $stmt->errorInfo();
			$response = array("status_code" => $stmt->errorCode(), "message" => "Error inserting to the database." . $error[2]);
			//self::getInstance()->getRest()->response(json_encode($response),200);
			return json_encode($response);
		}
	}
}
//echo Utilities::getCountryDetails("kenya");
//echo "<hr>";
//echo Utilities::getForexRates("254");
?>