<div>
    <table>
        <tr>
            <th class="col1">N° article</th>
            <th class="col2">Titre</th>
            <th class="col3">Date de création</th>
            <th  class ="col4">Statut</th>
        </tr>
        {foreach from=$article key=key item=val}
            <tr>
                <td>{$val.articleId}</td>
                <td>{$val.articleTitle}</td>
                <td>{$val.articleDate}</td>
                <td>{$val.articleValidate}</td>
            </tr>
        {/foreach}
    </table>
    <div id="formContent">
        {form_open('dashboard/articles')}
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