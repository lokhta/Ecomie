{form_open_multipart("galeries/editor")}
    {form_dropdown('imgEvent', $option, "id='imgEvent'")}
    {form_input("imgAlt", "", "id='imgAld'")}
    {form_upload("imgName",'',"id='imgName'")}
    {form_submit('valider','Valider','id="submit"')}
{form_close()}

