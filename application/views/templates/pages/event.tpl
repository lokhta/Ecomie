  {include file="header.tpl" title="Ecomie - Événement" name=$Name}

    <div id="modal">
        
            <div class="btn-content">
                <a href="{base_url()}Events/events" class="btn">Retour</a>
            </div>
            <div class="event__event">
                <h2>{$eventDetail.eventName}</h2>
                <span>Publié par {$eventDetail.eventAuthor} </span>
                <span> Date {$eventDetail.eventDateStart} - {$eventDetail.eventTimeStart} /
                    {$eventDetail.eventDateEnd}   {$eventDetail.eventTimeEnd}</span>
                <p> {$eventDetail.eventContent}</p>
            </div>
        <div id="event_comment">
            <div id="comments">
                <div id="content_comments"></div>
            </div>  
        </div>  
      {if $smarty.session.id}
                <button id="event_btn">Ajouter un commentaire</button>
                
            {/if}   
        <div class="formContent" id="display_content">
            {form_open("Comments/add_comment?event_id={$smarty.get.event_id}", "id='form_com'")}
                {form_textarea('commentContent','','id="commentContent"')}
                {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>  
    </div>
    <script>
        $(document).ready(function(){
            let get_name = "event_id";
            let get_value = "{$smarty.get.event_id}";
            let author_id = "{$smarty.session.id}";
        
            ajax_comment(get_name, get_value,author_id);
        })
    </script>
    {include file="footer.tpl"}