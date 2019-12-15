<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `elec` WHERE CONCAT(`Product`, `Manufacturer`, `Model`, `Warranty`, `Cost`, `Comments`, `Negotiable`, `age`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `elec`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "!r0nmansucks", "test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<?php

/**
  * Function to query information based on
  * a parameter: in this case, location.
  *
  */

 {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM elec"; 

    $statement = $connection->prepare($sql);
    
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<!DOCTYPE HTML>
<html>
	
										<h1>Classifieds</h1>
									
 <form action='' method="post" >
    <div class="row">
<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>&nbsp
			



  
      <thead>
<tr>
  <th>Product</th>
  <th>Manufacturer</th>
  <th>Age</th>
  <th>Model</th>
  <th>Cost</th>
  <th>Comments</th>
  <th>Negotiable</th>
  <th>Warranty</th>
</tr><br>
      </thead>
      
      <tbody>
	  
   <?php while($row = mysqli_fetch_array($search_result)):?>
      <tr>
<td><?php echo escape($row["Product"]); ?></td>
<td><?php echo escape($row["Manufacturer"]); ?></td>
<td><?php echo escape($row["Age"]); ?></td>
<td><?php echo escape($row["Model"]); ?></td>
<td><?php echo escape($row["Cost"]); ?></td>
<td><?php echo escape($row["Comments"]); ?></td>
<td><?php echo escape($row["Negotiable"]); ?> </td>
<td><?php echo escape($row["Warranty"]); ?> </td>

      </tr>
    <?php endwhile;?>
      </tbody>
  </table>
 
</div>
  </form>
</div>

									


							<!-- Search -->
								
							<!-- Menu -->


	</body>
</html>



