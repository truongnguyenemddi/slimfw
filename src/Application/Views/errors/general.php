<div style="text-align: center; padding: 100px 20px;">
    <h1 style="font-size: 72px; color: #dee2e6;">500</h1>
    <h2 style="color: #343a40;">Đã có lỗi xảy ra!</h2>
    <p style="color: #6c757d; max-width: 500px; margin: 0 auto 20px;">
        Hệ thống đang gặp sự cố kỹ thuật ngoài ý muốn. Chúng tôi đã ghi nhận và đang tiến hành khắc phục.
    </p>
    
    <?php if (isset($debug_message) && $debug_message): ?>
        <div style="background: #fff5f5; color: #c92a2a; padding: 15px; border-radius: 4px; display: inline-block; text-align: left; margin-bottom: 20px; border: 1px solid #ffc9c9;">
            <strong>Debug info:</strong> <code><?= htmlspecialchars($debug_message) ?></code>
        </div>
    <?php endif; ?>

    <br>
    <a href="/" style="display: inline-block; padding: 10px 20px; background: #228be6; color: white; text-decoration: none; border-radius: 4px;">Quay về Trang chủ</a>
</div>