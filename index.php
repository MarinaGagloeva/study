<?php

/**
 * index.php pro projekt "Evidence pojištění", Marina Gagloeva.
 */

// Nastavení interního kódování pro funkce pro práci s řetězci
mb_internal_encoding("UTF-8");

/**
 * Callback pro automatické načítání tříd controllerů a modelů
 * @param string $trida Název třídy k načtení
 * @return void
 */
function autoloadFunkce(string $trida) : void
{
    // Končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Kontroler$/', $trida))
        require("kontrolery/" . $trida . ".php");
    else
        require("modely/" . $trida . ".php");
}

// Registrace callbacku 
spl_autoload_register("autoloadFunkce");

// Připojení k databázi
Db::pripoj("127.0.0.1", "root", "", "pojisteni");

// Vytvoření routeru a zpracování parametrů od uživatele z URL
$smerovac = new SmerovacKontroler();
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));

// Vyrenderování pohledu
$smerovac->vypisPohled();

