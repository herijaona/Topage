<?php 

session_start();

if(!empty($_POST['btnRegister'])){

    $register->name = $_POST['name'];
    $register->lastname = $_POST['lastname'];
    $register->password = $_POST['password'];
    $register->email = $_POST['email'];
    $register->adresse = $_POST['adresse'];

    if($register->create()){
        echo "<div class='mt-2 container alert alert-success'>Product was created.</div>";
    }
    else{
        echo "<div class='mt-2 container alert alert-danger'>Unable to create product.</div>";
    }
}

if (!empty($_POST['btnLogin'])) {
 
    $lastname = trim($_POST['lastname']);
    $password = trim($_POST['password']);
 
    if ($lastname == "") {
        $login_error_message = 'lastname field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $id = $register->Login($lastname, $password); // check user login
        var_dump($id);
        if($id > 0)
        {
            $_SESSION['id'] = $id; // Set Session
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}
?>
<div class="container">
    <h5 class="text-center mt-4">Create your company</h5>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="w-50 mx-auto mt-4">
        <input type="text" name="name" placeholder="name" class="form-control mb-2">
        <input type="text" name="lastname" placeholder="lastname" class="form-control mb-2">
        <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-2">
        <input type="text" name="email" placeholder="email" class="form-control mb-2">
        <input type="text" name="adresse" placeholder="adresse" class="form-control mb-4">
        <input type="submit" name="btnRegister" value="ok" class="form-control bg-success text-white">
    </form>
    <br>


         <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
        ?>
        <form action="index.php" method="post">
                <div class="form-group">
                    <label for="">lastname/Email</label>
                    <input type="text" name="lastname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
                </div>
        </form>
</div>
