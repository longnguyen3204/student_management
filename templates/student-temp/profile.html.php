<head>
    <link rel="stylesheet" href="../../assets/css/style1.css">
</head>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        <h5>THÔNG TIN SINH VIÊN</h5>
                    </div>
                    <div class="card-body">
                    <form action="" method="post">
                        <?php foreach($accounts as $account): ?>
                            <div class="form-group mb-3">
                                <label for="id">Mã sinh viên: </label>
                                <input type="text" name="id" class="form-control" disabled value="<?=htmlspecialchars($account['id'])?>"> <!-- email input -->
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="name">Họ tên: </label>
                                <input type="text" name="name" class="form-control"  value="<?=htmlspecialchars($account['username'])?>" disabled> <!-- email input -->
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="name">Giới tính: </label>
                                <input type="text" name="gender" class="form-control" value="<?=htmlspecialchars($account['gender'])?>" disabled> <!-- password input -->
                            </div>
                            
                            
                            <div class="form-group mb-3">
                                <label for="name">Email: </label>
                                <input type="email" name="email" class="form-control" value="<?=htmlspecialchars($account['email'])?>" disabled> <!-- password input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Số điện thoại: </label>
                                <input type="text" name="phone" class="form-control" value="<?=htmlspecialchars($account['phone'])?>" disabled> <!-- password input -->
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Lớp chuyên ngành: </label>
                                <input type="text" name="class" class="form-control" value="<?=htmlspecialchars($account['class_name'])?>" disabled > <!-- email input -->
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='edit-profile-code.php?id=<?=$account['id']?>'">Cập nhật thông tin cá nhân </button> <!-- sign in button -->
                            </div>
                        <?php endforeach; ?>    
                        </form>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
