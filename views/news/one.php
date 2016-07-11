
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="views/news/theme.css">
</head>
<body>
    <div class="page">
        <div class="content-left">
            <div class="content-left-post">
                <h2><?= $this->item->caption ?></h2>
                <p>
                    <?= $this->item->text ?>
                </p>
            </div>
        </div>
        <div class="content-right">
            <ul class="menu">
                <?php if (Auth::isLogged()): ?>
                <li><a href="index.php?id=<?= $this->item->id ?>&edit">Редактировать</a></li>
                <li><a href="index.php?id=<?= $this->item->id ?>&delete">Удалить</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>
</html>

