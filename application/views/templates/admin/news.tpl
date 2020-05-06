<div>
    <table class="tab">
        <tr class="thead">
            <th>N° article</th>
            <th>Titre</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>
        {foreach from=$news key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.newsId}</td>
                <td>{$val.newsTitle}</td>
                <td>{$val.date}</td>
                <td class="link_gestion">
                    <a href="{base_url()}Newsletters/dashboard?news_id={$val.newsId}"><i class="fas fa-search"></i></a>
                    <a href="{base_url()}Newsletters/dashboard?news_id={$val.newsId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
    <div id="formContent">
        {form_open('Newsletters/dashboard', 'class="form"')}
        <p class="field-content">
            {form_label("Titre")}
            {form_input("newsTitle",'',"id='title'")}
        </p>
        {* <textarea type="text" name="articleContent" id="articleContent"></textarea> *}
        {form_textarea('newsContent','','id="newsContent" class="ckeditor"')}
        {form_submit('valider','Valider','id="submit"')}
        {form_close()}
    </div>
</div>
