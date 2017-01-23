<?php
  $this->setPageTitle('title','계정정보')
 ?>
<div class="smallFake"></div>
<div class="user_info">
   <p>
     &nbsp; ID &nbsp;
       <b>
        <?php print $this->escape($user['user_name']); ?>
      </b>
   </p>
   <div>
       <?php $num=$this->escape($num);?>
       <?php for($i = 0; $i < $num; $i++){
           $detail = $this->escape($all[$i]['id']);
           ?>
           <div>
               <a href="<?php print $base_url; ?>/detail/<?=$detail?>">
                   <img src="/data/<?php print $this->escape($all[$i]['pShort']); ?>.jpg" alt="">
               </a>
               <br>
               <b><?php print $this->escape($all[$i]['pLong']);?></b>
               <br>
               <b>$ <?php print $this->escape($all[$i]['pPrice']);?></b>
           </div>
       <?php } ?>
   </div>
 </div>
