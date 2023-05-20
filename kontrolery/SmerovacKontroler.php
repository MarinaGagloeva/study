<?php

/**
 * Router pro projekt "Evidence pojištění", Marina Gagloeva
 */

class SmerovacKontroler extends Kontroler
{
 /**
     * @var Kontroler Instance kontrolleru
     */
    protected Kontroler $kontroler;

    /**
     * Převede pomlčkovou variantu controlleru na název třídy ve velbloudiNotace
     * @param string $text Řetězec v pomlckove-notaci
     * @return string Řetězec převedený do velbloudiNotace
     */
	private function pomlckyDoVelbloudiNotace(string $text) : string
	{
		$veta = str_replace('-', ' ', $text);
		$veta = ucwords($veta);
		$veta = str_replace(' ', '', $veta);
		return $veta;
	}


    /**
     * Naparsuje URL adresu  a vrátí pole parametrů
     * @param string $url URL adresa k naparsování
     * @return array Pole URL parametrů
     */
	private function parsujURL(string $url) : array
	{
		// Naparsuje jednotlivé části URL adresy do asociativního pole
        $naparsovanaURL = parse_url($url);
		// Odstranění počátečního lomítka
		$naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
		// Odstranění bílých znaků kolem adresy
		$naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
		// Rozbití řetězce podle lomítek
		$rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
		return $rozdelenaCesta;
	}

/**
     * Naparsování URL adresy a vytvoření příslušného controlleru
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry) : void
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);
        if (empty($naparsovanaURL[0]))		
        $this->presmeruj('pojistenci');	

		$tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';
        if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
			$this->kontroler = new $tridaKontroleru;
		else
			$this->presmeruj('chyba');
		
		// Volání controlleru
        $this->kontroler->zpracuj($naparsovanaURL);
		
		// Nastavení proměnných pro pohled
		$this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
		$this->data['popis'] = $this->kontroler->hlavicka['popis'];
		$this->data['klicova_slova'] = $this->kontroler->hlavicka['klicova_slova'];
		
		// Nastavení hlavního pohledu
		$this->pohled = 'rozlozeni';
    }

}
