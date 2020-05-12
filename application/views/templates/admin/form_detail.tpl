<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Messages/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>Envoyé par {$formDetail.formSenderName} - <{$formDetail.formSendermail}></h2>
                <p id="subject_message">Objet : {$formDetail.formSubject}</p>
                <span>Message : </span>
                <p id="message_content">{$formDetail.formMessage}</p>
            </div>
            <div class="content-action">
                <button style="border:0px" class="btn .btn-edit" id="event_btn">Répondre</button>
                <button style="border:0px" class="delete btn btn_del" data-link="{base_url()}forms/dashboard?form_id={$smarty.get.form_id}&amp;del=1">Supprimer</button>
            </div>
            <span id="success"></span>
            <div id="display_content">
                <form action="{base_url()}Email/send_reponse" id="form_reponse">
                </form>
            </div>

        </div>
    </div>
</div>

<script>

$(document).ready(function(){

    $("#event_btn").one("click", function(){

        let html = '<input type="checkbox" name="recipient" value="{$formDetail.formSendermail}" checked style="display:none">';
            html += '<p>Objet</p><input type="text" name=" subject" id="subject">';
            html += '<p>Message</p><textarea name="reponse" cols="20" rows="20" id="msg"></textarea>';
            html += '<input type="submit" value="Envoyer" id="submit">';
        $("#form_reponse").html(html)
    });

    $("#form_reponse").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            method: "get",
            data:$(this).serialize(),
            dataType: "json",

            success: function(data){
                
                if(data.error){
                    $("#success").html(data.error);
                }else if(data.success){
                    $("#success").html(data.success);
                    $("#subject").val("");
                    $("#msg").val("");
                }
                
                $("#display_content").css("display", "none");

                setTimeout(hideMessage, 3000);
            }

        });
    });
});


</script>