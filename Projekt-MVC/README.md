# Jednoduchá blogovací aplikace na architektuře MVC

Tato aplikace využívá MVC architektury a všechny soubory a složky jsou pro přehlednost pojmenované v českém jazyce.

## Modely

Modely obsahují logiku a vše co do ní spadá. Např. výpočty, databázové dotazy apod. Přijímá parametry od uživatele.

## Pohledy

Stará se o zobrazení výstupu uživateli a v naší aplikaci se jedná o `phtml` šablony obsahující **HTML** stránku.

## Kontrolery

Kontroler převezme data od uživatele a odešle je modely, který je zpracuje a vrátí zpět kontroleru. Ten opět data zpracuje a odevzdá je pohledům, které zpracovaná data odešlou uživateli jako sestavenou stránku

## .htaccess

Tento soubor nám zakazuje výpis souborů ve složce webu, tudíž jsou z venku skryty. Dále nám pomáha zpracovat komplikované URL adresy do tzv. hezké URL adresy za pomoci `RewritenEngine`. Zároveň pomocí **#** máme zakomentovaný příkaz `RewriteBase /`, který na našem **WAMP** serveru nepotřebujeme, ale je připraven pro servery, které jej budou potřebovat. `RewriteCond` zajišťujeme koncovky souborů, které si uživatel na našem webu může stáhnout. Soubory s koncovkou _.phtml_ se chovají stejně jako soubory s koncovkou _.php_ díky příkazu `AddType application/x-httpd-php .php .phtml`

## index.php

V indexu máme nastavené interní kódování na **UTF-8**. Funkcí `autoloadFunkce` načítáme 2 typy tříd: modely (ze složky modely/) a kontrolery (ze složky kontrolery/). Naše funkce pozná, co je kontroler, a co je model díky pojmenování. Např _AdministraceKontroler.php_

```php
spl_autoload:register("autoloadfunkce)
```

## Databáze

Databáze umožnuje přidat uživatele a články.

Abyste se přihlásil jako administrátor, použijte `admin` jako jméno, a `heslo` jako heslo.

```sql
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2023 at 12:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanky`
--

DROP TABLE IF EXISTS `clanky`;
CREATE TABLE IF NOT EXISTS `clanky` (
  `clanky_id` int NOT NULL AUTO_INCREMENT,
  `titulek` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  `obsah` text CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci,
  `url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  `popisek` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  `klicova_slova` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  PRIMARY KEY (`clanky_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_czech_ci;

--
-- Dumping data for table `clanky`
--

INSERT INTO `clanky` (`clanky_id`, `titulek`, `obsah`, `url`, `popisek`, `klicova_slova`) VALUES
(1, ' <em> je můj oblíbený tag', '<p>Vítejte na našem webu!</p>\r\n<p>Tento web je postaven na <strong>jednoduchém MVC frameworku v PHP</strong>. Toto je úvodní článek, načtený z databáze.</p>', 'uvod', 'Úvodní článek na webu v MVC v PHP', 'úvod, mvc, web');

-- --------------------------------------------------------

--
-- Table structure for table `uzivatele`
--

DROP TABLE IF EXISTS `uzivatele`;
CREATE TABLE IF NOT EXISTS `uzivatele` (
  `uzivatele_id` int NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  `heslo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_czech_ci DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`uzivatele_id`),
  UNIQUE KEY `jmeno` (`jmeno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_czech_ci;

--
-- Dumping data for table `uzivatele`
--

INSERT INTO `uzivatele` (`uzivatele_id`, `jmeno`, `heslo`, `admin`) VALUES
(1, 'admin', '$2y$10$r6T4Uet1h3LNbCyYUOdrP.dX8uyegxpkgN8RcPJ9Y.W8ZZKxyQTxO', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```

## Screenshoty

Přikladám screenshoty funkční stránky a SEO

![Uvod](https://github.com/KanzanElBirbo/WAP/edit/main/Projekt-MVC/uvod.png)
==Úvodní stránka==

![Prihlaseni](https://github.com/KanzanElBirbo/WAP/edit/main/Projekt-MVC/prihlaseni.png)
==Přihlašovací stránka==

![Clanky](https://github.com/KanzanElBirbo/WAP/edit/main/Projekt-MVC/clanky.png)
==Stranka s články==

![Edit](https://github.com/KanzanElBirbo/WAP/edit/main/Projekt-MVC/edit.png)
==Stránka s editorem článků==

![SEO](https://github.com/KanzanElBirbo/WAP/edit/main/Projekt-MVC/SEO.png)
==SEO webové stránky==
