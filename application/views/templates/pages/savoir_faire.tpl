    {include file="header.tpl" title="Ecomie - Savoir-Faire" name=$Name}
    <div class="btn-content" id="btn-create-art">
        {if $smarty.session.id}
            <a href="{base_url()}Articles/dashboard" class="btn">Créer un article</a> 
        {/if}
    </div>
    <div id="search_content">
        {* {form_open('Articles/articles', 'id="form_search"')}
            {{form_input("formContent",'',"id='formContent'")}}
            {form_submit('envoyer','Envoyer','id="bouton__form"')}
        {form_close()} *}
        <form action="{base_url()}Articles/articles?search=1" method="post" id="form_search">
            <input type="text" name="keyword" class="field_search">
            <input type="submit" value="Rechercher" class="btn btn_search">
        </form>
    </div>
    <div class="contenaire__bloc">
        {foreach from=$article item=val key=key}
            <section class="savoir__faire">
                <a class="{$val.category}__bloc" href="{base_url()}Articles/articles?article_id={$val.articleId}">
                    <div class="{$val.category}__logo">
                        <img src="{base_url()}assets/img/{$val.category}" alt="">
                    </div>
                    <div class="{$val.category}__titre">
                        <h2>{$val.articleTitle}</h2>
                    </div>
                </a>
                <div class="auteur">
                    <p>{$val.author}</p>
                    <p>{$val.date}</p>
                </div>
            </section>
        {/foreach}    

    </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="{base_url()}assets/img/facebook.svg" alt="Facebook"></a>
        </section>
{include file="footer.tpl"}