# KTRY Tapahtumat

WordPress-lisäosa Kontiolahden Työttömät ry:n sivustolle. Tapahtumat lisätään wp-adminissa, ja ne näkyvät automaattisesti teeman Tapahtumat-sivulla.

## Vaatimukset

- WordPress 5.8 tai uudempi
- PHP 7.4 tai uudempi
- Teema `ktry-theme` (sivupohjat `page-tapahtumat.php` ja `single-tapahtuma.php`)

## Ominaisuudet

- Oma sisältötyyppi `tapahtuma`, joka näkyy wp-adminissa omana **Tapahtumat**-valikkona
- Tapahtuman tiedot: päivämäärä, alkuaika, päättymisaika, paikka sekä ilmoittautuminen/lisätiedot
- Otsikko, kuvaus ja artikkelikuva WordPressin vakioeditoreilla
- Hallintalistan sarakkeet (Päivämäärä, Aika, Paikka) ja lajittelu päivämäärän mukaan
- Tulevat tapahtumat näkyvät Tapahtumat-sivulla aikajärjestyksessä, menneet piilotetaan automaattisesti
- Jokaisella tapahtumalla oma sivu osoitteessa `/tapahtuma/...`

## Asennus

### cPanel (File Manager)

1. Kopioi `ktry-tapahtumat`-kansio palvelimelle hakemistoon `wp-content/plugins/`.
2. wp-admin: **Plugins → Asennetut lisäosat** → aktivoi **KTRY Tapahtumat**.

### Zip-tiedostona

1. Zip-paketoi `ktry-tapahtumat`-kansio.
2. wp-admin: **Plugins → Add New → Upload Plugin** → valitse zip → asenna.
3. Aktivoi lisäosa.

Aktivointi päivittää permalinkit automaattisesti. Jos yksittäisen tapahtuman sivu antaa 404-virheen, käy **Asetukset → Permalinkit** ja tallenna asetukset.

## Käyttö

1. wp-admin → **Tapahtumat → Lisää uusi**.
2. Täytä otsikko ja kuvaus sekä **Tapahtuman tiedot** -laatikon kentät:
   - **Päivämäärä** – määrää, milloin tapahtuma näkyy sivustolla; menneet piilotetaan automaattisesti
   - **Alkaa / Päättyy** – kellonajat (HH:MM)
   - **Paikka** – esim. Kontiotupa, Koulukuja 4
   - **Ilmoittautuminen / lisätiedot** – vapaaehtoinen teksti
3. Aseta halutessasi artikkelikuva (oikean sivupalkin Featured image -paneeli).
4. Julkaise.

Tapahtumat näkyvät sivulla `/tapahtumat`. Jos päivämäärää ei ole asetettu, tapahtuma näkyy listan lopussa ilman päivämäärämerkintää.

## Tietokanta

Lisäosa ei luo omia tauluja. Tiedot tallennetaan WordPressin vakiorakenteeseen:

| Tieto | Sijainti |
|---|---|
| Otsikko, kuvaus, tila | `wp_posts` (`post_type = 'tapahtuma'`) |
| Päivämäärä | `wp_postmeta`: `_ktry_tapahtuma_pvm` (YYYY-MM-DD) |
| Alkuaika | `wp_postmeta`: `_ktry_tapahtuma_alku` (HH:MM) |
| Päättymisaika | `wp_postmeta`: `_ktry_tapahtuma_loppu` (HH:MM) |
| Paikka | `wp_postmeta`: `_ktry_tapahtuma_paikka` |
| Ilmoittautuminen | `wp_postmeta`: `_ktry_tapahtuma_ilmoittautuminen` |
| Artikkelikuva | `wp_postmeta`: `_thumbnail_id` |

Tiedot näkyvät halutessa cPanelin phpMyAdminissa.

## Poisto

Lisäosan deaktivointi piilottaa Tapahtumat-valikon, mutta tapahtumat säilyvät tietokannassa. Poista tapahtumat wp-adminissa ennen lisäosan poistoa, jos haluat tyhjentää ne kokonaan.

## Versiohistoria

### 1.0.0

- Ensimmäinen versio: tapahtuma-sisältötyyppi, tietokentät, hallintalistan sarakkeet ja lajittelu, päivämääräperusteinen näkyvyys.
