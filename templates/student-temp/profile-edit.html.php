
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
                    <div class="card-header">
                        <h5>Chỉnh sửa thông tin cá nhân</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post"> <!-- profile edit form -->
                            <input type="hidden" name="profile_id" value="<?=htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>"> <!-- hidden account id -->

                            <div class="form-group mb-3">
                                <label for="name">Họ tên: </label>
                                <input type="text" name="new_name" class="form-control"  value="<?=htmlspecialchars($account['username'])?>"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Email: </label>
                                <input type="email" name="new_email" class="form-control" value="<?=htmlspecialchars($account['email'])?>" > <!-- password input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Số điện thoại: </label>
                                <input type="text" name="new_phone" class="form-control" value="<?=htmlspecialchars($account['phone'])?>" > <!-- password input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Giới tính: </label>
                                <input type="text" name="new_gender" class="form-control" value="<?=htmlspecialchars($account['gender'])?>" > <!-- password input -->
                            </div>

                            <div class="form-group">
                                <button type="submit" name="btn_edit_profile" class="btn btn-primary" >Cập nhật</button> <!-- sign in button -->
                                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='profile-code.php'">Hủy</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
