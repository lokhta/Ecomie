<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Newsletters/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>{$newsDetail.newsTitle}</h2>
                <span>Créé le {$newsDetail.date}</span>
                <p>{$newsDetail.newsContent}</p>
            </div>
            <div class="content-action">
                {if $smarty.session.role == 1}
                    <a href="{base_url()}Newsletters/dashboard?news_id={$smarty.get.news_id}&amp;edit=1" class = "btn btn-edit">Modifier</a>
                    <a href="{base_url()}Newsletters/dashboard?news_id={$smarty.get.news_id}&amp;del=1" class = "btn btn-del">Supprimer</a>
                {/if}

            </div>
            <div class="formContent" id="edit">
                {form_open($url_form, "class='form'")}
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("newsTitle",$newsDetail.newsTitle,"id='title'")}
                    </p>
                {form_textarea('newsContent',$newsDetail.newsContent,'id="newsContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
        </div>
    </div>
</div>