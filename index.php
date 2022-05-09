<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if (isset($_SESSION["users"])){
    print "<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>";
    foreach($_SESSION["users"] as $user)
    {
        print "<tr>";
        foreach ($user as $col){
            print "<td>{$col}</td>";
        }
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


