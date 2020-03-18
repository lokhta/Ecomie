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
</div>