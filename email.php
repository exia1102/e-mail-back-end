<?php 



class email{

	private $db_conn;
	function __construct($db_conn){

		$this->db_conn =$db_conn;
	}
	public function sendMethod($id){
		$recipient = $this->db_conn->getRecipientById($id);
		$email = $recipient['Email'];
		$name=$recipient['name'];
		try {
		    $mandrill = new Mandrill('aSznWSiyxJ8Kv-JemSNvgQ');
		    $message = array(
		        'html' => '<p>hahahaha</p>',
		        'text' => 'Example text content',
		        'subject' => 'example subject',
		        'from_email' => 'admin@sunnyfuture.ca',
		        'from_name' => 'Example name',
		        'to' => array(
		            array(
		                'email' => $email,
		                'name' => $name,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => 'admin@sunnyfuture.ca'),
		        'important' => false,
		        'track_opens' => null,
		        'track_clicks' => null,
		        
		    );
		    $async = false;
		    $ip_pool = 'Main Pool';
		    $result = $mandrill->messages->send($message, $async, $ip_pool);
		    // print_r($result);
		    /*
		    Array
		    (
		        [0] => Array
		            (
		                [email] => recipient.email@example.com
		                [status] => sent
		                [reject_reason] => hard-bounce
		                [_id] => abc123abc123abc123abc123abc123
		            )
		    
		    )
		    */
		} catch(Mandrill_Error $e) {
		    // Mandrill errors are thrown as exceptions
		    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		    throw $e;
		}
	}
}


 ?>