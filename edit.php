<?php include("./includes/header.php");
$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
$comic_id = $_GET['comic'];
$appliedSeries = ["noseries"];

foreach ($obj as $key => $value) {
    if (!in_array($value->series, $appliedSeries)) {
        array_push($appliedSeries, $value->series);
    }
    if ($value->_id == $comic_id) {
        $comic_title = $value->title;
        $comic_date = $value->date;
        $comic_pages = $value->date;
        $comic_thumbnail = $value->date;
        $comic_series = $value->date;
    }
}
?>
<title>Gambee - Editing <?php echo $comic_title ?></title>
</head>

<body>
    <h1>
        <?php echo $comic_title ?>
    </h1>
    <?php
    foreach ($obj as $key => $value) {
        if ($value->_id == $comic_id) {
            echo "<tr>";
            echo "<td><img class='thumbnail' src='" . $value->thumbnail . "' alt='" . $value->title . " thumbnail'/></td>";
            echo "<td data-namenum=" . $key . " data-id=" . $value->_id . ">" . $value->title . "</td>";
            echo "<td>" . $value->date . "</td>";
            echo "<td>" . $value->series . "</td>";
            echo "<td><a href='edit.php?comic=" . $value->_id . "'>Edit</a></td>";
            echo "</tr>";
        }
    }
    ?>
</body>

</html>