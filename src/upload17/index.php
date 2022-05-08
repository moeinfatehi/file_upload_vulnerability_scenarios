
<!DOCTYPE html>
<html>
<head>
    <title>File upload</title>
    </head>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <h1>File upload</h1>
        </div>
        <div class="row">
            <p class="lead">
                Restriction: file size (Extra security)<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="20" />
                <input type="file" id="fileToUpload" name="fileToUpload" required>
                <input type="submit" value="Upload" class="form-control btn btn-default" name="submit">
            </div>
        </form>
    </div>

    <?php
    $target_dir = "uploads/";
    
    $max_size = 128;
    if(isset($_POST["submit"])) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if ($_FILES["fileToUpload"]["size"] > $max_size) {
            echo "<p class=\"alert-danger\">Exceeded filesize limit.<br>Allowed file size: $max_size bytes</p>";
        }
        else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<p class=\"alert-success\">The file has been uploaded here: <a href=\"$target_file\">$target_file</a>.</p>";
            } else {
                if ($_FILES["fileToUpload"]["error"]==2){   //MAX_FILE_SIZE html parameter
                    echo "<p class=\"alert-danger\">Sorry, File size is greater than MAX_FILE_SIZE.</p>";
                }
                else{
                    echo "<p class=\"alert-danger\">Sorry, there was an error uploading your file.</p>";
                }
            }
        }
    }
    ?>
    <script type="text/javascript" src="/static/css/bootstrap.min.js"></script>
</body>
</html>
<?php
include ("../footer.php");
?>