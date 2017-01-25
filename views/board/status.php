<!--   *************************************************************     -->
<!--   ******************  게시판 간략하게  ************************     -->
<!--   *************************************************************     -->
<tr>
    <td>
        <?php print $this->escape($board['id']); ?>
    </td>
    <td>
        <?php print $this->escape($board['user_id']); ?>
    </td>
    <td>
        <a href="<?php print $base_url; ?>/board/<?php print $this->escape($board['id']); ?>/status">
            <?php print $this->escape($board['bTitle']); ?>
        </a>
    </td>
    <td>
        <?php print $this->escape($board['time_stamp']); ?>
    </td>
    <td>
        <?php print $this->escape($board['hit']); ?>
    </td>
</tr>