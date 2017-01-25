<?php
class BoardModel extends ExecuteModel {

    /**
     ******************모두 SELECT********************
     */
    public function getAllList(){
        $sql = "
                SELECT *
                FROM board
                ORDER BY time_stamp DESC
            ";

        $allList = $this->getAllRecord($sql);

        return $allList;
    }



    /**
     ******************게시글 상세********************
     */
    /// ***getSpecificBoard()***
    public function getSpecificBoard($id) {
        $sql = "SELECT *
             FROM board
             WHERE id = :id";

        $dat = $this->getRecord($sql, array(':id' => $id));

        $hit = $dat['hit'];

        $up_hit = $hit + 1;

        $sql = "
            UPDATE board
            SET hit = :up_hit
            WHERE id = :id
        ";

        //$specMsg = array();
        $specMsg = $dat;

        $dat = $this->execute($sql, array(
            ':id' => $id,
            ':up_hit' => $up_hit
        ));


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

    /**
     ******************게시글 삭제********************
     */
    public function deleteBoard($productV){
        $user_id                = $productV['user_id'];
        $id                     = $productV['id'];

        $sql = "
                DELETE TABLE board
                WHERE id = :id
            ";

        $result = $this->execute($sql, array(
            ':user_id'=>$user_id,
            ':id'=>$id
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