<?php

class Page {

    // HEADER 
    
    public static function pageHeader() {
        $btn = '';
        $pageHeader = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>readvice - Find your next book!</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <header>
                <nav>
                    <section>
                        <figure>
                            <a href="index.php">
                                <img src="img/logo.png" alt="readvice logo">
                            </a>
                        </figure>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </section>
                    <aside>
                        ';
                        if(true){
                            $pageHeader .= self::navOut();
                        } else {
                            $pageHeader .= self::navIn();
                        }
                        $pageHeader .= '
                    </aside>
                    <details>
                        <summary>
                            <i class="fa-solid fa-bars"></i>
                        </summary>
                        <article>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                            <aside>
                                ';
                                if(true){
                                    $pageHeader .= self::navOut();
                                } else {
                                    $pageHeader .= self::navIn();
                                }
                                $pageHeader .= '
                            </aside>
                        </article>
                    </details>
                </nav>
            </header>
            <main>
        ';
        return $pageHeader;
    }

    public static function navOut() {
        $navOut = '
        <a href="login.php" class="btn-sm">Log in</a>
        <a href="signup.php" class="btn-sm">Sign up</a>
        ';
        return $navOut;
    }

    public static function navIn() {
        $navIn = '
        <p>Hi, username</p>
        <a href="logout.php" class="btn-sm">Log out</a>
        ';
        return $navIn;
    }

    // TITLE
    
    public static function titleSearch($title="Let&rsquo;s find your book!") {
        $titleSearch = '
        <section class="title">
            <h1>'.$title.'</h1>
            <form action="'.$_SERVER['PHP_SELF'].'">
                <input type="search" name="search_book" id="search_book" placeholder="Give me a keyword">
                <input type="hidden" name="search" value="search">
                <input type="submit">
            </form>
        </section>
        ';
        return $titleSearch;
    }

    public static function titleUser($username) {
        $titleUser = '
        <section class="title">
            <h1>'.$username.'&rsquo;s list</h1>
            <aside class="title-user">
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
        $titleMy = '
        <section class="title">
            <h1>My list</h1>
            <aside>
                <a href="logout.php" class="btn-sm">Log out</a>
            </aside>
        </section>
        ';
        return $titleMy;
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
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST" class="default-form">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="submit" value="LOG IN" class="btn_lg">
            <a href="#">Not our member yet?</a>
        </form>
        ';
        return $formLogin;
    }

    public static function formSignup() {
        $formSignup = '
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST"  enctype="multipart/form-data" class="default-form">
            <input type="text" name="userName" id="userName" placeholder="Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <aside>
                <label for="userPicture" class="btn-file">
                    <i class="fa-solid fa-plus"></i>
                    Add Profile image
                </label>
                <input type="file" name="userPicture" id="userPicture">
            </aside>
            <input type="submit" value="Sign up" class="btn_lg">
        </form>
        ';
        return $formSignup;
    }

    public static function formContact() {
        $formContact = '
        <form action="'.$_SERVER['PHP_SELF'].'" method="POST" class="default-form contact-form">
            <aside>
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="email" name="email" id="email" placeholder="Email">
            </aside>
            <textarea name="message" id="message" placeholder="Messages"></textarea>
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
                <li class="filter-all"><a href="?genre=">All</a></li>
                <li><a href="?genre=Medical">Medical</a></li>
                <li><a href="?genre=Science">Science</a></li>
                <li><a href="?genre=Fantasy">Fantasy</a></li>
                <li><a href="?genre=Art">Art</a></li>
                <li><a href="?genre=Fiction">Fiction</a></li>
            </ul>
            <details class="filter-list-more">
                <summary>
                    <i class="fa-solid fa-bars-staggered"></i>
                </summary>
                <ul>
                    <li><a href="?genre=Nonfiction">Nonfiction</a></li>
                    <li><a href="?genre=Magic">Magic</a></li>
                    <li><a href="?genre=Adventure">Adventure</a></li>
                    <li><a href="?genre=Fairy Tales">Fairy Tales</a></li>
                    <li><a href="?genre=Classics">Classics</a></li>
                    <li><a href="?genre=Romance">Romance</a></li>
                    <li><a href="?genre=Novels">Novels</a></li>
                    <li><a href="?genre=Thriller">Thriller</a></li>
                    <li><a href="?genre=Horror">Horror</a></li>
                    <li><a href="?genre=Mystery">Mystery</a></li>
                    <li><a href="?genre=Biography">Biography</a></li>
                    <li><a href="?genre=Crime">Crime</a></li>
                    <li><a href="?genre=Humor">Humor</a></li>
                </ul>
            </details>
            <details class="filter-list-mobile">
                <summary>
                    <i class="fa-solid fa-bars-staggered"></i>
                    <p>';

                    if(! empty ($_GET['genre'])) {
                        $pageFilter .= $_GET['genre'];
                    } else {
                        $pageFilter .='All';
                    }
                    $pageFilter .= '
                    </p>
                </summary>
                <ul class="filter-list-mobile">
                    <li class="filter-all"><a href="?genre=">All</a></li>
                    <li><a href="?genre=Medical">Medical</a></li>
                    <li><a href="?genre=Science">Science</a></li>
                    <li><a href="?genre=Fantasy">Fantasy</a></li>
                    <li><a href="?genre=Art">Art</a></li>
                    <li><a href="?genre=Fiction">Fiction</a></li>
                    <li><a href="?genre=Nonfiction">Nonfiction</a></li>
                    <li><a href="?genre=Magic">Magic</a></li>
                    <li><a href="?genre=Adventure">Adventure</a></li>
                    <li><a href="?genre=Fairy Tales">Fairy Tales</a></li>
                    <li><a href="?genre=Classics">Classics</a></li>
                    <li><a href="?genre=Romance">Romance</a></li>
                    <li><a href="?genre=Novels">Novels</a></li>
                    <li><a href="?genre=Thriller">Thriller</a></li>
                    <li><a href="?genre=Horror">Horror</a></li>
                    <li><a href="?genre=Mystery">Mystery</a></li>
                    <li><a href="?genre=Biography">Biography</a></li>
                    <li><a href="?genre=Crime">Crime</a></li>
                    <li><a href="?genre=Humor">Humor</a></li>
                </ul>
            </details>
            <a href="userList.php" class="filter-mylist">My List</a>
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

    public static function pagination() {
        $pagination = '
        <section class="pagination">
            <ul>';

            if(!empty ($_GET['genre'])) {
                $genre = $_GET['genre'];
            } else {
                $genre = '';
            }

        $pagination .= '
            <li><a href="?genre='.$genre.'&page=1">1</a></li>
            <li><a href="?genre='.$genre.'&page=2">2</a></li>
            <li><a href="?genre='.$genre.'&page=3">3</a></li>
            <li><a href="?genre='.$genre.'&page=4">4</a></li>
            <li><a href="?genre='.$genre.'&page=5">5</a></li>';

        $pagination .= '</ul>
        </section>
        ';
        return $pagination;
    }

}