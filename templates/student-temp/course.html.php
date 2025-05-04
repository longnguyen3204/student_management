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
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> <?= htmlspecialchars('ID') ?> </th>
                                    <th> <?= htmlspecialchars('Course') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                            <?php foreach ($courses as $course):?>
                                <tr>
                                <blockquote>
                                    <td> <?= htmlspecialchars($course['id']) ?> </td>
                                    <td> <?= htmlspecialchars($course['course_name']) ?> </td>
                                </blockquote>
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