<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Check if there is a status message in the session and display it -->
            <?php
                    if (isset($_SESSION['status'])) {
                        ?>
                        <div class="alert alert-success">
                            <h5><?php echo $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data"> <!-- Edit post form -->
                    <input type="hidden" name="notification_id" value="<?=htmlspecialchars($notification['id'], ENT_QUOTES, 'UTF-8'); ?>"> <!-- hidden post id -->

                    <div class="mb-3">
                        <label for="notification_title" class="form-label"><h4>Edit post title:</h4></label><br> <!-- Input to edit post title -->
                        <input type="text" name="notification_title" class="form-control" value="<?=htmlspecialchars($notification['notification_title'], ENT_QUOTES, 'UTF-8')?>"> 
                    </div>

                    <div class="mb-3">
                        <label for="notification_text" class="form-label"><h4>Edit post content here:</h4></label><br> <!-- Input to edit post text -->
                        <textarea name="notification_text" class="form-control" id="post_text" rows="10" cols="40"><?=htmlspecialchars($notification['notification_text'], ENT_QUOTES, 'UTF-8')?></textarea>
                    </div>

                    <button type="submit" name="btn_save"  class="btn btn-primary">Save Post</button> <!-- Save post buttons -->
                    <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='noti-manage-code.php'">Cancel</button> <!-- Cancel post buttons -->
                </form>
            </div>
        </div>
    </div>
</div>