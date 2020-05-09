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
                {if $smarty.session.role == 2}
                    <button style="border:0px" class="accept btn btn-valid" data-link="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=1">Valider</button>
                    <button style="border:0px" class="refuse btn btn-fail" data-link="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;valide=2">Refuser</button>
                {/if}
                <a href="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;edit=1" class = "btn btn-edit" id="event_btn">Modifier</a>
                <button style="border:0px" class="delete btn btn_del" data-link="{base_url()}Articles/dashboard?article_id={$smarty.get.article_id}&amp;del=1">Supprimer</button>
            </div>
            <div class="formContent" id="display_content">
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


<script>
        $(function() {

            $('.delete').click(function() {
                var ok = confirm('Êtes-vous sûr de vouloir supprimer ?');
                if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
               }
            });

            $('.accept').click(function() {
                var ok = confirm('Valider cet article ?');
                if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
               }
            });

            $('.refuse').click(function() {
                var ok = confirm('Refuser cet article ?');
                if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
               }
            });
        });
</script>