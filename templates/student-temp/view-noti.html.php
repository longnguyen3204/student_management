<table>
    <?php foreach ($notifications as $notification): ?>
        <tr>
            <td>
                <h2 style="color: blue;">
                    <?= htmlspecialchars($notification['notification_title']) ?>
                </h2>
                <p style="font-size: 11px;">
                    <strong>Đăng bởi:</strong> <?= htmlspecialchars($notification['username']) ?> <br>
                    <strong>Thời gian:</strong> <?= htmlspecialchars($notification['notification_date']) ?>
                </p>
                <hr style="border: 1px solid black;">
                <div style="font-size: 20px;">
                    <?= nl2br(trim(htmlspecialchars($notification['notification_text']))) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
