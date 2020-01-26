<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=480">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="{{ $description }}">
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }} " type="image/png">
    <link rel="stylesheet" href="{{ asset('public/css/reset.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/action-mob.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Кулон I love You на 100 языках" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('public/img/promo.jpg') }}" />
    <meta property="og:description" content="Уникальный кулон, который способен удивить любую представительницу прекрасного пола.  Помимо изысканного французского дизайна, кулон содержит в себе кусочек настоящего чуда.  При близком подсвечивании любым источником света, он создает удивительную световую проекцию слов &quot;Я тебя люблю&quot; на 100 языках мира, включая русский язык." />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
</head>

<body>
    <!--wrap-->
    <div class="wrap">
        <div id="confirm-order" class="modal">
            <center><h1>Обработка...</h1></center>
            <p><center><img src="{{ asset('public/img/loading.gif') }}" alt="Loading..." style="height: auto;width: 100px;"></center></p>
        </div>
        <div id="error-order" class="modal">
            <p>
                <center>
                    <img src="{{ asset('public/img/error.jpg') }}" alt="Error" style="height: auto;width: 100px;">
                </center>
            </p>
            <p>
                <center>
                    <h1>Произошла ошибка</h1>
                    <p>Пожалуйста, попробуйте еще раз немного позже</p>
                </center>
            </p>
        </div>
        <div id="error-order-input" class="modal">
            <p>
                <center>
                    <img src="{{ asset('public/img/warning.jpg') }}" alt="Warning" style="height: auto;width: 100px;">
                </center>
            </p>
            <p>
                <center>
                    <h1>Ошибка ввода данных</h1>
                    <p>Пожалуйста, введите валидные данные</p>
                </center>
            </p>
        </div>
        <!--offer-->
        <section class="offer">
            <!--box-->
            <div class="box">
                <h1><span>“I love you”</span> <i>на 100 языках мира</i></h1>
                <div class="sub_title"><span>кулон со световой проекцией</span></div>
                <div class="sale">Акция! <b>-{{ $percent }}%</b> скидка</div>
            </div>
            <!--/box-->
            <!--bullet-->
            <ul class="bullet">
                <li>
                    <div class="pic">
                        <img src="{{ asset('public/img/bullet-icon1.png') }}" alt="">
                    </div>
                    <p>Изысканный французский дизайн</p>
                </li>
                <li>
                    <div class="pic">
                        <img src="{{ asset('public/img/bullet-icon2.png') }}" alt="">
                    </div>
                    <p>Уникальный и красивый знак любви</p>
                </li>
                <li>
                    <div class="pic">
                        <img src="{{ asset('public/img/bullet-icon3.png') }}" alt="">
                    </div>
                    <p>Необычный подарок со смыслом</p>
                </li>
            </ul>
            <!--/bullet-->
            <!--photo-->
            <div class="photo">
                <h4>Проекция проявляется при направлении света на кулон</h4>
                <div class="item">
                    <img src="{{ asset('public/img/offer-im1.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('public/img/offer-im2.jpg') }}" alt="">
                </div>
            </div>
            <!--/photo-->
            <!--order_form-->
            <div class="order_form">
                <!--timer_block-->
                <div class="timer_block">
                    <p>До конца акции осталось:</p>
                    <div class="timer clrfix">
                        <div class="timer_item">
                            <div class="count hours"></div>
                            <div class="text">часов</div>
                        </div>
                        <div class="timer_item">
                            <div class="count minutes"></div>
                            <div class="text">минут</div>
                        </div>
                        <div class="timer_item">
                            <div class="count seconds"></div>
                            <div class="text">секунд</div>
                        </div>
                    </div>
                </div>
                <!--/timer_block-->
                <!--price-->
                <div class="price">
                    <div class="old">
                        <p>Обычная цена:</p>
                        <div class="val"><span>{{ $old_price }}</span><i>грн</i></div>
                    </div>
                    <div class="new">
                        <div class="val"><span>{{ $new_price }}</span><i>грн</i></div>
                    </div>
                </div>
                <!--/price-->
                <!--m1-form-->
                <form class="main-order-form m1-form formOne" method="post" onsubmit="return false;">
                    <input class="field" type="text" id="input_name_1" name="name" min="3" max="32" placeholder="Введите ваше имя" required>
                    <input class="field" type="tel" id="input_phone_1" name="phone" placeholder="Введите ваш телефон" required>
                    <button type="submit" class="button-m" id="submitButton1">Сделать заказ</button>
                
                </form>
                <!--/m1-form-->
                <div class="stock">Осталось <b>4</b> кулонов по акции</div>
            </div>
            <!--/order_form-->
        </section>
        <!--/offer-->
        <!--
    -->
        <!--b1-->
        <section class="b1">
            <h2 class="title">Удиви любимого человека необычным украшением</h2>
            <img src="{{ asset('public/img/b1-im1.jpg') }}" alt="">
            <p>
                Этот уникальный кулон способен удивить любую представительницу прекрасного пола. Помимо изысканного
                французского дизайна, кулон содержит в себе кусочек настоящего чуда.
            </p>
            <img src="{{ asset('public/img/b1-im2.jpg') }}" alt="">
            <p>
                При близком подсвечивании любым источником света, он создает удивительную световую проекцию слов “Я тебя
                люблю” на 100 языках мира, включая русский язык.
            </p>
        </section>
        <!--/b1-->
        <!--b2-->
        <section class="b2">
            <!--item-->
            <div class="item">
                <img src="{{ asset('public/img/b2-im1.jpg') }}" alt="">
                <p>
                    Слова выгравированы на внутренней поверхности, а для их увеличения в центре конструкции имеется
                    специальная линза
                </p>
            </div>
            <!--/item-->
            <!--item-->
            <div class="item">
                <img src="{{ asset('public/img/b2-im2.jpg') }}" alt="">
                <p>
                    При направлении луча света (например фонарика или вспышки смартфона), кулон создает потрясающую световую
                    проекцию
                </p>
            </div>
            <!--/item-->
            <!--item-->
            <div class="item">
                <img src="{{ asset('public/img/b2-im3.jpg') }}" alt="">
                <p>
                    В появившейся тени можно будет прочитать самые приятные слова для каждого человека – «Я тебя люблю» на
                    100 языках мира
                </p>
            </div>
            <!--/item-->
            <!--item-->
            <div class="item">
                <img src="{{ asset('public/img/b2-im4.jpg') }}" alt="">
            </div>
            <!--/item-->
            <a href="#order" class="button-m">Сделать заказ</a>
        </section>
        <!--/b2-->
        <!--b3-->
        <section class="b3">
            <h2 class="title">Прекрасный подарок <span>вашим близким</span></h2>
            <div class="photo">
                <p>Любимой маме, сестре или подруге</p>
                <p>Любимой девушке или жене</p>
                <img src="{{ asset('public/img/b3-im.jpg') }}" alt="">
            </div>
            <div class="alert">
                Такой милый и оригинальный подарок<br> никого не оставит равнодушным!
            </div>
        </section>
        <!--/b3-->
        <!--b4-->
        <section class="b4">
            <h2 class="title white">Уникальное украшение <span>от лучших дизайнеров Франции</span></h2>
            <div class="desc">
                <p>
                    <b>Кулон «Я тебя люблю» разработан известными французскими дизайнерами –</b> Изабель Лютанс и Ги Пуаре.
                    Сочетает в себе изысканный стиль и неустаревающую элегантность с ярким акцентом на любовную тему.
                </p>
                <p>
                    Благодаря своей уникальности и непревзойденной идее, кулон моментально завладел вниманием западных
                    критиков и лидеров мнений. <b>Он стал невероятно популярным среди европейских пользователей
                        Instagram.</b>
                </p>
            </div>
        </section>
        <!--/b4-->
        <!--b5-->
        <section class="b5">
            <h2 class="title">Характеристики кулона</h2>
            <img src="{{ asset('public/img/b5-im1.jpg') }}" alt="">
            <div class="alert">Часть кулона украшена камнями циркония, который считается талисманом любви</div>
            <ul>
                <li>
                    <h4>Цвет:</h4>
                    <p>серебро/золото</p>
                </li>
                <li>
                    <h4>Материал:</h4>
                    <p>медицинская сталь</p>
                </li>
                <li>
                    <h4>Вес:</h4>
                    <p>15 грамм</p>
                </li>
            </ul>
            <img src="{{ asset('public/img/b5-im2.jpg') }}" alt="">
        </section>
        <!--/b5-->
        <!--reviews-->
        <section class="reviews">
            <h2 class="title">Отзывы покупателей</h2>
            <!--rev-slider-->
            <div class="rev-slider">
                <!--item-->
                <div class="item">
                    <img src="{{ asset('public/img/rev-im1.jpg') }}" alt="">
                    <h4>Михаил Артеменко, 25 лет</h4>
                    <p>
                        Давно хотел сделать своей девушке какой-нибудь оригинальный подарок. Решил подарить кулон со
                        световой проекцией “Я тебя люблю” на ста языках мира. Честно говоря, её реакция на подарок превзошла все мои
                        ожидания. Еще никогда я не видел её настолько счастливой и благодарной. Большое спасибо вашему
                        магазину за такой чудесный кулон!
                    </p>
                </div>
                <!--/item-->
                <!--item-->
                <div class="item">
                    <img src="{{ asset('public/img/rev-im2.jpg') }}" alt="">
                    <h4>Ковальчук Анастасия, 20 лет</h4>
                    <p>
                        Искала какой-нибудь классный подарок для сестры. Я её очень люблю, поэтому такой кулон мне сразу же
                        приглянулся. Она у меня стильная и очень любит модно одеваться. Здорово, что кулон подошел под все
                        её наряды. Ей кстати кулон очень понравился и по смыслу и по дизайну. Носит его не снимая. Я очень
                        рада, что смогла угодить сестренке. Большое вам спасибо!
                    </p>
                </div>
                <!--/item-->
                <!--item-->
                <div class="item">
                    <img src="{{ asset('public/img/rev-im3.jpg') }}" alt="">
                    <h4>Кравец Александр, 34 года</h4>
                    <p>
                        Подарил жене кулон “Я тебя люблю” на годовщину нашей свадьбы. Она в полном восторге. Я всегда
                        отличался романтическими поступками и красивыми ухаживаниями, но с этим кулоном я превзошел сам себя (так мне
                        сказала жена). Здорово, что кулон доставили очень быстро. Оставалась всего неделя до нашего
                        праздника, но я все успел. Однозначно рекомендую данный кулон!
                    </p>
                </div>
                <!--/item-->
            </div>
            <!--/rev-slider-->
        </section>
        <!--/reviews-->
        <!--order_info-->
        <section class="order_info">
            <h2 class="title">Как сделать заказ?</h2>
            <ul>
                <li>
                    <img src="{{ asset('public/img/order-icon1.png') }}" alt="">
                    <p>Оставляете заявку<br> на сайте</p>
                </li>
                <li>
                    <img src="{{ asset('public/img/order-icon2.png') }}" alt="">
                    <p>Наш менеджер<br> уточняет детали заказа</p>
                </li>
                <li>
                    <img src="{{ asset('public/img/order-icon3.png') }}" alt="">
                    <p>Доставляем ваш товар<br> в течение 1-3 дней</p>
                </li>
                <li>
                    <img src="{{ asset('public/img/order-icon4.png') }}" alt="">
                    <p>Оплачиваете<br> при получении</p>
                </li>
            </ul>
        </section>
        <!--/order_info-->
        <div class="title_sale">Закажите до конца дня и получите скидку!</div>
        <!--offer-->
        <section class="offer bottom">
            <!--box-->
            <div class="box">
                <h1><span>“I love you”</span> <i>на 100 языках мира</i></h1>
                <div class="sub_title"><span>кулон со световой проекцией</span></div>
                <div class="sale">Акция! <b>-{{ $percent }}%</b> скидка</div>
            </div>
            <!--/box-->
            <!--photo-->
            <div class="photo">
                <div class="item">
                    <img src="{{ asset('public/img/offer-im1.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('public/img/offer-im2.jpg') }}" alt="">
                </div>
            </div>
            <!--/photo-->
            <!--order_form-->
            <div class="order_form">
                <!--timer_block-->
                <div class="timer_block">
                    <p>До конца акции осталось:</p>
                    <div class="timer clrfix">
                        <div class="timer_item">
                            <div class="count hours"></div>
                            <div class="text">часов</div>
                        </div>
                        <div class="timer_item">
                            <div class="count minutes"></div>
                            <div class="text">минут</div>
                        </div>
                        <div class="timer_item">
                            <div class="count seconds"></div>
                            <div class="text">секунд</div>
                        </div>
                    </div>
                </div>
                <!--/timer_block-->
                <!--price-->
                <div class="price">
                    <div class="old">
                        <p>Обычная цена:</p>
                        <div class="val"><span>{{ $old_price }}</span><i>грн</i></div>
                    </div>
                    <div class="new">
                        <div class="val"><span>{{ $new_price }}</span><i>грн</i></div>
                    </div>
                </div>
                <!--/price-->
                <!--m1-form-->
                <form class="main-order-form m1-form formTwo" id="order" method="post" onsubmit="return false;">
                    <input class="field" type="text" id="input_name_2" name="name" min="3" max="32" id="name" placeholder="Введите ваше имя" required>
                    <input class="field phone-input" type="tel" id="input_phone_2" name="phone" placeholder="Введите ваш телефон" required>
                    <button type="submit" class="button-m" id="submitButton2">Сделать заказ</button>
                </form>
                <!--/m1-form-->
                <div class="stock">Осталось <b>4</b> кулонов по акции</div>
            </div>
            <!--/order_form-->
        </section>
        <!--/offer-->
        <!--footer-->
        <footer class="footer">
            <!-- <img src="{{ asset('public/img/black-320.png') }}" alt="copyright"> -->
            <p>
                <a href="/privacy" target="_blank">Политика конфиденциальности</a>
            </p>
            <p>
                <a href="tel:+380689964798">+380689964798</a>
            </p>
        </footer>
        <!--/footer-->
    </div>
    <!--/wrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="{{ asset('public/js/slick.min.js') }}"></script>
    <script>
    let element1 = document.getElementById('input_phone_1');
    let element2 = document.getElementById('input_phone_2');
    let maskOptions = { mask: '+{38}(000)00-00-000'};
    let mask1 = IMask(element1, maskOptions);
    let mask2 = IMask(element2, maskOptions);
    </script>
    <script src="{{ asset('public/js/init.js') }}"></script>
    @if (config('app.env') === 'production')
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1265927796927313');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1265927796927313&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156255564-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-156255564-1');
    </script>
    @endif
</body>

</html>