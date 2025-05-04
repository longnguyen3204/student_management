
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
                        <h5>Thêm điểm</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post"> 
                            <div class="mb-3">
                                <label for="grade" class="form-label"><h4>Điểm:</h4></label><br> 
                                <input type="text" name="grade" class="form-control" id="grade" min="0" max="10">
                            </div>

                            <select name="student_name" class="form-select">
                                <option selected>Chọn sinh viên</option> 
                                <?php foreach ($accounts as $account):?>
                                    <option value="<?=htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?=htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8'); ?>    
                                    </option>
                                    <?php endforeach;?>
                            </select><br>

                            <select name="course_name" class="form-select">
                                <option selected>Chọn môn</option> 
                                <?php foreach ($courses as $course):?>
                                    <option value="<?=htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?=htmlspecialchars($course['course_name'], ENT_QUOTES, 'UTF-8'); ?>    
                                    </option>
                                    <?php endforeach;?>
                            </select><br>
                            
                            <div class="form-group">
                                <button type="submit" name="btn_add_grade" class="btn btn-primary">Thêm điểm</button> <!-- add course button -->
                                <button type="button" name="btn_cancel"  class="btn btn-secondary" onclick="window.location.href='grade-manage-code.php'">Hủy</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

