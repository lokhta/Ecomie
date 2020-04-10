  {include file="header.tpl" title="Ecomie - Article" name=$Name}

    <div id="modal">
        
            <div class="btn-content">
                <a href="{base_url()}Events/events" class="btn">Retour</a>
            </div>
            <div class="event__event">
            <h2>{$eventDetail.eventName}</h2>
            <span>Publié par {$eventDetail.eventAuthor} </span>
            <span> Date {$eventDetail.eventDateStart} - {$eventDetail.eventTimeStart} /
                {$eventDetail.eventDateEnd}   {$eventDetail.eventTimeEnd}</span>
            <p>{$eventDetail.eventContent}</p>
            
            {if $smarty.session.id}
                <button id="commentBtn">Commenter</button>
            {/if}
        </div>
        <div class="formContent" id="comment" style="display: none">
        {form_open('pages/events?event_id=')}
            {form_textarea('','','id="commentContent" class="ckeditor"')}
            {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>

        <div id="comments"></div>

    </div>

    {include file="footer.tpl"}