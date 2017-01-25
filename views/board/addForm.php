<?php $this->setPageTitle('title','게시판 작성 양식') ?>
<div class="smallFake"></div>
<div class="back_Div">
    <input type="button" class="back_Btn" onClick="history.go(-1)" value="<" />
</div>
<form action="<?php print $base_url; ?>/board/insert" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
    <div>
        <table>
            <tr>
                <td>제목</td>
                <td>
                    <input class="txt" type="text" name="bTitle" placeholder="" required/>
                </td>
            </tr>
            <tr>
                <td>구매 제품</td>
                <td>
                    <select name="bLong">
                        <option value="FreeSpace_1">Free Space</option>
                        <option value="XLR_1">Free Space XLR</option>
                        <option value="Pro2_2">Free Space Pro II</option>
                        <option value="Omni_2">Omni</option>
                        <option value="OmniPro_1">Omni Pro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>내용</td>
                <td>
                    <textarea name="bContent"></textarea>
                </td>
            </tr>
            <tr>
                <td>첨부파일</td>
                <td>
                    <input type="file" name="upFile"> * 5MB까지 업로드 가능
                </td>
            </tr>
        </table>
        <div class="fake"></div>
        <input type="submit" class="add_Btn" value="작성하기"/>
    </div>
</form>