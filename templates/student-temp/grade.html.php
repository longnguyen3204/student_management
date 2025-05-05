<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
                                    <th> <?= htmlspecialchars('Điểm') ?> </th>
                                    <th> <?= htmlspecialchars('Tên môn') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                <?php foreach ($grades as $grade):?>
                                <tr>
                                <blockquote>
                                    <td> <?= htmlspecialchars($grade['id']) ?> </td>
                                    <td> <?= htmlspecialchars($grade['grade']) ?> </td>
                                    <td> <?= htmlspecialchars($grade['course_name']) ?> </td>   
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