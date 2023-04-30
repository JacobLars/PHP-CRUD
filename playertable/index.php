<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <label>Name: </label>
            <input type="text" name="name">
            <label>Age: </label>
            <input type="number" name="age">
            <label>Club: </label>
            <input type="text" name="club">
            <label>Position: </label>
            <input type="text" name="position">
            <label>Nationality: </label>
            <input type="text" name="nationality">
            <input type="submit" value="Add Player">
        </form>

        <?php include 'playerManagement.php'; ?>
    </main>
</body>

</html>