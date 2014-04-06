<!DOCTYPE HTML>
<?php 
if(isset($_GET['submit']))
{ 
	$con = mysql_connect("127.0.0.1","root","");
	if (!$con)
	{
	  die('Could not connect: ' . mysql_error());
    }
	 
	 
	mysql_close($con);
} 

?>

<script>
function changeHouseholdType()
{
	// single house
	if (document.getElementById('householdType').value == "single")
	{
		document.getElementById('otherFamilies').style.display= "none"; 
	}
	
	// combined house
	else if (document.getElementById('householdType').value == "combined")
	{
		document.getElementById('otherFamilies').style.display= "inline"; 
	}
}

function changeLang()
{
	// not english or spanish
	if (document.getElementById('spokenLang').value == "other")
	{
		document.getElementById('otherLang').style.display= "inline"; 
	}
	else
	{
		document.getElementById('otherLang').style.display= "none"; 
	}
}
</script>

<html> 
<body>
<p>Residence Verification *</p><!--<br>-->
<form action="RegistrationForm.php" method="get">
<input type="radio" name="resVer" value="true">Yes<br>
<input type="radio" name="resVer" value="false">No<br>
See Anne or Maryann if "no" and make notation*<br>
<input type="text" name="resVerNoNotes"><br>
<br>
Type of household *<br><select id="householdType" onChange="changeHouseholdType()">
<option value=""></option>
<option value="single">Single Household</option>
<option value="combined">Combined Household</option>
</select><br><br>

Head of Household Name*<br>
<input type="text" name="hohFirst"><input type="text" name="hohLast"><br>
First name Last Name<br><br>

<div id= "otherFamilies" style="display: none;">
<input type="text" name="secondFamily"><br>
Second Family Name<br><br>

<input type="text" name="thirdFamily"><br>
Third Family Name<br><br>

<input type="text" name="fourthFamily"><br>
Fourth Family Name<br><br>

<input type="text" name="fifthFamily"><br>
Fifth Family Name<br><br>
</div>

Address: <input type="text" name="address1"><br>
Address 2: <input type="text" name="address2"><br>
City: <input type="text" name="city"><p></p>State: <input type="text" name="state">
Zip Code: <input type="text" name="zipcode"><br>

E-mail: <input type="text" name="email"><br>
Primary Phone: <input type="text" name="primaryphone"><br>

<input type="radio" name="phoneTypePrimary" value="home1">Home<br>
<input type="radio" name="phoneTypePrimary" value="cell1">Cell<br>
<input type="radio" name="phoneTypePrimary" value="work1">Work<br>
<input type="radio" name="phoneTypePrimary" value="other1">Other:<br>
<input type="text" name="othertext1"><br>

Secondary Phone: <input type="text" name="secondaryphone"><br>

<input type="radio" name="phoneTypeSecondary" value="home2">Home<br>
<input type="radio" name="phoneTypeSecondary" value="cell2">Cell<br>
<input type="radio" name="phoneTypeSecondary" value="work2">Work<br>
<input type="radio" name="phoneTypeSecondary" value="other2">Other:<br>
<input type="text" name="othertext1"><br>

Number of Family Members<input type="number" name="othertext1"><br>
Language spoken *<br><select id="spokenLang" onChange="changeLang()">
<option value="eng">English</option>
<option value="esp">Spanish</option>
<option value="other">Other</option>
</select><br><br>

<div id= "otherLang" style="display: none;">
<input type="text" id="otherLang"><br>
Other Language*<br><br> </div>

Delivery<br><input type="radio" name="delivery" value="true">Yes<br>
<input type="radio" name="delivery" value="false">No<br>
<p>See Anne of Maryann if yes</p>

Christmas Store selection*<br>
<input type="radio" name="storeSelection" value="food" onClick= "document.getElementById('toysInput').style.display= 'none'">Food<br>
<input type="radio" name="storeSelection" id="storeSelectionT" value="toys" onClick= "document.getElementById('toysInput').style.display= 'inline'">Clothing & Toys<br>
<p>(Clothing & Toys is for children 12 & under)</p>

<div id= "toysInput" style="display: none;">
<input type="number" id="numKids"><br>
Number of Children 12 & under*<br><br> </div>

How did you learn about the Stores?* <br><select name="Learn">
<option value="previous">Previous Customer</option>
<option value="flyer">Flyer</option>
<option value="school">School</option>
<option value="word">Word of Mouth</option>
</select><br>

<b>Can a member of the St. Margaret Mary Church and Community Organization call you after the holidays to talk more about the needs and concerns of you and your family?*</b>
<br><input type="radio" name="contact" value="true">Yes<br>
<input type="radio" name="contact" value="false">No<br>
<p>(Clothing & Toys is for children 12 & under)</p>

Notes: <input type="text" name="notes"><br>
This Form was completed by* <input type="text" name="completed"><br>

<input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>