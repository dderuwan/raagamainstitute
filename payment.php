<?php
session_start();
include ('./Databsase/connection.php');

if(!isset($_SESSION['id'])){
  header('./location:Student_Signin.php');
}

$studentID = $_SESSION['id'];
$total = $_SESSION['total'];

$SQL = "SELECT * FROM `student` WHERE `id` = '$studentID'";
$result = mysqli_query($connection ,$SQL);

$row = mysqli_fetch_assoc($result);

$firstname = $row['firstName'];
$lastname = $row['lastName'];
$email = $row['email'];
$contact = $row['phone'];
// $studentId = $_REQUEST["stuid"];
$pay = $total;
$reference = "1234567898";

$app_id = "QQWW118E56B6127B92426";
$hash_salt = "MHUY118E56B6127B92453";
$app_token = "85c350624f317c9d7d57b3681bdedff41266d4bf27324a53fb4f21b934cb3ae74d4680e3d52244bf.83SI118E56B6127B9246A";

$onepay_args = array(

  "amount" => $pay, //only upto 2 decimal points
  "currency" => "LKR", //LKR OR USD
  "app_id" => $app_id,
  "reference" => "{$reference}", //must have 10 or more digits , spaces are not allowed
  "customer_first_name" => $firstname, // spaces are not allowed
  "customer_last_name" => $lastname, // spaces are not allowed
  "customer_phone_number" => $contact, //must start with +94, spaces are not allowed
  "customer_email" => $email, // spaces are not allowed
  "transaction_redirect_url" => "https://exmple.lk/respones", // spaces are not allowed
  "additional_data" => "sample" //only support string, spaces are not allowed, this will return in response also
);

$data = json_encode($onepay_args, JSON_UNESCAPED_SLASHES);

$data_json = $data . "" . $hash_salt;

$hash_result = hash('sha256', $data_json);

$curl = curl_init();

$url = 'https://merchant-api-live-v2.onepay.lk/api/ipg/gateway/request-payment-link/?hash=';
$url .= $hash_result;

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    'Authorization:' . "" . $app_token,
    'Content-Type:application/json'
  ),
)
);

$response = curl_exec($curl);

curl_close($curl);

$result = json_decode($response, true);

if (isset($result['data']['gateway']['redirect_url'])) {

  $re_url = $result['data']['gateway']['redirect_url'];
  header('Location: ' . $re_url, true, $permanent ? 301 : 302);

  exit();

} else {

  echo $result['message'];

}
?>