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
	  die('Error: ' . mysql_error());
	}
	  
           mysql_close($con);
} 
?>
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
<option value="single">Single Household</option>
<option value="combined">Combined Household</option>
</select><br>
Address: <input type="text" name="address1"><br>
Address2: <input type="text" name="address2"><br>
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

Number of Family Members<input type="number" name="nummembers"><br>
Language Spoken* <br><select name="LanguageSpoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Language Spoken* <br><select name="LanguageSpoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Delivery<br><input type="radio" name="delivery1" value="yes">Yes<br>
<input type="radio" name="delivery2" value="no">No<br>
<p>See Anne of Maryann if yes</p>

Christmas Store selection*<br><input type="radio" name="css1" value="yes">Yes<br>
<input type="radio" name="css2" value="no">No<br>
<p>(Clothing & Toys is for children 12 & under)</p>

How did you learn about the Stores?* <br><select name="Learn">
<option value="previous">Previous Customer</option>
<option value="flyer">Flyer</option>
<option value="school">School</option>
<option value="word">Word of Mouth</option>
</select><br>

<b>Can a member of the St. Margaret Mary Church and Community Organization call you after the holidays to talk more about the needs and concerns of you and your family?*</b>
<br><input type="radio" name="can" <?php if (isset($can) && $can=="1") echo "checked";?>
value="1">Yes<br>
<input type="radio" name="can" <?php if (isset($can) && $can=="0") echo "checked";?>
value="0">No<br>
<p>(Clothing & Toys is for children 12 & under)</p>

Notes: <input type="text" name="notes"><br>
This Form was completed by* <input type="text" name="completed"><br>
<input type="submit" name="submit">
</form>
</body>
</html>
