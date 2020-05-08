    {include file="header.tpl" title="Ecomie - Article" name=$Name}


    <div id="modal">
        <div>
            <div class="btn-content">
                <a href="{base_url()}Articles/articles" class="btn">Retour</a>
            </div>
            {* article start *}
            <h2>{$articleDetail.articleTitle}</h2>
            <span>Publié par {$articleDetail.author} - {$articleDetail.date}</span>
            <p>{$articleDetail.articleContent}</p>
            {* article end *}

            {* partage start *}
            <div id="share_content">
                <button id="share_btn"><i class="fas fa-share-alt"></i> Partager</button><span id="success"></span>
                <div id='share_form_content'>
                    <form action='{base_url()}Email/send_page' id='share_form'>
                    </form>
                </div>
            </div>
            {* paratge end *}

            {* Commentaire start *}
            <div id="comments">
            <div class="pagination_link">{$pagination}</div>
                <div id="content_comments">

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
        {* Commentaire end *}
    
    </div>
    <script>

        
        $(document).ready(function(){
            
            //Ajax commentaire
            let path_page = "Articles/articles";
            let get_name = "article_id";
            let get_value = "{$smarty.get.article_id}";
            let author_id = "{$smarty.session.id}";
        
            let url_page = base_url+path_page+"?"+get_name+"="+get_value;
        
            ajax_comment(url_page, get_name, get_value, path_page, author_id);


            //Partager un article
            let url_com = "{base_url()}Articles/articles?article_id={$smarty.get.article_id}";
            send_page_email(url_com);
        });



    </script>


    {include file="footer.tpl"}