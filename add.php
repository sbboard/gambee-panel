<?php include("./includes/header.php");
$json = file_get_contents("./dummy.json");
$obj = json_decode($json);
$appliedSeries = ["noseries"];
$seriesOptions = "<option value='noseries'></option>";

foreach ($obj as $key => $value) {
    if (!in_array($value->series, $appliedSeries)) {
        array_push($appliedSeries, $value->series);
        $seriesOptions .= "<option>";
        $seriesOptions .= $value->series;
        $seriesOptions .= "</option>";
    }
}
$seriesOptions .= "<option class='newSeriesOption' value='newseries'>new series</option>";
?>
<title>Gambee - Add Comic</title>
</head>

<body>
    <h1>Add Comic</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Title*</label>
        <input name="title" required>
        <?php
        echo '<label>Series: </label><select onchange="changeValue(event)">' . $seriesOptions . '</select>';
        ?>
        <div id="newSeriesWrap" hidden>
            <label>New Series Title</label> <input id='newSeries' />
        </div>
        <label>Thumbnail*</label>
        <input type='file' name='img' accept="image/*">
        <div id="uploadBox">
            <label>Upload Pages</label>
            <input name="pages" type="file" multiple="multiple" accept="image/*" />
        </div>

        <input type="submit">
    </form>
</body>

<script>
    function changeValue(e) {
        document.querySelector("#newSeriesWrap").hidden = e.target.value != "newseries"
    }
</script>

</html>