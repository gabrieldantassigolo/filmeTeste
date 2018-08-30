<?php

class FilmeForm extends TPage
{
    private $form;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new TQuickForm('form_filme');
        $this->form->setFormTitle('Formulário Filme');
        $this->form->class = 'tform';
        
        $id = new TEntry('id');
        $titulo = new TEntry('titulo');
        $diretor = new TEntry('diretor');
        $id_suporte = new TCombo('id_suporte');
        $id_genero = new TCombo('id_genero');
        $dt_lcto = new TData('dt_lcto');
        $duracao = new TEntry('duracao');
        
        $id->setEditable(FALSE);
        $duracao->setMask('999');
        
        $id_suporte->addItems(array(1=> 'DVD', 2=> 'Blu-ray'));//lasqueira
        $id_genero->addItems(array(1=> 'Musical', 2=> 'Comédia', 3=> 'Aventura'));
        
        $this->form->addQuickField('ID', $id, 50);
        $this->form->addQuickField('Titulo', $titulo, 200);
        $this->form->addQuickField('Duração', $diretor, 100);
        $this->form->addQuickField('Dta. Lançam.', $id_suporte, 100);
        $this->form->addQuickField('Orçamento', $id_genero, 100);
        $this->form->addQuickField('Gênero', $dt_lcto, 100);
        $this->form->addQuickField('Distribuidor', $duracao, 100);
        
        $save = new TAction(array($this, 'onSave'));
        $this->form->addQuickAction(_t('Save'), $save, 'ico_save.png');
        
        parent::add($this->form);

    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('filme_teste');
            
            $object = $this->form->getData('Filme');
            
            $object->store();
            
            $this->form->setData($object);
            
            new TMessage('info', 'Objeto registrado com sucesso.');
            
            TTransaction::close();
        }
        catch(Exception $e)
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
