    <?php echo Form::open(array('action' => "member/post/update/{$postId}", 'method' => 'post')); ?>
    <section class="form ctn-form">
      <h1>編集ページ</h1>
      <?php echo Form::open(array('action' => 'member/post/save', 'method' => 'post')); ?>
      <div>
          <label>タイトル<br>
            <input type="text" name="title" value="<?php echo $title ?>" >
          </label>
          <label>内容<br>
            <textarea cols="30" rows="3" name="thought" ><?php echo $thought ?></textarea>
          </label>
       </div>
      <?php echo Form::submit('post','更新'); ?>
      <?php
            echo html_tag('a', array(
                'href' => Uri::create("member/post"),
            ), 'マイページへ戻る');
        ?>

      <?php echo Form::close(); ?>
    </section>
