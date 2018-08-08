<?php 

class recipient{

	private $db_conn;
	function __construct($db_conn){

		$this->db_conn =$db_conn;
	}

 // get all recipients

	public function defaultMethod(){
		$result=$this->db_conn->getAllRecipients();
		echo json_encode($result);
	}

// add a recipient



// Need Post Data


// dataformat:{
// 	name:zhangsan,
// 	email:test@test.com
// }


	public function addMethod(){
		if (array_key_exists('name', $_POST)&&array_key_exists('email', $_POST)) {
			# code...
			$result= $this->db_conn->addRecipient($_POST['name'],$_POST['email']);
			echo json_encode(
				array(
					'code'=>200,
					'message'=>'recipient save successfully',
				));
			exit();
		}
			echo json_encode(
				array(
					"code"=>400,
					"message"=>'your data format is wrong',
				)
			);
		}


}


 ?>