<?php
// get database connection
include_once 'config.php';
// instantiate user object
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// set user property values
$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->mobile = $_POST['mobile'];
$user->password = $_POST['password'];

// create the user
if($user->signup()){
	$user_arr = array(
		"status" => true,
		"message" => "Successfully signup",
		"name" => $user->name,
		"mobile" => $user->mobile,
	);
} else {
	$user_arr = array(
		"status" => false,
		"message" => "User alredy exists!"
	);
}
print_r(json_encode($user_arr));

?>