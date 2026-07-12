<?php

// =============================
// Get Form Data
// =============================

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$branch = trim($_POST['branch'] ?? '');
$course = trim($_POST['course'] ?? '');
$gender = trim($_POST['gender'] ?? '');
$address = trim($_POST['address'] ?? '');

$photo = "";

if(isset($_FILES['photo']) && $_FILES['photo']['name'] != ""){
    $photo = $_FILES['photo']['name'];
}
else{
    $photo = "No Photo Selected";
}

// =============================
// Validation
// =============================

$errors = [];

// Name
if(empty($name)){
    $errors[] = "Name is required.";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
    $errors[] = "Name should contain only letters and spaces.";
}

// Email
if(empty($email)){
    $errors[] = "Email is required.";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = "Enter a valid email address.";
}

// Phone
if(empty($phone)){
    $errors[] = "Phone number is required.";
}
elseif(!preg_match("/^[0-9]{10}$/",$phone)){
    $errors[] = "Phone number must contain exactly 10 digits.";
}

// Branch
if(empty($branch)){
    $errors[] = "Branch is required.";
}

// Course
if(empty($course)){
    $errors[] = "Please select a course.";
}

// Gender
if(empty($gender)){
    $errors[] = "Please select your gender.";
}

// Address
if(empty($address)){
    $errors[] = "Address is required.";
}
elseif(strlen($address) < 10){
    $errors[] = "Address must contain at least 10 characters.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<?php

// =============================
// Display Errors
// =============================

if(count($errors) > 0){

?>

<div class="alert alert-danger shadow">

<h3 class="text-center mb-3">
Validation Errors
</h3>

<ul>

<?php

foreach($errors as $error){

echo "<li>$error</li>";

}

?>

</ul>

<div class="text-center mt-4">

<a href="index.php" class="btn btn-danger">
Go Back
</a>

</div>

</div>

<?php

}

// =============================
// Success Card
// =============================

else{

?>

<div class="card shadow-lg">

<div class="card-header bg-success text-white text-center">

<h2>
Registration Successful
</h2>

</div>

<div class="card-body">

<div class="alert alert-success">

Student Registered Successfully!

</div>

<table class="table table-bordered">

<tr>
<th width="35%">Full Name</th>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($email); ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo htmlspecialchars($phone); ?></td>
</tr>

<tr>
<th>Branch</th>
<td><?php echo htmlspecialchars($branch); ?></td>
</tr>

<tr>
<th>Course</th>
<td><?php echo htmlspecialchars($course); ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo htmlspecialchars($gender); ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo nl2br(htmlspecialchars($address)); ?></td>
</tr>

<tr>
<th>Profile Photo</th>
<td><?php echo htmlspecialchars($photo); ?></td>
</tr>

</table>

<div class="text-center mt-4">

<a href="index.php" class="btn btn-primary">
Register Another Student
</a>

</div>

</div>

</div>

<?php

}

?>

</div>

</div>

</div>

</body>

</html>