
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
                            <input type="hidden" name="course_id" value="<?=htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8'); ?>"> <!-- hidden course id-->

                            <div class="form-group mb-3">
                                <label for="new_course" class="form-label">Chỉnh sửa tên môn học</label>
                                <input type="text" name="new_course" class="form-control" id="course" value="<?=htmlspecialchars($course['course_name'], ENT_QUOTES, 'UTF-8')?>"> <!-- course name input -->
                            </div>

                            <button type="submit" name="btn_edit_course"  class="btn btn-primary">Chỉnh sửa môn học</button> <!-- edit button -->
                            <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='course-manage-code.php'">Hủy</button> <!--link to course management -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
