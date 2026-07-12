<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 col-md-6">
        <h1>Registraion Form</h1>
    <form action="process.php" method="POST">
        <label>NAME</label><br>
    <input type="text" name="name" placeholder="Enter your name"><br>
    <label>College</label><br>
    <input type="text" name="college" placeholder="Enter your college"><br>
    <label>Branch</label><br>
    <input type="text" name="branch" placeholder="Enter your branch"><br>
    <div class="mb-5">
        <input type="submit" name="submit" value="submit">
     </div>
    </form>
    </div>
</body>
</html>
