12. mvc Framework의 동작
 * Front Controller에서 Action이 실행되어
    HTML이 출력되기까지 과정

    1> Client (Browser) 에서 URL 접근
    2> Front Controller(index.php) 실행
    3> App객체 생성(AppBase 계승한 BlogApp)
        4> App객체의 생성자에서 처리
         - Error표시 여부 처리
         - initialize() 실행
            Request, Response, Session, ConnectionModel, Router 객체가 생성
         - Router객체 생성시 routeConverter()실행
            <Roution 정의에 대한 처리>
         -doDBconnection()실행
            <DB서버 접속 처리 : PDO객체 생성 처리>
    5> App객체에서 run()
        6> Router의 getRouteParams() 실행
         - Routing 정의에 대해 Request URL에서 잘라낸 경로를 패턴 매칭시켜,
           Routing 정의에서 경로정보, Controller명, Action명을 알아 냄.
        7> AppBase에 정의되어 있는 getContent() 실행
         - getContent(Controller명, Action명, Routing 정의에서 경로 정보)
         - Controller 명을 황용해서 Controleer 객체를 생성
           : AppBase의 getControllerObject()를 이용
            8> 생성된 Controller객체를 이용 dispatch() 실행
                : dispatch(Action 명, Routing 정의에서 경로 정보)
                - Action명을 이용해서 Action메소드를 알아내고 Action 메소드를 실행함.
            9> Action 메소드의 실행
                10> 생성된 Controller객체의 render()실행
                    - View클래스 객체 생성 (View파일의 경로, Default정보)
                    - View클래스 render()실행
                     render(Controller명/Action명,
                     Action메소드에서 전달된 Token등의 데이터,Layout파일명)
                 : HTML이 출력되어 나온다.
         11> HTML 정보를 Response의 $_content에 설정
         12> Response의 send()실행
            : HTTP의 Header+Body(html contents)

*URL예제
    -http://weblog.localhost/index_error.php/account/signup
    base URL : index_error.php
    path : /account/signup
    - http://weblog.localhost/account/signup
    base URL : index.php
    path : /account/signup




