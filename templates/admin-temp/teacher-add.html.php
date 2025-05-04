
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
                        <h5>Thêm tài khoản</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post"> <!-- add user form  -->
                            <div class="form-group mb-3">
                                <label for="username">Tên tài khoản: </label>
                                <input type="text" name="username" class="form-control" placeholder="Huong"> <!-- username input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Email: </label>
                                <input type="email" name="email" class="form-control" placeholder="abc@gmail.com"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Mật khẩu: </label>
                                <input type="password" name="password" class="form-control" placeholder=""> <!-- password input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Xác nhận mật khẩu: </label>
                                <input type="password" name="confirm_password" class="form-control" placeholder=""> <!-- confirm password input -->
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="btn_add_teacher" class="btn btn-primary">Thêm giảng viên</button> <!-- add new user button -->
                                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='teacher-manage-code.php'">Hủy</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

