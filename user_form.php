<?php session_start(); ?>
<?php
function findUser($id) {
    foreach ($_SESSION["users"] as $user) {
        if ($user["id"] == $id)
            return $user;
    }
    return ["id" => "", "firstName" => "", "lastName" => ""];
}

$user = findUser($_GET["id"]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
</head>
<body>
<form action="" method="post">
    <label>First Name</label>
    <input type="text" name="firstname" value="<?= $user["firstName"] ?>">

    <label>Last Name</label>
    <input type="text" name="lastname" value="<?= $user["lastName"] ?>">

    <input type="submit" value="Add User">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $user = ["firstName" => $_POST["firstname"], "lastName" => $_POST["lastname"]];
    if (!isset($_SESSION["users"])){
        $user["id"] = 1;
        $_SESSION["users"] = [$user];
    }
    else {
        $user["id"] = $_SESSION["users"][count($_SESSION["users"]) - 1]["id"] + 1;
        array_push($_SESSION["users"], $user);
    }
    header("Location: ./index.php");
}


