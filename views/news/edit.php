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
            <form action="index.php?edit" method="post">
                <input type="hidden" name="id" value="<?= $this->item->id ?>">
                <table>
                    <tr>
                        <td>
                            <label>Заголовок</label>
                        </td>
                        <td>
                            <input type="text" name="caption" value="<?= $this->item->caption ?>" size="60">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Текст</label>
                        </td>
                        <td>
                            <textarea name="text" cols="60" rows="10">
                                <?= $this->item->text ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" value="Отправить" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
         <div class="content-right">
            <ul class="menu">
                <li><a href="index.php">На главную</a></li>
            </ul>
        </div>
    </div>
</body>
</html>


