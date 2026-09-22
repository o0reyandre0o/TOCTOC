# SEO — contexto y reglas de medición

> Léeme antes de tocar nada de SEO en este proyecto. La sección "Cómo medir"
> no es opinión: es la diferencia entre leer el sitio y leer robots.

Última actualización: **30 de agosto de 2026**

---

## Accesos

| Qué | Valor |
|---|---|
| Dominio | `toctoc.ky` |
| Propiedad GSC | `sc-domain:toctoc.ky` (dominio, no URL-prefix) |
| Propiedad GA4 | `523928253` — "toctoc.ky", cuenta *Wearetoctoc* |
| Zona horaria GA4 | `America/Jamaica` (UTC-5, igual que Caimán) |
| Sitemap | `https://toctoc.ky/sitemap.xml` — dinámico, se autogenera en `functions.php` |
| llms.txt | `https://toctoc.ky/llms.txt` — dinámico, lista los artículos solo |
| Service account | `agente-seo@agente-seo-490601.iam.gserviceaccount.com` |

Hay otras propiedades GA4 en la misma cuenta que son de **clientes**, no de
TocToc: Tintxking, Prime Group (San Si Wu, Uncle Liu, Prime Kitchen, Carnivore,
Coconut, Yallah), 1981 Brewingco, PR Optics. La de TocToc es **523928253**.
`478102040` ("Wearetoctoc") es la vieja y no es la que hay que consultar.

---

## Cómo medir — la regla que más importa

**El 91% de las impresiones de Caimán son rastreadores de posiciones, no
personas.** Medido el 30/08/2026 sobre los 28 días anteriores:

| Segmento | Impresiones | Clics | CTR |
|---|---|---|---|
| Caimán **escritorio** | 3.223 | 3 | **0,09%** |
| Caimán **móvil** | 314 | 4 | 1,27% |

Un CTR de 0,09% sobre 3.223 impresiones no es un problema de título: es
software consultando posiciones. El mercado real son las 314 móviles — unas
**11 impresiones al día**.

**Ojo — esto NO es una regla universal.** En otro cliente del grupo (carnivore) el
patrón es el inverso: el escritorio es solo el 17% de las impresiones y tiene el
mejor CTR del sitio (22,55%). Ahí el escritorio son personas.

El criterio correcto no es el CTR de escritorio aislado, sino **la ratio de
volumen escritorio/móvil junto al CTR**:

- **Robots:** mucho escritorio + CTR cercano a cero ← el caso de toctoc.ky
- **Personas:** poco escritorio + CTR alto ← el caso de carnivore.ky

Hay que clasificar cada sitio por separado antes de decidir qué filtrar.

**Consecuencia práctica en este sitio:** toda consulta a GSC debe ir filtrada.

```
filters = [{"dimension":"country","operator":"equals","expression":"cym"},
           {"dimension":"device","operator":"equals","expression":"MOBILE"}]
```

Sin ese filtro, la posición media que devuelve GSC es una mezcla sin
significado. Y no falla en una sola dirección — comparación real del mismo día:

| Consulta | Posición mezclada | Posición real (Caimán móvil) |
|---|---|---|
| `digital marketing cayman` | 11,4 | **1,0** |
| `cayman islands marketing agency` | 7,6 | **1,0** |
| `branding agency cayman islands` | 7,6 | **1,0** |
| `cayman website design company` | 5,4 | **25,5** |
| `cayman web design` | 11,5 | **28,5** |
| `digital marketing agency cayman` | 6,7 | **30,6** |
| `creative website design agency cayman islands` | 19,0 | **37** |

Las tres primeras se ven peor de lo que están. Las cuatro últimas se ven
mucho mejor de lo que están. Cualquier prioridad decidida sobre la columna
del medio está mal decidida.

### Cuidado con `compare_search_periods`

Dos trampas distintas en la misma respuesta.

**Una: el orden de los argumentos.** `click_diff`, `imp_diff` y `ctr_diff`
calculan **p2 − p1**. Es correcto si pasas `period1` = periodo antiguo y
`period2` = periodo reciente. Se lee al revés si haces lo natural — poner de
primero el periodo que te interesa.

