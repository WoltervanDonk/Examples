<?php
class errorCls
{
    //Methods
    //Deze method geeft de alert weer in foute situaties
    public function bootstrapAlert($errorType, $errorTitle, $errorMessage)
    {
        $alert ='<div id="alertMessage" class="fixed-top alert alert-'.$errorType. '" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>'.$errorTitle.'!</strong> '.$errorMessage. '
                </div>';
        return $alert;
    }
}