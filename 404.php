<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Error 404</title>
	<?php wp_head(); ?>

</head>

<body>

    <a href="<?php echo get_home_url(null, 'home', null); ?>" class="return">Вернуться на главную</a>
	   <div class="numberError">
	        <h1 class="error" data-text="404">404</h1>
	    </div>
		<h2 class="notFound">Страница не найдена</h2>
</body>
</html>




