<!DOCTYPE HTML>
<html> 
<body>
<p>Residence Verification *</p><!--<br>-->
<form action="general form.php" method="post">
<input type="radio" name="resVer" value="true">Yes<br>
<input type="radio" name="resVer" value="false">No<br>
<br>
Type of household *<br><select name="Type of Household">
<option value="single">Single Household</option>
<option value="combined">Combined Household</option>
</select><br>
Address: <input type="text" name="address1"><br>
Address2: <input type="text" name="address2"><br>
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
Language Spoken* <br><select name="Language Spoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Language Spoken* <br><select name="Language Spoken">
<option value="english">English</option>
<option value="spanish">Spanish</option>
</select><br>

Delivery<br><input type="radio" name="delivery" value="true">Yes<br>
<input type="radio" name="delivery" value="false">No<br>
<p>See Anne of Maryann if yes</p>

Christmas Store selection*<br><input type="radio" name="storeSelection" value="food">Food<br>
<input type="radio" name="storeSelection" value="toys">Clothing & Toys<br>
<p>(Clothing & Toys is for children 12 & under)</p>

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

<input type="submit" value="Submit">
</form>
<?php
// Create connection
 $con=mysqli_connect("localhost");

// Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
 ?> 
</body>
</html>