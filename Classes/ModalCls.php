<?php
/**
 * Created by PhpStorm.
 * User: remco
 * Date: 9-11-2017
 * Time: 09:16
 */

class ModalCls
{
    private $modal;

    public function createModal($title, $content = "", $buttonType = "")
    {
        $this->setModal($this->getModal().'<div id="modal" class="modal fade" role="dialog">
                         <div class="modal-dialog"> ');

        $this->setModal($this->getModal(). '<div class="modal-content">
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title">'.$title.'</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>');

        $this->setModal($this->getModal(). '<div class="modal-body">
                                                '.$content.'
                                            </div>');

        $this->setModal($this->getModal(). '<div class="modal-footer">
            
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                            </div>
                                            </div>');

        return $this->getModal();
    }

    /**
     * @return mixed
     */
    public function getModal()
    {
        return $this->modal;
    }

    /**
     * @param mixed $modal
     */
    public function setModal($modal)
    {
        $this->modal = $modal;
    }
}