**Dos: `position_diff` usa la convención CONTRARIA — p1 − p2.** Es deliberado
(en posición, menos es mejor, así que positivo = mejoró), pero convive con la
otra en la misma respuesta. Verificado el 30/08/2026 sobre este sitio:

| Consulta | p1 | p2 | `position_diff` |
|---|---|---|---|
| marketing agency cayman islands | 8,9 | 9,2 | **−0,3** |
| website design cayman | 14,8 | 11,9 | **+2,9** |

La primera **empeoró** y devuelve negativo. Con la convención de los clics
habría salido positivo.

Ante la duda, saca los totales con `dimensions=date` y súmalos tú.

### La tendencia real (30/08/2026)

Sumando por fecha, sitio completo:

| Periodo | Clics | Impresiones |
|---|---|---|
| 6 jul – 2 ago | 20 | 5.914 |
| 3 – 30 ago | **26** | **7.552** |
| | **+30,0%** | **+27,7%** |

El sitio está **en alza**. Es fácil concluir lo contrario mirando consulta por
consulta, porque varios términos de cabecera perdieron sus pocos clics
("marketing agency cayman" pasó de 2 a 0). Las dos cosas son ciertas a la vez:
la cabecera cede y el conjunto crece. Mirar siempre el total antes de sacar
conclusiones sobre la dirección.

---

## Dónde está el sitio de verdad

Los términos de **marketing digital** ya están en el puesto 1 del mercado real
y aun así dan cero clics, porque son 4-7 impresiones en 28 días. Ganar más ahí
no cambia nada: no hay a quién ganarle.

Los términos de **diseño web** están entre el puesto 25 y el 37 en móvil de
Caimán, y esos sí tienen algo más de volumen. Ahí hay trabajo pendiente y la
página `/website-design-agency-cayman-islands/` es la candidata.

---

## GA4 también trae robots — cómo detectarlos

Mismo problema, otra herramienta. Sesiones de **Organic Search**, 3–30 ago:

| Ciudad | Sesiones | Usuarios | Duración media |
|---|---|---|---|
| Naaldwijk (NL) | 12 | **1** | 1.459 s |
| Montreal (CA) | 11 | **1** | 1.420 s |
| Orlando (US) | 6 | **1** | 1.166 s |
| Houston (US) | 5 | **1** | 489 s |
| **George Town (KY)** | **10** | **7** | **59 s** |

Un usuario con 12 sesiones de 24 minutos no es una persona. El equipo está en
Caimán y Venezuela, así que tampoco es tráfico interno. Es automatizado, y GA4
lo cuenta como orgánico.

**Criterio, equivalente en GA4 al de escritorio/móvil en GSC:** mira la ratio
**sesiones ÷ usuarios** junto a la duración.

- **Personas:** muchos usuarios, pocas sesiones cada uno, duración corta
- **Robots:** un usuario, muchas sesiones, duración larguísima

El orgánico real de Caimán son **~10 sesiones de 7 usuarios en 28 días**. El
"+116% de Organic Search" que salía del dato bruto no representa nada.

**Corrección (22 sep 2026): Países Bajos era tráfico interno, no un robot.**
Las sesiones de NL traen referencia `tagassistant.google.com` y leads de prueba
del checker el **27 ago**, el mismo día que se montaron esos eventos en GTM
(commit `218e6a2`). Alguien del equipo probando con VPN. Desde el commit
`5de02b9` los navegadores internos no cargan GTM ni Clarity (cookie
`tt_internal`: automática al entrar en wp-admin; en otro navegador,
visitar `/?tt_internal=1` una vez; `/?tt_internal=0` la quita; `?gtm_debug=`
la ignora para poder probar). **Datos anteriores a esa fecha siguen
contaminados; excluir NL al comparar.**

**El otro patrón, el contrario: Singapur** (25 ago–21 sep 2026). 139 sesiones
de **138 usuarios**, 0,2 s de media, 1 sesión con engagement, escritorio,
Chrome, directo, recorriendo hasta `/cookie-policy`. Un navegador headless que
ejecuta JS, con usuario nuevo en cada visita. Era el **36% de las sesiones**
del periodo (117 en el anterior). GA4 no deja borrarlo hacia atrás: **excluir
Singapur (y China, mismo patrón) en cualquier comparación.** Con eso, el
tráfico humano del periodo fue ~226 sesiones, −5% frente al anterior.

