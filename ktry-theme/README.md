# KTRY Theme – Kontiolahden Työttömät ry

WordPress-teema Kontiolahden Työttömät ry:n sivustolle (Kuntalaisten Olohuone). Klassinen PHP-teema, joka käyttää Tailwind CSS:ää (CDN), Font Awesome -ikoneita ja Google Fonts -fontteja.

## Vaatimukset

- WordPress 6.x (testattu 7.1.x)
- PHP 7.4 tai uudempi
- Suositus: **KTRY Tapahtumat** -lisäosa tapahtumien hallintaan

## Asennus

1. Kopioi `ktry-theme`-kansio palvelimelle hakemistoon `wp-content/themes/`.
2. wp-admin: **Ulkoasu → Teemat** → aktivoi **KTRY Theme**.
3. Luo valikko: **Ulkoasu → Valikot** → valitse sijainniksi **Päävalikko**.
4. Tee asetukset: **Ulkoasu → Mukauta** (värit, typografia, etusivu, ylätunniste, alatunniste, SEO).
5. Luo sivut ja valitse niille oikeat sivupohjat (ks. alla).

## Sivupohjat

| Tiedosto | Käyttö |
|---|---|
| `front-page.php` | Etusivu |
| `page-tapahtumat.php` | Tapahtumat-sivu (hakee tapahtumat KTRY Tapahtumat -lisäosasta) |
| `page-kontiotupa.php` | Kontiotupa |
| `page-kirpputori.php` | Töpinän Tori / kirpputori |
| `page-ruoka-apu.php` | Ruoka-apu |
| `page-jaseneksi.php` | Jäseneksi liittyminen |
| `page-toiminta.php` | Toiminta |
| `page-tyollistyminen.php` | Työllistyminen |
| `page-yhdistys.php` | Yhdistys |
| `page-yhteystiedot.php` | Yhteystiedot |
| `home.php` | Blogilistaus (Ajankohtaista) |
| `single.php` | Yksittäinen artikkeli |
| `single-tapahtuma.php` | Yksittäinen tapahtuma (KTRY Tapahtumat -lisäosa) |
| `archive.php`, `search.php`, `searchform.php`, `404.php`, `page.php`, `index.php` | Yleiset sivupohjat |

WordPress valitsee `page-{slug}.php`-pohjan automaattisesti sivun slug-nimen perusteella: esimerkiksi sivun, jonka slug on `tapahtumat`, sivupohja on `page-tapahtumat.php`.

## Mukauttaja-asetukset (Ulkoasu → Mukauta)

- **Värit**: pääväri ja korostusväri (CTA)
- **Typografia**: fontti (Inter, Open Sans, Roboto, Lato, järjestelmäfontti)
- **Asettelu**: sisällön maksimileveys
- **Etusivun CTA-napit**: painikkeiden tekstit ja osoitteet, hero-otsikko ja -alateksti
- **Ylätunniste**: otsikko, alaotsikko, läpikuultava ylätunniste
- **Alatunniste**: copyright-teksti, sähköposti, puhelin
- **SEO**: sivuston kuvaus
- **Artikkeliasetukset**: artikkelikuvan, kirjoittajalaatikon ja edellinen/seuraava-linkkien näyttö sekä esikatselukuva blogilistauksessa

## Widget-alueet

- Sivupalkki (`sidebar-main`)
- Alatunniste 1–3 (`footer-1`, `footer-2`, `footer-3`)
- Artikkelin alapuoli (`below-post`)

Widgetit rekisteröidään `functions.php`-tiedoston `ktry_widgets_init`-funktiossa.

## Lyhytskoodit

- `[yhteyslomake]` – yhteydenottolomake
- `[jasenlomake]` – jäseneksi liittymislomake
- `[m365_forms src="https://forms.office.com/..." width="100%" height="500"]` – Microsoft Forms -upotus; vain `forms.office.com`- ja `forms.microsoft.com`-osoitteet sallitaan

## Saavutettavuus

- "Siirry sisältöön" -skip-linkki
- Näkyvä fokustyyli näppäimistönavigoinnille
- `aria-current="page"` aktiiviselle valikkolinkille

## Tapahtumat

Tapahtumat-sivu käyttää **KTRY Tapahtumat** -lisäosaa. Jos lisäosa ei ole aktiivinen, sivu näyttää "ei tulevia tapahtumia" -tilan. Lisäosan lähdekoodi on saman repositorion `ktry-tapahtumat`-kansiossa.

## Vianmääritys

- **Artikkelikuvan lisäys ei toimi Brave-selaimessa**: Brave-selaimen suojaus (SES-lockdown) poistaa `_.contains`-apufunktion WordPressin underscore-kirjastosta, mikä rikkoo media-modaalin. Teema korjaa tämän kahdella tavalla: varhainen polyfill (`ktry_underscore_inline_polyfill`) ja footterissa ajettava varmistus (`ktry_underscore_late_fix`). Jos ongelma toistuu, kokeile poistaa Braven Shields käytöstä sivustolle tai käytä Chromea.
- **Muutokset eivät näy sivustolla**: tyhjennä selaimen välimuisti (Ctrl+F5) sekä mahdollisen välimuistilisäosan (esim. LiteSpeed Cache) välimuisti.
- **Tapahtumat eivät näy**: varmista, että KTRY Tapahtumat -lisäosa on aktiivinen ja tapahtuman päivämäärä on tänään tai tulevaisuudessa.

## Versiohistoria

### 2.2

- WP 6.9/7.x-yhteensopivuus: underscore-polyfill ja footterikorjaus (Brave/SES-yhteensopivuus)
- Tapahtumasivun tietokantahaku ja `single-tapahtuma.php` KTRY Tapahtumat -lisäosalle

### 2.1 ja aiemmat

- Customizer-asetukset, widget-alueet, lyhytskoodit, saavutettavuusparannukset
