<?php require_once 'functions.php'?>
<?php include_once 'inc/header.php'; ?>
        <div class="text-white p-2">
            <form action="add-more.php" method="post" enctype="multipart/form-data" class="main-form">
                <div class="form-group">
                    <input type="file" name="primaryImg" id="primaryImg" style="display: none;">
                    <label for="waterMark" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Add More</label>
                    <input type="file" name="waterMark" id="waterMark" style="display: none;" required>
                </div>
                <div class="form-group">
                    <select name="position" id="position" class="btn btn-outline-primary">
                        <option value="center">Center</option>
                        <option value="topLeft">Top Left</option>
                        <option value="topRight">Top Right</option>
                        <option value="bottomLeft">Bottom Left</option>
                        <option value="bottomRight">Bottom Right</option>
                    </select>
                    <input type="number" name="size" id="size" step="0.01" value="1" class="btn btn-outline-primary" required>
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary">
            </form>
        </div>
        <div class="output">
            <img src="<?php echo $output; ?>" alt="output">
        </div>

        <div class="d-flex justify-content-between p-2">
                <form method="post" action="delete.php">
                    <input type="hidden" value="<?php echo $primaryImgPath ; ?>" name="primaryImgPath" />
                    <input type="hidden" value="<?php echo $waterMarkPath; ?>" name="waterMarkPath" />
                    <input type="hidden" value="<?php echo $output; ?>" name="deleteImg" />
                    <input type="submit" value="Delete" id="delete" class="btn btn-outline-danger"/>
                </form>
            <a href="<?php echo $out?>" download class="btn btn-outline-primary"><i class="fa fa-download"></i> Download</a>
        </div>

<?php include_once 'inc/footer.php'; ?>