<?php
/**
 * Filme Active Record
 * @author  <your-name-here>
 */
class Filme extends TRecord
{
    const TABLENAME = 'filme';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $genero;
    private $distribuidor;
    private $ators;
    private $criticas;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('titulo');
        parent::addAttribute('duracao');
        parent::addAttribute('dt_lcto');
        parent::addAttribute('orcamento');
        parent::addAttribute('genero_id');
        parent::addAttribute('distribuidor_id');
    } 
  }