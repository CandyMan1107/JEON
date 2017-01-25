<?php $this->setPageTitle('title','자유게시판') ?>
<div class="smallFake"></div>
<div class="back_Div">
    <input type="button" class="back_Btn" onClick="history.go(-1)" value="<" />
</div>
<div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>제목</th>
            <th>등록일</th>
            <th>HIT</th>
        </tr>
        <?php foreach($statuses as $status): ?>
            <?php print $this->render('board/status', array('board' => $status)); ?>
        <?php endforeach; ?>
    </table>
</div>
<div class="fake"></div>
<div>
    <form action="<?php print $base_url; ?>/board/addForm">
        <input type="submit" class="add_Btn" value="글작성"/>
    </form>
</div>