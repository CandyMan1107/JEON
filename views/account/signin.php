<!-- 39페이지 -->
<?php $this->setPageTitle('title', '로그인') ?>
<div class="title">
    ASMR MALL
</div>
<div class="bigFake"></div>
<div class="sign_form">
<!-- AccountController의 authenticateAction 메소드 -->
<form class="form-inline" action="<?php print $base_url; ?>/account/authenticate" method="post">
    <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
    <!-- /views/errors.php를 Rendering -->
    <?php if(isset($errors) && count($errors) > 0): ?>
        <?php print $this->render('errors', array('errors' => $errors)); ?>
    <?php endif; ?>
    <!-- /views/account/inputs.php를 Rendering -->
    <?php print $this->render('account/inputs', array('user_name' => $user_name, 'password' => $password,)); ?>
    <div class="fake"></div>
    <p class="start_Btn">
        <input class="in_Btn" type="submit" value="로그인">
    </p>
</form>
</div>
