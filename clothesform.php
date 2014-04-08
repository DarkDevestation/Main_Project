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
	<head>
		<title>Clothes Form</title>
	</head>
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
		
		<input type="radio" id= "boy" name="girlOutfitType" value="kid" onClick= "document.getElementById('kidGirlType').style.display= 'inline';
		 document.getElementById('infantGirlType').style.display= 'none'">Girl's Jeans and Shirt<br><br>
		
		<div id= "infantGirlType" style="display: none;">
			<input type="radio" id="standardInfantGirl" name="infantGirlType" value="baby" onClick= "document.getElementById('infantGirlSize').style.display= 'inline';
			 document.getElementById('infantGirlSpecial').style.display= 'none'">Girl's Infant Outfit<br>
			<input type="radio" id= "specialInfantGirl" name="infantGirlType" value="kid" onClick= "document.getElementById('infantGirlSpecial').style.display= 'inline';
			 document.getElementById('infantGirlSize').style.display= 'none'">Special Request Infant Outfit<br><br>
			
			<div id= "infantGirlSize" style="display: none;">
				<select id="infantGirlSizeSelect" onChange="infantGirlSize()">
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
			<input type="radio" id="standardKidGirlJeans" name="kidGirlTypeJeans" value="baby" onClick= "document.getElementById('kidGirlSizeJeans').style.display= 'inline';
			 document.getElementById('kidGirlSpecialJeans').style.display= 'none'">Girl's Jeans<br>
			<input type="radio" id= "specialKidGirlJeans" name="kidGirlTypeJeans" value="kid" onClick= "document.getElementById('kidGirlSpecialJeans').style.display= 'inline';
			 document.getElementById('kidGirlSizeJeans').style.display= 'none'">Girl's Special Request Item (Jeans, Skirt, Dress)<br>
			<br><br>
			
			<div id= "kidGirlSizeJeans" style="display: none;">
				<select id="kidGirlSizeSelectJeans" onChange="kidGirlSizeJeans()">
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
			
			<div id= "kidGirlSpecialJeans" style="display: none;">
				Special Request Girl's Kid Outfit
				<input type="text" id="kidGirlSpecialTextJeans" name="kidGirlSpecialTextJeans">
				<br><br>
			</div>
			
			<input type="radio" id="standardKidGirl" name="kidGirlTypeShirt" value="baby" onClick= "document.getElementById('kidGirlSizeShirt').style.display= 'inline';
			 document.getElementById('kidGirlSpecialShirt').style.display= 'none'">Girl's Shirts<br>
			<input type="radio" id= "specialKidGirl" name="kidGirlTypeShirt" value="kid" onClick= "document.getElementById('kidGirlSpecialShirt').style.display= 'inline';
			 document.getElementById('kidGirlSizeShirt').style.display= 'none'">Girl's Special Request Item (Shirt)<br>
			 check girl's shirts if item is declined and decline if dress is chosen<br><br>
			
			<div id= "kidGirlSizeShirt" style="display: none;">
				<select id="kidGirlSizeSelectShirt" onChange="kidGirlSizeShirt()">
				<option value="C01">C01- Toddler Girl's Shirt, 2T</option>
				<option value="C02">C02- Toddler Girl's Shirt, 3T</option>
				<option value="C03">C03- Toddler Girl's Shirt, 4T</option>
				<option value="C04">C04- Toddler Girl's Shirt, 5T</option>
				<option value="C05">C05- Girl's Shirt, XS</option>
				<option value="C06">C06- Girl's Shirt, Small</option>
				<option value="C07">C07- Girl's Shirt, Medium</option>
				<option value="C08">C08- Girl's Shirt, Large</option>
				<option value="C09">C09- Girl's Shirt, XL</option>
				<option value="C10">C10- Girl's Juniors Shirt, Small</option>
				<option value="C11">C11- Girl's Juniors Shirt, Medium</option>
				<option value="C12">C12- Girl's Juniors Shirt, Large</option>
				<option value="C13">C13- Girl's Juniors Shirt, Extra Large</option>
				<option value="C14">C14- Women's Shirt, Small</option>
				<option value="C15">C15- Women's Shirt, Medium</option>
				<option value="C16">C16- Women's Shirt, Large</option>
				<option value="C17">C17- Women's Shirt, XL</option>
				<option value="C18">C18- Women's Shirt, XXL</option>
				<option value="C19">C19- Girl's shirts declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidGirlSpecialShirt" style="display: none;">
				Girl's Shirts Special Request Items
				<input type="text" id="kidGirlSpecialTextShirt" name="kidGirlSpecialTextShirt">
				<br><br>
			</div>
			
			<input type="radio" id="standardKidGirl" name="kidGirlTypeSocks" value="baby" onClick= "document.getElementById('kidGirlSizeSocks').style.display= 'inline';
			 document.getElementById('kidGirlSpecialSocks').style.display= 'none'">Girl's Socks<br>
			<input type="radio" id= "specialKidGirlSocks" name="kidGirlTypeSocks" value="kid" onClick= "document.getElementById('kidGirlSpecialSocks').style.display= 'inline';
			 document.getElementById('kidGirlSizeSocks').style.display= 'none'">Girl's Special Request Item (socks)<br>
			 check girl's socks if item is declined<br><br>
			
			<div id= "kidGirlSizeSocks" style="display: none;">
				<select id="kidGirlSizeSelectSocks" onChange="kidGirlSizeSocks()">
				<option value="D01">D01- Infant Girl Socks, 6-12 months</option>
				<option value="D02">D02- Infant Girl Socks, 12-24 months</option>
				<option value="D03">D03- Toddler Girl Socks, 2-3 T</option>
				<option value="D04">D04- Toddler Girl Socks, 4-5 T</option>
				<option value="D05">D05- Girl's Socks, Small</option>
				<option value="D06">D06- Girl's Socks, Medium</option>
				<option value="D07">D07- Girl's Socks, Large</option>
				<option value="D08">D08- Women's Socks, 5-9</option>
				<option value="D09">D09- Women's Socks, 8-12</option>
				<option value="D10">D10- girl's socks declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidGirlSpecialSocks" style="display: none;">
				Girl's Socks Special Request Item
				<input type="text" id="kidGirlSpecialTextSocks" name="kidGirlSpecialTextSocks">
				<br><br>
			</div>
			
			<input type="radio" id="standardKidGirl" name="kidGirlTypeUnder" value="baby" onClick= "document.getElementById('kidGirlSizeUnder').style.display= 'inline';
			 document.getElementById('kidGirlSpecialUnder').style.display= 'none'; document.getElementById('kidGirlSizePull').style.display= 'none'">Girl's Underwear<br>
			 <input type="radio" id="standardKidGirl" name="kidGirlTypeUnder" value="baby" onClick= "document.getElementById('kidGirlSizePull').style.display= 'inline';
			 document.getElementById('kidGirlSpecialUnder').style.display= 'none'; document.getElementById('kidGirlSizeUnder').style.display= 'none'">Girl's Diapers and Pullups<br>
			<input type="radio" id= "specialKidGirl" name="kidGirlTypeUnder" value="kid" onClick= "document.getElementById('kidGirlSpecialUnder').style.display= 'inline';
			 document.getElementById('kidGirlSizePull').style.display= 'none'; document.getElementById('kidGirlSizeUnder').style.display= 'none'">Girl's Special Request Item (underwear/diapers)<br>
			 check girl's underwear of diapers box if item is declined<br><br>
			
			<div id= "kidGirlSizeUnder" style="display: none;">
				<select id="kidGirlSizeSelectUnder" onChange="kidGirlSizeUnder()">
				<option value="E01">E01- Toddler Girl's Underwear, 2T/3T</option>
				<option value="E02">E02- Toddler Girl's Underwear, 4T</option>
				<option value="E03">E03- Girl's Underwear, 4</option>
				<option value="E04">E04- Girl's Underwear, 6</option>
				<option value="E05">E05- Girl's Underwear, 8</option>
				<option value="E06">E06- Girl's Underwear, 10</option>
				<option value="E07">E07- Girl's Underwear, 12</option>
				<option value="E08">E08- Girl's Underwear, 14</option>
				<option value="E09">E09- Girl's Underwear, 16</option>
				<option value="E10">E10- Women's Underwear, 5</option>
				<option value="E11">E11- Women's Underwear, 6</option>
				<option value="E12">E12- Women's Underwear, 7</option>
				<option value="E13">E13- Women's Underwear, 8</option>
				<option value="E14">E14- Women's Underwear, 9</option>
				<option value="E15">E15- Women's Underwear, 10</option>
				<option value="E16">E16- girl's underwear declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidGirlSizePull" style="display: none;">
				<select id="kidGirlSizeSelectPull" onChange="kidGirlSizePull()">
				<option value="F01">F01- Size 1 diapers, 8-14 lbs</option>
				<option value="F02">F02- Size 2 diapers, 12-18 lbs</option>
				<option value="F03">F03- Size 3 diapers, 16-28 lbs</option>
				<option value="F04">F04- Size 4 diapers, 22-37 lbs</option>
				<option value="F05">F05- Size 5 diapers, over 27 lbs</option>
				<option value="F06">F06- Size 6 diapers, over 35 lbs</option>
				<option value="F07">F07- Girl's Large Pull-ups, 32-40 lbs</option>
				<option value="F08">F08- Girl's XL Pull-ups, over 38 lbs</option>
				<option value="F09">F09- Girl's diapers declined</option>
				</select><br><br>
			</div>
			
			<div id= "kidGirlSpecialUnder" style="display: none;">
				Girl's Special Request (underwear/diapers)
				<input type="text" id="kidGirlSpecialTextUnder" name="kidGirlSpecialTextUnder">
				<br><br>
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
				<select id="infantBoySizeSelect" onChange="infantBoySize()">
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
				<select id="kidBoySizeSelect" onChange="kidBoySize()">
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