<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Articles/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>{$articleDetail.articleTitle}</h2>
                <span>Publié par {$articleDetail.articleAuthor} - {$articleDetail.articleDate}</span>
                <p>{$articleDetail.articleContent}</p>
            </div>
            <div class="content-action">
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=1" class="btn btn-valid">Valider</a>
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=2" class = "btn btn-fail">Refuser</a>
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;edit=1" class = "btn btn-edit">Modidfier</a>
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;del=1" class = "btn btn-del">Supprimer</a>
            </div>
            <div class="formContent" id="edit">
                {form_open($url)}
                {form_textarea('articleContent',$articleDetail.articleContent,'id="articleContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
        </div>
    </div>
</div>