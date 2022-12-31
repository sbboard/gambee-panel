<?php include("./includes/header.php");
$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
$comic_id = $_GET['comic'];
$appliedSeries = ["noseries"];
$seriesOptions = "<option value='noseries'></option>";

foreach ($obj as $key => $value) {
    if (!in_array($value->series, $appliedSeries)) {
        array_push($appliedSeries, $value->series);
        $seriesOptions .= "<option>";
        $seriesOptions .= $value->series;
        $seriesOptions .= "</option>";
    }
    if ($value->_id == $comic_id) {
        $comic_title = $value->title;
        $comic_date = $value->date;
        $comic_pages = $value->date;
        $comic_thumbnail = $value->thumbnail;
        $comic_series = $value->date;
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
    <?php
    foreach ($obj as $key => $value) {
        if ($value->_id == $comic_id) {
            echo "<div id='title'><label>Title: </label><input disabled value='" . $comic_title . "'></input><button onclick='editClick(\"title\")'>Edit</button></div>";
            echo "<div id='date'><label>Date: </label><input type='date' disabled value='" . $comic_date . "'></input><button onclick='editClick(\"date\")'>Edit</button></div>";
            echo '<div id="series"><label>Series: </label><select disabled data-rownum="' . $key . '" data-current="' . $comic_series . '">' . $seriesOptions . '</select><button onclick="editClick(\'series\')">Edit</button></div>';
            echo "<div id='thumb'><label>Thumbnail: </label><img src='" . $comic_thumbnail . "'></div>";
            echo "<div id='pages'><label>Pages: </label>" . $comic_pages . "</div>";
        }
    }
    ?>
</body>

<script>
    let currentClicked = ""
    let oldData = ""
    function editClick(field) {
        const parent = document.querySelector(`#${field}`);
        const input = parent.querySelector("input") || parent.querySelector("select");
        if (currentClicked != field) {
            if (currentClicked != "") {
                if (confirm(`Forget Changes to ${currentClicked}?`)) stopEdit(false)
                else return;
            }
            currentClicked = field
            oldData = input.value
            parent.querySelector("button").innerHTML = "Update";
            input.disabled = false;
        }
        else {
            stopEdit(true)
        }
    }

    function stopEdit(saved) {
        const parent = document.querySelector(`#${currentClicked}`);
        const input = parent.querySelector("input") || parent.querySelector("select");
        parent.querySelector("button").innerHTML = "Edit";
        input.disabled = true
        activeEdit = false
        currentClicked = ""
        if (!saved) input.value = oldData
    }

</script>

</html>