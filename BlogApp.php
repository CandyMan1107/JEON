<?php
class BlogApp extends AppBase {

  protected $_signinAction = array('account', 'signin');

  //DB접속 실행
  protected function doDbConnection() {
    $this->_connectModel->connect('master', //접속이름
    array(
      'string'    => 'mysql:dbname=weblog;host=localhost;charset=utf8',  //DB이름 - weblog
      'user'      => 'root',                                            //DB사용자명
      'password'  => '',                                             //DB사용자의 패스워드
    ));
  }//doDbConnection - function

  //Root Directory 경로를 반환
  public function getRootDirectory() {
    return dirname(__FILE__); //BlogApp.php가 저장되어 있는 디렉토리
    //http://php.net/menual/en/function.dirname.php
  }//getRootDirectory - function

  //Blog APP에서 사용되는 Controller, Action
  //Contorller  - action    - path정보                    - 내용
  //1)account   - index     - /account                    - 계정 정보의 톱페이지
  //2)account   - signin    - /account/:action            - 로그인
  //3)account   - signout   - /account/:action            - 로그아웃
  //4)account   - signup    - /account/:action            - 계정등록
  //5)account   - follow    - /follow                     - 계정등록(회원가입)
  //6)blog      - index     - /                           - 블로그의 톱페이지
  //7)blog      - post      - /status/post                - 글작성
  //8)blog      - user      - /user/:user_name            - 사용자 작성글 일람
  //9)blog      - specific  - /user/:user_name/status/:id - 작성글의 상세보기


  //Routiong 정의를 반환
  protected function getRouteDefinition() {
    return array(

      //AccountController클래스 관련 Routing
      '/account'          => array('controller' => 'account', 'action' => 'index'),
      '/account/:action'  => array('controller' => 'account'),
//      '/follow'           => array('contorller' => 'account', 'action' => 'follow'),

      //BlogController 클래스 관련 Routing
 //     '/'                           => array('controller' => 'blog', 'action' => 'index'),  // 작성글 입력
//        '/status/post'                  => array('controller' => 'blog', 'action' => 'post'), // 글작성 버튼 띠용하고 누름
//        '/user/:user_name/status/:id'   => array('controller' => 'blog', 'action' => 'specific'), // 작성글의 상세보기
//        '/user/:user_name'              => array('controller' => 'blog', 'action' => 'user'), // 사용자 작성글 일람


      //ProductController 클래스 관련 Routing
        '/'                                      => array('controller' => 'product', 'action' => 'index'), // 상품 진열
        '/product/:action'                       => array('controller' => 'product'),
        '/detail/:id'                            => array('controller' => 'product', 'action' => 'show'), // 상품 상세보기(고객용)
        '/product/:id/status/:pShort'            => array('controller' => 'product', 'action' => 'specific'),  // 상품 상세보기(관리자용)
        '/download/:show_name'                   => array('controller' => 'product', 'action' => 'download'),

        //BoardController 클래스 관련 Routing
        '/board'                                   => array('controller' => 'board', 'action' => 'index'),
        '/board/:action'                          => array('controller' => 'board'),
        '/board/:id/status'                        => array('controller' => 'board', 'action' => 'specific'),  // 게시글 상세보기
        '/download/board/:show_name'              => array('controller' => 'board', 'action' => 'download'),
    );

  }//getRouteDefinition - function

}//BlogApp -class

 ?>
