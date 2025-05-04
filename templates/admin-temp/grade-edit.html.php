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
                        <form action="" method="post"> <!-- course edit form -->
                            <input type="hidden" name="grade_id" value="<?=htmlspecialchars($grade['id'], ENT_QUOTES, 'UTF-8'); ?>"> <!-- hidden course id -->

                            <div class="form-group mb-3">
                                <label for="new_grade" class="form-label">Cập nhật điểm</label>
                                <input type="text" name="new_grade" class="form-control" id="grade" min="0" max="10" value="<?=htmlspecialchars($grade['grade'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label for="student_name" class="form-label">Chọn sinh viên</label><br>
                                <select name="student_name" class="form-select" style="width: 100%; max-width: 100%;">
                                    <option selected>Tên sinh viên</option> 
                                    <?php foreach ($accounts as $account):?>
                                        <?php if ($account['username'] == $grade['username']): ?>
                                            <option value="<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>" selected><?= htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8'); ?></option>
                                        <?php else: ?>
                                            <option value="<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <?= htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="course_name" class="form-label">Chọn môn</label><br>
                                <select name="course_name" class="form-select" style="width: 100%; max-width: 100%;">
                                    <option selected>Chọn tên môn</option> 
                                    <?php foreach ($courses as $course):?>
                                        <?php if ($course['course_name'] == $grade['course_name']): ?>
                                            <option value="<?= htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8'); ?>" selected><?= htmlspecialchars($course['course_name'], ENT_QUOTES, 'UTF-8'); ?></option>
                                        <?php else: ?>
                                            <option value="<?= htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <?= htmlspecialchars($course['course_name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="btn_edit_grade" class="btn btn-primary">Cập nhật điểm</button> <!-- edit button -->
                                <button type="button" name="btn_cancel" class="btn btn-secondary" onclick="window.location.href='grade-manage-code.php'">Hủy</button> <!-- link to grade management -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
