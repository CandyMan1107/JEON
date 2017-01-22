<?php
    class AllModel extends ExecuteModel {
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
    }
?>