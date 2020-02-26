<div class="ctn-main">
    <section class="ctn-form">
        <h1>ログイン</h1>
        <?= $error ?>
        <?php
            if(!empty($error)):

        ?>
            <ul class="area-error-msg">
        <?php
            foreach ($error as $key => $val):
        ?>
            <li><?=$val?></li>
        <?php
            endforeach;
        ?>
                </ul>
        <?php
            endif;
        ?>
        <?=$loginform?>
    </section>
</div>
