<html>
    <header>
        <title>Изменить</title>
        <meta charset="utf-8">
    </header>
    <body>
        <form action="index.php?edit" method="post">
            <input type="hidden" name="id" value="<?= $this->item->id ?>">
            <label>Заголовок</label>
            <input type="text" name="caption" value="<?= $this->item->caption ?>">
            <br>
            <label>Текст</label><br>
            <textarea name="text">
                <?= $this->item->text ?>
            </textarea>
            <br>
            <input type="submit" value="Отправить" />
        </form>
    </body>
</html>


