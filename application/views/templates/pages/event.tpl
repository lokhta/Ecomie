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
       
            <div id="comments">
                {if !$comment}
                    <p>Cette événement n'a pas encore de commentaires</p>
                    {else}
                        {foreach from=$comment item=val key=key}
                            <div class="comments">
                                <div class="header_comment">
                                    <P>   <span class="comment_author">{$val.author}</span> le {$val.date} à  {$val.time}</span>
                                    <div class="btn_content">
                                        {if $val.commentAuthor !==  $smarty.session.id}
                                            <a href="{base_url()}Events/events?event_id={$smarty.get.event_id}&amp;comment_id={$val.commentId}&amp;report_com=1" class="btn">Signaler</a>
                                        {/if}

                                        {if $val.commentAuthor == $smarty.session.id }
                                                <button class="edit_com_btn btn">Modifier</button>
                                                <a href="{base_url()}Comments/edit_comment?event_id={$smarty.get.event_id}&amp;comment_id={$val.commentId}&amp;del_com=1" class="btn">Supprimer</a>
                                        {/if}
                                    </div>
                                </div>



                                <div class="comment_content">{$val.commentContent}</div>
                                <div class="edit_com">
                                    <form action="{base_url()}Comments/edit_comment?event_id={$smarty.get.event_id}&amp;comment_id={$val.commentId}&amp;edit_com=1" method="post">
                                    <textarea name="commentContent" id="commentContent" value="" >{$val.commentContent}</textarea>
                                    <input type='submit' value="Modifier" id="submit">
                                    </form>
                                </div>
                            </div>
                            <hr>
                         {/foreach}   
                {/if}

     </div>    
      {if $smarty.session.id}
                <button id="commentBtn">Ajouter un commentaire</button>
                
            {/if}   
        <div class="formContent" id="comment">
            {form_open($url)}
                {form_textarea('commentContent','','id="commentContent"')}
                {form_submit('valider','Valider','id="submit"')}
            {form_close()}
        </div>  
    </div>
    {include file="footer.tpl"}