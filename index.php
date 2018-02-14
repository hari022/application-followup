<?php

class Interview
{
//	public $title = 'Interview test';  static key word is missing after public keyword.
    public static $title = 'Interview test';

}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

//$person = $_POST['person']; This should be a $_GET method as form submits data with get method and it should be surrounded by if statement to avoid undeclared variable assignment notice.
$person = '';
if (isset($_GET)){
    $person = $_GET;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

<!--    --><?php
//    // Print 10 times
//    for ($i=10; $i<0; $i++) {  Here $i-- instead of $i++ and $i>0 instead of $i<0 would fulfill the condition for printing statement 10 times.
//        echo '<p>'+$lipsum+'</p>'; in PHP '.' is used for string concatenation instead of '+'.
//    }
//    ?>

	<?php
	// Print 10 times
	for ($i=10; $i>0; $i--) {
        echo '<p>'.$lipsum.'</p>';
	}
	?>

	<hr>

<!--    <form method="get" action="--><?//=$_SERVER['REQUEST_URI'];?><!--">-->
<!--        <p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>-->
<!--        <p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>-->
<!--        <p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>-->
<!--        <p><input type="submit" value="Submit" /></p>-->
<!--    </form>-->

<!--    Name attributes in the form should be as simple as possible so that it can not interfere with other parts of the code -->

	<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p><label for="firstName">First name</label> <input type="text" name="first_name" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="last_name" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="email" id="email"></p>
        <p><input  type="submit" value="Submit" /></p>
	</form>

<!--	--><?php //if ($person): ?>
<!--		<p><strong>Person</strong> --><?//= $person['first_name'];?><!--, --><?//=$person['last_name'];?><!--, --><?//=$person['email'];?><!--</p>-->
<!--	--><?php //endif; ?>
<!--    $_GET array contains form data so that it can be used to echo data instead of person variable which only contains value of submit input field.-->

    <?php if ($person): ?>
        <p><strong>Person</strong> <?php echo $_GET['first_name'];?>, <?php echo  $_GET['last_name'];?>, <?php echo $_GET['email'];?>></p>
    <?php endif; ?>

	<hr>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
<!--     $person->first_name  will throw following error: Trying to get property of non-object, because $person is array and it can be accessed with array['index'] syntax  -->
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?php echo $person['first_name'];?></td>
					<td><?php echo $person['last_name'];?></td>
					<td><?php echo $person['email'];?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>