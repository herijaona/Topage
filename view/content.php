<?php 
if($_POST){

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
?>
<div class="container">
    <h5 class="text-center mt-4">Create your company</h5>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="w-50 mx-auto mt-4">
        <input type="text" name="name" placeholder="name" class="form-control mb-2">
        <input type="text" name="lastname" placeholder="lastname" class="form-control mb-2">
        <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-2">
        <input type="text" name="email" placeholder="email" class="form-control mb-2">
        <input type="text" name="adresse" placeholder="adresse" class="form-control mb-4">
        <input type="submit" value="ok" class="form-control bg-success text-white">
    </form>
</div>
