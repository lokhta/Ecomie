    {include file="header.tpl" title="Ecomie - Article" name=$Name}


    <div id="modal">
        <div>
            <div class="btn-content">
                <a href="{base_url()}Articles/articles" class="btn">Retour</a>
            </div>
        
            <h2>{$articleDetail.articleTitle}</h2>
            <span>Publié par {$articleDetail.author} - {$articleDetail.date}</span>
            <p>{$articleDetail.articleContent}</p>
            <div id="comments">
                {if !$comment}
                    <p>Cette article n'a pas encore de commentaires</p>
                    {else}
                        {foreach from=$comment item=val key=key}
                            <div class="comments">
                                <p class="header_comment"><span class="comment_author">{$val.author}</span> le {$val.date} à  {$val.time}</p>
                                {if $val.commentAuthor !==  $smarty.session.id}
                                    <a href="#">Signaler</a>
                                {/if}
                                {if $val.commentAuthor == $smarty.session.id }
                                    <a href="#">Modifier</a>
                                    <a href="#">Supprimer</a>
                                {/if}
                                <p class="comment_content">{$val.commentContent}</p>
                            </div>
                            <hr>
                         {/foreach}   
                {/if}

            </div>
            {if $smarty.session.id}
                <button id="commentBtn">Ajouter un commentaire</button>
            {/if}
        </div>
        
        <div class="formContent" id="comment">
            {form_open($url)}
                {form_textarea('commentContent','','id="commentContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>

    
    </div>

    {include file="footer.tpl"}