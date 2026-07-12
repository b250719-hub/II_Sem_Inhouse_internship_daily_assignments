<?php
// Default page if variable is not set
if(!isset($page)){
    $page = "confirmation";
    include "header.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Performance System</title>


<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome Icons -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<style>

/* Body */

body{

    background:#f4f7fb;
    font-family:Arial, Helvetica, sans-serif;

}


/* Navbar */

.navbar{

    background:linear-gradient(90deg,#0d6efd,#6610f2);

}


.navbar-brand{

    font-weight:bold;
    font-size:22px;

}


.nav-link{

    color:white !important;
    margin:0 8px;
    transition:0.3s;

}


.nav-link:hover{

    color:#ffd700 !important;

}


/* Active Link */

.nav-link.active{

    background:white;
    color:#0d6efd !important;
    border-radius:20px;
    padding-left:15px;
    padding-right:15px;

}


/* Main Card */

.card{

    border-radius:15px;
    overflow:hidden;

}


.card-header{

    background:linear-gradient(135deg,#0d6efd,#6610f2);
    color:white;

}


/* Buttons */

.btn{

    border-radius:10px;

}


/* Performance Cards */

.alert{

    border-radius:12px;

}


</style>

</head>


<body>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">


<a class="navbar-brand" href="studentconfirmation.php">

<i class="fa-solid fa-user-graduate"></i>

Student Portal

</a>


<button class="navbar-toggler" 
type="button" 
data-bs-toggle="collapse" 
data-bs-target="#navbarMenu">

<span class="navbar-toggler-icon"></span>

</button>



<div class="collapse navbar-collapse" id="navbarMenu">


<ul class="navbar-nav ms-auto">


<li class="nav-item">

<a class="nav-link <?php if($page=="confirmation"){echo "active";} ?>" 
href="studentconfirmation.php">

<i class="fa-solid fa-house"></i>
Home

</a>

</li>

</ul>


</div>

</div>

</nav>