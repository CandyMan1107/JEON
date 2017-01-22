<!--   *********************************************************************************************     -->
<!--   ******************  addProduct.php 에서 관리자가 입력한 상품 게시판  ************************     -->
<!--   *********************************************************************************************     -->
        <tr>
            <td>
                <?php print $this->escape($product['id']); ?>
            </td>
            <td>
                <a href="<?php print $base_url; ?>/product/<?php print $this->escape($product['id']); ?>/status/<?php print $this->escape($product['pShort']); ?>">
                    <?php print $this->escape($product['pShort']); ?>
                </a>
            </td>
            <td>
                <?php print $this->escape($product['time_stamp']); ?>
            </td>
        </tr>