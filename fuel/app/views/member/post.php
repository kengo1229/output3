  <!-- フォーム部分 -->
  <section class="form ctn-form">
    <h1>マイページ</h1>
    <?php echo Form::open(array('action' => 'member/post/save', 'method' => 'post')); ?>
    <div>
        <label>タイトル<br>
          <input type="text" name="title" value="" />
        </label>
        <label>内容<br>
          <textarea cols="30" rows="3" name="thought" ></textarea>
        </label>
     </div>
    <?php echo Form::submit('post','投稿'); ?>
    <?php echo Form::close(); ?>
  </section>

<section>
  <?php foreach($posts as $key => $val): ?>
    <div class="container ctn-form">
      タイトル
      <div class="container-head">
        <?php echo $val['title']; ?>
      </div>
      内容
      <div class="container-body">
        <?php echo $val['thought']; ?>
      </div>
      <div class="container-foot float-right">
        作成日<br>
        <?php echo $val['updated_at']; ?><br>
        <div class="float-right-right">
            <?php
                  echo html_tag('a', array(
                      'href' => Uri::create("member/post/update/{$val['id']}"),
                  ), '編集');
              ?>
              <?php
                    echo html_tag('a', array(
                        'href' => Uri::create("member/post/delete/{$val['id']}"),
                    ), '削除');
                ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>
