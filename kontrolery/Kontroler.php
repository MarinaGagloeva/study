<?php

/**
 * Výchozí kontroler pro projekt "Evidence pojištění", Marina Gagloeva
 */
abstract class Kontroler
{
 /**
     * @var array Pole s daty, které uvidí uživatel
     */
    protected array $data = array();
    /**
     * @var string Název pohledu bez přípony
     */
    protected string $pohled = "";
     /**
     * @var array|string[] Hlavička HTML stránky
     */
    protected array $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');

    /**
     * Vypíše pohled uživateli
     * @return void
     */
    public function vypisPohled() : void
    {
        if ($this->pohled)
        {
            extract($this->data);
            require("pohledy/" . $this->pohled . ".phtml");
        }
    }

    /**
     * Přesměruje na dané URL
     * @param string $url URL adresa, na kterou přesměrovat
     * @return never
     */
	public function presmeruj(string $url) : never
	{
		header("Location: /$url");
		header("Connection: close");
        exit;
	}

   




    /**
     * Hlavní metoda kontroleru
     * @param array $parametry Pole parametrů pro využití kontrolerem
     * @return void
     */
    abstract function zpracuj(array $parametry) : void;


}
