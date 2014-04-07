<!DOCTYPE html>

<?php 
if(isset($_GET['submit']))
{ 
	$con = mysql_connect("127.0.0.1","root","");
	if (!$con)
	{
	  die('Could not connect: ' . mysql_error());
    }
	 
	mysql_select_db("stmargaretmarycatholicchurch", $con);
	 
	$sql="INSERT INTO family (firstname, lastname, headofhousehold)
	VALUES
	('$_GET[hohFirst]','$_GET[hohLast]',1)";
	 
	if (!mysql_query($sql,$con))
	{
	  die('Error: ' . mysql_error());
	}
	  
	  	$sql="INSERT INTO family (firstname, lastname, headofhousehold)
	VALUES
	('$_POST[parentFirst]','$_POST[parentLast]', 0)";
	 
	if (!mysql_query($sql,$con))
	{
	  die('Error: ' . mysql_error());
	}
	
	
	 
	mysql_close($con);
} 

?>

<script>
function checkForm()
{
	var formCorrect= true;
	
	if (document.getElementById('hohFirst').value == "" || document.getElementById('hohLast').value == "")
	{
		formCorrect= false;
	}
	
	if (document.getElementById('childFirst').value == "" || document.getElementById('childLast').value == "")
	{
		formCorrect= false;
	}
	
	// since it's a radio, and can only return true when both are unchecked.
	if (document.getElementById('childIDY').checked && document.getElementById('childIDN').checked)
	{
		formCorrect= false;
	}
	
	// since it's a radio, and can only return true when both are unchecked.
	if (document.getElementById('boy').checked && document.getElementById('girl').checked && document.getElementById('unknown').checked)
	{
		formCorrect= false;
	}
	
	if (document.getElementById('age').value == "")
	{
		formCorrect= false;
	}
	
	// since it's a radio, and can only return true when both are unchecked.
	if (document.getElementById('anotherY').checked && document.getElementById('anotherN').checked)
	{
		formCorrect= false;
	}
	
	// TODO review
	
	if (formCorrect == false)
	{
		document.getElementById('formCorrect').style.display= 'inline';
	}
	else
	{
		document.getElementById("clothes").submit();
	}
}
</script>

<html>
	<body>
	
	<form id="clothes" action="clothesform.php" method="get">
 
	<div id= "formCorrect" style="display: none;">
	Please ensure that you've filled out all required sections.<br>
	</div>
	
	<h2>Head of Household Name*</h2>
	<input type="text" id="hohFirst" name="hohFirst"><input type="text" id="hohLast" name="hohLast"><br>
	First name Last Name<br>
	
	<h2>Parent's Name Shopping</h2>
	<input type="text" name="parentFirst"><input type="text" name="parentLast"><br>
	First name Last Name<br>
	
	<h2>Child's Name*</h2>
	<input type="text" id="childFirst" name="childFirst"><input type="text" id="childLast" name="childLast"><br>
	First name Last Name<br>
	
	<h2>Child's ID*</h2>
	<input type="radio" id="childIDY" name="childID" value="true">Yes<br>
	<input type="radio" id="childIDN" name="childID" value="false">No<br>
	must see Anne or Maryann if answer is 'no'<br>
	
	<h2>Sex of Child*</h2>
	<input type="radio" id= "boy" name="sex" value="male">Boy<br>
	<input type="radio" id="girl" name="sex" value="female">Girl<br>
	<input type="radio" id="unknown" name="sex" value="unknown">Unknown<br>
	
	<h2>Age*</h2>
	<input type="number" id="age" name="age" min="0" max="12"><br>
	
	<h2>Is there information for another child to be entered?*</h2>
	<input type="radio" name="another" id= "anotherY" value="true">Yes<br>
	<input type="radio" name="another" id= "anotherN" value="false">No<br>
	
	<h2>Notes</h2>
	<input type="text" name="notes"><br>
	use this space for any special needs or information to be noted<br>
	
	<h2>Have you reviewed this form with client?*</h2>
	<input type="checkbox" name="review" id="reviewA" value="age">age of child<br>
	<input type="checkbox" name="review" id="reviewI" value="infant">infant outfit OR<br>
	<input type="checkbox" name="review" id="reviewJ" value="jeans">jeans AND<br>
	<input type="checkbox" name="review" id="reviewS" value="shirt">shirt<br>
	<input type="checkbox" name="review" id="reviewK" value="socks">socks<br>
	<input type="checkbox" name="review" id="reviewU" value="underwear">underwear OR<br>
	<input type="checkbox" name="review" id="reviewD" value="diapers">diapers<br>
	Please check the applicable boxes as you review them with the client. When compiled, check submit<br>
	
	<h2>this form was completed by</h2>
	<input type="text" name="completedBy"><br>
	initials<br><br>

	<input type="button" name="submitBtn" value="Submit" onClick="checkForm()"> 
	</form> 
	
	</body>
</html>