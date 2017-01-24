<!-- 상품 상세 설명 -->
<?php $this->setPageTitle('title', '고객용')?>
<div class="smallFake"></div>

<div>
    <input type="button" class="back_Btn" onClick="history.go(-1)" value=" < " />
</div>
<div class="product_img">
    <img src="/data/<?php print $this->escape($dat['pShort']); ?>.jpg" alt="">
</div>
<div class="info_div">
    <form action="<?php print $base_url; ?>/account/insert" method="post">
        <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
        <input type="hidden" name="pShort" value="<?php print $this->escape($dat['pShort']); ?>" />
        <input type="hidden" name="pLong" value="<?php print $this->escape($dat['pLong']); ?>" />
        <input type="hidden" name="pPrice" value="<?php print $this->escape($dat['pPrice']); ?>" />
        <input type="hidden" name="pCount" value="<?php print $this->escape($dat['pCount']); ?>" />

        <h1><?php print $this->escape($dat['pLong']); ?></h1>
        <h2>$ <?php print $this->escape($dat['pPrice']); ?></h2>
        <hr>
        <div class="fake"></div>
        <b><input type="number" name="buyNum" class="buyNum"> 개</b>
        &nbsp;
        <input type="submit" class="cart_Btn" value="구매하기">
        <div class="fake"></div>
        <h3><?php print $this->escape($dat['pInfo']); ?></h3>
        <div class="fake"></div>
        <b><?php print $this->escape($dat['pCount']); ?> 개 남은 제품입니다.</b>


    </form>
</div>

<div class="smallFake"></div>
