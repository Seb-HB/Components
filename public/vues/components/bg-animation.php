<section id="sf_bg-animation">
        <div class="sf_bg-animated">
            <div class="sf_bg-anim-blob">
                <div class="sf_blobs"></div>
                <div class="sf_blobs"></div>
                <div class="sf_blobs"></div>
                <div class="sf_blobs"></div>
                <div class="sf_blobs"></div>
                <div class="sf_blobs"></div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="Alpha">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            <feBlend in="SourceGraphic" in2="goo" />
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="sf_bg-anim-text">
                <p>Sébastien</p>
                <span>F</span>
                <span>o</span>
                <span>u</span>
                <span>v</span>
                <span>e</span>
                <span>t</span>
                <p>Développeur Web FullStack Junior</p>
            </div>
            <ul class="sf_bg-anim-form">
                <li class="cube1"></li>
                <li class="cube2"></li>
                <li class="cube1"></li>
                <li class="cube2"></li>
                <li class="cube1"></li>
                <li class="cube2"></li>
                <li class="cube1"></li>
                <li class="cube2"></li>
                <li class="cube1"></li>
                <li class="cube2"></li>
                <li class="cube1"></li>
                <li class="cube2"></li>
                <!-- child(14) début étoiles-->
                <li class="sf_stars sf_rotate-right">*</li>
                <li class="sf_stars sf_rotate-left">*</li>
                <li class="sf_stars sf_rotate-right">*</li>
                <li class="sf_stars sf_rotate-left">*</li>
                <li class="sf_stars sf_rotate-right">*</li>
                <li class="sf_stars sf_rotate-left">*</li>
            </ul>
            <div class="sf_bg-anim-title">
                <h2>Bienvenue sur mon site en cours de construction</h2>
                <p>Ce site est un ensemble de composants indépendants qui utilisent diverses technologies</p>
                <p>C'est un portfolio de mes expériences, dont cet écran de présentation en pur CSS</p>
                <p>Vous y trouverez aussi des infos sur moi ainsi q'un formulaire de contact</p>
                <a href="#sf-navbar" class="sf_btn">Explorer</a>
                <a href="#sf-navbar" class="sf_chevrons"><img src="img/icons/chevrondoubledown.png" alt="Explorer mes expériences"></a>
            </div>
            <div class="sf_bg-anim-infos">
                <div class="sf_modal">
                    <h2>Arrière plan animé</h2>
                    <p>Cette section utilise les animations CSS.</p>
                    <p>Pour le texte j'utilise des transformations telles que <code>rotate</code> ou <code>translate</code> et je joue aussi avec les opacités</p>
                    <p>le fond quand à lui est composé de blocs avec des <code>border</code> qui sont soumis simultanément à un <code>skew</code>, un <code>rotate</code> et <code>translate</code></p>
                </div>
                <img src="img/icons/infos-help.png" alt="Plus d'informations sur ce composant" class="sf_img-responsive">
            </div>
        </div>
    </section>