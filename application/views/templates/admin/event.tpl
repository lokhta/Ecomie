<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>

        {foreach from=$event item=val key=key}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
        
                <td class="link_gestion">
                    <a href="{base_url()}Events/dashboard?event_id={$val.eventId}"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="{base_url()}Events/dashboard?event_id={$val.eventId}&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        {/foreach}
    </table>
   
        <div class="formContent" id="edit">
                {form_open($url, "class='form'")}
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("eventName",$eventDetail.eventName,"id='title'")}
                    </p>
                    <p class="field-content">
            {form_label("Debut date")}
            {form_date("eventDateStart",'',"id='Debut date'")}
        </p>
        <p class="field-content">
            {form_label("Debut heure")}
            {form_time("eventTimeStart",'',"id='Debut heure'")}
        </p>
        <p class="field-content">
            {form_label("Fin jour")}
            {form_date("eventDateEnd",'',"id='Fin jour'")}
        </p>
        <p class="field-content">
            {form_label("Fin heure")}
            {form_time("eventTimeEnd",'',"id='Fin heure'")}
        </p>
                {form_textarea('eventContent',$eventDetail.eventContent,'id="eventContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
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
        });
    </script>