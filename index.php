<?php session_start(); ?>
<?php
function dump($el) {
    print "<pre>";
    print_r($el);
    print "</pre>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
dump($_SESSION["users"]);
if (isset($_SESSION["users"])){
    print "<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Actions</th>
    </tr>";
    foreach($_SESSION["users"] as $user)
    {
        print "<tr>";
        foreach ($user as $key => $col){
            if ($key == "id") continue;
            print "<td>{$col}</td>";
        }
        print "<td>";
        print "<a href='./user_form.php?id={$user["id"]}'>Edit</a>";
        print "</td>";

        print "</tr>";
    }
    print "</table>";
}
else {
    print "<h1>No Users</h1>";
}
?>
<form action="./user_form.php" method="GET">
    <input type="submit" value="Add new user">
</form>
</body>
</html>


