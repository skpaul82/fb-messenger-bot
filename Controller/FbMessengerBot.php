<?php

/**
 *  Facebook simple messenger bot
 *  @author skpaul82 <hello@skpaul.me> 
 *  
 */

// include helper
require_once('Helper/helper.php');

/**
* Facebook Messenger Bot
*/
class FbMessengerBot 
{
	private $accessToken;
	private $verifyToken;
	private $apiUrl;
	
	function __construct()
	{
		$this->accessToken = "EAAC32HBuIOIBAM274momBhKrwHNBPAu4SXpU3TlBtbAqawXpZCpMkDm09ST01HtZARnjg0Jk7hFRiukC101ntQ8dIyqo1LwUpMFXXWTnt0OrAuZCwsbrADZAEzxS8UNH2Ia6dsM4VhNHaMdmkkqFtHkNTx1IpQ7xtJwgOPpqkgZDZD";
		$this->verifyToken = "MyVar1fyT0ken";
		// $this->apiUr1 = "https://graph.facebook.com/v3.6/messages?access_token=$this->accessToken";
		$this->apiUr1 = "https://graph.facebook.com/v2.6/me/messages?access_token=$this->accessToken";
		$this->page_access_key = "";
		$this->page_access_key = "";
		
	}

	public function index($request)
	{
		// dd($request, 0);
		
		if(isset($request['hub_challenge'])){
			$challenge = $request['hub_challenge'];
			$token = $request['hub_verify_token'];
		}
		dd($challenge = $request['hub_challenge']);
		if ($token == $this->verifyToken) {
			dd($challenge, 0);
		}

		dd($request, 0);


		// $input = json_decode(file_get_contents('php://input'), true);
		// $input = file_get_contents('php://input');
		$senderId = $request['entry'][0]['messaging'][0]['sender']['id'];
		// dd($input, 0);
		$message = $request['entry'][0]['messaging'][0]['message']['text'];
		
		$senderMessage = $request["entry"][0]["messaging"][0]['message'];

		echo $senderId ." and ". $message;


		
		// dd($jsonData, 0);

		if(!empty($senderMessage))
			if( isset($senderMessage['text']) )
				$this->sendTextMessage($senderId, 'Hello!');

	}


	public function sendTextMessage($recipientId, $messageText)
	{
		$messageData = [
            "recipient" => [
                "id" => $recipientId,
            ],
            "message"   => [
                "text" => $messageText,
            ],
        ];

        $this->callByCurl($messageData, $this->apiUrl);

	}


	/**
	 * [sendRequest description]
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public function sendRequest($params)
	{
		# code...
	}


	/**
	 * [getResponse description]
	 * @param  [type] $response [description]
	 * @return [type]           [description]
	 */
	public function getResponse($response)
	{
		# code...
	}

	
	/**
	 * [callByCurl description]
	 * @param  [type] $params [description]
	 * @param  [type] $url    [description]
	 * @return [type]         [description]
	 */
	public function callByCurl($params, $url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($ch);

		return $response;
	}
}