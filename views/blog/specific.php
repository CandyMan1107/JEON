<?php $this->setPageTitle('title', $status['user_name'])?>
<div class="smallFake"></div>
<div class="specific">
    <?php print $this->render('blog/status',array('status'=>$status));?>
</div>
