<?php
  $this->setPageTitle('title','계정정보')
 ?>
<div class="smallFake"></div>
<div class="user_info">
   <p>
     &nbsp; ID &nbsp;
       <!--      <a href="--><?php //print $base_url; ?><!--/user/--><?php //print $this->escape($user['user_name']); ?><!--">-->
       <b>
        <?php print $this->escape($user['user_name']); ?>
      </b>
   </p>
   <ul>
     <li>
<!--       <a href="--><?php //print $base_url; ?><!--/account/basket">구매목록</a>-->
    </li>
   </ul>
 </div>
