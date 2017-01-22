<?php $this->setPageTitle('title','사용자의 Top Page') ?>
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
        </div>
    <?php } ?>

</div>
