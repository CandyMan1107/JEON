<!-- 상품 상세 설명 -->
<?php $this->setPageTitle('title', '고객용')?>
<div class="smallFake"></div>

<div class="product_img">
    <img src="/data/<?php print $this->escape($dat['pShort']); ?>.jpg" alt="">
</div>
<div class="info_div">
    <h1><?php print $this->escape($dat['pLong']); ?></h1>
    <h1><b>$ </b><?php print $this->escape($dat['pPrice']); ?></h1>
    <hr>
    <h2><?php print $this->escape($dat['pInfo']); ?></h2>
    <hr>
    <h3><b>재고 : </b><?php print $this->escape($dat['pCount']); ?><b> 개</b></h3>
</div>

<div class="smallFake"></div>
<div>
    <input type="button" class="back_Btn" onClick="history.go(-1)" value="목록으로" />
</div>