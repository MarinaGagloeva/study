<?php



/**
 * Kontroler pro zpracování chybové stránky pro projekt "Evidence pojištění", Marina Gagloeva
 */
class ChybaKontroler extends Kontroler
{
    public function zpracuj(array $parametry) : void
    {
		// Hlavička požadavku
		header("HTTP/1.0 404 Not Found");
		// Hlavička stránky
		$this->hlavicka['titulek'] = 'Chyba 404';
		// Nastavení pohledu
		$this->pohled = 'chyba';
    }
}