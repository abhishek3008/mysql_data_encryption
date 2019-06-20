<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title></title>
</head>
<body>
<h3 class="mt-3 mb-4">Patient Data</h3>
<?php
	include 'db.php';
	// Query for fetching data
	$query = "SELECT * FROM `hospital`";
    $result = mysqli_query($conn,$query);
     if (mysqli_num_rows($result) < 1) {

    }else{
    	?>
    	<table class="table">
		<thead>
			<th>Patient Name</th>
			<th>Disease</th>
			<th>Disease Sub Category</th>
			<th>Doctor Name</th>
			<th>Ward Details</th>
			<th>Disease Desc</th>
		</thead>
    	<?php
    	// Fetching each data from database
        while ($row = mysqli_fetch_assoc($result)) {
        	?>
        	<!-- Decrypting Data -->
			<tr>
				<td> <?php echo encrypt_decrypt('decrypt', $row['patient_name']); ?></td>
				<td> <?php echo encrypt_decrypt('decrypt', $row['disease']); ?></td>
				<td> <?php echo encrypt_decrypt('decrypt', $row['sub_category_disease']); ?></td>
				<td> <?php echo encrypt_decrypt('decrypt', $row['doctor_name']); ?></td>
				<td> <?php echo encrypt_decrypt('decrypt', $row['ward_details']); ?></td>
				<td style="max-width: 300px"> <?php echo encrypt_decrypt('decrypt', $row['disease_desc']); ?></td>
			</tr>
        	<?php
        }
        ?>
        </table>

        <?php
    }
?>



</body>
</html>