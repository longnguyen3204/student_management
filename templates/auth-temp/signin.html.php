<?php
if(isset($_SESSION['authenticated'])){
    $_SESSION['status'] = 'Bạn đã đăng nhập!';
    header('Location: index.php');
    exit(0);
}
?>

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
                        <h5>Đăng nhập</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post"> <!-- sign in form -->

                            <div class="form-group mb-3">
                                <label for="name">Email: </label>
                                <input type="email" name="email" class="form-control" placeholder="abc@gmail.com"> <!-- email input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Mật khẩu: </label>
                                <input type="password" name="password" class="form-control" placeholder=""> <!-- password input -->
                            </div>

                            <div class="form-group">
                                <button type="submit" name="btn_sign_in" class="btn btn-primary">Đăng nhập</button> <!-- sign in button -->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



