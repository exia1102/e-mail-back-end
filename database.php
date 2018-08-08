<?php 

class database{

	private $pdo;
	
	private function getInstance(){
		if(!$this->pdo){
			$this->pdo = new PDO('mysql:host=localhost;dbname=email;charset=utf8mb4','root','root');
		}
			return $this->pdo;//checkself order dont need else{}
	}
	
	public function getAllRecipients(){
		$stmt=$this->getInstance()->query("SELECT * from recipients");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getRecipientById($bid){
		$stmt=$this->getInstance()->prepare("SELECT * from recipients where id=:bid");
		$stmt->execute(
			array(
				":bid"=>$bid,
			)
		);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function addRecipient($name,$email){
		$result=$stmt=$this->getInstance()->prepare("INSERT INTO recipients(name,Email) Values (:name,:email)");
		$stmt->execute(
			array(
				":name"=>$name,
				":email"=>$email,
			)
		);
		return $result;
	}


}

 ?>