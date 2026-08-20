# Brief de diseño — Redes sociales TocToc

> Para Nora. Documento autosuficiente: acá está todo lo necesario para producir
> sin depender de otros archivos. Actualizado el 20 de agosto de 2026.

---

## 1. Quiénes somos, en tres líneas

TocToc Marketing, George Town, Gran Caimán. Construimos sitios web que los asistentes de
IA — ChatGPT, Gemini, Google — pueden leer, entender y recomendar. Nuestro nicho probado
son restaurantes y hospitalidad: seis sitios vivos en la isla.

**El tono**: técnico, verificable, local, directo. Mostramos el dato, no prometemos el
primer puesto.

---

## 2. Sistema visual

### Tipografías

| Uso | Fuente |
|---|---|
| Titulares | **Instrument Serif** (Google Fonts, gratuita). Tamaños grandes. La cursiva se reserva para destacar una palabra dentro del titular |
| Texto e interfaz | **Inter** |
| Antetítulos y etiquetas | Inter mayúsculas, bold, 11–12 px, interletrado 0,2 em |

### Colores

| Rol | Hex |
|---|---|
| Acento lima | `#D8FF3D` |
| Azul pizarra (fondo oscuro) | `#0B111E` |
| Azul cielo profundo | `#066CE0` |
| Azul cielo medio | `#38ADF8` |
| Azul cielo claro | `#C2EEFF` |
| Azul cielo pálido | `#EBF7FF` |
| Fondo claro | `#F7FAFE` |
| Bordes | `#DDE3EA` |
| Gris de texto secundario | `#9BAAC0` |

**El lima es acento único y va en dosis chicas**: una regla, un badge, un botón, una lámina
final. Nunca como fondo de texto largo. La excepción es la lámina de cierre de un carrusel,
donde el lima se come toda la pantalla y el texto va en azul pizarra.

### Geometría, sombras y recursos

- Radio base 20 px. Tarjetas entre 32 y 48 px. Botones tipo píldora, completamente redondeados.
- Sombras: `0 10px 40px -10px rgba(15,55,95,.18)` suave · `0 20px 60px -20px rgba(15,50,90,.25)` para tarjetas grandes.
- **Grilla de puntos** tenue sobre los fondos oscuros: puntos de 3 px cada 48–52 px, gris a 17% de opacidad.
- **Halos de color** muy desenfocados: azul arriba a la izquierda, lima abajo a la derecha.
- **Marca gráfica**: círculo lima con un check oscuro dentro.
- Carácter general: editorial. Mucho aire, titulares serif enormes contra texto sans chico,
  y el color usado con avaricia.

---

## 3. Especificaciones por formato

| Pieza | Medida | Notas |
|---|---|---|
| Carrusel de feed | 1080 × 1350 (4:5) | JPEG, máx 8 MB por lámina, entre 2 y 10 láminas |
| Reel / historia | **1080 × 1920** (9:16) | 30 fps, H.264, audio AAC |
| Post de Google Business Profile | 1200 × 900 (4:3) | Google recorta a horizontal: nada importante en los bordes |
| Portada de YouTube Short | 1080 × 1920 | Se elige un frame o se diseña aparte |

**Zonas seguras en vertical**: nada de texto en los primeros 250 px ni en los últimos 400 px.
Ahí Instagram pone su propia interfaz y lo tapa.

**Subtítulos quemados** en toda pieza donde alguien hable. El 85% mira sin sonido.

**Entrega**: siempre un **master limpio sin marca de agua**, porque el mismo archivo se sube
después a YouTube y Facebook, y esas plataformas penalizan el contenido con el logo de otra
red encima.

---

## 4. Lo que ya existe — no rehacer

- **Carrusel "5 señales de que la IA no puede leer tu web"** — 7 láminas, publicado el 19 de agosto.
- **Carrusel "La ficha de Google que nadie completa"** — 7 láminas, listo y programado para el 28.
- **Reel de cierre de mes** — montaje de 24 s con los cuatro clips de agosto, listo y programado para el 31.
- **Tarjetas de producto de Google Business Profile** — 8 piezas de 1200 × 1200.
- **Pósters de la sección "Just Launched"** del sitio — 4 verticales.

Todo eso está generado por código con los tokens exactos de arriba. Si hace falta una
variante, se regenera; no hay que redibujarla.

---

## 5. Lo que falta producir

### Prioridad alta — esta semana

**1. Reel de ChatGPT (viernes 21).** Material: grabación de pantalla de una consulta a ChatGPT
donde nombra a Uncle Liu y Coconut Room, más un clip de Daniel a cámara.

Montaje, 22 segundos:

| Tiempo | Qué se ve | Texto en pantalla |
|---|---|---|
| 0–2 s | La pregunta escribiéndose, a 3x | *We asked ChatGPT where to eat on Seven Mile Beach. It named two of our clients.* |
| 2–4 s | La generación, a 4x | — |
| 4–11 s | La respuesta a velocidad normal. Se resalta **primero un nombre, se deja un latido, después el otro**. Zoom al 115% con barra lima detrás de cada nombre | — |
| 11–16 s | Daniel a cámara | Subtítulos |
| 16–22 s | Cierre lima | *Ask it about your category.* / toctoc.ky/seo-checker |

