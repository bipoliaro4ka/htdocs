<?php

use Src\Auth\Auth;

?>
<div class="sidebar">
    <div class="sidebar-top">
        <p class="logo"><img class="logo-img" src="/htdocs/public/static/media/lib_logo.png" alt="logo-ico">Библиотека
        </p>
        <nav>
            <a href="<?= app()->route->getUrl('/books') ?>">Книги</a>
            <a href="<?= app()->route->getUrl('/readers') ?>">Читатели</a>

            <?php if (Auth::user()->role->role === 'admin'): ?>
                <a href="<?= app()->route->getUrl('/genre') ?>">Жанры</a>
                <a href="<?= app()->route->getUrl('/publishers') ?>">Издательства</a>
                <a href="<?= app()->route->getUrl('/halls') ?>">Залы</a>
                <a href="<?= app()->route->getUrl('/librarians') ?>">Сотрудники</a>
            <?php endif; ?>
        </nav>
    </div>
    <div class="sidebar-bottom">
        </a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="sidebar-link sidebar-img-link"><img
                    src="/htdocs/public/static/media/logout_icon.svg" alt="logout-icon">Выход</a>
    </div>
</div>
<main>
    <p><?= $errors?></p>

    <h1>Добавление книги</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Название</label>
        <input type="text" name="name" id="name" placeholder="Название книги">
        <label for="author">Автор</label>
        <select class="form-select" aria-label="" name="author_id">
            <option selected>Выберете автора</option>
            <?php

            foreach ($author_list as $author) {?>
                <option value="<?= $author->author_id ?>"><?= $author->name ?></option>
                <?php
            }
            ?>
        </select>
        <select class="form-select" aria-label="" name="status">
            <option selected>Выберете статус</option>
            <option>Нет</option>
            <option>да</option>
        </select>
        <label for="text">Дата публикации</label>
        <input type="text" name="date_publish" id="date" placeholder="Год публикации">
        <label for="price">Цена</label>
        <input type="text" name="price" id="price" placeholder="Цена">
        <label for="annotation">Аннотация</label>
        <textarea name="annotation" placeholder="Наипшите тут что-нибудь..."></textarea>
        <div class="form-check">
            <label class="form-check-label" for="flexCheckDefault">
                Новая книга
            </label>
        </div>

        <select class="form-select" aria-label="" name="genre_id">
            <option selected>Выберете жанр</option>
            <?php

            foreach ($genre_list as $genre) {?>
                <option value="<?= $genre->id ?>"><?= $genre->name ?></option>
                <?php
            }
            ?>
        </select>
        <select class="form-select" aria-label="Default select example" name="hall_id">
            <option selected>Выберете зал</option>
            <?php
            foreach ($hall_list as $hall) {?>
                <option value="<?= $hall->id ?>"><?= $hall->id ?></option>
                <?php
            }
            ?>

        </select>
        <select class="form-select" aria-label="" name="publisher_id">
            <option selected>Выберете издателя</option>
            <?php
            foreach ($publisher_list as $publisher) {?>
                <option value="<?= $publisher->id ?>"><?= $publisher->name ?></option>
                <?php
            }
            ?>
        </select>

        <input type="file" name="cover_file">

        <button class="submit-btn">Добавить</button>
    </form>

</main>