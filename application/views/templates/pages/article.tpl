    {include file="header.tpl" title="Ecomie - Article" name=$Name}


    <div id="modal">
        <div>
            <div class="btn-content">
                <a href="{base_url()}Articles/articles" class="btn">Retour</a>
            </div>
        
            <h2>{$articleDetail.articleTitle}</h2>
            <span>Publié par {$articleDetail.author} - {$articleDetail.date}</span>
            <p>{$articleDetail.articleContent}</p>
            <div id="comments">
                <div id="content_comments"></div>
            </div>
            {if $smarty.session.id}
                <button id="commentBtn">Ajouter un commentaire</button>
            {/if}
        </div>
        
        <div class="formContent" id="comment">
            {form_open("Comments/add_comment?article_id={$smarty.get.article_id}", "id='form_com'")}
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
                    url:"{base_url()}/Comments/get_comment?article_id={$smarty.get.article_id}",
                    method: 'get',
                    dataType: "json",

                    success:function(data){
                        html = '';
                        $.each(data, function(index, elem){
                            html += "<div class='comments'> <p> <span class='comment_author'>"+elem.author+"</span> le "+elem.date+" à "+elem.time+"</span>";
                            if(elem.commentAuthor == author_id){
                                html += "<button class='edit_com_btn btn'>Modifier</button>";
                                html+= "<a href='{base_url()}Comments/edit_comment?article_id={$smarty.get.article_id}&amp;comment_id="+elem.commentId+"&amp;del_com=1' class='btn' id='del_com'>Supprimer</a> </p>"
                            }else{
                                html+= "<a href='{base_url()}Articles/articles?article_id={$smarty.get.article_id}&amp;comment_id="+elem.commentId+"&amp;report_com=1' class='btn'>Signaler</a>"
                            }
                            html += "<p>"+elem.commentContent+"</p><hr></div>";
                        });
                        $('#content_comments').html(html);
                        
                        
                    }
                });
            }
            getComment();

            $("#form_com").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "http://localhost/ecomie/Comments/add_comment?article_id={$smarty.get.article_id}",
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