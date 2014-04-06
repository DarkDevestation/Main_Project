<!DOCTYPE html>
<html>
	<body>
	
	<h2>Head of Household Name*</h2>
	<input type="text" name="hohFirst"><input type="text" name="hohLast"><br>
	First name Last Name<br>
	
	<h2>Parent's Name Shopping</h2>
	<input type="text" name="parentFirst"><input type="text" name="parentLast"><br>
	First name Last Name<br>
	
	<h2>Child's ID</h2>
	<form action="clothesInsert.php" method="getID">
		<input type="radio" name="childID" value="true">Yes<br>
		<input type="radio" name="childID" value="false">No<br>
	</form>
	must see Anne or Maryann if answer is 'no'<br>
	
	<h2>Sex of Child*</h2>
	<form action="clothesInsert.php" method="getSex">
		<input type="radio" name="sex" value="male">Boy<br>
		<input type="radio" name="sex" value="female">Girl<br>
		<input type="radio" name="sex" value="unknown">Unknown<br>
	</form><br>
	
	<h2>Age*</h2>
	<input type="text" name="age"><br>
	
	<h2>Is there information for another child to be entered?*</h2>
	<form action="clothesInsert.php" method="getAnother">
		<input type="radio" name="another" value="true">Yes<br>
		<input type="radio" name="another" value="false">No<br>
	</form><br>
	
	<h2>Notes</h2>
	<input type="text" name="notes"><br>
	use this space for any special needs or information to be noted<br>
	
	<h2>Have you reviewed this form with client?*</h2>
	<form action="clothesInsert.php" method="getNeeds">
	<input type="checkbox" name="review" value="age">age of child<br>
	<input type="checkbox" name="review" value="infant">infant outfit OR<br>
	<input type="checkbox" name="review" value="jeans">jeans AND<br>
	<input type="checkbox" name="review" value="shirt">shirt<br>
	<input type="checkbox" name="review" value="socks">socks<br>
	<input type="checkbox" name="review" value="underwear">underwear OR<br>
	<input type="checkbox" name="review" value="diapers">diapers<br>
	</form>
	Please check the applicable boxes as you review them with the client. When compiled, check submit<br>
	
	<h2>this form was completed by</h2>
	<input type="text" name="completedBy"><br>
	initials<br><br>
	
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post"> 
	<input type="submit" name="submit" value="Click Me"> 
	</form> 
	
	</body>
</html>