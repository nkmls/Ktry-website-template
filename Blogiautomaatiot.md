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
Huomioita

Julkaisustatus on asetettu arvoon publish (julkaistaan heti)
Kategoriat ja tagit generoidaan, mutta niitä ei tällä hetkellä käytetä WordPress-solmussa
Workflow ei tarkista, onko samasta datasta jo aiemmin julkaistu kirjoitus
Suositeltavaa lisätä virheenkäsittelyä ja mahdollisesti JSON-validointi ennen julkaisua

Lisenssi

Tämä workflow on tarkoitettu Kontiolahden työttömät ry:n käyttöön.
