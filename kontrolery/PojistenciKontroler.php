<?php


/**
 * Kontroler pro uložení dat pojištěnců a vypis jejich seznamu pro projekt "Evidence pojištění", Marina Gagloeva
 */
class PojistenciKontroler extends Kontroler
{
    public function zpracuj(array $parametry) : void
    {

			// Vytvoření instance modelu
		$spravcePojistencu = new SpravcePojistencu();
		// Příprava prázdné tabulky s daty pojištěnců
		$pojistenec = array(
			'pojistenec_id' => '',
			'jmeno' => '',
			'prijmeni' => '',
			'vek' => '',
			'telefonni_cislo' => '',
			
		);
		// Je odeslán formulář
		if ($_POST)
		{
			// Získání dat z $_POST
			$klice = array( 'jmeno', 'prijmeni', 'vek', 'telefonni_cislo');
			$pojistenec = array_intersect_key($_POST, array_flip($klice));
			// Uložení dat do DB
			$spravcePojistencu->ulozNovehoPojistence($pojistenec);

			
			$this->presmeruj('pojistenci');

			}


		// Vypíšeme seznam pojištěnců
		
		$pojistenci = $spravcePojistencu->vratSeznamPojistencu();
		$this->data['pojistenci'] = $pojistenci;
		$this->pohled = 'pojistenci';
			
		$this->data['pojistenec'] = $pojistenec;
		$this->pohled = 'pojistenci';
    }

	

}
