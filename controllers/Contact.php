<?php
namespace controllers;

class Contact extends \app\Controller{


    public function __construct() {
        $this->css = "/css/contact.css";
    }


    /*Cette méthode affiche la page principale*/
    public function index(): void{
        // On garde la structure avec une variable $main pour anticiper un éventuel besoin
        $main = array();

        // On envoie les données à la vue index
        $this->render('index', compact('main'));
    }
}
?>