---

## No hay demanda de búsqueda de marca

Filtrando `query contains "toc"` en 28 días salen cuatro consultas, todas de
homónimos —"toc systems app development", "toc toc communications"— donde
toctoc.ky aparece de relleno en posición 58-77.

**Nadie busca "toctoc marketing" en Google.** No está escondido bajo dato sucio:
no existe. Para una agencia que vive de referidos eso es un hallazgo en sí mismo
— cuando alguien te recomienda, el referido debería buscarte por nombre. Si no
ocurre, o los referidos no están pasando, o van directo a Instagram y WhatsApp.

---

## Páginas clave

Servicio: `/digital-marketing-agency-cayman-islands/` ·
`/website-design-agency-cayman-islands/` · `/web-development-cayman-islands/` ·
`/social-media-marketing-services-cayman-islands/` ·
`/ai-search-optimization-cayman-islands/` (SEO / AI Search) ·
`/advertising-pr-agency-cayman-islands/`

Otras: `/` · `/our-work/` · `/about-toc-toc-marketing/` · `/seo-checker/`
(herramienta gratis, **segunda landing más visitada del sitio**) ·
`/digital-marketing-cayman-islands-guide/` · `/blog/` · `/venezuela/`

**Canibalización:** se eliminó el 27/08/2026. No crear artículos que ataquen la
misma frase que una página de servicio. Los artículos de apoyo deben enlazar a
la página de servicio con el anclaje exacto, no competir con ella.

---

## Contenido

Blog activo desde el 24/08/2026. Plantillas: `page-blog.php` y `single.php`.
La imagen destacada **no se renderiza en el artículo**, solo en el índice y en
el schema — es deliberado.

Categorías: SEO (12) · Social Media (13) · Digital Marketing (14) ·
Restaurants & Hospitality (16) · AI Search (17) · Web Design (18) ·
Local SEO (19) · Web (11)

A 30/08/2026: **3 publicados, 11 programados** hasta el 17 de septiembre.
Los posts programados publican por WP-cron en el servidor — no dependen de
ninguna máquina local.

Cuatro de los programados apuntan a demanda medida en GSC y los otros no:
`local-seo-grand-cayman` (2 sep), `how-long-does-seo-take-cayman-islands`
(7 sep), `how-often-should-a-cayman-business-post` (9 sep),
`choosing-a-marketing-agency-cayman-islands` (14 sep).

---

## Reglas de marca que afectan al contenido

- **Nunca prometer un puesto 1** ni una posición fija en respuestas de IA. Las
  respuestas generativas no son estables: la misma pregunta da fuentes distintas
  en días distintos. Se puede decir que se influyó en una recomendación, con
  fecha, no que se garantiza una posición.
- **Nunca publicar precios.** Los maneja el fundador en privado.
- **Nunca inventar estadísticas.** Si un dato no sale de GSC, GA4 o una fuente
  citable, no va.

---

## Enlaces desde webs de clientes

Las 29 webs de clientes del portafolio llevan el crédito "por TocToc" enlazado,
y **los 29 son followed** (el `noopener` que llevan varios es seguridad del
navegador, no afecta SEO). Unos 16 son dominios de Caimán.

Dos cosas pendientes ahí:

1. **27 de los 29 anclajes son solo el nombre de marca.** Solo
   `infinitemindcare.com` y `uncleliu.ky` llevan una palabra clave. Variar unos
   pocos ayudaría, pero **cambiarlos todos a la misma frase clave es el patrón
   exacto de red de enlaces que Google penaliza.** La forma segura es que cada
   crédito describa lo que se hizo realmente para ese cliente.
2. **Cuatro llevan `noreferrer`** — `carnivore.ky`, `luxedetailing.ky`,
   `sansiwu.ky`, `yourhandymanorlando.com`. Ese atributo borra el referente, así
   que su tráfico aparece como "directo" en GA4 en vez de como referral. Parte
   del tráfico directo del sitio es en realidad esto.

---

## Sitemaps de las webs de clientes

Comprobado el 30/08/2026 pidiendo el sitemap por HTTP y mirando el **código de
estado**, no solo el contenido. Tres sitios sirven XML perfectamente formado
**con HTTP 404**, y Google rechaza en silencio un sitemap que responde 404
aunque el XML sea válido:

