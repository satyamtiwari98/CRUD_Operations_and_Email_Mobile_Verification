<?php

    require_once 'connection.php';

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>Display Registered User</title>
  </head>
  <body>
  <h1>All The Registered User</h1>
  <?php
  
  $sql = "SELECT * from User";
  $result = $connect->query($sql);

if ($result->num_rows > 0) {
?>
  <table  class='table table-success table-striped' style="width:100%">

  <tr>

  <th>ID</th>
  <th>Name</th>
  <th>Father's Name</th>
  <th>Mother's Name</th>
  <th>Email</th>
  <th>Password</th>
  <th>Gender</th>
  <th>Date Of Birth</th>
  <th>Mobile Number</th>
  <th>Message</th>
  <th>Address</th>
  <th>City</th>
  <th>Zip Code</th>
  <th>Image</th>
  <th>Update</th>
  <th>Delete</th>

  </tr>

  <?php
  while($row = $result->fetch_assoc()) {

?>

<tr>

<td><?php echo $row["id"];?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["fname"]; ?></td>
<td><?php echo $row["mname"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["pass"]; ?></td>
<td><?php echo $row["gender"]; ?></td>
<td><?php echo $row["dob"]; ?></td>
<td><?php echo $row["mobile"];?></td>
<td><?php echo $row["msg"];?></td>
<td><?php echo $row["address"];?></td>
<td><?php echo $row["city"];?></td>
<td><?php echo $row["zip"];?></td>
<td><?php echo $row['img'];?></td>
<td><a href='update.php?id=<?php echo $row["id"]; ?>'>Update</a></td>
<td><a href='delete.php?id=<?php echo $row["id"];?>'>Delete</a></td>

</tr>

<?php

  } echo "</table>";

} else {

  echo "0 results";

}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  
  </body>
</html>