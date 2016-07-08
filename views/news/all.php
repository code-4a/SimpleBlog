<html>
    <header>
        <title>Записи</title>
        <meta charset="utf-8">
    </header>
    <body>
        <table style="width:70%">
        <?php 
        foreach ($this->items as $item): ?>    
            <tr>
                <td><a href="index.php?id=<?= $item->id ?>">
                        <?= $item->caption ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <br><br>
        <a href="index.php?add">Добавить новость</a>
        <br>
        <a href="index.php?find">Поиск</a>
    </body>
</html>