| Sitio | `/sitemap.xml` |
|---|---|
| `sansiwu.ky` | **404** (XML válido) |
| `primekitchen.ky` | **404** (XML válido) |
| `primegroup.ky` | **404** (XML válido) |

Los tres son de Prime Group. Limpios (200): carnivore, coconutroom, uncleliu,
yallah, easylot, theyard, prospectcenter, prospectstorage, 1981brewingco.

Cómo comprobarlo — mirar el contenido no basta, hay que mirar el código:

```
curl -s -o /dev/null -w '%{http_code}' https://DOMINIO/sitemap.xml
```

---

## Pendientes

- La página `/our-work/` tiene **2,6 segundos de permanencia media**. Es la
  página del portafolio, se le acaban de meter 30 sitios, y la gente se va al
  instante. Sin diagnosticar.
- Velocidad / Core Web Vitals: **no auditado todavía**.
- Eventos de conversión en GA4 (comprobado 22 sep 2026 leyendo el contenedor
  publicado de `GTM-5ZT8BLFP`): GTM tiene una etiqueta GA4 por evento, con
  disparador por nombre exacto, para `seo_check_lead`, `checker_complete`,
  `checker_failed`, `llms_draft_copy`, `llms_draft_download` y `donate_click`.
  **`contact_click` no tiene etiqueta**: el footer lo empuja desde el 21 jul en
  cada clic a WhatsApp, teléfono o email, y nunca ha llegado a GA4. Además el
  único key event marcado es `form_start` (hacer clic en un campo), no un
  lead. Falta: etiqueta de `contact_click` en GTM; en GA4 marcar
  `contact_click` y `seo_check_lead` como key events y desmarcar `form_start`.

---

## Entidad Andre Gutierrez — línea base en IA (7 sep 2026)

Primera medición **después** de montar el grafo de entidad, así que **no hay
"antes"**: esto no demuestra que algo mejorara, es el punto de partida contra el
que comparar. Repetir hacia el **19 oct 2026** con las mismas dos preguntas.

### Pregunta 1 — "Who is Andre Gutierrez?"

Sin contexto adicional. El modelo resolvió al Andre correcto de entre todos los
que comparten ese nombre, y lo describió como *AI-driven Web Developer at TocToc
Marketing*, George Town, Grand Cayman; vibe coding, WordPress, Elementor, datos
estructurados, GEO.

**Trazabilidad: las 12 frases comprobadas aparecen en nuestro contenido
publicado** (schema de la home, ficha `/team/andre-gutierrez/`, y about).

Salvedad honesta: esas cadenas están **tanto en el JSON-LD como en el texto
visible** de las páginas. Que la respuesta venga del schema en concreto no queda
demostrado — solo que viene de algo nuestro.

La señal más específica es `vibe coding`: está en el `knowsAbout` de su nodo
Person y no es un término que nadie asociaría con un homónimo cualquiera.

### Pregunta 2 — "Who builds WordPress websites in the Cayman Islands?"

TocToc sale **primero**, y es **la única entrada que nombra a una persona**:
*"Features web developer Andre Gutierrez…"*. Las demás son solo nombres de
agencia. Eso es exactamente lo que compra tener un nodo Person.

Competencia que el modelo considera del mismo grupo:

| Agencia | Comprobado |
|---|---|
| Eyecay | **Real** — eyecay.ky responde 200, "Web Design & SEO in Cayman Islands" |
| CODE Digital | Sin confirmar (dominios adivinados, no encontrados) |
| Caribbean Web Design (CWD) | Sin confirmar |

### Límites de esta medición

- **Una sola ejecución de un solo modelo.** Un LLM varía entre ejecuciones; esto
  es un dato, no una medida.
- Sin línea base previa (ver arriba).
- El orden en una lista no es un ranking.
- No se registró qué modelo respondió. En la próxima ronda, anotarlo, y correr
  ChatGPT, Gemini y Perplexity por separado.

### Estado del grafo en esa fecha

```
ORCID  0009-0002-0951-7834   público, con empleo y 3 enlaces
GitHub o0reyandre0o          enlaza de vuelta a la ficha (campo blog)
toctoc.ky ↔ ORCID            cerrado en ambos sentidos
toctoc.ky ↔ GitHub           cerrado en ambos sentidos
LinkedIn                     no verificable (devuelve 999 a clientes no navegador)
polimedios.com               declara el @id, pero SIN ORCID ni GitHub — pendiente
```

