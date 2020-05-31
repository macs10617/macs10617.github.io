<?php

if ($rowus[login]!="") {

?>


<div class="avtorization">
			
<div class="left-block2">
	<div class="left-block-content2">
		<div class="l-link">
		    <b>Ваш баланс:</b> <font color="#ff0000"><?php print"$rowus[money]</font> $rowcg[money]"; ?>
			<a href="pay_qiwi" class="add-link">Пополнить QIWI</a>
			<a href="pay_pm" class="add-link">Пополнить PM</a>
			<a href="inv" class="add-link">Сделать вклад</a>
			<a href="invv" class="add-link">Получить вклад</a>
			<a href="pay_money" class="add-link">Вывести</a><br>
			<a href="invv" class="add-link">Ваши вклады</a>
			<a href="profile"  class="add-link">Профиль</a>
			<a href="history" class="add-link">История операций</a>
			<a href="refferals" class="add-link">Ваши рефералы</a>
			<a href="adv" class="add-link">Баннеры</a>		
		
			<a href="exit" class="lu-link"><img src="/images/exit.png" alt="exit"></a>
			<div style="clear: both;"></div>
		</div>
	</div>
	<div class="left-block-bottom"></div>
</div>

                                                                                                                                                                                                                                          
		</div>


<?php

} else {

?>


		<div class="avtorization">
			
	
<div class="left-block">
	<a href="registration" title="Регистрация на сайте" class="register-link">ЗАРЕГИСТРИРОВАТЬСЯ</a>
	<div class="left-block-content">
		<form method="post" action="login" style="margin: 0; padding: 0;position: relative;">
			<div class="login-line">
				<img src="./time_files/log-icon.png" alt="log-icon"><input name="login" type="text" class="login-input-text" title="Ваше имя на сайте" value="Введите логин" onblur="if(this.value==&#39;&#39;) this.value=&#39;Введите логин&#39;;" onfocus="if(this.value==&#39;Введите логин&#39;) this.value=&#39;&#39;;">
			</div>
			<div class="login-line">
				<img src="./time_files/pas-icon.png" alt="pas-icon"><input name="password" type="password" class="login-input-text" title="Введите пароль" value="Введите пароль" onblur="if(this.value==&#39;&#39;) this.value=&#39;Введите пароль&#39;;" onfocus="if(this.value==&#39;Введите пароль&#39;) this.value=&#39;&#39;;">
			</div>
			<div style="clear: both;"></div>
	<button name="" type="submit" class="enter"></button>

	
			<div class="reg-link">	
				<a href="send_password" title="Восстановление пароля">Забыли пароль?</a>
			</div>
		</form>
	</div>
	<div class="left-block-bottom"></div>
</div>
                                                                                                                                                                                                                                          
		</div>
		
<?php

}

?>		