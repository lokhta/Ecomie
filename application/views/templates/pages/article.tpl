    {include file="header.tpl" title="Ecomie - Article" name=$Name}


    <div id="modal">
        <div>
            <div class="btn-content">
                <a href="{base_url()}Articles/articles" class="btn">Retour</a>
            </div>
        
            <h2>{$articleDetail.articleTitle}</h2>
            <span>Publié par {$articleDetail.author} - {$articleDetail.date}</span>
            <p>{$articleDetail.articleContent}</p>
            <div id="article_comment">
                <div id="comments">
                    <div id="content_comments">

                    </div>
                </div>
            </div>
            {if $smarty.session.id}
                <button id="event_btn">Ajouter un commentaire</button>
            {/if}
        </div>
        
        <div class="formContent" id="display_content">
            {form_open("Comments/add_comment?article_id={$smarty.get.article_id}", "id='form_com'")}
                {form_textarea('commentContent','','id="commentContent"')}
                {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>

    
    </div>
    <script>
        $(document).ready(function(){
            let path_page = "Articles/articles";
            let get_name = "article_id";
            let get_value = "{$smarty.get.article_id}";
            let author_id = "{$smarty.session.id}";
        
            let url_page = base_url+path_page+"?"+get_name+"="+get_value;
        
            ajax_comment(url_page, get_name, get_value, path_page, author_id);
        })
    </script>


    {include file="footer.tpl"}