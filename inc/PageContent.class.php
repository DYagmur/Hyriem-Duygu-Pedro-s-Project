<?php

class PageContent {

    // MAIN BOOK LIST

    public static function pageMainList($bookList) {
        $pageMainList = '
        <section class="book-list">';
        
        if(! empty ($_GET['page'])) {
            $pageNumber = $_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        if (count($bookList) >= 12) {
            $listNumber = 12;
            for($i = (($pageNumber -1) * $listNumber); $i <= ($pageNumber *12) -1; $i++){
                $pageMainList .= self::bookListMain($bookList[$i]);
            }
        } else {
            foreach($bookList as $books) {
                $pageMainList .= self::bookListMain($books);
            }
        }

        $pageMainList .= '</section>'.self::pagination($bookList);
        
        return $pageMainList;
    }


    public static function bookListMain($book) {
        $bookListMain = '
        <a href="bookInfo.php?book='.$book->getBookId().'">
            <figure>
                <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'">
            </figure>
        </a>
        ';
        return $bookListMain;
    }

    // PAGINATION

    public static function pagination($bookList) {
        $pagination = '
        <section class="pagination">
            <ul>';
            $page = '?page=';

            if(!empty ($_GET['genre'])) {
                $page = '?genre='.$_GET['genre'].'&page=';
            }
            if(!empty ($_GET['search'])) {
                $page = '?search_book='.$_GET['search_book'].'&search=search&page=';
            }
            if(!empty ($_GET['user'])) {
                $page = '?user='.$_GET['user'].'&page=';
            }

            if (! empty($_GET['page'])){
                $pageNum = $_GET['page'];
            } else {
                $pageNum = 1;
            }

            $currentPageCss = ' class="currentPage"';

            if((count($bookList) / 12 ) >= 5) {
                if ($pageNum > 0) {
                    $pagination .= '<li><a href="'.$page.($pageNum-1).'"><i class="fa-solid fa-angle-left"></i></a></li>';
                } else {
                    $pagination .= '<li><a href="'.$page.$pageNum.'"><i class="fa-solid fa-angle-left"></i></a></li>';
                }

                if ($pageNum <= 5) {
                    for($i = 1; $i <= 5 ; $i++) {
                        if ($pageNum == $i) {
                            $currentPageCss = ' class="currentPage"';
                        } if ($pageNum != $i) {
                            $currentPageCss = '';
                        }
                        $pagination .= '<li'.$currentPageCss.'><a href="'.$page.$i.'">'.$i.'</a></li>';
                    }
                } else {
                    for($i = 4; $i > 0 ; $i--) {
                        $pagination .= '<li><a href="'.$page.($pageNum-$i).'">'.($pageNum-$i).'</a></li>';
                    }
                    $pagination .= '<li'.$currentPageCss.'><a href="'.$page.$pageNum.'">'.$pageNum.'</a></li>';
                }

                if ($pageNum < (count($bookList) / 12 )) {
                    $pagination .= '<li><a href="'.$page.($pageNum+1).'"><i class="fa-solid fa-angle-right"></i></a></li>';
                } else {
                    $pagination .= '<li><a href="'.$page.$pageNum.'"><i class="fa-solid fa-angle-right"></i></a></li>';
                }

            } else {
                for($i = 1; $i <= (count($bookList) / 12 ); $i++) {
                    if ($pageNum == $i) {
                        $currentPageCss = ' class="currentPage"';
                    } if ($pageNum != $i) {
                        $currentPageCss = '';
                    }
                    $pagination .= '<li'.$currentPageCss.'><a href="'.$page.$i.'">'.$i.'</a></li>';
                }
            }

        $pagination .= '</ul>
        </section>
        ';
        return $pagination;
    }


    // BOOK DETAIL

    public static function pageBookDetail($book, $comment){
        $bookGenres = $book->getGenres();
        $genres1 = str_replace('[','',$bookGenres);
        $genres2 = str_replace("]",'',$genres1);
        $genres3 = str_replace("'",'',$genres2);
        $oneBookGenre = explode(',',$genres3);
        
        $pageBookDetail = '
        <section class="book-detail">
            <!-- LEFT SIDE : img, info, shop&share -->
            <section class="detail-left">
                <figure>
                    <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'" class="bookcover">
                    <figcaption>
                        <ul class="detail-info">
                            <li><span>Publish date</span>'.$book->getPublishDate().'</li>
                            <li><span>Publisher</span>'.$book->getPublisher().'</li>
                            <li><span>Language</span>'.$book->getLanguage().'</li>
                            <li><span>ISBN</span>'.$book->getIsbn().'</li>
                            <li><span>Rating</span>'.$book->getRating().'</li>
                        </ul>
                        <aside class="detail-outlink">
                            <a href="#">
                                <i class="fa-solid fa-store"></i>
                            </a>
                            <a href="share.php">
                                <i class="fa-solid fa-share-nodes"></i>
                            </a>
                        </aside>
                        <ul class="detail-genre">
                            ';
                            foreach($oneBookGenre as $genre){
                                $pageBookDetail .= '<li><a href="index.php?search_book='.strtolower($genre).'&search=search">'.$genre.'</a></li>';
                            }
                        $pageBookDetail .='
                        </ul>
                    </figcaption>
                </figure>
            </section>
            <!-- RIGHT SIDE : info btn comment -->
            <section class="detail-right">
                <figure>
                    <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'" class="bookcover-mobile">
                </figure>
                <aside>
                    <h1>'.$book->getTitle().'</h1>
                    <h3>'.$book->getAuthor().'</h3>
                </aside>
                <section class="detail-description">
                    <aside>';
                        if(! empty($_SESSION['loggedin'])) {
                            if ($_SESSION['loggedin']) {
                                $pageBookDetail .= '<a href="?book='.$book->getBookId().'&like=1" class="btn-lg';
                                    if(! empty($_GET['like'])) {
                                        if($_GET['like']) {
                                            $pageBookDetail .= ' liked';
                                        } else {
                                            $pageBookDetail .= '';
                                        }
                                    }
                            $pageBookDetail .='
                            ">
                                <i class="fa-solid fa-heart"></i>
                                <p>I love this book!</p>
                            </a>
                            <a href="?book='.$book->getBookId().'&add=1" class="btn-lg';
                                if(! empty($_GET['add'])) {
                                    if($_GET['add']) {
                                        $pageBookDetail .= ' added';
                                    } else {
                                        $pageBookDetail .= '';
                                    }
                                }
                                $pageBookDetail .= '
                                ">
                                    <i class="fa-solid fa-bookmark"></i>
                                    <p>Add to MY LIST</p>
                                </a>';
                            }
                        } else {
                            $pageBookDetail .= '
                            <a href="login.php" class="btn-lg">
                                <i class="fa-solid fa-flag"></i>
                                <p>Make your own list</p>
                            </a>';
                        }
                        
                        $pageBookDetail .= '
                    </aside>
                    <p>
                    '.$book->getDescription().'
                    </p>
                </section>
            </section>
            ';
            if(! empty($_SESSION['loggedin'])) {
                if ($_SESSION['loggedin']) {
                    if($comment){
                        $pageBookDetail .= '
                        <section class="comment">
                            <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                                <textarea name="post_comment" id="comment" placeholder="What do you think of this book?"></textarea>
                                <input type="hidden" value="'.$book->getBookId().'" name="bookId">
                                <input type="submit" value="Submit" class="btn-sm" name="submitComment">
                            </form>
                            <ul>';
                            for($i = 0; $i < count($comment); $i++) {
                                $pageBookDetail .= '
                                    <li>
                                        <aside>
                                            <a href="#">'.$comment[$i]->getUserCommentName().'</a>
                                            <p>'.$comment[$i]->getCommentDate().'</p>
                                        </aside>
                                        <p>
                                        '.$comment[$i]->getMessage().'
                                        </p>
                                    </li>';
                            }
                            $pageBookDetail .= '</ul>
                        </section>
                        ';
                    } else {
                        $pageBookDetail .= '
                        <section class="comment">
                            <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                                <textarea name="post_comment" id="comment" placeholder="What do you think of this book?"></textarea>
                                <input type="hidden" value="'.$book->getBookId().'" name="bookId">
                                <input type="submit" value="Submit" class="btn-sm" name="submitComment">
                            </form>
                        </section>
                        </section>
                        ';
                    }
                }
            } else {
                if($comment){
                    $pageBookDetail .= '
                    <section class="comment">
                        <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                            <textarea name="post_comment" id="comment" placeholder="You need to Login!" disabled></textarea>
                            <input type="hidden" value="'.$book->getBookId().'" name="bookId">
                            <input type="submit" value="Submit" class="btn-sm" name="submitComment" disabled>
                        </form>
                        <ul>';
                        for($i = 0; $i < count($comment); $i++) {
                            $pageBookDetail .= '
                                <li>
                                    <aside>
                                        <a href="userList.html">'.$comment[$i]->getUserCommentName().'</a>
                                        <p>'.$comment[$i]->getCommentDate().'</p>
                                    </aside>
                                    <p>
                                    '.$comment[$i]->getMessage().'
                                    </p>
                                </li>';
                        }
                        $pageBookDetail .= '</ul>
                    </section>
                    ';
                } else {
                    $pageBookDetail .= '
                    <section class="comment">
                        <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                            <textarea name="post_comment" id="comment" placeholder="You need to Login!" disabled></textarea>
                            <input type="hidden" value="'.$book->getBookId().'" name="bookId">
                            <input type="submit" value="Submit" class="btn-sm" name="submitComment" disabled>
                        </form>
                    </section>
                    </section>
                    ';
                }
            }
        return $pageBookDetail;
    }

    // USER LIST

    public static function pageUserList($bookList, $user) {
        $pageUserList = '
        <section class="book-list">';
        
        if(! empty ($_GET['page'])) {
            $pageNumber = $_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        if (count($bookList) >= 12) {
            $listNumber = 12;
            for($i = (($pageNumber -1) * $listNumber); $i <= ($pageNumber *12) -1; $i++){
                $pageUserList .= self::bookUserList($bookList[$i], $user);
            }
        } else {
            foreach($bookList as $books) {
                $pageUserList .= self::bookUserList($books, $user);
            }
        }

        $pageUserList .= '</section>'.self::pagination($bookList);
        
        return $pageUserList;
    }


    public static function bookUserList($book, $user) {
        $bookUserList = '
            <figure>
                <a href="bookInfo.php?book='.$book->getBookId().'">
                    <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'">
                </a>
                <figcaption>
                    <a href="?user='.$user.'&remove='.$book->getBookId().'">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </figcaption>
            </figure> 
        ';
        return $bookUserList;
    }

    // ABOUT

    public static function pageAbout() {
        $pageAbout = '
        <section class="about">
            <figure>
                <img src="img/about.png" alt="about readvice">
                <figcaption>
                    <p>
                       Our goal in readvice is to give you the best experience for finding and discovering your favorite books! Here, you can find several several kinds of books with multiple genres available. Try filtering by the genre or simply search for the book you are looking for. Once you have liked a certain amount of books, readvice will recommend you similar books that match your personal taste! We created this website to help you build your own book taste and to facilitate your needs for better books on a very user friendly interface. 
                    </p>
                    <ul>
                        <li><span>Address</span>889 W Pender St #200, Vancouver, BC V6C 3B2</li>
                        <li><span>Email</span><a href="mailto:readviceinfo@mail.com">readviceinfo@mail.com</a></li>
                        <li><span>Phone</span>+1 604-000-0000</li>
                    </ul>
                </figcaption>
            </figure>
        </section>
        ';
        return $pageAbout;
    }
}