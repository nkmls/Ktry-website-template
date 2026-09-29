# Kontiolahden Työttömät ry – WordPress-sivusto

Tuotantokäytössä oleva WordPress-teema ja omatekoinen lisäosa Kontiolahden Työttömät ry:n (Kuntalaisten Olohuone) sivustolle. Projekti sisältää klassisen PHP-teeman, tapahtumahallinnan custom post typellä sekä saavutettavuus- ja SEO-parannuksia.

- **Sivusto:** [olohuone.kontiolahdentyottomat.fi](https://olohuone.kontiolahdentyottomat.fi)
- **Teema:** `ktry-theme/`
- **Lisäosa:** `ktry-tapahtumat/`

![Etusivu](ktry-theme/screenshot.png)

## Teknologiat

- WordPress 6.x / 7.x, PHP 7.4+
- Tailwind CSS (CDN), Font Awesome, Google Fonts
- Vanilla JavaScript, ei build-vaihetta
- Tietokanta: WordPressin vakiorakenne (`wp_posts`, `wp_postmeta`)

## Ominaisuudet

**Teema (`ktry-theme/`)**

- Etusivu, blogilistaus, artikkelisivu ja kymmenen sisältösivupohjaa (Kontiotupa, Töpinän Tori, Tapahtumat, Ruoka-apu, Jäseneksi, Yhteystiedot ym.)
- Mukauttaja-asetukset: värit, typografia, asettelu, etusivun CTA-napit, ylätunniste, alatunniste, SEO
- Widget-alueet: sivupalkki, kolme alatunnistetta ja artikkelin alapuoli
- Lyhytskoodit: `[yhteyslomake]`, `[jasenlomake]`, `[m365_forms]`
- Saavutettavuus: skip-linkki, näkyvä fokus, `aria-current` -merkinnät
- Responsiivinen mobiilivalikko ja lasimainen (glassmorphism) ulkoasu

**Lisäosa (`ktry-tapahtumat/`)**

- Tapahtumat-sisältötyyppi omalla hallintanäkymällä wp-adminissa
- Tietokentät: päivämäärä, kellonajat, paikka ja ilmoittautumisteksti
- Tulevat tapahtumat näkyvät Tapahtumat-sivulla aikajärjestyksessä; menneet piilotetaan automaattisesti
- Hallintalistan sarakkeet ja lajittelu päivämäärän mukaan

## Asennus

1. Kopioi `ktry-theme/` hakemistoon `wp-content/themes/` ja aktivoi teema.
2. Kopioi `ktry-tapahtumat/` hakemistoon `wp-content/plugins/` ja aktivoi lisäosa.
3. Luo valikko (Ulkoasu → Valikot → Päävalikko) ja säädä asetukset (Ulkoasu → Mukauta).
4. Luo sivut ja valitse niille oikeat sivupohjat – ks. [teeman README](ktry-theme/README.md).

## Dokumentaatio

- [Teeman README](ktry-theme/README.md) – sivupohjat, asetukset, lyhytskoodit, vianmääritys
- [Lisäosan README](ktry-tapahtumat/README.md) – käyttö, tietokantarakenne, asennus

## Lisenssi ja tekijänoikeudet

Koodi on julkaistu referenssiksi ja portfolio-käyttöön. Sivuston sisältö, brändi ja kuvat © Kontiolahden Työttömät ry.
