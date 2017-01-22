  <!-- 40 페이지 -->
<?php $this->setPageTitle('title', '계정 생성') ?>
  <div class="title">
      A.
  </div>
  <div class="bigFake"></div>
  <div class="sign_form">
<form action="<?php print $base_url; ?>/account/register" method="post">
  <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>"/>
  <!-- View클래스의 escape() -->

  <?php if(isset($errors) && count($errors) > 0): ?>
  <?php print $this->render('errors', array('errors' => $errors)); ?>
  <?php endif; ?>

  <?php print $this->render('account/inputs', array('user_name' => $user_name, 'password' => $password, )); ?>
    <div class="fake"></div>
    <p class="start_Btn">
      <input class="in_Btn" type="submit" value="시작하기" />
  </p>
</form>
  </div>
