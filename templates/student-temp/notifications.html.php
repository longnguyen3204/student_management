<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
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
                                    <th> <?= htmlspecialchars('Tiêu đề') ?> </th>
                                    <th> <?= htmlspecialchars('Đăng bởi') ?> </th>
                                    <th> <?= htmlspecialchars('Thời gian') ?> </th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                            <?php foreach ($notifications as $notification):?>
                                <tr>
                                <blockquote>
                                    <td> <a href="view-noti-code.php?id=<?=htmlspecialchars($notification['id'])?>"> <?= htmlspecialchars($notification['notification_title']) ?> </a></td>
                                    <td> <?= htmlspecialchars($notification['username']) ?> </td>
                                    <td> <?= htmlspecialchars($notification['notification_date']) ?> </td>
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