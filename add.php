<?php include("./includes/header.php");
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

<body class="container">
    <h1><a onclick="goHome()">Home</a> / Add Comic</h1>
    <form action="./addScript.php" method="post" enctype="multipart/form-data">
        <label class="form-label">Title*</label>
        <input name="title" class="form-control" required>
        <?php
        echo '<label class="form-label">Series: </label><select class="form-control" onchange="changeValue(event)">' . $seriesOptions . '</select>';
        ?>
        <div id="newSeriesWrap" hidden>
            <label class="form-label">New Series Title</label> <input id='newSeries' />
        </div>
        <label class="form-label">Thumbnail*</label>
        <input class="form-control" type='file' name='img' accept="image/*">
        <div id="uploadBox">
            <label class="form-label">Upload Pages</label>
            <input class="form-control" name="pages" type="file" multiple="multiple" accept="image/*" />
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
</body>

<script>
    function changeValue(e) {
        document.querySelector("#newSeriesWrap").hidden = e.target.value != "newseries"
    }

    function goHome() {
        if (confirm("Go Home? Any unsaved progress will be lost.")) {
            window.location.href = './'
        }
    }
</script>

</html>