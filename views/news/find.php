<html>
    <header>
        <title>Поиск</title>
        <meta charset="utf-8">
    </header>
    <body>
        <a href="index.php">На главную</a><br>
        <form action="index.php?find" method="post">
            <label>Заголовок или часть заголовка:</label><br>
            <input type="text" name="caption">
            <br>
            <input type="submit" value="Отправить" />
        </form>
        <br><br>
        <table>
        <?php foreach ($this->items as $item): ?>
            <tr>
                <td><?= $item->caption; ?></td>
                <td><a href="index.php?id=<?= $item->id; ?>">Просмотр</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </body>
</html>




