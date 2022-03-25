<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST ENVOI MAIL</title>
    <link rel="stylesheet" href="styles.css">
    <script src="code.js"></script>
</head>
<body>
    test
</body>
</html>
<?php
ini_set("allow_url_fopen",true);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('4a5e1e0bdf8521ca051010ab5119816c','00ecb0a3b6cbdca2877171f5f56caf4d',true,['version' => 'v3.1']);
  
  $input = file_get_contents('php://input');
  $_POST = json_decode($input, true);

  $email = $_POST['mail'];
  $message = $_POST['message'];
  error_log($message);
  error_log($email);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "loic.lavernette@gmail.com",
          'Name' => "Loic"
        ],
        'To' => [
          [
            'Email' => $email,
            'Name' => "Loic"
          ]
        ],
        'Subject' => "Greetings from Mailjet.",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>$message</h3><br>$email",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
?>
