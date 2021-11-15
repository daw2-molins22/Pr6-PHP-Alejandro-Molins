<?php
$db = mysqli_connect('localhost', 'root', 'alex') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
?>


<html>
 <head>
  <title>Commit People</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'people':
        $query = 'INSERT INTO
            people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("' . $_POST['people_fullname'] . '",
                 ' . $_POST['people_isactor'] . ',
                 ' . $_POST['people_isdirector'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE people SET
                people_fullname = "' . $_POST['people_fullname'] . '",
                people_isactor = ' . $_POST['people_isactor'] . ',
                people_isdirector = ' . $_POST['people_isdirector'] . '
            WHERE
                people_id = ' . $_POST['people_id'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
