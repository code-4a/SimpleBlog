
        <div class="content-left">
            <form action="index.php?r=posts-edit" method="post">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <table>
                    <tr>
                        <td>
                            <label>Заголовок</label>
                        </td>
                        <td>
                            <input type="text" name="caption" value="<?= $item->caption ?>" size="60">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Текст</label>
                        </td>
                        <td>
                            <textarea name="text" cols="60" rows="10"><?= $item->text ?></textarea>
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

