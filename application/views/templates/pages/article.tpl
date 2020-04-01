    {include file="header.tpl" title="Ecomie - Article" name=$Name}

    <div id="modal">
        <div>
            <div class="btn-content">
                <a href="{base_url()}Articles/articles" class="btn">Retour</a>
            </div>
        
            <h2>{$articleDetail.articleTitle}</h2>
            <span>Publié par {$articleDetail.articleAuthor} - {$articleDetail.articleDate}</span>
            <p>{$articleDetail.articleContent}</p>
            
            {if $smarty.session.id}
                <button id="commentBtn">Commenter</button>
            {/if}
        </div>
        <div class="formContent" id="comment" style="display: none">
        {form_open('pages/articles?article_id=')}
            {form_textarea('','','id="commentContent" class="ckeditor"')}
            {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>

        <div id="comments"></div>

    </div>

    {include file="footer.tpl"}