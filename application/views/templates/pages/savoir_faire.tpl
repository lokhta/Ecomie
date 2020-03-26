    {include file="header.tpl" title="Ecomie - Savoir-Faire" name=$Name}
    <div class="btn-content" id="btn-create-art">
        <a href="{base_url()}dashboard/articles" class="btn">Créer un article</a>
    </div>
    <div class="contenaire__bloc">
            {foreach from=$article item=val key=key}
                <section class="savoir__faire">
                    <a class="{$val.articleCategory}__bloc" href="{base_url()}pages/articles?article_id={$val.articleId}">
                        <div class="{$val.articleCategory}__logo">
                            <img src="{base_url()}assets/img/{$val.articleCategory}" alt="">
                        </div>
                        <div class="{$val.articleCategory}__titre">
                            <h2>{$val.articleTitle}</h2>
                        </div>
                    </a>
                    <div class="auteur">
                        <p>{$val.articleAuthor}</p>
                        <p>{$val.articleDate}</p>
                    </div>
                </section>
            {/foreach}    
         

        </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="{base_url()}assets/img/facebook.svg" alt="Facebook"></a>
        </section>
{include file="footer.tpl"}