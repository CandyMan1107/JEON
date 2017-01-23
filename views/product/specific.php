<!-- 상품 상세 설명 -->
<?php $this->setPageTitle('title', '상품 상세 설명')?>
<div class="smallFake"></div>
<?php //print $status=$this->escape($dat['pShort']); ?>
<?php //if(isset($status)){
//    echo "있다!";
//    if($status!=""){
//        echo "공백아니다.";
//    }
//    else {
//        echo "공백이다.";
//    }}
//    else {
//    "없다!";
//    }?>
<div>
    <input type="button" class="back_Btn" onClick="history.go(-1)" value="<" />
</div>
<div>
    <table>
        <tr>
            <td>상품명</td>
            <td>
                <?php print $this->escape($dat['pShort']); ?>
            </td>
        </tr>
        <tr>
            <td>상품 상세명</td>
            <td>
                <?php print $this->escape($dat['pLong']); ?>
            </td>
        </tr>
        <tr>
            <td>상품타입</td>
            <td>
                <?php print $this->escape($dat['pType']); ?>
            </td>
        </tr>
        <tr>
            <td>상품가격</td>
            <td>
                <b>$ </b><?php print $this->escape($dat['pPrice']); ?>
            </td>
        </tr>
        <tr>
            <td>상품정보</td>
            <td>
                <?php print $this->escape($dat['pInfo']); ?>
            </td>
        </tr>
        <tr>
            <td>상품재고</td>
            <td>
                <?php print $this->escape($dat['pCount']); ?><b> 개</b>
            </td>
        </tr>
        <tr>
            <td>상품 이미지</td>
            <td>
                <img src="/data/<?php print $this->escape($dat['pShort']); ?>.jpg" alt="">
                <?php
                $upfile_name = $this->escape($dat['upfile_name']);
                $show_name = substr($upfile_name, 7);
                //            var_dump($show_name);
                //            echo $show_name;
                $file_path = "./data/".$show_name;
                $file_size = filesize($file_path);
                chmod($file_path, 0755);
                echo " 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='$base_url/download/$show_name'>[ 저장 ]</a><br>";
                ?>
            </td>
        </tr>
    </table>
</div>
<div class="fake"></div>
