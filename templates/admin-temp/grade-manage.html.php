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
                            <button class="btn btn-success border shadow-sm" onclick="window.location.href='add-grade-code.php'">Thêm điểm</button> <!-- link to add user page -->
                        </div>
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr> 
                                    <th> <?= htmlspecialchars('ID') ?> </th>
                                    <th> <?= htmlspecialchars('Điểm') ?> </th>
                                    <th> <?= htmlspecialchars('Tên sinh viên') ?> </th>
                                    <th> <?= htmlspecialchars('Tên môn học') ?> </th>
                                    <th> <?= htmlspecialchars('Chỉnh sửa') ?> </th>
                                    <th> <?= htmlspecialchars('Hành động') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                            <?php foreach ($grades as $grade):?>
                                <tr>
                                    <td> <?= htmlspecialchars($grade['id']) ?> </td>
                                    <td> <?= htmlspecialchars($grade['grade']) ?> </td>
                                    <td> <?= htmlspecialchars($grade['username']) ?> </td>
                                    <td> <?= htmlspecialchars($grade['course_name']) ?> </td>
        
                                    <td><button class="btn btn-info btn-sm" onclick="window.location.href='edit-grade-code.php?id=<?=$grade['id']?>'">Cập nhật</button></td> <!-- link to edit user page -->

                                    <td>
                                        <form action="delete-grade-code.php" method="post">
                                            <input type="hidden" name="id" value="<?= $grade['id'] ?>">
                                            <button type="submit" name="btn_delete_grade" class="btn btn-danger btn-sm">Xóa</button> <!-- delete user button -->
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