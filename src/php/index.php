<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" type="text/css" />
	<link rel="stylesheet" href="../css/for_main.css" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600">
	<title>php_form</title>
</head>

<body>

	<div class="container">

        <a href="admin.php" class="admin">Войти в режим администратора</a>

		<form action="../incs/save.php" method="post">
			<div class="form-group">
				<label for="name">Имя*</label>
				<input type="text" name="name" id="name" class="form-control" onclick="" required>
			</div>
			<div class="form-group">
				<label for="surname">Фамилия*</label>
				<input type="text" name="surname" id="surname" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="email">Email*</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="phone">Телефон*</label>
				<input type="text" name="phone" id="phone" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="subjects">Интересующая тематика конференции*</label>
				<div class="select">
					<input type="text" name="subjects" id="subjects" required>
					<div class="select__head form-control">Выберите</div>
					<ul class="select__list" style="display: none;">
						<li class="select__item">Бизнес</li>
						<li class="select__item">Технологии</li>
						<li class="select__item">Реклама и Маркетинг</li>
					</ul>
				</div>
			</div>
			<div class="form-group">
				<label for="payment">Предпочитаемый метод оплаты участия*</label>
				<div class="select">
					<input type="text" name="payment" id="payment" required>
					<div class="select__head form-control">Выберите</div>
					<ul class=" select__list" style="display: none;">
						<li class="select__item">WebMoney</li>
						<li class="select__item">Яндекс.Деньги</li>
						<li class="select__item">PayPal</li>
						<li class="select__item">Кредитная карта</li>
					</ul>
				</div>
			</div>
			<div class="form-group checkbox__div">
				<label for="mailing">Хотите ли вы получать рассылку о конференции?</label>
				<input type="checkbox" name="mailing" id="mailing" class="form-control" value="false">
                <input type="hiden" name="mailing" id="mailing" value="true" style="display: none">
            </div>

			<button type="submit" class="btn" onclick="success">Отправить</button>
            <div class="info container" id="success" style="display: none">Успешно!</div>
		</form>
	</div>
</body>

<script src=" https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script>
    jQuery(($) => {

		$('.select').on('click', '.select__head', function () {
			if ($(this).hasClass('open')) {
				$(this).removeClass('open');
				$(this).next().fadeOut();
			} else {
				$('.select__head').removeClass('open');
				$('.select__list').fadeOut();
				$(this).addClass('open');
				$(this).next().fadeIn();
			}
		});

		$('.select').on('click', '.select__item', function () {
			$('.select__head').removeClass('open');
			$(this).parent().fadeOut();
			$(this).parent().prev().text($(this).text());
			$(this).parent().prev().prev().val($(this).text());
		});

		$(document).click(function (e) {
			if (!$(e.target).closest('.select').length) {
				$('.select__head').removeClass('open');
				$('.select__list').fadeOut();
			}
		});
	});
</script>

</html>