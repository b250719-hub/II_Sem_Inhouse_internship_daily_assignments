<?php
$errors = [];
$success = false;

$name = "";
$email = "";
$phone = "";
$branch = "";
$course = "";
$gender = "";
$address = "";
$photo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $branch = trim($_POST["branch"]);
    $course = trim($_POST["course"]);
    $gender = $_POST["gender"] ?? "";
    $address = trim($_POST["address"]);

    if(isset($_FILES["photo"]) && $_FILES["photo"]["name"] != ""){
        $photo = $_FILES["photo"]["name"];
    }
    else{
        $photo = "No Photo Selected";
    }

    // Validation
    if($name==""){
        $errors[]="Name is required.";
    }
    elseif(!preg_match("/^[A-Za-z ]+$/",$name)){
        $errors[]="Name should contain only letters.";
    }

    if($email==""){
        $errors[]="Email is required.";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="Invalid Email.";
    }

    if(!preg_match("/^[0-9]{10}$/",$phone)){
        $errors[]="Phone must be 10 digits.";
    }

    if($branch==""){
        $errors[]="Branch is required.";
    }

    if($course==""){
        $errors[]="Select a course.";
    }

    if($gender==""){
        $errors[]="Select gender.";
    }

    if(strlen($address)<10){
        $errors[]="Address should be at least 10 characters.";
    }

    if(empty($errors)){
        $success = true;
    }

}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.card{
margin-top:40px;
border-radius:12px;
}

img{
width:150px;
height:150px;
border-radius:50%;
object-fit:cover;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2 class="text-center">Student Registration Form</h2>

</div>

<div class="card-body">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

if(!empty($errors)){

echo '<div class="alert alert-danger"><ul>';

foreach($errors as $e){
echo "<li>$e</li>";
}

echo '</ul></div>';

}

}

?>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $name;?>">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?php echo $email;?>">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" value="<?php echo $phone;?>">
</div>

<div class="mb-3">
<label>Branch</label>
<input type="text" name="branch" class="form-control" value="<?php echo $branch;?>">
</div>

<div class="mb-3">

<label>Course</label>

<select name="course" class="form-select">

<option value="">Select Course</option>

<option>BCA</option>
<option>B.Tech</option>
<option>B.Sc</option>
<option>B.Com</option>
<option>MCA</option>

</select>

</div>

<div class="mb-3">

<label>Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

<input type="radio" name="gender" value="Other"> Other

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address" class="form-control"><?php echo $address;?></textarea>

</div>

<div class="mb-3">

<label>Profile Photo</label>

<input type="file" name="photo" id="photo" class="form-control">

</div>

<div class="text-center mb-3">

<img src="https://via.placeholder.com/150" id="preview">

</div>

<button class="btn btn-primary w-100">Register Student</button>

</form>

<?php

if($success){

?>

<div class="card mt-4 border-success">

<div class="card-header bg-success text-white">

<h4>Registration Successful</h4>

</div>

<div class="card-body">

<p><strong>Name:</strong> <?php echo $name;?></p>

<p><strong>Email:</strong> <?php echo $email;?></p>

<p><strong>Phone:</strong> <?php echo $phone;?></p>

<p><strong>Branch:</strong> <?php echo $branch;?></p>

<p><strong>Course:</strong> <?php echo $course;?></p>

<p><strong>Gender:</strong> <?php echo $gender;?></p>

<p><strong>Address:</strong> <?php echo $address;?></p>

<p><strong>Photo:</strong> <?php echo $photo;?></p>

</div>

</div>

<?php

}

?>

</div>

</div>

</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$("#photo").change(function(){

const file=this.files[0];

if(file){

const reader=new FileReader();

reader.onload=function(e){

$("#preview").attr("src",e.target.result);

}

reader.readAsDataURL(file);

}

});

</script>

</body>

</html>