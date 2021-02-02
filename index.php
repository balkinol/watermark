
<?php include_once 'inc/header.php'; ?>
        <div class="text-dark p-2">
            <form action="add-more.php" method="post" enctype="multipart/form-data" class="main-form">
                <div class="form-group">
                    <label for="primaryImg" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Primary</label>
                    <input type="file" name="primaryImg" id="primaryImg" style="display: none;" required>
                    <label for="waterMark" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Watermark</label>
                    <input type="file" name="waterMark" id="waterMark" style="display: none;" required>
                </div>
                <div class="form-group">
                    <select name="position" class="btn btn-outline-primary">
                        <option value="center">Center</option>
                        <option value="topLeft">Top Left</option>
                        <option value="topRight">Top Right</option>
                        <option value="bottomLeft">Bottom Left</option>
                        <option value="bottomRight">Bottom Right</option>
                    </select>
                    <input type="number" name="size" step="0.01" value="1" class="btn btn-outline-primary" required>
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary w-sm-100">
            </form>
        </div>

        <?php require_once 'functions.php'?>

<?php include_once 'inc/footer.php'; ?>