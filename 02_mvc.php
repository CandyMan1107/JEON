02-1. Action을 실행하는 컨트롤러 : MVC의 C에 해당

Controller의 주요 목적 : Action을 실행하는 것에 있다.
Controller의 종류
1) Front Controller
2) Action Controller : APP에 의해 실행되어야 할 여러개의 Action을 정의
Routing : Request된 URL로부터 적절한 ActionController와 Action Method를 결정
Dispatch : Request된 정보를 기반으로 Action Method를 실행
Action Method : DB처리를 통해 Response로 보낼 화면을 Rendering(반복해서 붙여넣음)한다.
ㄴ모델과 뷰를 만들어 구체적인 화면을 만드는 단계.

※ Action Controller의 기본기능 정의하는 클래스 --(한개의 서비스가 요청되어 실행될 때의 흐름이다.)
(목표 : 모든 Action Controller의 부모 클래스를 정의한다.)
실행순서
1> index.php : APP 본체클래스를 인스턴스화, run()실행
2> run()실행
2-1> Request된 URL을 분석(Routing관련처리)
2-2> Controller와 Action명을 알 수 있다.
2-3> APP클래스의 getContent()메소드를 실행.
2-3-1> Controller의 Subclass(Action Controller)(기본 이름을 Controller라 했다면 서브클래스는 Action Controller이다.)
를 인스턴스 화 한다.
2-3-1-1> Action Controller의 Despatch()를 실행.
2-3-1-1-1> Action Controller의 내부의 Action Method를 실행한다.
: 요청된 Content(Rendering된 HTML데이터 : View의 반환결과)를 받습니다(획득).
2-3-1-2> Content가 Return
2-3-2> Content가 Return
2-4> (Despatch결과다.) Response의 정보 요청이 오면 Class에 결과 처리를 한다.
3> (Response를 보내버린다) Response전송

※ 추상클래스 : 객체 생성 불가
추상 클래스를 정의하면 사용하기 위해서는 반드시 계승 후 사용하여야 한다.
계승할 때 반드시 구현해야 하는 메소드가 있다면 추상 메소드로 정의한다.



폴리모피즘 :
인터페이스와 추상클래스의 참조 변수에는 그를 구현한 클래스와 추상클래스의 자식클래스인 경우 객체를 생성해 대입할 수가 있다.
부모참조변수는 객체가 어떻게 대입되느냐에 상관없이 메소드를 호출하는데 동일하게 호출한다.
그 자식클래스에서 오버라이딩 되어 있기에 효과는 자식클래스의 효과가 된다.





※ Action Method = 한 개의 화면을 나타내게끔 설계를 한 것이 관리도 편하다.
한개의 화면에 대응할 수 있도록, 예를들어 -> 회원가입 화면은 회원가입 액션이 있어야 한다는 것이다.
쇼핑몰로 치면 상품등록화면이다.