<?php
    class ProductModel extends ExecuteModel {

        /**
         ******************모두 SELECT********************
         */
        public function getAllList(){
            $sql = "
                SELECT *
                FROM product
            ";

            $allList = $this->getAllRecord($sql);

            return $allList;
        }

        /**
         ******************상품리스트********************
         */
        public function getProductList($pType) {
            $sql = "
                SELECT *
                FROM product
                WHERE pType = :pType
                ORDER BY id DESC
            ";

            $productList = $this->execute($sql, array(
                ':pType'=>$pType
            ));

            $productList = $this->getFetchAll($productList);

            return $productList;
        }

        /**
         ******************상품상세********************
         */
        /// ***getSpecificProduct()***
        public function getSpecificProduct($id, $pShort) {
            $sql = "SELECT *
             FROM product
             WHERE id = :id AND pShort = :pShort";
            $specMsg = $this->getRecord($sql, array(':id' => $id, ':pShort'=> $pShort));

//            var_dump($specMsg);

            return $specMsg;
        }

        /**
         ******************상품등록********************
         */
        public function addProduct($productV = array()){
//            $now = new DateTime();
//
//            $s_fileUpload           = $this->fileUpload("upFile", "./data", "./data/");

            $user_id                = $productV['user_id'];
            // echo $user_id;
            $time_stamp             = $productV['time_stamp'];
            $pShort                 = $productV['pShort'];
            $pLong                  = $productV['pLong'];
            $pType                  = $productV['pType'];
            $pPrice                 = $productV['pPrice'];
            $pInfo                  = $productV['pInfo'];
            $pCount                 = $productV['pCount'];
            $s_fileUpload            = $productV['upfile_name'];

            $sql = "
                INSERT INTO product(user_id, time_stamp, pShort, pLong, pType, pPrice, pInfo, pCount, upfile_name)
                VALUES (:user_id, :time_stamp, :pShort, :pLong, :pType, :pPrice, :pInfo, :pCount, :upfile_name);
            ";

            $this->execute($sql, array(
                ':user_id'=>$user_id,
                ':time_stamp' => $time_stamp,
                ':pShort'=>$pShort,
                ':pLong'=>$pLong,
                ':pType'=>$pType,
                ':pPrice'=>$pPrice,
                ':pInfo'=>$pInfo,
                ':pCount'=>$pCount,
                ':upfile_name'=>$s_fileUpload
            ));
        }

        // *** getUserData()***
        public function getUserData($user_id){
            $sql = "SELECT *
              FROM product
              WHERE user_id = :user_id
              ORDER BY time_stamp DESC";
            $user = $this->getAllRecord($sql,array(
                ':user_id'=>$user_id
            ));

            return $user;
        }

        /**
         ******************상품 상세(고객용)********************
         */
        public function getDetailProduct($num){
            $id = $num;

            $sql = "SELECT *
              FROM product
              WHERE id = :id
              ";

            $detailProduct = $this->getRecord($sql,array(
                ':id'=>$id
            ));

            return $detailProduct;
        }




        // *** getPostedMessage()***
        public function getPostedMessage($user_id) {
            $sql = "SELECT a.*,u.user_name
            FROM product a LEFT JOIN user u ON a.user_id = u.id
            WHERE u.id = :user_id
            ORDER BY a.time_stamp DESC";

            $postMsg = $this->getAllRecord($sql,array(':user_id'=> $user_id));
            return $postMsg;
        }


    }
?>