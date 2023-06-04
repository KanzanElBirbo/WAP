<?php

class SpravceUzivatelu
{

	public function vratOtisk(string $heslo): string
	{
		return password_hash($heslo, PASSWORD_DEFAULT);
	}

	public function registruj(string $jmeno, string $heslo, string $hesloZnovu, string $rok): void
	{
		if ($rok != date('Y'))
			throw new ChybaUzivatele('Chybně vyplněný antispam.');
		if ($heslo != $hesloZnovu)
			throw new ChybaUzivatele('Hesla nesouhlasí.');
		$uzivatel = array(
			'jmeno' => $jmeno,
			'heslo' => $this->vratOtisk($heslo),
		);
		try {
			Db::vloz('uzivatele', $uzivatel);
		} catch (PDOException $chyba) {
			throw new ChybaUzivatele('Uživatel s tímto jménem je již zaregistrovaný.');
		}
	}

	public function prihlas(string $jmeno, string $heslo): void
	{
		$uzivatel = Db::dotazJeden('
			SELECT uzivatele_id, jmeno, admin, heslo
			FROM uzivatele
			WHERE jmeno = ?
		', array($jmeno));
		if (!$uzivatel || !password_verify($heslo, $uzivatel['heslo']))
			throw new ChybaUzivatele('Neplatné jméno nebo heslo.');
		$_SESSION['uzivatel'] = $uzivatel;
	}

	public function odhlas(): void
	{
		unset($_SESSION['uzivatel']);
	}

	public function vratUzivatele(): array|null
	{
		if (isset($_SESSION['uzivatel']))
			return $_SESSION['uzivatel'];
		return null;
	}

}
