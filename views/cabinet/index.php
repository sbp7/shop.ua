<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h1>Кабинет пользователя</h1>

            <h3>Привет, <?php echo $user['name'];?>!</h3><br/>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li><br/>
                <li><a href="/cabinet/history">Список покупок</a></li>
            </ul>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
