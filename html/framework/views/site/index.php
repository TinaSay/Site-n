<?php
/** @var $this \yii\web\View */

use app\modules\contactus\widgets\ContactusWidget;

$this->title = 'ЭНСАЙН :: IT-интегратор';

?>

<svg class="hidden display-none">
    <defs>
        <symbol id="icon-triangle" viewBox="0 0 24 24">
            <title>triangle</title>
            <path d="M4.5,19.8C4.5,19.8,4.5,19.8,4.5,19.8V4.2c0-0.3,0.2-0.5,0.4-0.7c0.2-0.1,0.5-0.1,0.8,0l13.5,7.8c0.2,0.1,0.4,0.4,0.4,0.7c0,0.3-0.2,0.5-0.4,0.7L5.7,20.4c-0.1,0.1-0.3,0.1-0.5,0.1C4.8,20.6,4.5,20.2,4.5,19.8z M6,5.6v12.8L17.2,12L6,5.6z"/>
        </symbol>
        <symbol id="icon-bubble" viewBox="0 0 48 24">
            <title>bubble</title>
            <path d="M0.9,23c-0.2,0.2,0,0.8,0.2,0.9C1.2,24,1.3,24,1.4,24c0.2,0,0.3-0.1,0.5-0.1l10.7-4.1h30.7c2.2,0,3.9-1.8,3.9-3.9V3.9c0-2.2-1.8-3.9-3.9-3.9H5.9C3.7,0,2,1.8,2,3.9v11.8c0,2.2,1,3.5,3.2,3.5C5.1,19.2,2.2,21.5,0.9,23zM45.7,15.8c0,1.3-1.1,2.4-2.4,2.4h-31c-0.2,0-0.3,0.1-0.5,0.1l-9.4,4.3c0,0,4.1-2.9,4.7-3.7c0.1-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H5.9c-1.3,0-2.4-1.1-2.4-2.4V3.9c0-1.3,1.1-2.4,2.4-2.4h37.4c1.3,0,2.4,1.1,2.4,2.4V15.8L45.7,15.8z"/>
        </symbol>
        <symbol id="icon-magnifier" viewBox="0 0 24 24">
            <title>magnifier</title>
            <path d="M22.6,20l-4.8-4.8c0,0-0.1,0-0.1-0.1c1-1.4,1.5-3.2,1.5-5c0-5.1-4.1-9.2-9.2-9.2S0.9,5,0.9,10c0,5.1,4.1,9.2,9.2,9.2c1.9,0,3.6-0.6,5-1.5c0,0,0,0.1,0.1,0.1l4.8,4.8c0.7,0.7,1.9,0.7,2.6,0C23.3,21.9,23.3,20.7,22.6,20z M10,16c-3.3,0-6-2.7-6-6c0-3.3,2.7-6,6-6c3.3,0,6,2.7,6,6S13.3,16,10,16z"/>
        </symbol>
        <symbol id="icon-pin" viewBox="0 0 24 24">
            <title>pin</title>
            <path d="M17.6,2.9L17.6,2.9c-3.1-3.1-8.2-3.1-11.3,0l0,0C3.6,5.7,3.2,11,5.6,14.2l6.4,9.2l6.4-9.2C20.8,11,20.4,5.7,17.6,2.9z M12.1,11.1c-1.5,0-2.6-1.2-2.6-2.6s1.2-2.6,2.6-2.6s2.6,1.2,2.6,2.6S13.5,11.1,12.1,11.1z"/>
        </symbol>
        <symbol id="icon-circle" viewBox="0 0 16 16">
            <circle cx="8" cy="8" r="6.215"></circle>
        </symbol>
        <symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
        </symbol>
        <symbol id="icon-drop" viewBox="0 0 24 24">
            <title>drop</title>
            <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/>
            <path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
        </symbol>
        <symbol id="icon-keyboard" viewBox="0 0 100 70">
            <title>keyboard</title>
            <path d="M 60.94,1.83 39.22,1.83 C 36.71,1.83 34.67,3.86 34.67,6.376 L 34.67,28.1 C 34.67,30.61 36.71,32.65 39.22,32.65 L 60.94,32.65 C 63.45,32.65 65.5,30.61 65.5,28.1 L 65.5,6.376 C 65.5,3.86 63.45,1.83 60.94,1.83 Z M 44.79,18.63 50.08,11.74 55.37,18.63 Z"
                  opacity="0.2"/>
            <path d="M 60.86,36.75 39.14,36.75 C 36.63,36.75 34.59,38.79 34.59,41.3 L 34.59,63.02 C 34.59,65.53 36.63,67.57 39.14,67.57 L 60.86,67.57 C 63.38,67.57 65.41,65.53 65.41,63.02 L 65.41,41.3 C 65.42,38.79 63.38,36.75 60.86,36.75 Z M 50.08,57.45 44.79,50.55 55.37,50.55 Z"
                  opacity="0.2"/>
            <path d="M 95.45,36.75 73.73,36.75 C 71.22,36.75 69.18,38.79 69.18,41.3 L 69.18,63.02 C 69.18,65.53 71.22,67.57 73.73,67.57 L 95.45,67.57 C 97.97,67.57 100,65.53 100,63.02 L 100,41.3 C 100,38.79 97.97,36.75 95.45,36.75 Z M 83.4,57.45 83.4,46.86 90.3,52.16 Z"/>
            <path d="M 26.27,36.75 4.55,36.75 C 2.037,36.75 0,38.79 0,41.3 L 0,63.02 C 0,65.53 2.037,67.57 4.55,67.57 L 26.27,67.57 C 28.78,67.57 30.82,65.53 30.82,63.02 L 30.82,41.3 C 30.82,38.79 28.78,36.75 26.27,36.75 Z M 16.69,57.45 9.79,52.16 16.69,46.86 Z"/>
        </symbol>
        <symbol id="icon-mouse-btn" viewBox="0 0 28 37">
            <title>mouse-btn</title>
            <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="4.38px" stroke-linecap="butt"
                  stroke-linejoin="miter" fill="none"
                  d="M12.690,2.190 C18.489,2.190 23.190,7.017 23.190,12.973 L23.190,22.407 C23.190,28.362 18.489,33.190 12.690,33.190 C6.891,33.190 2.190,28.362 2.190,22.407 L2.190,12.973 C2.190,7.017 6.891,2.190 12.690,2.190 Z"/>
        </symbol>
        <symbol id="icon-mouse-scroll" viewBox="0 0 12 17">
            <title>mouse-scroll</title>
            <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="4.38px" stroke-linecap="butt"
                  stroke-linejoin="miter" fill="none"
                  d="M4.690,2.603 C5.777,2.603 6.659,3.508 6.659,4.625 L6.659,9.342 C6.659,10.459 5.777,11.364 4.690,11.364 C3.603,11.364 2.721,10.459 2.721,9.342 L2.721,4.625 C2.721,3.508 3.603,2.603 4.690,2.603 Z"/>
        </symbol>
        <symbol id="arr-left" viewBox="0 0 6 9">
            <title>arr-left</title>
            <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                  d="M5.999,7.424 L4.432,8.999 L0.001,4.545 L0.046,4.500 L0.001,4.455 L4.432,0.001 L5.999,1.576 L3.090,4.500 L5.999,7.424 Z"/>
        </symbol>
        <symbol id="arr-right" viewBox="0 0 6 9">
            <title>arr-right</title>
            <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                  d="M5.999,4.545 L1.568,8.999 L0.001,7.424 L2.910,4.500 L0.001,1.576 L1.568,0.001 L5.999,4.455 L5.954,4.500 L5.999,4.545 Z"/>
        </symbol>
    </defs>
