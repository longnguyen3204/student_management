
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
                <div class="card shadow">
                    <div class="card-body">
                        <form action="" method="post"> <!-- user edit form -->
                            <input type="hidden" name="account_id" value="<?=htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>"> <!-- hidden account id -->

                            <div class="form-group mb-3">
                                <label for="new_username" class="form-label">Tài khoản</label>
                                <input type="text" name="new_username" class="form-control" id="username" value= "<?=htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8')?>"> <!-- username input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_email" class="form-label">Địa chỉ email</label>
                                <input type="email" name="new_email" class="form-control" id="email" value = "<?=htmlspecialchars($account['email'], ENT_QUOTES, 'UTF-8')?>"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_gender" class="form-label">Giới tính</label>
                                <input type="text" name="new_gender" class="form-control" id="gender" value = "<?=htmlspecialchars($account['gender'], ENT_QUOTES, 'UTF-8')?>"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_gender" class="form-label">Số điện thoại</label>
                                <input type="text" name="new_phone" class="form-control" id="phone" value = "<?=htmlspecialchars($account['phone'], ENT_QUOTES, 'UTF-8')?>"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="btn_edit_student"  class="btn btn-primary">Cập nhật</button> <!-- edit button -->
                                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='student-manage-code.php'">Hủy</button> <!-- cancel link to user manage page -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
