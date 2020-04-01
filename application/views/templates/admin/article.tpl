<div>
    <table class="tab">
        <tr class="thead">
            <th class="col1">N° article</th>
            <th  class ="col4">Statut</th>
            <th class="col2">Titre</th>
            <th class="col3">Date de création</th>
            <th class="col3">Actions</th>
        </tr>
        {foreach from=$article key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.articleId}</td>
                <td>{$val.articleValidate}</td>
                <td>{$val.articleTitle}</td>
                <td>{$val.articleDate}</td>
                <td class="link_gestion">
                    <a href="{base_url()}Articles/dashboard?article_id={$val.articleId}"><i class="fas fa-search"></i></a>
                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
    <div id="formContent">
        {form_open('Articles/dashboard')}
        <p>
            {form_label("Catégorie")}
            {form_dropdown('articleCategory', $option, "id='cat'")}
        </p>
        <p>
            {form_label("Titre")}
            {form_input("articleTitle",'',"id='title'")}
        </p>
        {* <textarea type="text" name="articleContent" id="articleContent"></textarea> *}
        {form_textarea('articleContent','','id="articleContent" class="tinymce"')}
        {form_submit('valider','Valider','id="submit"')}
        {form_close()}
    </div>
</div>