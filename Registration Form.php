<!DOCTYPE HTML>
<html> 
<body>
<p>Residence Verification *</p><!--<br>-->
<form action="general form.php" method="post">
<input type="radio" name="rv1" value="yes">Yes<br>
<input type="radio" name="rv2" value="no">No<br>
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

<input type="radio" name="home1" value="home1">Home<br>
<input type="radio" name="cell1" value="cell1">Cell<br>
<input type="radio" name="work1" value="work1">Work<br>
<input type="radio" name="other1" value="other1">Other:<br>
<input type="text" name="othertext1"><br>

Secondary Phone: <input type="text" name="secondaryphone"><br>

<input type="radio" name="home2" value="home2">Home<br>
<input type="radio" name="cell2" value="cell2">Cell<br>
<input type="radio" name="work2" value="work2">Work<br>
<input type="radio" name="other2" value="other2">Other:<br>
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
<br><input type="radio" name="can1" value="yes">Yes<br>
<input type="radio" name="can2" value="no">No<br>
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