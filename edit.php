<?php include("./includes/header.php");
$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
$comic_id = $_GET['comic'];
$appliedSeries = ["noseries"];
$seriesOptions = "";

foreach ($obj as $key => $value) {
    if ($value->_id == $comic_id) {
        $comic_title = $value->title;
        $comic_date = $value->date;
        $comic_pages = $value->date;
        $comic_thumbnail = $value->thumbnail;
        $comic_series = $value->series;
    }
}
foreach ($obj as $key => $value) {
    if (!in_array($value->series, $appliedSeries)) {
        array_push($appliedSeries, $value->series);
        $seriesOptions .= "<option";
        if ($value->series == $comic_series) {
            $seriesOptions .= " selected";
        }
        $seriesOptions .= ">";
        $seriesOptions .= $value->series;
        $seriesOptions .= "</option>";
    }
}
$seriesOptions .= "<option class='newSeriesOption' value='newseries'>new series</option>";
?>
<title>Gambee - Editing <?php echo $comic_title ?></title>
</head>

<body>
    <h1>
        <?php echo $comic_title ?>
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        foreach ($obj as $key => $value) {
            if ($value->_id == $comic_id) {
                echo "<div id='title'><label>Title: </label><input value='" . $comic_title . "'></input></div>";
                echo "<div id='date'><label>Date: </label><input type='date' value='" . $comic_date . "'></input></div>";
                echo '<div id="series"><label>Series: </label><select onchange="changeValue(event)">' . $seriesOptions . '</select></div>';
                echo '<div id="newSeriesWrap" hidden><label>New Series Title</label> <input id="newSeries" /></div>';
                echo "<div id='thumb'><label>Thumbnail: </label><img src='" . $comic_thumbnail . "'></div>";
                echo "<div id='pages'><label>Pages: </label>" . $comic_pages . "</div>";
            }
        }
        ?>
        <input type="submit">
    </form>
    <button onclick="deleteFunction()">Delete</button>
</body>

<script>
    function changeValue() {
        document.querySelector("#newSeriesWrap").hidden = document.querySelector("#series select").value != "newseries"
    }

    function deleteFunction() {
        if (confirm("Are you sure you want to delete <?php echo $comic_title ?>")) {
            if (confirm("Are you REALLY sure you want to delete <?php echo $comic_title ?>?")) {
                console.log("fck")
            }
        }
    }

</script>

</html>