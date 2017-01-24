<?php
class BoardModel extends ExecuteModel {

    /**
     ******************모두 SELECT********************
     */
    public function getAllList(){
        $sql = "
                SELECT *
                FROM board
            ";

        $allList = $this->getAllRecord($sql);

        return $allList;
    }



    /**
     ******************게시글 상세********************
     */
    /// ***getSpecificBoard()***
    public function getSpecificBoard($id, $bTitle) {
        $sql = "SELECT *
             FROM board
             WHERE id = :id AND bTitle = :bTitle";
        $specMsg = $this->getRecord($sql, array(':id' => $id, ':bTitle'=> $bTitle));

//            var_dump($specMsg);

        return $specMsg;
    }

    /**
     ******************게시글 등록********************
     */
    public function addBoard($productV){
//            $now = new DateTime();
//
//            $s_fileUpload           = $this->fileUpload("upFile", "./data/board/", "./data/board/");

        $hit                    = $productV['hit'];
        $user_id                = $productV['user_id'];
        // echo $user_id;
        $bTitle                = $productV['bTitle'];
        $time_stamp             = $productV['time_stamp'];
        $bLong                  = $productV['bLong'];
        $bContent                  = $productV['bContent'];
        $s_fileUpload            = $productV['upfile_name'];

        $sql = "
                INSERT INTO board(hit, user_id, bTitle, time_stamp, bLong, bContent, upfile_name)
                VALUES (:hit, :user_id, :bTitle, :time_stamp, :bLong, :bContent, :upfile_name);
            ";

        $result = $this->execute($sql, array(
            ':hit'=>$hit,
            ':user_id'=>$user_id,
            ':bTitle'=>$bTitle,
            ':time_stamp' => $time_stamp,
            ':bLong'=>$bLong,
            ':bContent'=>$bContent,
            ':upfile_name'=>$s_fileUpload
        ));

        return $result;
    }

    // *** getUserData()***
    public function getUserData($user_id){
        $sql = "SELECT *
              FROM board
              WHERE user_id = :user_id
              ORDER BY time_stamp DESC";
        $user = $this->getAllRecord($sql,array(
            ':user_id'=>$user_id
        ));

        return $user;
    }


}
?>