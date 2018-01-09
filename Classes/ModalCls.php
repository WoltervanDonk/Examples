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

    public function createModal()
    {
        setlocale(LC_TIME, 'NL_nl');
            foreach ($this->getModal() as $value)
            {
                return '<div class="modal fade" id="'.$value['id'].'">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">'.$value['title'].'</h5>
                                    <span type="text">
                                        <h8 aria-hidden="true">'.strftime('%e %B om %H:%M',time()).'</h8> 
                                    </span>
                                </div>
                                <div class="modal-body">
                                    <p>'.$value['body'].'</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">'.$value['discardButton'].'</button> 
                                    <form method="post"><input type="submit" name="'.$value['buttonName'].'" value="'.$value['confirmButton'].'"  class="btn btn-primairy"></input></form>
                                </div>
                            </div>
                        </div>
                    </div> ';
            }
    }

    public function modal($modal)
    {
//if modal is confim prepare the confirm modal.
        switch ($modal)
        {
            case ('delete'):
                $this->setModal(array
                    (
                        array(
                            'id' => 'confirm-delete',
                            'title' => 'Confirmation',
                            'body' => 'Weet u zeker dat u wilt verwijderen?',
                            'discardButton' => 'Nee',
                            'buttonName' => 'delete',
                            'confirmButton' => 'Ja'
                        )
                    )
                );
                break;

            case ('confirm logout'):
                $this->setModal(array
                    (
                        array(
                            'title' => 'Modal1',
                            'body' => 'dit is een body test',
                            'confirmButton' => 'ja',
                            'discardButton' => 'nee'
                        )
                    )
                );
                break;
        }

        echo $this->createModal($this->getModal());
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