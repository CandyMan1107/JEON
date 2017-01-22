<!--  상품 등록 양식  -->
<!-- / 상품명 / 상품 상세명 / 상품타입 / 상품가격 / 상품정보 / 상품재고 / 첨부파일-->
        <div>
            <table>
                <tr>
                    <td>상품명</td>
                    <td>
                        <input class="txt" type="text" name="pShort" placeholder="" required/>
                    </td>
                </tr>
                <tr>
                    <td>상품 상세명</td>
                    <td>
                        <input class="txt" type="text" name="pLong" placeholder="" required/>
                    </td>
                </tr>
                <tr>
                    <td>상품타입</td>
                    <td>
                        <select name="pType">
                            <option value="properM">마이크</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>상품가격</td>
                    <td>
                        <b>$ </b><input type="number" name="pPrice" placeholder="" required/>
                    </td>
                </tr>
                <tr>
                    <td>상품정보</td>
                    <td>
                        <textarea name="pInfo"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>상품재고</td>
                    <td>
                        <input type="number" name="pCount" placeholder="" required/><b> 개</b>
                    </td>
                </tr>
                <tr>
                    <td>첨부파일</td>
                    <td>
                        <input type="file" name="upFile"> * 5MB까지 업로드 가능
                    </td>
                </tr>
            </table>
        </div>