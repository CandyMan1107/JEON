<?php $this->setPageTitle('title','상품 등록') ?>
<script type="text/javascript" src="/js/addScript.js"></script>
<div class="smallFake"></div>
<div class="add_div">

<form action="<?php print $base_url; ?>/product/insert" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
<!--  form 으로 왔는지 안왔는지 확인  -->

    <!-- /views/errors.php를 Rendering -->
    <?php if(isset($errors) && count($errors) > 0): ?>
        <?php print $this->render('errors', array('errors' => $errors)); ?>
    <?php endif; ?>

    <!--     /views/product/addForm.php를 Rendering-->
    <?php print $this->render('product/addForm') ?>
    <div class="fake"></div>

    <div class="fake"></div>
    <div>
        <input class="add_Btn" type="submit" value="상품등록" onclick="addSuccess()"/>
    </div>
</form>
</div>
<div class="list_div">
<div>
    <table>
        <tr>
            <th>No.</th>
            <th>상품명</th>
            <th>등록시간</th>
        </tr>
        <?php foreach($statuses as $status): ?>
            <?php print $this->render('product/status', array('product' => $status)); ?>
        <?php endforeach; ?>
    </table>
</div>
</div>
