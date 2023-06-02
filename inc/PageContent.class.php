<?php

class PageContent {

    // MAIN BOOK LIST

    public static function pageMainList() {
        $pageUserList = '
        <section class="book-list">';
        foreach($bookList as $book) {
            $pageUserList .= self::bookListMain($book);
        }
        $pageUserList .= '</section>';
        return $pageUserList;
    }

    public static function bookListMain($book) {
        $bookListUser = '
        <a href="#">
            <figure>
                <img src="'.$book->getCoverImg().'" alt="'.$book->getTitle().'">
            </figure>
        </a>
        ';
        return $bookListUser;
    }


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

    // ABOUT

    public static function pageAbout() {
        $pageAbout = '
        <section class="about">
            <figure>
                <img src="https://picsum.photos/1000/400?random=1" alt="">
                <figcaption>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi ex neque quaerat qui provident cumque veniam eum iste. Culpa, recusandae odio sequi eius ab ex molestiae nulla illo? Incidunt doloremque molestias quam error corporis, quaerat explicabo dolorum earum odit vel consectetur nobis quod aspernatur debitis perspiciatis eius velit libero laborum possimus aut blanditiis provident ex deserunt corrupti. Recusandae nulla reiciendis maiores? Velit provident blanditiis qui fugiat atque neque inventore, veritatis, error cumque quod repellendus ea dolor facilis esse a? Expedita perferendis mollitia molestiae odio repellat maiores, illo sunt, animi id at pariatur ducimus quae sint obcaecati nesciunt ipsum commodi suscipit eaque delectus enim. Ex facere aperiam explicabo quidem excepturi quisquam illum sunt in esse consequatur quo quos, enim voluptatum quia similique sequi labore beatae repudiandae perferendis dolores laboriosam error? Rerum quo corporis suscipit harum consectetur soluta praesentium odit aliquam accusantium at maxime, iure dolor velit autem quidem ipsum vero, cupiditate illum. Maiores sit dolorem aliquam cupiditate perferendis at fugit in ullam esse fuga quis voluptates, vel doloribus reiciendis aspernatur nobis aliquid ipsum sapiente minus et quas doloremque itaque porro. Cumque obcaecati facere harum id minus iste eum non eaque, quasi eligendi quia sequi voluptas nesciunt aliquid quisquam! Autem, est nostrum.
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