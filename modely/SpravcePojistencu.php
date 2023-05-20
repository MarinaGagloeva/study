<?php


/**
 * Třída poskytuje metody pro správu pojištěnců pro projekt "Evidence pojištění", Marina Gagloeva
 */
 
class SpravcePojistencu
{
	/**
	 * Vloží nového pojištěnce do systému.
	
	 * @param array $pojistenec Asociativní pole s daty pojištěnce.
	 * @return void
	 */
	public function ulozNovehoPojistence(array $pojistenec) : void
	{
		
			Db::vloz('pojistenci', $pojistenec);
		
	}

	



	
	/**
	 * Vrátí seznam pojištěnců v databázi
	 * @return array Informace o všech pojištěních 
	 */
	public function vratSeznamPojistencu() : array
	{
		return Db::dotazVsechny('
			SELECT `pojistenec_id`, `jmeno`, `prijmeni`, `vek`, `telefonni_cislo`
			FROM `pojistenci` 
			ORDER BY `pojistenec_id` 
		');
	}
	
}