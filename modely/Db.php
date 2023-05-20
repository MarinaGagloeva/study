<?php

/** 
 * Wrapper pro práci s databází pro projekt "Evidence pojištění", Marina Gagloeva.
 */
class Db {

    /**
     * @var PDO Databázové spojení
     */
    private static $spojeni;

    /**
     * @var array Výchozí nastavení ovladače
     */
    private static array $nastaveni = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

    /**
     * Připojí se k databázi pomocí daných údajů
     * @param string $host Hostitel databáze
     * @param string $uzivatel Přihlašovací jméno
     * @param string $heslo Přihlašovací heslo
     * @param string $databaze Název databáze
     * @return void
     */
    public static function pripoj(string $host, string $uzivatel, string $heslo, string $databaze) : void
    {
		if (!isset(self::$spojeni)) {
			self::$spojeni = @new PDO(
				"mysql:host=$host;dbname=$databaze",
        $uzivatel,
				$heslo,
				self::$nastaveni
			);
		}
	}

    
    /**
     * Spustí dotaz a vrátí všechny jeho řádky
     * @param string $dotaz SQL dotaz s parametry nahrazenými otazníky
     * @param array $parametry Parametry pro doplnění do připraveného SQL dotazu
     * @return array Pole asociativních pole s informacemi o všech řádcích výsledku
     */
    public static function dotazVsechny(string $dotaz, array $parametry = array()) : array
    {
		$navrat = self::$spojeni->prepare($dotaz);
		$navrat->execute($parametry);
		return $navrat->fetchAll();
	}


  /**
	 * Vloží do tabulky nový řádek jako data z asociativního pole
	 * @param string $tabulka Název databázové tabulky
	 * @param array $parametry Asociativní pole parametrů pro vložení
	 * @return bool TRUE v případě úspěšného provedení dotazu
	 */
	public static function vloz(string $tabulka, array $parametry = array()) : bool
	{
		return self::dotaz("INSERT INTO `$tabulka` (`".
		implode('`, `', array_keys($parametry)).
		"`) VALUES (".str_repeat('?,', sizeOf($parametry)-1)."?)",
			array_values($parametry));
	}


   /**
     * Spustí dotaz a vrátí počet ovlivněných řádků
     * @param string $dotaz SQL dotaz s parametry nahrazenými otazníky
     * @param array $parametry Parametry pro doplnění do připraveného SQL dotazu
     * @return int Počet ovlivněných řádků
     */
	public static function dotaz(string $dotaz, array $parametry = array()) : int
  {
  $navrat = self::$spojeni->prepare($dotaz);
  $navrat->execute($parametry);
  return $navrat->rowCount();
}
 

}