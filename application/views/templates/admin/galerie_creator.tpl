<span id="success" class="message_success">
{if $reponse}
    {$reponse}
{/if}
</span>
{form_open_multipart("galeries/editor","id='form_image'")}
    {form_dropdown('imgEvent', $option, '',"id='imgEvent'")}
    {form_input("imgAlt", "", "id='imgAld'")}
    {form_upload("imgName",'',"id='imgName'")}
    {form_submit('valider','Valider','id="upload"')}
{form_close()}