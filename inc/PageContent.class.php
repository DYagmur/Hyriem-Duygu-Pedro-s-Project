<?php

class PageContent {

    // BOOK DETAIL

    public static function pageBookDetail($book){
        $pageBookDetail = '
        <a href="#" class="btn-back">
            <i class="fa-solid fa-left-long"></i>
            <p>Back</p>
        </a>
        <section class="boot-detail">
            <!-- LEFT SIDE : img, info, shop&share -->
            <section class="detail-left">
                <figure>
                    <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'">
                    <figcaption>
                        <ul>
                            <li><span>Publish date</span>'.$book->getPublishDate().'</li>
                            <li><span>Language</span>'.$book->getLanguage().'</li>
                            <li><span>ISBN</span>'.$book->getIsbn().'</li>
                        </ul>
                        <aside class="outlink">
                            <a href="#">
                                <i class="fa-solid fa-store"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-share-nodes"></i>
                            </a>
                        </aside>
                        <ul>
                            <li>'.$book->getGenres().'</li>
                        </ul>
                    </figcaption>
                </figure>
            </section>
            <!-- RIGHT SIDE : info btn comment -->
            <section class="detail-right">
                <aside class="detail-title">
                    <h1>'.$book->getTitle().'</h1>
                    <h3>'.$book->getAuthor().'</h3>
                </aside>
                <section class="detail-description">
                    <aside>
                        <a href="#">
                            <i class="fa-solid fa-heart"></i>
                            <p>I love this book!</p>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-bookmark"></i>
                            <p>Add to MY LIST</p>
                        </a>
                    </aside>
                    <p>
                    '.$book->getDescription().'
                    </p>
                </section>
                '.pageComment().'
            </section>
        </section>
        ';
        return $pageBookDetail;
    }

    public static function pageComment(){
        $pageComment = '
        <section class="comment">
            <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                <textarea name="comment" id="comment" placeholder="what do you think?"></textarea>
                <input type="submit" value="Submit">
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

    
}