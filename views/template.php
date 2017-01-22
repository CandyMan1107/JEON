<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8' />
    <!-- 각 action에 따른 views폴더내의 view파일들에서 설정하여 보내줌-->
    <title>
        <?php //if (isset($title)): print $this->escape($this).'-'; endif; ?>
        ASMR MALL
    </title>
    <!-- { endfor; endwhile; endswitch; endforeach;} -->
<!--    <link href="/css/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--    <script src="/css/lib/bootstrap/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet"
          type="text/css"
          href="/css/style.css"/>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <script type="text/javascript" src="/js/javascript.js"></script>
</head>
<body>
<div id="header">
    <div id='logo'>
        <a href="<?php print $base_url; ?>/">
            <img src="/img/logo.png">
        </a>
    </div>
</div>
<div class="fake"></div>
<div id="nav">
    <p>
        <a href="<?php print $base_url; ?>/">
            MICROPHONES &nbsp;
        </a>
<!--        <a href="--><?php //print $base_url; ?><!--/product/accessories">-->
<!--            ACCESSORIES &nbsp;-->
<!--        </a>-->
        <a href="<?php print $base_url; ?>/product/addProduct">
            기타 &nbsp;
        </a>
        |&nbsp;
        <?php if ($session->isAuthenticated()): ?>
<!--            <a href="--><?php //print $base_url; ?><!--/">-->
<!--                Top Page &nbsp;-->
<!--            </a>-->
            <a href="<?php print $base_url; ?>/account">
                내정보 &nbsp;
            </a>
            <a href="<?php print $base_url; ?>/account/signout">
                로그아웃 &nbsp;
            </a>
        <?php else: ?>
            <a href="<?php print $base_url; ?>/account/signin">
                로그인 &nbsp;
            </a>
            <a href="<?php print $base_url; ?>/account/signup">
                시작하기
            </a>
        <?php endif; ?>
<!--    </p>-->
<!--</div>-->
<!--<div class="fake"></div>-->
<!--<div class="smallFake"></div>-->
<!--<div id="menu">-->
<!--    <p>-->
    </p>
</div>
<div id="main">
    <?php print $_content; ?>
    <!-- $_content: View 객체의 render()메서드에서 전달해줌 -->
</div>
</body>
</html>