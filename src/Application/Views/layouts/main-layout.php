<!DOCTYPE html>
<html lang="vi">
<head>
    <title><?= $title ?? 'Hệ thống' ?></title>
    </head>
<body>
    <?php echo $this->fetch('common/header.php'); ?>

    <main>
        <?= $content ?> 
    </main>

    <?php echo $this->fetch('common/footer.php'); ?>
</body>
</html>