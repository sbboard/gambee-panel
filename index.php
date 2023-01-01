<?php include("./includes/header.php");
//$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
usort($obj, function ($a, $b) {
    return strcmp($a->date, $b->date);
});

?>
<title>Gambee - Home</title>
</head>

<body>
    <h1>Gambee - Simple Comic Manager</h1>
    <a href="add.php">New Comic</a>
    <table>
        <tr>
            <th>thumb</th>
            <th>title</th>
            <th>date</th>
            <th>series</th>
            <th></th>
        </tr>
        <?php
        foreach ($obj as $key => $value) {
            echo "<tr>";
            echo "<td><img class='thumbnail' src='" . $value->thumbnail . "' alt='" . $value->title . " thumbnail'/></td>";
            echo "<td data-namenum=" . $key . " data-id=" . $value->_id . ">" . $value->title . "</td>";
            echo "<td>" . $value->date . "</td>";
            echo "<td>" . $value->series . "</td>";
            echo "<td><a href='edit.php?comic=" . $value->_id . "'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>