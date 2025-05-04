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
            <form action="" method="post" enctype="multipart/form-data">  <!-- Add Notification form -->

                <div class="mb-3">
                    <label for="notification_title" class="form-label"><h4>Tiêu đề:</h4></label><br> <!-- Notification Title input -->
                    <input type="text" name="notification_title" class="form-control" id="notification_title">
                </div>

                <div class="mb-3">
                    <label for="notification_text" class="form-label"><h5>Nội dung:</h5></label> <!-- Notification Content input -->
                    <textarea name="notification_text" class="form-control" id="exampleFormControlTextarea1" rows="10" cols="40"></textarea>
                </div>

                <button type="submit" name="btn_add_notification"  class="btn btn-primary">Thêm thông báo</button>
                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='noti-manage-code.php'">Hủy</button>  <!-- Add notification button -->
            </form>

            </div>
        </div>
    </div>
</div>