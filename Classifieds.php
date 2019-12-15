


<?php

if (isset($_POST['submit'])) {
  require "config.php";
  require "common.php";

  try {
	
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "Product" => $_POST['Product'],
      "Manufacturer"  => $_POST['Manufacturer'],
      "Model"     => $_POST['Model'],
      "Age"       => $_POST['Age'],
      "Cost"  => $_POST['Cost'],
	  "Comments"  => $_POST['Comments'],
	  "Warranty"  => $_POST['Warranty'],
	  "Negotiable"  => $_POST['Negotiable']
    );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"elec",
implode(", ", array_keys($new_user)),
":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>
<!DOCTYPE HTML>
<html>

	
								
 <form action='' method="post" onSubmit="alert('Thanks for submitting the Add , Good luck.');">
    <div class="row">

<table align= 'center'>

<tr>
<td>
<h4>Type of Product</td><td><input type='text' id='Product' name='Product' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Manufacturer</td><td><input type='text' id='Manufacturer' name='Manufacturer' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Model</td><td><input type='text' id='Model' name='Model' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Age of the Product</td><td><input type='text' id='Age' name='Age' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Cost</td><td><input type='text' id='Cost' name='Cost' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Warranty</td><td><input type='text'  name="Warranty" id="Warranty" value='' required></br></br>
</td>
</tr>

<tr>
<td>
<h4>Negotiable</td><td><input type='text' id='Negotiable' name='Negotiable' value='' required></br></br>
</td>
</tr>
<tr>
<td>
<h4>Comments</td><td><textarea id="Comments" name="Comments" rows="4" cols="50" pattern="[A-Za-z0-9 ]+" title="special characters not allowed" required></textarea></br></br>
</td>
</tr>
<tr>
<td>
</td>
<td><b>
<input type='submit' name='submit' value='Submit'></br></br>
</td>
</tr>
</table>

    </div>
  </form>
</div>

									

								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>


						

	</body>
</html>