    <div class="container">
        <input class="txt" type="text" name="user_name" placeholder=" 아이디"
               value="<?php echo $this->escape($user_name); ?>" required/>
        <div class="fake"></div>
        <input class="txt" type="password" name="password" placeholder=" 비밀번호"
               value="<?php echo $this->escape($password); ?>" required/>
    </div>