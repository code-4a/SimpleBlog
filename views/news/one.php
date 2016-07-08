<html>
    <header>
        <title>Запись</title>
        <meta charset="utf-8">
    </header>
    <body>
        <h3><?= $this->item->caption ?></h3>
        <br><br>
        <?= $this->item->text ?>
        <br><br>
        <a href="index.php?id=<?= $this->item->id ?>&edit">Редактировать</a>
        <br>
        <a href="index.php?id=<?= $this->item->id ?>&delete">Удалить</a>
    </body>
</html>

