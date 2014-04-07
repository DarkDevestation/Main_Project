<!--    Brandon Forster, Patrick Delva
        Group 4: Thanksgiving & Christmas Stores
        COP 4710 
-->

<!DOCTYPE HTML>
<?php 
if(isset($_GET['submit']))
{ 
	$con = mysql_connect("127.0.0.1","root","");
    mysql_select_db("stmargaretmarycatholicchurch", $con);
    //$sql ="INSERT INTO  householdtype (householdtypename) 
      //     VALUES('$_GET[typeofhousehold]')";
        //    if (!mysql_query($sql,$con))
	//{
	  //die('Error: ' . mysql_error());
	//}
    $sql ="INSERT INTO  phonetype (phonetypename) 
           VALUES('$_GET[phone1]')";
            if (!mysql_query($sql,$con))
            {
	  die('Error: ' . mysql_error());
	}
    $sql ="INSERT INTO  phonetype (phonetypename) 
           VALUES('$_GET[phone2]')";
            if (!mysql_query($sql,$con))
            {
	  die('Error: ' . mysql_error());
	}
    $sql ="INSERT INTO household 
           VALUES(residenceverification, residenceverficationnote, address1, address2, city, state, zipcode
           email, phonenumberprimary, phonenumnersecondary, numberoffamilymembers, idlanguage)
           (1,'$_GET[notes]','$_GET[address1]', '$_GET[address2]', '$_GET[city]', '$_GET[state]', '$_GET[zipcode]', '$_GET[email]', 
           '$_GET[othertext1]','$_GET[primaryphone]','$_GET[othertext2]','$_GET[secondaryphone]','$_GET[nummembers]','$_GET[LanguageSpoken]')";
           if (!mysql_query($sql,$con))
	{
<<<<<<< HEAD
	  die('Error: ' . mysql_error());
	}
	  
           mysql_close($con);
=======
	  die('Could not connect: ' . mysql_error());
    }
	 
	 
	mysql_close($con);

	if ($_GET['storeSelection'] == 'toys')
	{
		header( 'Location: http://127.0.0.1/clothesform.php' ) ;
	}
>>>>>>> origin/brandonworking
} 
?>
<<<<<<< HEAD
<html> 
<body>
<p>Residence Verification *</p><!--<br>-->
<form action="RegistrationForm.php" method="get">
<input type="radio" name="rv"<?php if (isset($rv) && $rv==1) echo "checked";?>
value=1 >>Yes<br>
<input type="radio" name="rv" <?php if (isset($rv) && $rv==0) echo "checked";?>
value=0 >>No<br>
<br>
Type of household *<br><select name="typeofhousehold">
=======

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

function changeLearn()
{
	if (document.getElementById('learn').value == "other")
	{
		document.getElementById('otherLearn').style.display= "inline"; 
	}
	else
	{
		document.getElementById('otherLearn').style.display= "none"; 
	}
}

function checkForm()
{
	var formCorrect= true;
	
	// since it's a radio, and can only return true when both are unchecked.
	if (document.getElementById('resVerY').checked && document.getElementById('resVerN').checked)
	{
		formCorrect= false;
	}
	
	if (document.getElementById('householdType').value == "nullOpt")
	{
		formCorrect= false;
	}
	
	if (document.getElementById('hohFirst').value == "" || document.getElementById('hohLast').value == "")
	{
		formCorrect= false;
	}
	
	if (document.getElementById('spokenLang').value == "other" && document.getElementById('otherLang').value == "")
	{
		formCorrect= false;
	}
	
	// evaluates to true when neither toyStore or foodStore are selected, or toyStore is selected and numKids is null
	if ((document.getElementById('toyStore').checked && document.getElementById('foodStore').checked) ||
		(document.getElementById('toyStore').checked && document.getElementById('numKids').value == ""))
	{
		formCorrect= false;
	}
	
	if (document.getElementById('contactY').checked && document.getElementById('contactN').checked)
	{
		formCorrect= false;
	}
	
	if (document.getElementById('completedBy').value == "nullOpt")
	{
		formCorrect= false;
	}
	
	if (formCorrect == false)
	{
		document.getElementById('formCorrect').style.display= 'inline';
	}
	else
	{
		document.getElementById("registration").submit();
	}
}
</script>

<html> 
<body>

<form id="registration" action="RegistrationForm.php" method="get">
 
<div id= "formCorrect" style="display: none;">
Please ensure that you've filled out all required sections.<br>
</div>

