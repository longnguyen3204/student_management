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
                            <button class="btn btn-success border shadow-sm" onclick="window.location.href='add-course-code.php'">Thêm môn học</button> <!-- link to add course page -->
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> <?= htmlspecialchars('ID') ?> </th>
                                    <th> <?= htmlspecialchars('Môn học') ?> </th>
                                    <th> <?= htmlspecialchars('Chỉnh sửa') ?> </th>
                                    <th> <?= htmlspecialchars('Hành động') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                            <?php foreach ($courses as $course):?>
                                <tr>
                                    <td> <?= htmlspecialchars($course['id']) ?> </td>
                                    <td> <?= htmlspecialchars($course['course_name']) ?> </td>

                                    <td><button class="btn btn-info btn-sm" onclick="window.location.href='edit-course-code.php?id=<?=$course['id']?>?'">Cập nhật</button></td> <!-- link to edit course page -->

                                    <td>
                                        <form action="delete-course-code.php" method="post">
                                            <input type="hidden" name="id" value="<?= $course['id'] ?>">
                                            <button type="submit" name="btn_delete_course" class="btn btn-danger btn-sm">Xóa</button> <!-- delete course button -->
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