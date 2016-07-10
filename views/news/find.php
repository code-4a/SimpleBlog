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
            <form action="index.php?find" method="post">
                <label>Заголовок:</label>
                <input type="text" name="caption">
                <br><br>
                <div align="right">
                <input type="submit" value="Отправить" />
                </div>
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
        </div>
        <div class="content-right">
            <ul class="menu">
                <li><a href="index.php">На главную</a></li>
            </ul>
        </div>
    </div>
</body>
</html>




