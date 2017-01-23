<?php
  $this->setPageTitle('title','계정정보')
 ?>
<div class="smallFake"></div>
<div class="user_info">
   <h3>
       <b>
        <?php print $this->escape($user['user_name']); ?>
      </b> 님의 구매목록 :)
   </h3>
</div>
    <div class="smallFake"></div>
    <div class="w3-content w3-display-container">

        <a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
        <a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)">&#10095;</a>


        <?php $num=$this->escape($num);?>
        <?php for($i = 0; $i < $num; $i++){
            $detail = $this->escape($all[$i]['id']);
            ?>
            <div class="w3-display-container mySlides">
                <a href="<?php print $base_url; ?>/detail/<?=$detail?>">
                    <img src="/data/<?php print $this->escape($all[$i]['pShort']); ?>.jpg" alt="">
                </a>
                <b><?php print $this->escape($all[$i]['pLong']);?></b>
                <b>$ <?php print $this->escape($all[$i]['pPrice']);?></b>
            </div>
        <?php } ?>

    </div>