<p>Residence Verification *</p>
<input type="radio" name="resVer" id="resVerY" value="true" onClick= "document.getElementById('resVerNo').style.display= 'none'">Yes<br>
<input type="radio" name="resVer" id="resVerN" value="false" onClick= "document.getElementById('resVerNo').style.display= 'inline'">No<br>

<div id= "resVerNo" style="display: none;">
See Anne or Maryann if "no" and make notation*<br>
<input type="text" name="resVerNoNotes"><br>
<br></div>

Type of household *<br><select id="householdType" onChange="changeHouseholdType()">
<option value="nullOpt"></option>
>>>>>>> origin/brandonworking
<option value="single">Single Household</option>
<option value="combined">Combined Household</option>
</select><br><br>

Head of Household Name*<br>
<input type="text" name="hohFirst" id="hohFirst"><input type="text" name="hohLast" id="hohLast"><br>
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

<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="home") echo "checked";?>
value="home">>Home<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="cell") echo "checked";?>
value="cell">>cell<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="work") echo "checked";?>
value="work">>Work<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="other") echo "checked";?>
value="other">>Other:<br>
<input type="number" name="othertext1"><br>

Secondary Phone: <input type="text" name="secondaryphone"><br>

<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="home") echo "checked";?>
value="home">>Home<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="cell") echo "checked";?>
value="cell">>Cell<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="work") echo "checked";?>
value="work">>Work<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="other") echo "checked";?>
value="other">>Other:<br>
<input type="number" name="othertext2"><br>

<<<<<<< HEAD
Number of Family Members<input type="number" name="nummembers"><br>
Language Spoken* <br><select name="LanguageSpoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Language Spoken* <br><select name="LanguageSpoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>
=======
Number of Family Members<input type="number" name="othertext1"><br>
Language spoken *<br><select id="spokenLang" onChange="changeLang()">
<option value="eng">English</option>
<option value="esp">Spanish</option>
<option value="other">Other</option>
</select><br><br>

<div id= "otherLang" style="display: none;">
<input type="text" id="otherLang"><br>
Other Language*<br><br> </div>
>>>>>>> origin/brandonworking

Delivery<br><input type="radio" name="delivery1" value="yes">Yes<br>
<input type="radio" name="delivery2" value="no">No<br>
<p>See Anne of Maryann if yes</p>

<<<<<<< HEAD
Christmas Store selection*<br><input type="radio" name="css1" value="yes">Yes<br>
<input type="radio" name="css2" value="no">No<br>
=======
Christmas Store selection*<br>
<input type="radio" name="storeSelection" id= "foodStore" value="food" onClick= "document.getElementById('toysInput').style.display= 'none'">Food<br>
<input type="radio" name="storeSelection" id= "toyStore" value="toys" onClick= "document.getElementById('toysInput').style.display= 'inline'">Clothing & Toys<br>
>>>>>>> origin/brandonworking
<p>(Clothing & Toys is for children 12 & under)</p>

<div id= "toysInput" style="display: none;">
<input type="number" id="numKids"><br>
Number of Children 12 & under*<br><br> </div>

How did you learn about the Stores?* <br><select id="learn" onChange= "changeLearn()">
<option value="previous">Previous Customer</option>
<option value="flyer">Flyer</option>
<option value="school">School</option>
<option value="word">Word of Mouth</option>
<option value="other">Other</option>
</select><br>

<div id= "otherLearn" style="display: none;">
<input type="text" id="otherLang"><br>
How did you learn about the store?*<br><br> </div>

<b>Can a member of the St. Margaret Mary Church and Community Organization call you after the holidays to talk more about the needs and concerns of you and your family?*</b>
<<<<<<< HEAD
<br><input type="radio" name="can" <?php if (isset($can) && $can=="1") echo "checked";?>
value="1">Yes<br>
<input type="radio" name="can" <?php if (isset($can) && $can=="0") echo "checked";?>
value="0">No<br>
<p>(Clothing & Toys is for children 12 & under)</p>

Notes: <input type="text" name="notes"><br>
This Form was completed by* <input type="text" name="completed"><br>
<input type="submit" name="submit">
=======
<br><input type="radio" name="contact" id= "contactY" value="true">Yes<br>
<input type="radio" name="contact" id= "contactN" value="false">No<br>

Notes: <input type="text" name="notes"><br>
This Form was completed by* <input type="text" id= "completedBy" name="completed"><br>

<input type="button" name="submitBtn" value="Submit" onClick="checkForm()"> 
>>>>>>> origin/brandonworking
</form>
</body>
</html>
