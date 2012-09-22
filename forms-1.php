<?php
/**
*forma-1.php
*/
ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

$fields = array('name'=>'', 'email'=>'@domain.com', 'phone'=>'', 'message'=>'', 'check' => '');
$errors = array();
$is_success = false;

if( isset($_POST['submit']) )
{
$fields['name'] = isset($_POST['name']) ? strip_tags(stripslashes(trim($_POST['name'])) : $fields['name'];
$fields['email'] = isset($_POST['email']) ? strip_tags(stripslashes(trim($_POST['email'])) : $fields['email'];
$fields['phone'] = isset($_POST['phone']) ? strip_tags(stripslashes(trim($_POST['phone'])) : $fields['phone'];
$fields['message'] = isset($_POST['message']) ? strip_tags(stripslashes(trim($_POST['message'])) : $fields['message'];

if( '' == $fields['name'] ) {
	$errors[] = 'The name field is required.';
}
if( '' == $fields['email'] ) {
	$errors[] = 'The email field is required.';
}
if( empty($fields['message']) ) {
	$errors[] = 'The message field is required.';
}
if( !is_numeric($fields['phone'])){
	$errors[] = 'The phone number is must be numeric.';
}
	
if( empty($errors) ) {
//Good! validation seems to be OK!
//Time to perform some sort of success routine....mail ? save to be? etc.
$is_success = true;
}
}

?>

<html>
<head>
<title>Forms-1 Example</title>
</head>
<body>

<div style="background: #eee; padding:10px;">
<?php if( $is_success ) { ?>
<p>Congrats! you have successfully submitted this form with no validation errors.</p>
<?php } else {
if( !empty($errors) ) {
	foreach( $errors as $error ) { ?>
	<p><?php print $error; ?></em></p>
	<?php }

	
	}
}	
?>
</div>
<form id="form-1"  action="form-1.php" method="post">
<p><label for="name">Name:</label><input type="text" name="name" id="name" value="<?php print $fields['name']; ?>" maxlength="255" size="40" /></p>
<p><label for="email">Email:</label><input type="text" name="email" id="email" value="<?php print $fields['email']; ?>" maxlength="255" size="40" /></p>

<p><label for="message">Message:</label><textarea name="message" id="message"  cols="10" rows="10" ><?php print $fields['message']; ?></textarea></p>
<p><input type="submit" name="submit" value="submit" /> </p>
</form>
</body>
</html>