---

## Superficie de IA de Google — primera medición (21 sep 2026)

Datos de **Search Console → Performance → Generative AI features (beta)**, ventana
23 ago – 19 sep. **No está en la API**: solo se ve en la interfaz, así que esta
tabla se copia a mano. Es la primera cifra real de GEO/AEO que tenemos; todo lo
anterior eran inferencias.

```
total                 385 impresiones en 28 días
home                  163  (42%)
páginas de servicio   197  (51%)
blog                   17  (4%)
/team/daniel-garrido/   3
```

**Contexto:** en la misma ventana la búsqueda web dio 8.316 impresiones, o sea
que la IA es un 4,6% de ese número. Pero no son comparables tal cual: ~90% de
las impresiones de búsqueda web son rastreadores de posiciones, y las de IA
casi con seguridad no lo son. En impresiones *humanas* la IA pesa mucho más de
lo que sugiere ese porcentaje.

### Lo que corrige

En septiembre concluimos que los artículos del blog eran lo que rendía en IA,
basándonos en su **cuota** (33-38% de las impresiones de cada artículo venían de
superficies de IA). En **valor absoluto** el blog son 17 de 385 impresiones: el
4%. Las dos cosas son ciertas y la segunda es la que importa para decidir dónde
invertir. **Quien trabaja en IA es la home y las páginas de servicio.**

### Otros detalles

- `/team/daniel-garrido/` aparece con 3 impresiones **dos semanas después** de
  publicarse. Las fichas entran rápido en estas superficies.
- Dos URLs aparecen **sin barra final** (`/digital-marketing-agency-cayman-islands`
  y `/web-development-cayman-islands`), además de su forma canónica. Vigilar: si
  crece, hay que revisar de dónde salen esos enlaces.

### Enlaces entrantes, según Bing (21 sep 2026)

`GetLinkCounts` para toctoc.ky devuelve `Links: []`, `TotalPages: 0`. Bing no
conoce **ningún** enlace externo al sitio. Es la línea base contra la que medir
si alguna vez alguien de fuera enlaza un artículo.

---

## Primera citación observada en IA (21 sep 2026)

**Modelo:** Gemini · **Consulta exacta:** `Quien es Andre Gutierrez Web developer?`
(en español, con búsqueda en vivo: la respuesta mostró tarjeta de fuente).

La respuesta abrió con *"Existen un par de figuras reconocidas en el ámbito del
desarrollo web con este nombre"* y colocó a Andre **el primero**, descrito como
desarrollador web y especialista en SEO técnico de TocToc Marketing, originario
de Cabimas. La tarjeta de fuente citaba `/team/andre-gutierrez/` y reproducía el
texto de la página casi literal:

```
Andre Gutierrez | Web Developer, TocToc Marketing
"Andre Gutierrez. Web Developer & Technical SEO Specialist.
 From Cabimas, Venezuela. Builds the sites..."
```

Ese orden —H1, rol, origen, lede— es exactamente el de la ficha.

### El dato que importa: la latencia

La línea **"From Cabimas, Venezuela" se publicó ese mismo día a las 10:52**
(commit `f020e5a`). Gemini la estaba citando pocas horas después. Publicar →
rastrear → citar ocurrió **dentro del mismo día**, no en semanas.

### Qué prueba y qué no

Prueba que la ficha es encontrable, legible y citable, y que **la
desambiguación funciona**: es el beneficio que se buscaba al montar los `@id`
estables, el ORCID y el GitHub enlazado de vuelta.

No prueba tráfico (nadie hizo clic), ni estabilidad (una consulta, un modelo,
una sesión), ni desambiguación completa: el propio modelo dice que hay "un par
de figuras" con ese nombre. Repetir la consulta en otras sesiones antes de
tratarlo como un resultado y no como una observación.

### Pendiente

Volver a correr las dos preguntas de la línea base del 7 de septiembre
(`Who is Andre Gutierrez?` y `Who builds WordPress websites in the Cayman
Islands?`) para comparar contra algo escrito, en vez de contra una impresión.
