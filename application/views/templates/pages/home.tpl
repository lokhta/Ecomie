        {include file="header.tpl" title="Ecomie - Accueil" name=$Name}
        <div id=background>
            <div class="slider">
                <div class="slides">

                    <div class="slide">
                        <p class="slide_texte">Ecomie oeuvre
                            pour le partage</br> de savoir-faire et les
                            services </br> écoresponsable entre voisin.
                    </div>
                    <div class="slide">
                        <p class="slide_texte">Des savoir faire pour réaliser</br>ses propres produits</br>
                            respectueux de l'environement.</p>
                    </div>
                    <div class="slide">
                        <p class="slide_texte">Des événements locaux</br> et amusant</br> à vivre ensemble</p>
                    </div>
                </div>
            </div>
        </div>
        <section id="impact">
            <div class="terre">
                <img class="centrer" src="{$base_url}assets/img/terre.png" alt="Terre">
                <p>réduison notre impact</br>sur la planéte</br>par la force du groupe</p>
            </div>
            <div class="terre">
                <img src="{$base_url}assets/img/partage_2.png" alt="Partage">
                <p>Apprendre et partager </br> avec ses proches</p>
            </div>
            <div class="terre">
                <img src="{$base_url}assets/img/qartier.png" alt="Quartier">
                <p>Ce retrouver lors </br>d'événements et défi</br>de quartier convivial</p>
            </div>
        </section>
        <section id="letter">
            <p class="news">Ce n'est que le début </br>inscrit toi à la newsletter pour les derniéres astuces.</p>
            <div id="newsletter">
                <label for="Newsletter"></label>
                <input id="mail" type="text" name ="subscribeEmail" id="Newsletter" placeholder="Entrez votre adresse mail">
                <button class="bouton">Souscrivez </button>
            </div>
        </section>
        {include file="footer.tpl"}
