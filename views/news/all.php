
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
        <?php 
        foreach ($this->items as $item): ?>    
            <div class="content-left-post">
                <h2><?= $item->caption ?></h2>
                <p>
                    <?= $item->text ?>
                </p>
                <a href="index.php?id=<?= $item->id ?>">
                        Полностью
                    </a>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="content-right">
            <ul class="menu">
                <li><a href="index.php?auth">Войти</a></li>
                <?php if (Auth::isLogged()): ?>
                <li><a href="index.php?add">Добавить новость</a></li>
                <?php endif; ?>
                <li><a href="index.php?find">Поиск</a></li>
            </ul>
        </div>
    </div>
</body>
</html>

