
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
                        <form action="" method="post"> <!-- add course form -->
                            <div class="form-group mb-3">
                                <label for="course_name">Tên môn học: </label>
                                <input type="text" name="course_name" class="form-control"> <!-- course name input -->
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="btn_add_course" class="btn btn-primary">Thêm môn học</button> <!-- add course button -->
                                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='course-manage-code.php'">Hủy</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

