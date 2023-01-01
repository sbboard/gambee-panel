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

//INSERT INTO `comics` (`title`, `date`, `pages`, `thumbnail`, `series`, `_id`) VALUES ('comic 1', '2001-03-15', '[\"https://gang-fight.com/assets/comics/CactusCityOasis/1.png\"]', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToAfsPC5qBsqMS4AzAd8Dfvrlbq-gHA7Kn47_jbk4MvmGZWvhV-VkTo7xA-rp2Iq4aXYk&usqp=CAU', 'pheno', '1');
?>
<title>Gambee - Add Comic</title>
</head>

<body>
    <h1><a onclick="goHome()">Home</a> / Add Comic</h1>
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

    function goHome() {
        if (confirm("Go Home? Any unsaved progress will be lost.")) {
            window.location.href = './'
        }
    }
</script>

</html>