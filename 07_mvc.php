07. Routing을 하는 Router클래스
 - 모든 Request는 Front Controller에게 전달
 - Routing : Request URL로부터 ActionController와 Action 명을 구해내는 것.
 -

* MVC에서 URL 다루는 방법들.
 : Directory 변조.
 MVC에서 Web페이지 != php파일

    통상적인 GET방법
    : http://www.example.com/bbs.php?mode=browse&page=2

    변조 방법 :
    1> http://www.example.com/bbs/browse?page=2
     controller:bbs, action : browse, 파라미터 : page=2
    2> ? or & 를 없애는 원리.
        http://www.example.com/bbs/browse/page/2
     도메인명/키1/값1/키2/값2
    3> 다양하게 존재할 수 있다.

    *Routing 정보의 정의 : AppBase 클래스의 Sub클래스의 getRouteDefinition()에서 처리
    *디버깅 코드 실행하기 : var_dump(getRouteDefinition());

'/' => array('controller'=>'blog','action'=>'index')
[/]=>Array(
    [controller]=>blog  :BlogController
    [action]=>index     :indexAction()
)