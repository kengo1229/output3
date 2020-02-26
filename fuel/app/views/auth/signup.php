<div class="ctn-main">
    <section class="ctn-form">
        <h1>会員登録</h1>
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
        <?=$signupform?>
    </section>
</div>
