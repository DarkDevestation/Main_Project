<!--    Brandon Forster, Patrick Delva
        Group 4: Thanksgiving & Christmas Stores
        COP 4710 
-->

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
	
	if (document.getElementById('age').value == "" || document.getElementById('age').value > "12" || document.getElementById('age').value < "0")
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
	<input type="radio" id="childIDY" name="childID" onClick= "document.getElementById('childIDNo').style.display= 'none'">Yes<br>
	<input type="radio" id="childIDN" name="childID" onClick= "document.getElementById('childIDNo').style.display= 'inline'">No<br>
	
	<div id= "childIDNo" style="display: none;">
	See Anne or Maryann if "no" and make notation*<br>
	<input type="text" name="childIDNoNotes"><br>
	<br></div>
	
	<h2>Sex of Child*</h2>
	<input type="radio" id="girl" name="sex" value="female" onClick= "document.getElementById('girlType').style.display= 'inline';
	 document.getElementById('boyType').style.display= 'none'">Girl<br>
	 
	<input type="radio" id= "boy" name="sex" value="male" onClick= "document.getElementById('boyType').style.display= 'inline';
	 document.getElementById('girlType').style.display= 'none'">Boy<br>
	<input type="radio" id="unknown" name="sex" value="unknown">Unknown<br><br>
	
	<div id= "girlType" style="display: none;">
		<input type="radio" id="girl" name="girlOutfitType" value="baby" onClick= "document.getElementById('infantGirlType').style.display= 'inline';
		 document.getElementById('kidGirlType').style.display= 'none'">Girl's Infant Outfit<br>
		
		<input type="radio" id= "girl" name="girlOutfitType" value="kid" onClick= "document.getElementById('kidGirlType').style.display= 'inline';
		 document.getElementById('infantGirlType').style.display= 'none'">Girl's Jeans and Shirt<br><br>
		
		<div id= "infantGirlType" style="display: none;">
			<input type="radio" id="standardInfantGirl" name="infantGirlType" value="baby" onClick= "document.getElementById('infantGirlSize').style.display= 'inline';
			 document.getElementById('infantGirlSpecial').style.display= 'none'">Girl's Infant Outfit<br>
			<input type="radio" id= "specialInfantGirl" name="infantGirlType" value="kid" onClick= "document.getElementById('infantGirlSpecial').style.display= 'inline';
			 document.getElementById('infantGirlSize').style.display= 'none'">Special Request Infant Outfit<br><br>
			
			<div id= "infantGirlSize" style="display: none;">
				<select id="infantGirlSizeSelect" onChange="infantGirlSize()" name= "infantGirlSize">
				<option value="A01">A01- Girl's Newborn Outfit</option>
				<option value="A02">A02- Girl's Infant Outfit, 3 Months</option>
				<option value="A03">A03- Girl's Infant Outfit, 6 Months</option>
				<option value="A04">A04- Girl's Infant Outfit, 9 Months</option>
				<option value="A05">A05- Girl's Infant Outfit, 12 Months</option>
				<option value="A06">A06- Girl's Infant Outfit, 18 Months</option>
				<option value="A07">A07- Girl's Infant Outfit, 24 Months</option>
				<option value="A08">A08- Girl's Infant Outfit, Declined</option>
				</select><br><br>
			</div>
			
			<div id= "infantGirlSpecial" style="display: none;">
				Special Request Girl's Infant Outfit
				<input type="text" id="infantGirlSpecialText" name="infantGirlSpecialText">
			</div>
		</div>
		
		<div id= "kidGirlType" style="display: none;">
			<input type="radio" id="standardKidGirl" name="kidGirlType" value="baby" onClick= "document.getElementById('kidGirlSize').style.display= 'inline';
			 document.getElementById('kidGirlSpecial').style.display= 'none'">Girl's Jeans<br>
			<input type="radio" id= "specialKidGirl" name="kidGirlType" value="kid" onClick= "document.getElementById('kidGirlSpecial').style.display= 'inline';
			 document.getElementById('kidGirlSize').style.display= 'none'">Girl's Special Request Item (Jeans, Skirt, Dress)<br>
			 check girl's jeans if item declined<br><br>
			
			<div id= "kidGirlSize" style="display: none;">
				<select id="kidGirlSizeSelect" onChange="kidGirlSize()" name="kidGirlSize">
				<option value="B01">B01- Toddler Girl's Jeans, 2T</option>
				<option value="B02">B02- Toddler Girl's Jeans, 3T</option>
				<option value="B03">B03- Girl's Jeans, Regular 4T/4</option>
				<option value="B04">B04- Girl's Jeans, Regular 5T/5</option>
				<option value="B07">B07- Girl's Jeans, Regular 6</option>
				<option value="B09">B09- Girl's Jeans, Regular 7</option>
				<option value="B10">B10- Girl's Jeans, Regular 8</option>
				<option value="B11">B11- Girl's Jeans, Regular 10</option>
				<option value="B12">B12- Girl's Jeans, Regular 12</option>
				<option value="B13">B13- Girl's Jeans, Regular 14</option>
				<option value="B14">B14- Girl's Jeans, Regular 16</option>
				<option value="B15">B15- Girl's Jeans, Slim 4</option>
				<option value="B16">B16- Girl's Jeans, Slim 5</option>
				<option value="B17">B17- Girl's Jeans, Slim 6</option>
				<option value="B19">B19- Girl's Jeans, Slim 7</option>
				<option value="B20">B20- Girl's Jeans, Slim 8</option>
				<option value="B21">B21- Girl's Jeans, Slim 10</option>
				<option value="B22">B22- Girl's Jeans, Slim 12</option>
				<option value="B23">B23- Girl's Jeans, Slim 14</option>
				<option value="B24">B24- Girl's Jeans, Plus 8</option>
				<option value="B25">B25- Girl's Jeans, Plus 10</option>
				<option value="B26">B26- Girl's Jeans, Plus 12</option>
				<option value="B27">B27- Girl's Jeans, Plus 14</option>
				<option value="B28">B28- Girl's Jeans, Plus 16</option>
				<option value="B30">B30- Girl's Juniors Jeans, Regular 0</option>
				<option value="B31">B31- Girl's Juniors Jeans, Regular 1</option>
				<option value="B32">B32- Girl's Juniors Jeans, Regular 3</option>
				<option value="B33">B33- Girl's Juniors Jeans, Regular 5</option>
				<option value="B34">B34- Girl's Juniors Jeans, Regular 7</option>
				<option value="B35">B35- Girl's Juniors Jeans, Regular 9</option>
				<option value="B36">B36- Girl's Juniors Jeans, Regular 11</option>
				<option value="B37">B37- Girl's Juniors Jeans, Regular 13</option>
				<option value="B38">B38- Girl's Juniors Jeans, Regular 15</option>
				<option value="B39">B39- Girl's Juniors Jeans, Regular 17</option>
				<option value="B40">B40- Girl's Juniors Jeans, Regular 19</option>
				<option value="B41">B41- Girl's Jeans Declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidGirlSpecial" style="display: none;">
				Special Request Girl's Kid Outfit
				<input type="text" id="kidGirlSpecialText" name="kidGirlSpecialText">
			</div>
		</div>
	</div>
	
	<div id= "boyType" style="display: none;">
		<input type="radio" id="boy" name="boyOutfitType" value="baby" onClick= "document.getElementById('infantBoyType').style.display= 'inline';
		 document.getElementById('kidBoyType').style.display= 'none'">Boy's Infant Outfit<br>
		
		<input type="radio" id= "boy" name="boyOutfitType" value="kid" onClick= "document.getElementById('kidBoyType').style.display= 'inline';
		 document.getElementById('infantBoyType').style.display= 'none'">Boy's Jeans and Shirt<br><br>
		
		<div id= "infantBoyType" style="display: none;">
			<input type="radio" id="standardInfantBoy" name="infantBoyType" value="baby" onClick= "document.getElementById('infantBoySize').style.display= 'inline';
			 document.getElementById('infantBoySpecial').style.display= 'none'">Boy's Infant Outfit<br>
			<input type="radio" id= "specialInfantBoy" name="infantBoyType" value="kid" onClick= "document.getElementById('infantBoySpecial').style.display= 'inline';
			 document.getElementById('infantBoySize').style.display= 'none'">Special Request Infant Outfit<br><br>
			
			<div id= "infantBoySize" style="display: none;">
				<select id="infantBoySizeSelect" onChange="infantBoySize()" name="infantBoySize">
				<option value="G01">G01- Boy's Newborn Outfit</option>
				<option value="G02">G02- Boy's Infant Outfit, 3 Months</option>
				<option value="G03">G03- Boy's Infant Outfit, 6 Months</option>
				<option value="G04">G04- Boy's Infant Outfit, 9 Months</option>
				<option value="G05">G05- Boy's Infant Outfit, 12 Months</option>
				<option value="G06">G06- Boy's Infant Outfit, 18 Months</option>
				<option value="G07">G07- Boy's Infant Outfit, 24 Months</option>
				<option value="G08">G08- Boy's Infant Outfit, Declined</option>
				</select><br><br>
			</div>
			
			<div id= "infantBoySpecial" style="display: none;">
				Special Request Boy's Infant Outfit
				<input type="text" id="infantBoySpecialText" name="infantBoySpecialText">
			</div>
		</div>
		
		<div id= "kidBoyType" style="display: none;">
			<input type="radio" id="standardKidBoy" name="kidBoyType" value="baby" onClick= "document.getElementById('kidBoySize').style.display= 'inline';
			 document.getElementById('kidBoySpecial').style.display= 'none'">Boy's Jeans<br>
			<input type="radio" id= "specialKidBoy" name="kidBoyType" value="kid" onClick= "document.getElementById('kidBoySpecial').style.display= 'inline';
			 document.getElementById('kidBoySize').style.display= 'none'">Boy's Special Request Item (Jeans)<br>
			 check boy's jeans if item declined<br><br>
			
			<div id= "kidBoySize" style="display: none;">
				<select id="kidBoySizeSelect" onChange="kidBoySize()"name="idBoySize">
				<option value="H01">H01- Toddler Boy's Jeans, 2T</option>
				<option value="H02">H02- Toddler Boy's Jeans, 3T</option>
				<option value="H03">H03- Boy's Jeans, Regular 4T/4</option>
				<option value="H04">H04- Boy's Jeans, Regular 5T/5</option>
				<option value="H07">H07- Boy's Jeans, Regular 6</option>
				<option value="H08">H08- Boy's Jeans, Regular 7</option>
				<option value="H09">H09- Boy's Jeans, Regular 8</option>
				<option value="H12">H12- Boy's Jeans, Regular 14</option>
				<option value="H14">H14- Boy's Jeans, Regular 16</option>
				<option value="H16">H14- Boy's Jeans, Regular 18</option>
				<option value="H15">H15- Boy's Jeans, Slim 4</option>
				<option value="H16">H16- Boy's Jeans, Slim 5</option>
				<option value="H17">H17- Boy's Jeans, Slim 6</option>
				<option value="H18">H18- Boy's Jeans, Slim 7</option>
				<option value="H19">H19- Boy's Jeans, Slim 8</option>
				<option value="H20">H20- Boy's Jeans, Slim 10</option>
				<option value="H21">H21- Boy's Jeans, Slim 12</option>
				<option value="H22">H22- Boy's Jeans, Slim 14</option>
				<option value="H23">H23- Boy's Jeans, Slim 16</option>
				<option value="H24">H24- Boy's Jeans, Slim 18</option>
				<option value="H25">H25- Boy's Jeans, Husky 10/28</option>
				<option value="H26">H26- Boy's Jeans, Husky 12/29</option>
				<option value="H27">H27- Boy's Jeans, Plus 14/30</option>
				<option value="H28">H28- Boy's Jeans, Plus 16/31</option>
				<option value="H29">H29- Boy's Jeans, Plus 18/32</option>
				<option value="H31">H31- Boy's Jeans Declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidBoySpecial" style="display: none;">
				Special Request Boy's Kid Outfit
				<input type="text" id="kidBoySpecialText" name="kidBoySpecialText">
			</div>
		</div>
	</div>
	
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