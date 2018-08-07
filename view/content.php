<?php 
if($_POST){

    $register->name = $_POST['name'];
    $register->lastname = $_POST['lastname'];

    if($register->create()){
        echo "<div class='container alert alert-success'>Product was created.</div>";
    }
    else{
        echo "<div class='container alert alert-danger'>Unable to create product.</div>";
    }
}
?>
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="w-50 mx-auto mt-4">
        <input type="text" name="name" placeholder="name" class="form-control mb-2">
        <input type="text" name="lastname" placeholder="lastname" class="form-control mb-4">
        <input type="submit" value="ok" class="form-control bg-success text-white">
    </form>
</div>
