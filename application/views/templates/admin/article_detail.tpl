<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Articles/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>{$articleDetail.articleTitle}</h2>
                <span>Créé par {$articleDetail.author} - {$articleDetail.date}</span>
                <p>{$articleDetail.articleContent}</p>
            </div>
            <div class="content-action">
                {if $smarty.session.role == 1}
                    <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=1" class="btn btn-valid">Valider</a>
                    <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=2" class = "btn btn-fail">Refuser</a>
                {/if}
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;edit=1" class = "btn btn-edit">Modifier</a>
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;del=1" class = "btn btn-del">Supprimer</a>
            </div>
            <div class="formContent" id="edit">
                {form_open($url_form, "class='form'")}
                    <p class="field-content">
                        {form_label("Catégorie")}
                        {form_dropdown('articleCategory', $option, "id='cat'")}
                    </p>
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("articleTitle",$articleDetail.articleTitle,"id='title'")}
                    </p>
                {form_textarea('articleContent',$articleDetail.articleContent,'id="articleContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
        </div>
    </div>
</div>