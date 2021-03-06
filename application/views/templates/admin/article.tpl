<div>
    <table class="tab">
        <tr class="thead">
            <th>N° article</th>
            <th>Statut</th>
            <th>Titre</th>
            <th>Date de création</th>
            {if $smarty.session.role == 1}
                <th>Auteur</th>
            {/if}
            <th>Actions</th>
        </tr>
        {foreach from=$article key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.articleId}</td>
                {if $val.articleValidate == 0}
                    <td><i class="fas fa-hourglass-half"></i></td>
                    {elseif $val.articleValidate == 1}
                    <td><i class="far fa-check-circle"></i></td>
                    {elseif $val.articleValidate == 2}
                    <td><i class="far fa-times-circle"></i></td>
                {/if}
                <td>{$val.articleTitle}</td>
                <td>{$val.date}</td>
                {if $smarty.session.role == 1}
                    <td>{$val.author}</td>
                {/if}
                <td class="link_gestion">
                    <a href="{base_url()}Articles/dashboard?article_id={$val.articleId}"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="{base_url()}Articles/dashboard?article_id={$val.articleId}&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        {/foreach}
    </table>
    <div id="formContent">
        {form_open('Articles/dashboard', 'class="form"')}
        <p class="field-content">
            {form_label("Catégorie")}
            {form_dropdown('articleCategory', $option, "id='cat'")}
        </p>
        <p class="field-content">
            {form_label("Titre")}
            {form_input("articleTitle",'',"id='title'")}
        </p>
        {* <textarea type="text" name="articleContent" id="articleContent"></textarea> *}
        {form_textarea('articleContent','','id="articleContent" class="tinymce"')}
        {form_submit('valider','Valider','id="submit"')}
        {form_close()}
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
        });
    </script>
