<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
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
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <button class="btn btn-success border shadow-sm" onclick="window.location.href='add-noti-code.php'">Thêm thông báo</button> <!-- link to add user page -->
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr> 
                                    <th> <?= htmlspecialchars('Tiêu đề') ?> </th>
                                    <th> <?= htmlspecialchars('Nội dung') ?> </th>
                                    <th> <?= htmlspecialchars('Đăng bởi') ?> </th>
                                    <th> <?= htmlspecialchars('Thời gian') ?> </th>
                                    <th> <?= htmlspecialchars('Chỉnh sửa') ?> </th>
                                    <th> <?= htmlspecialchars('Thực hiện') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                            <?php foreach ($notifications as $notification):?>
                                <tr>
                                    <td> <?= htmlspecialchars($notification['notification_title']) ?> </td>
                                    <td> <?= htmlspecialchars($notification['notification_text']) ?> </td>
                                    <td> <?= htmlspecialchars($notification['username']) ?> </td>
                                    <td> <?= htmlspecialchars($notification['notification_date']) ?> </td>
        
                                    <td><button class="btn btn-info btn-sm" onclick="window.location.href='edit-noti-code.php?id=<?=$notification['id']?>'">Cập nhật</button></td> <!-- link to edit user page -->

                                    <td>
                                        <form action="delete-noti-code.php" method="post">
                                            <input type="hidden" name="id" value="<?= $notification['id'] ?>">
                                            <button type="submit" name="btn_delete" class="btn btn-danger btn-sm">Xóa</button> <!-- delete user button -->
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>