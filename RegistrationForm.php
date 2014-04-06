<!DOCTYPE HTML>
<html> 
<body>
<p>Residence Verification *</p><!--<br>-->
<form action="general form.php" method="post">
<input type="radio" name="rv"<?php if (isset($rv) && $rv=="1") echo "checked";?>
value="1">>Yes<br>
<input type="radio" name="rv" <?php if (isset($rv) && $rv=="0") echo "checked";?>
value="0">>No<br>
<br>
Type of household *<br><select name="Type of Household">
<option value="0">Single Household</option>
<option value="1">Combined Household</option>
</select><br>
Address: <input type="text" name="address1"><br>
Address2: <input type="text" name="address2"><br>
City: <input type="text" name="city"><p></p>State: <input type="text" name="state">
Zip Code: <input type="text" name="zipcode"><br>

E-mail: <input type="text" name="email"><br>
Primary Phone: <input type="text" name="primaryphone"><br>

<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="0") echo "checked";?>
value="0">>Home<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="1") echo "checked";?>
value="1">>Cell<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="2") echo "checked";?>
value="2">>Work<br>
<input type="radio" name="phone1" <?php if (isset($phone1) && $phone1=="3") echo "checked";?>
value="3">>Other:<br>
<input type="number" name="othertext1"><br>

Secondary Phone: <input type="text" name="secondaryphone"><br>

<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="0") echo "checked";?>
value="0">>Home<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="1") echo "checked";?>
value="1">>Cell<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="2") echo "checked";?>
value="2">>Work<br>
<input type="radio" name="phone2" <?php if (isset($phone2) && $phone2=="3") echo "checked";?>
value="3">>Other:<br>
<input type="number" name="othertext2"><br>

Number of Family Members<input type="number" name="nummembers"><br>
Language Spoken* <br><select name="Language Spoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Language Spoken* <br><select name="Language Spoken">
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
<?php 
if(isset($_GET['submit']))
{ 
	$con = mysql_connect("127.0.0.1");
    mysql_select_db("stmargaretmarycatholicchurch", $con);
    $sql = "SELECT COUNT(*)";
    $id = mysql_affected_rows(mysql_query($sql,$con));
    $sql ="INSERT INTO household(residenceverification, residenceverficationnote, idhouseholdtype, address1, address2, city, state, zipcode
           email, idphonetypeprimary, phonenumberprimary, idphonetypesecondary, phonenumnersecondary, numberoffamilymembers, idlanguage)
           VALUES
           ('$_GET[rv]','$_GET[notes]'$id',$_GET[address1], $_GET[address2], $_GET[city], $_GET[state], $_GET[zipcode], $_GET[email], '$id',  )";
           mysql_close($con);
} 
?>