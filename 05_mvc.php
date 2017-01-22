05-1. APP의 기본 클래스 : AppBase
    App의 베이스(스-파-) 클래스
    1) Request된 URL에 대해 Routing을 실행, DB아쿠세스 등
        Controller에서 Action을 처리하기 위한 전처리
    2) Dispatch() 실행 : Controller와 Action을 결정 실행 준비

    *Request ==> Front Controller (index.php)
    ==> AppBase::run() ==>  Response
    1> Request
    2> Front Controller에서 AppBase의 서브클래스를 생성
    3> AppBase 생성자 실행
     3-1> initialize()-초기화
      3-1-1> Router객체 생성
      3-1-2> ConnectModel, Request, Response, Session 객체를 생성
     3-2> doDbConnection() 실행 : AppBase의 메소드를 오버라이드
    4> AppBase::run() 실행
     4-1> Router클래스의 getRouteParams() 실행
      4-1-1> 정의되어 있는 Routing정보에 대해서 Request URL를 참고하여
             경로정보 매칭실행
      4-1-2> 매칭 실행하여 구해낸 Routing 경로정보를 바탕으로 Controller명과
             Action명을 얻어옴.
     4-2> getContent(Controller명, 액션명, Routing경로정보) 실행
      4-2-1> getContentObject() 실행
      4-2-2> Controller의 dispatch() 실행
       4-2-2-1> Action메소드를 실행
        4-2-2-1-1> Model로부터 데이터 받아옴
        4-2-2-1-2> render()실행
         4-2-2-1-2-1> View객체의 render() 실행
     4-3> Response객체의 send()실행 