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
            
        $listNumber = 12;
        for($i = (($pageNumber -1) * $listNumber); $i <= ($pageNumber *12) -1; $i++){
            $pageMainList .= self::bookListMain($bookList[$i]);
        }

        
        $pageMainList .= '</section>';
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


    // BOOK DETAIL

    public static function pageBookDetail($book, $userId){
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
                            <a href="#">
                                <i class="fa-solid fa-share-nodes"></i>
                            </a>
                        </aside>
                        <ul class="detail-genre">
                            ';
                            foreach($oneBookGenre as $genre){
                                $pageBookDetail .= '<li>'.$genre.'</li>';
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
                    <aside>
                        <a href="#" class="btn-lg">
                            <i class="fa-solid fa-heart"></i>
                            <p>I love this book!</p>
                        </a>
                        <a href="userList.php?user='.$userId.'" class="btn-lg">
                            <i class="fa-solid fa-bookmark"></i>
                            <p>Add to MY LIST</p>
                        </a>
                    </aside>
                    <p>
                    '.$book->getDescription().'
                    </p>
                </section>
            </section>
            '.self::pageComment().'
        </section>
        ';
        return $pageBookDetail;
    }

    public static function pageComment(){
        $pageComment = '
        <section class="comment">
            <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                <textarea name="post_comment" id="comment" placeholder="What do you think of this book?"></textarea>
                <input type="submit" value="Submit" class="btn-sm" name="submitComment">
            </form>
            <ul>
                <li>
                    <aside>
                        <a href="userList.html">USERNAME</a>
                        <p>MM-DD-YY</p>
                    </aside>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, natus debitis iusto blanditiis iure quo expedita, obcaecati ipsam esse corporis tenetur cum quos perferendis dicta in velit facilis? Aliquam, amet.
                    </p>
                </li>
                <li>
                    <aside>
                        <a href="userList.html">USERNAME</a>
                        <p>MM-DD-YY</p>
                    </aside>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, natus debitis iusto blanditiis iure quo expedita, obcaecati ipsam esse corporis tenetur cum quos perferendis dicta in velit facilis? Aliquam, amet.
                    </p>
                </li>
            </ul>
        </section>
        ';
        return $pageComment;
    }
    // USER LIST

    public static function pageUserList($bookList) {
        $pageUserList = '
        <section class="book-list-detail">';
        foreach($bookList as $book) {
            $pageUserList .= self::bookListUser($book);
        }
        $pageUserList .= '</section>';
        return $pageUserList;
    }

    public static function bookListUser($book) {
        $bookListUser = '
        <a href="#">
            <figure>
                <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'">
                <figcaption>
                    <h4>'.$book->getTitle().'</h4>
                    <h6>'.$book->getAuthor().'</h6>
                    <p>
                    '.$book->getDescription().'
                    </p>
                </figcaption>
            </figure>
        </a>
        ';
        return $bookListUser;
    }

    // ABOUT

    public static function pageAbout() {
        $pageAbout = '
        <section class="about">
            <figure>
                <img src="img/about.png" alt="about readvice">
                <figcaption>
                    <p>
                       Our goal in readvice is to provide you the best experience for finding and discovering your favorite books! Here, you can find several several kinds of books with multiple genres available. Try filtering by the genre or simply search for the book you are looking for. Once you have liked a certain amount of books, readvice will recommend you similar books that match your personal taste! We created this website to help you build your own book taste and to facilitate your needs for better books on a very user friendly interface. 
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