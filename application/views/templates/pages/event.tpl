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
                    <div id="content_comments"></div>
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
            author_id = "{$smarty.session.id}";
            function getComment(){
                $.ajax({
                    url:"{base_url()}/Comments/get_comment?event_id={$smarty.get.event_id}",
                    method: 'get',
                    dataType: "json",

                    success:function(data){
                        html = '';
                        $.each(data, function(index, elem){
                            html += "<div class='comments'> <p> <span class='comment_author'>"+elem.author+"</span> le "+elem.date+" à "+elem.time+"</span>";
                            if(elem.commentAuthor == author_id){
                                html += "<button class='edit_com_btn btn'>Modifier</button>";
                                html+= "<a href='{base_url()}Comments/edit_comment?event_id={$smarty.get.event_id}&amp;comment_id="+elem.commentId+"&amp;del_com=1' class='btn' id='del_com'>Supprimer</a> </p>"
                            }else{
                                html+= "<a href='{base_url()}Articles/articles?event_id={$smarty.get.event_id}&amp;comment_id="+elem.commentId+"&amp;report_com=1' class='btn'>Signaler</a>"
                            }
                            html += "<p>"+elem.commentContent+"</p><hr></div>";
                        });
                        if(html == ""){
                            $('#content_comments').html("<p>Cette evenement n'a pas de commentaires</p>");
                        }else{
                            $('#content_comments').html(html); 
                        }
                        
                        
                    }
                });
            }
            getComment();

            $("#form_com").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "http://localhost/ecomie/Comments/add_comment?event_id={$smarty.get.event_id}",
                    method: "post",
                    data: $(this).serialize(),
                    dataType:"json",

                    success:function(data){
                        if(data.success){
                            $('#commentContent').html('');
                            getComment();
                        }
                    }
                });
            });
        });
    </script>
    {include file="footer.tpl"}