</svg>


<div id="ip-container" class="ip-container before-start">
    <header class="ip-header">
        <div class="ip-logo"><span id="logo-loader" class="link link--nukun" href="#"><span>N</span></span></div>
    </header>
    <div class="ip-main">

        <nav id="menu" class="nav nav--ayana">
            <button class="nav__item active" aria-label="Item 1" data-menuanchor="page-1"><a href="#page-1">
                    <svg class="nav__icon">
                        <use xlink:href="#icon-circle"></use>
                    </svg>
                </a></button>
            <button class="nav__item" aria-label="Item 2" data-menuanchor="page-2"><a href="#page-2">
                    <svg class="nav__icon">
                        <use xlink:href="#icon-circle"></use>
                    </svg>
                </a></button>
            <button class="nav__item" aria-label="Item 3" data-menuanchor="page-3"><a href="#page-3">
                    <svg class="nav__icon">
                        <use xlink:href="#icon-circle"></use>
                    </svg>
                </a></button>
            <button class="nav__item" aria-label="Item 4" data-menuanchor="page-4"><a href="#page-4">
                    <svg class="nav__icon">
                        <use xlink:href="#icon-circle"></use>
                    </svg>
                </a></button>
            <button class="nav__item" aria-label="Item 5" data-menuanchor="page-5"><a href="#page-5">
                    <svg class="nav__icon">
                        <use xlink:href="#icon-circle"></use>
                    </svg>
                </a></button>
        </nav>

        <canvas id="granim-canvas" class="scene--full"></canvas>
        <canvas id="scene" class="scene--full"></canvas>

        <script type="x-shader/x-vertex" id="wrapVertexShader">
        #define PI 3.1415926535897932384626433832795
        attribute float size;
        void main() {
          vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
          gl_PointSize = 3.0;
          gl_Position = projectionMatrix * mvPosition;
        }



        </script>
        <script type="x-shader/x-fragment" id="wrapFragmentShader">
        uniform sampler2D texture;
        void main(){
          vec4 textureColor = texture2D( texture, gl_PointCoord );
          if ( textureColor.a < 0.3 ) discard;
          vec4 dotColor = vec4(0.06, 0.18, 0.36, 0.4);
          vec4 color = dotColor * textureColor;
          gl_FragColor = color;
        }



        </script>

        <div class="page-wrap">
            <div id="fullpage">
                <div class="section active" id="#page-1">
                    <div class="content-wrap">
                        <h1 class="anim-delay delay-1"><span class="sub">DIGITAL-РЕШЕНИЯ</span><br/>ФЕДЕРАЛЬНОГО
                            МАСШТАБА</h1>
                        <p class="desc anim-delay delay-2">с 2001 года</p>
                        <div class="icon-mouse anim-delay delay-2">
                            <svg class="mouse-btn">
                                <use xlink:href="#icon-mouse-btn"></use>
                            </svg>
                            <svg class="mouse-scroll">
                                <use xlink:href="#icon-mouse-scroll"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="section" id="#page-2">
                    <h3 class="section-title">
                        <span class="anim-delay delay-1"><span class="symb">#</span><span
                                    class="num">6</span></span><br/>
                        <span class="anim-delay delay-2">В ЕДИНОМ РЕЙТИНГЕ ВЕБ-РАЗРАБОТЧИКОВ ПО ВЕРСИИ CMS MAGAZINE</span>
                    </h3>
                </div>
                <div class="section" id="#page-3">
                    <h3 class="section-title">
                        <span class="anim-delay delay-1"><span class="symb">#</span><span
                                    class="num">4</span></span><br/>
                        <span class="anim-delay delay-2">в рейтинге РУНЕТА СРЕДИ разработчиков сайтов органов власти государственных учреждений и корпораций</span>
                    </h3>
                </div>
                <div class="section section-client" id="#page-4">
                    <p class="sub-title anim-delay delay-1">НАШИ КЛИЕНТЫ</p>
                    <div id="slider-client" class="slider-wrap anim-delay delay-2" data-animate="fx12">
                        <div class="slick-slider">
                            <div class="slider-ell">
                                <h2 class="section-title animate-text">
                                    <div class="animate-text">ПРАВИТЕЛЬСТВО</div>
                                    <div class="animate-text">МОСКВЫ</div>
                                </h2>
                                <p class="desc animate-text">2007&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title animate-text">
                                    <div class="animate-text">Газпромнефть</div>
                                    <div class="animate-text">смазочные&nbsp;материалы</div>
                                </h2>
                                <p class="desc animate-text">2010&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">МИНЭКОНОМРАЗВИТИЯ</div>
                                    <div class="animate-text">РОССИИ</div>
                                </h2>
                                <p class="desc animate-text">2012&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">ФЕДЕРАЛЬНАЯ&nbsp;СЛУЖБА</div>
                                    <div class="animate-text">ПО&nbsp;ТРУДУ&nbsp;И&nbsp;ЗАНЯТОСТИ</div>
                                </h2>
                                <p class="desc animate-text">2013&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">ФЕДЕРАЛЬНАЯ&nbsp;СЛУЖБА</div>
                                    <div class="animate-text">ПО&nbsp;аккредитации</div>
                                </h2>
                                <p class="desc animate-text">2016&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Минпромторг</div>
                                    <div class="animate-text">России</div>
                                </h2>
                                <p class="desc animate-text">2017&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Минтруд</div>
                                    <div class="animate-text">РОССИИ</div>
                                </h2>
                                <p class="desc animate-text">2017&nbsp;-&nbsp;по&nbsp;настоящее&nbsp;время</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Правительство</div>
                                    <div class="animate-text">Московской&nbsp;области</div>
                                </h2>
                                <p class="desc animate-text">2013&nbsp;-&nbsp;2016</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Высший&nbsp;арбитражный</div>
                                    <div class="animate-text">суд&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2013&nbsp;-&nbsp;2014</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Министерство</div>
                                    <div class="animate-text">культуры&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2013&nbsp;-&nbsp;2014</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Генеральная</div>
                                    <div class="animate-text">прокуратура&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2013&nbsp;-&nbsp;2014</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Министерство</div>
                                    <div class="animate-text">юстиции&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2012&nbsp;-&nbsp;2013</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">ПРОМСВЯЗЬБАНК</div>
                                </h2>
                                <p class="desc animate-text">2011&nbsp;-&nbsp;2012</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">Госавтоинспекция</div>
                                    <div class="animate-text">МВД&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2011&nbsp;-&nbsp;2012</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">MEUCCI</div>
                                </h2>
                                <p class="desc animate-text">2010&nbsp;-&nbsp;2011</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">ВТБ24</div>
                                </h2>
                                <p class="desc animate-text">2009&nbsp;-&nbsp;2010</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">МИНИСТЕРСТВО</div>
                                    <div class="animate-text">ИНОСТРАННЫХ&nbsp;ДЕЛ&nbsp;РФ</div>
                                </h2>
                                <p class="desc animate-text">2007&nbsp;-&nbsp;2010</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">PANASONIC</div>
                                    <div class="animate-text">РОССИЯ</div>
                                </h2>
                                <p class="desc animate-text">2006&nbsp;-&nbsp;2009</p>
                            </div>
                            <div class="slider-ell">
                                <h2 class="section-title">
                                    <div class="animate-text">РАО</div>
                                    <div class="animate-text">РОСНЕФТЕГАЗСТРОЙ</div>
                                </h2>
                                <p class="desc animate-text">2003&nbsp;-&nbsp;2005</p>
                            </div>
                        </div>
                        <div class="nav-slider-wrap">
                            <div class="nav-slider">
                                <div class="arr-slide prev-slide">
                                    <svg class="arr__icon">
                                        <use xlink:href="#arr-left"></use>
                                    </svg>
                                </div>
                                <div class="arr-slide next-slide">
                                    <svg class="arr__icon">
                                        <use xlink:href="#arr-right"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section-contact" id="#page-5">
                    <h2 class="phone-fix anim-delay delay-1" data-tel="tel:+74956603869">+7 (495) 660-38-69</h2>
                    <a class="link-mail anim-delay delay-2" href="mailto:info@nsign.ru">info@nsign.ru</a>
                    <a class="desc anim-delay delay-3"
                       href="https://yandex.ru/maps/213/moscow/?source=wizgeo&utm_source=serp&l=map&utm_medium=maps-desktop&mode=search&z=17&where=37.456873%2C55.812186&ol=biz&oid=1286658836"
                       target="_blank">125367, МОСКВА, полесский проезд, д.16, стр.1</a>
                </div>
            </div>
        </div>
    </div>

    <div class="logo scroll-top"><img src="/static/default/img/nsign_logo.svg"></div>
    <button class="morphsearch-open btn-order button button--aylen button--text-thick button--text-upper button--round-l">
        СДЕЛАТЬ ЗАКАЗ
    </button>

    <?= ContactusWidget::widget() ?>
