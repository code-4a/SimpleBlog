
        <div class="content-left">
            <div class="content-left-post">
                <h2><?= $item->caption ?></h2>
                <p>
                    <?= $item->text ?>
                </p>
            </div>
        </div>
        <div class="content-right">
            <ul class="menu">
                <?php //if (Auth::isLogged()): ?>
                <li><a href="index.php?r=posts-edit&id=<?= $item->id ?>&edit">Редактировать</a></li>
                <li><a href="index.php?r=posts-delete&id=<?= $item->id ?>">Удалить</a></li>
                <?php //endif; ?>
            </ul>
        </div>
