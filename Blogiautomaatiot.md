Kontiolahti Kunnan Päätökset → Blogikirjoitus (n8n)

Automaattinen n8n-workflow, joka hakee Kontiolahden kunnan päätöksentekotietoja RSS-syötteestä, analysoi ne tekoälyllä ja julkaisee valmiin blogikirjoituksen Kontiolahden työttömät ry:n WordPress-blogiin.

Toiminnot

| Toiminto | Kuvaus |
|---------|--------|
| Ajastettu käynnistys | Workflow käynnistyy automaattisesti joka toinen viikko klo 07:00 |
| Päivämäärän haku | Tallentaa nykyisen päivämäärän myöhempää käyttöä varten |
| RSS-syötteen lukeminen | Hakee 30 viimeisintä kunnan kokousasiaa Dynasty-järjestelmästä |
| Tietojen yhdistäminen | Kerää otsikot, sisällöt ja linkit yhdeksi paketiksi |
| Tekoälyanalyysi | DeepSeek-malli analysoi päätökset ja arvioi vaikutukset työttömiin sekä yhdistyksen toimintaan |
| Blogikirjoituksen generointi | Luo suomenkielisen blogitekstin WordPress-valmiissa JSON-muodossa |
| Automaattinen julkaisu | Julkaisee valmiin postauksen WordPressiin heti (status: publish) |

Workflow-kaavio

Schedule Trigger (joka 2. viikko klo 7)
        ↓
Date & Time
        ↓
RSS Read (Dynasty – kunnan kokousasiat)
        ↓
Aggregate (title + content + link)
        ↓
LLM (DeepSeek) → JSON-blogiposti
        ↓
WordPress (Create a post)

Käytetyt solmut

| Solmu | Tyyppi | Tehtävä |
|-------|--------|--------|
| Schedule Trigger | n8n-nodes-base.scheduleTrigger | Ajastaa ajon joka 2. viikko klo 7 |
| Date & Time1 | n8n-nodes-base.dateTime | Hakee nykyisen päivämäärän |
| RSS Read1 | n8n-nodes-base.rssFeedRead | Lukee kunnan RSS-syötteen |
| Aggregate1 | n8n-nodes-base.aggregate | Yhdistää otsikot, sisällöt ja linkit |
| DeepSeek Chat Model1 | @n8n/n8n-nodes-langchain.lmChatDeepSeek | Kielimalli (deepseek-flash) |
| LLM | @n8n/n8n-nodes-langchain.chainLlm | Luo blogikirjoituksen JSON-muodossa |
| Create a post | n8n-nodes-base.wordpress | Julkaisee postauksen WordPressiin |

RSS-lähde

https://dynastyjulkaisu.pohjoiskarjala.net/kontiolahti/cgi/DREQUEST.PHP?page=rss/meetingitems&show=30

LLM-promptin tavoite

Tekoälyä ohjeistetaan:
Analysoimaan kunnan päätösten vaikutuksia työttömiin
Arvioimaan vaikutuksia yhdistyksen toimintaan
Tuottamaan blogikirjoitus Kontiolahden työttömät ry:n blogiin
Palauttamaan tiedot aina suomeksi JSON-muodossa:
  otsikko
  ingressi
  slug
  kategoriat (string)
  tagit (string)
  sisältö

Tarvittavat tunnukset (Credentials)

Workflow tarvitsee seuraavat n8n-tunnukset:

DeepSeek API (deepSeekApi)
WordPress API (wordpressApi)

Asennus

Luo uusi workflow n8n:ssä
Tuo tämä JSON-tiedosto (Import from File tai Import from URL)
Lisää / valitse oikeat credentials:
   DeepSeek account
   Wordpress account
Aktivoi workflow

Huomioita

Julkaisustatus on asetettu arvoon publish (julkaistaan heti)
Kategoriat ja tagit generoidaan, mutta niitä ei tällä hetkellä käytetä WordPress-solmussa
Workflow ei tarkista, onko samasta datasta jo aiemmin julkaistu kirjoitus
Suositeltavaa lisätä virheenkäsittelyä ja mahdollisesti JSON-validointi ennen julkaisua

Lisenssi

Tämä workflow on tarkoitettu Kontiolahden työttömät ry:n käyttöön.
