<?php 
	include 'db.php';
	// Inserting the data by encrypting all the fields
	if (isset($_POST['submit'])) {
		$patient_name = $_POST['patient_name'];
		$patient_name = encrypt_decrypt('encrypt', $patient_name);
		$disease = $_POST['disease'];
		$disease = encrypt_decrypt('encrypt', $disease);
		$sub_category_disease = $_POST['sub_category_disease'];
		$sub_category_disease = encrypt_decrypt('encrypt', $sub_category_disease);
		$doctor_name = $_POST['doctor_name'];
		$doctor_name = encrypt_decrypt('encrypt', $doctor_name);
		$ward_details = $_POST['ward_details'];
		$ward_details = encrypt_decrypt('encrypt', $ward_details);
		$disease_desc = $_POST['disease_desc'];
		$disease_desc = encrypt_decrypt('encrypt', $disease_desc);
		if(!mysqli_query($conn,"INSERT INTO `hospital` VALUES('','$patient_name','$disease','$sub_category_disease','$doctor_name','$ward_details','$disease_desc')")){
			echo "Error: ".mysqli_error($conn);;
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>	
	<style type="text/css">
		input{
			margin: 15px 0;
		}
	</style>
	<div class="container">
		<h3>Enter Patient Details</h3>
		<div class="row">
			<div class="col-md-6">
				<form method="post">
					<input type="text" class="form-control" name="patient_name" placeholder="Patient Name" required>
					<input type="text" class="form-control" name="disease" placeholder="Disease" required>
					<input type="text" class="form-control" name="sub_category_disease" placeholder="Disease Sub Category" required>
					<input type="text" class="form-control" name="doctor_name" placeholder="Doctor Name" required>
					<input type="text" class="form-control" name="ward_details" placeholder="Ward Details" required>
					<textarea type="text" class="form-control" name="disease_desc" placeholder="Disease Description" required></textarea>
					<center><input type="submit" name="submit" class="btn btn-primary"></center>
				</form>
			</div>
		</div>
	</div>
</body>
</html>