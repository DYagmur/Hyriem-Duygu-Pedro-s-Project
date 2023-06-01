<?php

class Page {

    // HEADER 
    
    public static function pageHeader() {
        $pageHeader = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>redvice - Find your next book!</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <header>
                <nav class="nav">
                    <aside>
                        <figure>
                            <a href="#">
                                <img src="#" alt="#">
                            </a>
                        </figure>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </aside>
                    <aside>
                        '.$btn.'
                    </aside>
                </nav>
            </header>
            <main>
        ';
        if($_SESSION["logged"]){
            $btn = navOut();
        } else {
            $btn = navIn();
        }
        return $pageHeader;
    }

    public static function navOut() {
        $navOut = '
        <a href="#" class="btn-sm">Log in</a>
        <a href="#" class="btn-sm">Sign up</a>
        ';
        return $navOut;
    }

    public static function navIn() {
        $navIn = '
        <p>Hi, username</p>
        <a href="#" class="btn-sm">Log out</a>
        ';
        return $navIn;
    }

    // TITLE
    
    public static function titleSerch($title="Let us find your book!") {
        $titleSerch = '
        <section class="title">
            <h1>'.$title.'</h1>
            <form action="'.$_SERVER['PHP_SELF'].'">
                <input type="search" name="search" id="search" placeholder="Give me a keyword">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </section>
        ';
        return $titleSerch;
    }

    public static function titleUser($username) {
        $titleUser = '
        <section class="title">
            <h1>'.$username.'&rsquo; list</h1>
            <aside>
                <a href="#" class="btn-back">
                    <i class="fa-solid fa-left-long"></i>
                    <p>Back</p>
                </a>
                <a href="mailto:userEmail">
                    <i class="fa-solid fa-envelope"></i>
                    <p>userEmail@mail.com</p>
                </a>
            </aside>
        </section>
        ';
        return $titleUser;
    }

    public static function titleMy() {
        $titleUser = '
        <section class="title">
            <h1>My list</h1>
            <aside>
                <a href="#" class="btn-back">
                    <i class="fa-solid fa-left-long"></i>
                    <p>Back</p>
                </a>
            </aside>
        </section>
        ';
        return $titleUser;
    }

    public static function titleDefault($title) {
        $titleDefault = '
        <section class="title">
            <h1>'.$title.'</h1>
        </section>
        ';
        return $titleDefault;
    }

    // FORM

    public static function formLogin() {
        $formLogin = '
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
            <input type="email" name="email" id="email">
            <input type="password" name="password" id="password">
            <input type="submit" value="LOG IN" class="btn_lg">
            <a href="#">Not our member yet?</a>
        </form>
        ';
        return $formLogin;
    }

    public static function formSignup() {
        $formSignup = '
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
            <input type="text" name="userName" id="userName" placeholder="Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="file" name="userPicture" id="userPicture">
            <input type="submit" value="Sign up" class="btn_lg">
        </form>
        ';
        return $formSignup;
    }

    public static function formContact() {
        $formContact = '
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <textarea name="message" id="message"></textarea>
            <input type="submit" value="Send" class="btn_lg">
        </form>
        ';
        return $formContact;
    }

    // FILTER

    public static function pageFilter() {
        $pageFilter = '
        <section class="filter">
            <ul class="filter-list">
                <li class="filter-all"><a href="#">All</a></li>
                <li><a href="#">Medical</a></li>
                <li><a href="#">Science</a></li>
                <li><a href="#">Fantasy</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Fiction</a></li>
            </ul>
            <details class="filter-list-more">
                <summary>
                    <i class="fa-solid fa-bars"></i>
                </summary>
                <ul class="filter-list">
                    <li><a href="#">Nonfiction</a></li>
                    <li><a href="#">Magic</a></li>
                    <li><a href="#">Adventure</a></li>
                    <li><a href="#">Fairy Tales</a></li>
                    <li><a href="#">Classics</a></li>
                    <li><a href="#">Romance</a></li>
                    <li><a href="#">Novels</a></li>
                    <li><a href="#">Thriller</a></li>
                    <li><a href="#">Horror</a></li>
                    <li><a href="#">Mystery</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Crime</a></li>
                    <li><a href="#">Humor</a></li>
                </ul>
            </details>
            <details class="filter-list-mobile">
                <summary>
                    <i class="fa-solid fa-bars"></i>
                </summary>
                <ul class="filter-list">
                    <li class="filter-all"><a href="#">All</a></li>
                    <li><a href="#">Medical</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Fantasy</a></li>
                    <li><a href="#">Art</a></li>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Nonfiction</a></li>
                    <li><a href="#">Magic</a></li>
                    <li><a href="#">Adventure</a></li>
                    <li><a href="#">Fairy Tales</a></li>
                    <li><a href="#">Classics</a></li>
                    <li><a href="#">Romance</a></li>
                    <li><a href="#">Novels</a></li>
                    <li><a href="#">Thriller</a></li>
                    <li><a href="#">Horror</a></li>
                    <li><a href="#">Mystery</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Crime</a></li>
                    <li><a href="#">Humor</a></li>
                </ul>
            </details>
            <a href="#" class="filter-mylist">My List</a>
        </section>
        ';
        return $pageFilter;
    }

    // FOOTER

    public static function pageFooter() {
        $pageFooter = '
            </main>
            <footer>
                <p>
                    Copyright &copy; 2023 readvice
                </p>
                <aside>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </aside>
            </footer>
        </body>
        </html>
        ';
        return $pageFooter;
    }

    // PAGINATION

    public static function pagenation() {
        $pagenation = '
        <section class="pagination">
            <ul>
                <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </section>
        ';
        return $pagenation;
    }


}