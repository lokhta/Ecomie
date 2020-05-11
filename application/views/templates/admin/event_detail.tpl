<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Events/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>{$eventDetail.eventName}</h2>
                <span>Publié par {$eventDetail.eventAuthor} </span>
                <span>Date {$eventDetail.eventDateStart} - {$eventDetail.eventTimeStart} /
                    {$eventDetail.eventDateEnd}   {$eventDetail.eventTimeEnd}</span>
                <p>{$eventDetail.eventContent}</p>
            </div>
            <div class="content-action">
                <a href="{base_url()}Events/dashboard?event_id={$smarty.get.event_id}&amp;edit=1" class = "btn btn-edit" id="event_btn">Modifier</a>
                <button style="border:0px" class="delete btn btn_del" data-link="{base_url()}Events/dashboard?event_id={$smarty.get.event_id}&amp;del=1">Supprimer</button>
            </div>
            <div class="formContent" id="display_content">
                {form_open($url_form, "class='form'")}
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("eventName",$eventDetail.eventName,"id='title'")}
                    </p>
                {form_textarea('eventContent',$eventDetail.eventContent,'id="eventContent" class="ckeditor"')}
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
        });
</script>