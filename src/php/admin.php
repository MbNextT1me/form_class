<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css" type="text/css" />
    <link rel="stylesheet" href="../css/for_admin.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <a href="index.php" class="admin__out">Выйти из режима администратора</a>
        <div class='for_table'>
            <form action='../incs/del.php' method='post'>
                <table>
                    <caption>Принятые заявки</caption>
                    <tr>
                        <th>&nbsp;</th>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Тематика конференции</th>
                        <th>Способ оплаты</th>
                        <th>Расслыка</th>
                        <th>Дата подачи</th>
                        <th>IP-адрес пользователя</th>
                    </tr>
                    <?php include '../incs/cout_form.php';?>
                </table>
                <button type='submit' class='btn btn__del'>Удалить выбранные заявки</button>
            </form>
        </div>
    </div>
</body>
</html>