Fecha en pantalla, chiquita, esquina inferior derecha, del segundo 0 al 11: **21 AUG 2026**.
Es una regla de la marca: las pruebas se citan con su fecha.

**2. Ajuste al reel "Morning fuel" (lunes 24).** Falta una sola cosa: una línea de texto en
pantalla en la parte donde se ve el diseño, algo como *"the mistake: text baked into the
image"*. El gancho promete arreglar un error concreto y hoy no lo nombra.

**3. Re-export del reel del menú.** Se entregó a 464 × 848 y tiene que ser **1080 × 1920**.
Además el audio termina en el segundo 18 y el video dura 23: los últimos cinco segundos,
que son el cierre, quedan mudos.

### Prioridad media

**4. Plantillas de historias — cuatro, reutilizables.** Hoy se improvisan cada vez. Con estas
cuatro se cubre el 90% de lo que publicamos:

- **Recompartir publicación**: marco con espacio para la tarjeta del post, titular arriba, hueco abajo para el sticker de enlace.
- **Encuesta**: fondo de marca con la pregunta grande y espacio para el sticker.
- **Caja de preguntas**: igual, con otro reparto.
- **Dato o cita**: fondo oscuro, titular serif, atribución chica.

**5. Portada de YouTube para cada video.** 1080 × 1920, el frame más explicativo con un
titular corto encima. Se lee en miniatura, así que máximo cinco palabras.

**6. Imagen de Google Business Profile para las piezas de video.** GBP no acepta video: por
cada reel hace falta una imagen de 1200 × 900 con el mismo mensaje.

### Banco para septiembre

- **"Tu menú es un PDF"** — carrusel, nicho restaurantes. Es nuestro argumento más específico.
- **"Una web que le habla a la caja registradora"** — el inventario y punto de venta de The Conscious Closet.
- **TintXKing: +469% en consultas** — el único caso con un número duro.

---

## 6. Cronograma

| Fecha | Pieza | Formato | Quién | Estado |
|---|---|---|---|---|
| Mié 19 | 5 señales de que la IA no puede leer tu web | Carrusel | Claude | Publicado |
| Mié 19 | Historias + encuesta | Historias | Equipo | Publicado |
| Mié 19 | Post en Google Business Profile | Post GBP | Claude | Publicado |
| Jue 20 | Dos menús: solo uno lo puede leer la IA | Reel | Nora | En ajuste |
| Vie 21 | ChatGPT nombrando a Uncle Liu y Coconut | Reel | Nora edita · Daniel y André graban | Pendiente |
| Lun 24 | Morning fuel: un día arreglando el error | Reel | Nora | Falta una línea |
| Mié 26 | El checker corriendo + "dejá tu web" | Reel | André graba · Nora edita | Pendiente |
| Vie 28 | La ficha de Google que nadie completa | Carrusel | Claude | Programado |
| Lun 31 | Cuatro webs entregadas este mes | Reel | Claude | Programado |

**Ritmo**: lunes, miércoles y viernes, a media tarde hora de Cayman. Historias los días
intermedios. Sábado y domingo no se publica.

**Nunca dos piezas fuertes el mismo día**: se canibalizan. El 18 de agosto salieron tres
reels juntos y el mejor de los tres rindió menos de lo que debía.

---

## 7. Reglas que no se negocian

**Nada de prometer el primer puesto**, ni en buscadores ni en asistentes. Ni "#1", ni "top of
search results", ni "we make you the answer". La formulación correcta es que *influimos* en
recomendaciones generadas por IA y que esas respuestas varían por fecha, ubicación y forma de
preguntar.

**Las pruebas llevan su fecha en pantalla.** Una captura de ChatGPT prueba lo que pasó ese
día, no un estado permanente.

**Nada de muestras diminutas presentadas como datos.** Una encuesta con tres respuestas es un
gancho, no una estadística.

**El texto importante nunca dentro de una imagen** en el sitio web. En redes sí, obviamente —
pero es literalmente el error que denunciamos, así que en la web se respeta.

---

## 8. Referencia rápida de captions

El gancho va en la **primera línea**, antes del corte del "…más". Geoetiqueta siempre: Grand
Cayman, George Town o Seven Mile Beach. Entre cinco y ocho hashtags, todos locales o de
nicho — nunca #digitalmarketing ni #marketing, que compiten con millones de publicaciones.

Hashtags de la casa: #CaymanIslands #GrandCayman #CaymanBusiness #CaymanWebDesign
#SEOServicesCayman #CaymanRestaurants #CamanaBay #GeorgeTown

Y en cada entrega de cliente, **publicación en colaboración con su cuenta**. Aparece en los
dos feeds como una sola publicación, con el alcance sumado. Es la palanca más barata que
tenemos y en agosto se dejó pasar cuatro veces.
