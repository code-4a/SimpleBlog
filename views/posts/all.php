
        <div class="content-left">
        <?php 
        foreach ($items as $item): ?>    
            <div class="content-left-post">
                <h2><?= $item->caption ?></h2>
                <p>
                    <?= $item->text ?>
                </p>
                <a href="index.php?r=posts-one&id=<?= $item->id ?>">
                        Полностью
                    </a>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="content-right">
            <ul class="menu">
                <li><a href="index.php?auth">Войти</a></li>
                <?php //if (Auth::isLogged()): ?>
                <li><a href="index.php?r=posts-add">Добавить новость</a></li>
                <?php //endif; ?>
                <li><a href="index.php?r=posts-find">Поиск</a></li>
            </ul>
        </div>


