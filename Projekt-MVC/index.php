<?php

session_start();

mb_internal_encoding("UTF-8");

function autoloadFunkce(string $trida): void
{
	if (preg_match('/Kontroler$/', $trida))
		require("kontrolery/" . $trida . ".php");
	else
		require("modely/" . $trida . ".php");
}

spl_autoload_register("autoloadFunkce");

Db::pripoj("127.0.0.1", "root", "", "mvc_db");

$smerovac = new SmerovacKontroler();
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));

$smerovac->vypisPohled();