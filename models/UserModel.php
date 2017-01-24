<?php
class UserModel extends ExecuteModel {
  // **insert()***
  //http://php.net/manual/kr/function.password-hash.php
  //패스워드의 해쉬 처리 : 암호화
  //http://php.net/manual/kr/datetime.format.php
  //DateTime::format
  public function insert($user_name, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $now = new DateTime();
    $sql = "INSERT INTO user(user_name, password, time_stamp)
    VALUES(:user_name, :password, :time_stamp)";
    $stmt = $this->execute($sql, array(
      ':user_name' => $user_name,
      ':password' => $password,
      ':time_stamp' => $now->format('Y-m-d H:i:s'),
    ));

    // execute(); 추상 클래스 ExecuteModel의 메소드
  }

  // ***getUserRecord() ***
  public function getUserRecord($user_name) {
    $sql = "SELECT *
          FROM user
          WHERE user_name = :user_name";

          $userData = $this->getRecord(
                      $sql,
                      array(':user_name' => $user_name));

   // getRecord(); 추상 클래스 ExecuteModel의 메소드

    return $userData;
  }

  // ***isOverlapUserName() ***
  public function isOverlapUserName($user_name) {
    $sql = "SELECT COUNT(id) as count
            FROM user
            WHERE user_name = :user_name";

    $row = $this->getRecord(
            $sql,
            array(':user_name' => $user_name));
    if($row['count']==='0') { // $user_name의 유저가 미동륵이면
        return true;
      }
      return false;
    }

    /**
     ******************CART 등록********************
     */
    public function addCart($productV){
//            $now = new DateTime();

        $user_id                = $productV['user_id'];
        // echo $user_id;
        $time_stamp             = $productV['time_stamp'];
        $pShort                 = $productV['pShort'];
        $pLong                  = $productV['pLong'];
        $pPrice                 = $productV['pPrice'];
        $pCount                 = $productV['pCount'];
        $buyNum                 = $productV['buyNum'];

        //print $buyNum;
        print $pCount;
        $pCount -= $buyNum;

        print $pCount;
        print $buyNum;

        $sql = "
                INSERT INTO cart(user_id, time_stamp, pShort, pLong, pPrice, pCount, buyNum)
                VALUES (:user_id, :time_stamp, :pShort, :pLong, :pPrice, :pCount, :buyNum);
            ";

        $this->execute($sql, array(
            ':user_id'=>$user_id,
            ':time_stamp' => $time_stamp,
            ':pShort'=>$pShort,
            ':pLong'=>$pLong,
            ':pPrice'=>$pPrice,
            ':pCount'=>$pCount,
            ':buyNum'=>$buyNum
        ));

        $sql = "
              UPDATE product
              SET pCount = :pCount
              WHERE pShort = :pShort
        ";


        $this->execute($sql, array(
            ':pCount'=>$pCount,
            ':pShort'=>$pShort
        ));
    }

    /**
     ******************CART 보여주기********************
     */
    public function allCart(){
        $sql = "
                SELECT *
                FROM cart
            ";

        $allCart = $this->getAllRecord($sql);

        return $allCart;
    }
  }
?>
