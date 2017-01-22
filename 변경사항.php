Controller.php 수정
isAuthentication 메서드 내부 if문 조건
if($this->_authentication === true || (is_array($this->_authentication)) && (in_array($action,$this->_authentication))

AppBase.php
171라인 메소드명
getResponseObject -> getSessionObject
77번 마지막에 ''를 ;으로 수정해주세요

index_accountview.php 수정
22, 24라인 ;을 :으로 바꿔주세요

View.php 모든 bashURL -> baseUrl

AccountController.php 수정
23라인 !$this로
161라인 !$this로 수정

[이진아] [오전 11:13] Loader.php에
[이진아] [오전 11:13] 3라인 directories 오타있습니다 확인

ExecuteModel 수정
9번라인 매개변수 $pdo 추가

UserModel.php 수정
1라인 <?php로
13라인 $this->execute($sql, array( 로 수정

Controller.php 수정
26라인 $action, $params으로
42라인 $action_method($params);으로
84라인 세미콜론 붙여야되고
107라인 $tokens = $this->_session
    ->get($key, array()); //$_SESSION변수에 Token을 저장하기 위한 키 이름 작성
추가하셔야 됩니다


별도로 디렉토리 정의 안되있는거, blogApp.php, bootstrap.php, create_table.txt 이거 3개만
따로 있고 다른거는 다른 디렉토리로 넣어 주어야함.


<b>Warning</b>:  htmlspecialchars() expects parameter 1 to be string, object given in <b>C:\xampp\htdocs\weblog.localhost\mvc\View.php</b> on line <b>48</b><br />
에러

Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[3D000]: 
Invalid catalog name: 1046 No database selected'
in C:\xampp\htdocs\weblog.localhost\mvc\ExecuteModel.php:26
Stack trace: #0 C:\xampp\htdocs\weblog.localhost\mvc\ExecuteModel.php(26):
# PDOStatement->execute(Array) #1 C:\xampp\htdocs\weblog.localhost\mvc\ExecuteModel.php(39):
# ExecuteModel->execute('SELECT COUNT(id...', Array) #2
# C:\xampp\htdocs\weblog.localhost\models\UserModel.php(45):
# ExecuteModel->getRecord('SELECT COUNT(id...', Array) #3
# C:\xampp\htdocs\weblog.localhost\controllers\AccountController.php(51):
# UserModel->isOverlapUserName('dfdfrf') #4
# C:\xampp\htdocs\weblog.localhost\mvc\Controller.php(42):
# AccountController->registerAction(Array) #5
# C:\xampp\htdocs\weblog.localhost\mvc\AppBase.php(105):
# Controller->dispatch('register', Array) #6
# C:\xampp\htdocs\weblog.localhost\mvc\AppBase.php(82):
# AppBase->getContent('account', 'register', Array) #7
# C:\xampp\htdocs\weblog.localhost\mvc_htdocs\index.php(5):
# AppBase->run() #8 {main} thrown in C:\xampp\htdocs\weblog.localhost\mvc\ExecuteModel.php on line 26