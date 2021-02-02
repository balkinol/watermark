<?php require_once 'functions.php'?>
<?php include_once 'inc/header.php'; ?>
        <div class="text-white p-2">
            <form action="add-more.php" method="post" enctype="multipart/form-data" class="main-form">
                <div class="form-group">
                    <input type="file" name="primaryImg" id="primaryImg" style="display: none;">
                    <label for="waterMark" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Add More</label>
                    <input type="file" name="waterMark" id="waterMark" style="display: none;">
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
                <div class="form-group">
                    <input type="submit" value="Undo" name="undo" class="btn btn-outline-info">
                    <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
        <div class="output">
            <?php if($msg != '') : ?>
                <div class="alert <?php echo $msgClass ; ?>"><?php echo $msg ; ?></div>
            <?php endif; ?>
            <img src="<?php echo $output; ?>" class="<?php echo $imgClass; ?>" alt="output">
        </div>

        <div class="d-flex justify-content-between p-2">
                <form method="post" action="delete.php">
                    <input type="hidden" value="<?php echo $output; ?>" name="deleteImg" />
                    <input type="submit" value="Delete" class="btn btn-outline-danger"/>
                </form>
            <a href="<?php echo $out?>" download class="btn btn-outline-primary"><i class="fa fa-download"></i> Download</a>
        </div>

<?php include_once 'inc/footer.php'; ?>