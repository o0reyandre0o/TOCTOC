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

---

## 9. Guiones pieza por pieza

Estado real al 20 de agosto: **producidos** el reel del menú (en ajuste) y el de Morning
Fuel. Los otros dos existen solo como guion.

---

### 9.1 · Reel del menú — jueves 20 · PRODUCIDO, EN AJUSTE

Título interno: *Text inside an image is invisible*. Grabación de pantalla, sin cámara ni voz.

| Tiempo | Qué se ve | Texto en pantalla |
|---|---|---|
| 0–3 s | Una pieza gráfica linda, con precios o servicios escritos dentro de la imagen | *This looks perfect.* |
| 3–8 s | Intenta seleccionar el texto con el cursor. No se selecciona nada. El intento fallido se ve dos o tres veces | *Now try to select the text.* |
| 8–13 s | Corte al menú de Yallah como texto real. El cursor lo selecciona y se pone azul | *This is what AI actually reads.* |
| 13–19 s | Los dos lado a lado | *If you can't select it, ChatGPT can't read it.* |
| 19–25 s | Cierre de marca, fondo lima | *We design for both.* / toctoc.ky/seo-checker |

Sin música con letra: el texto tiene que poder leerse.

**Dos correcciones pendientes**: exportar a 1080 × 1920 (se entregó a 464 × 848) y estirar el
audio hasta el final (corta en el segundo 18 y el video dura 23).

**Caption:**

> Two restaurant menus. Only one of them ChatGPT can read.
>
> The first one looks great. Beautiful type, nice layout, and completely locked inside a PDF — so when someone asks an assistant "what desserts do they have?", there is nothing to answer with.
>
> The second is @yallah.ky. Same information, published as real page content: every base, every protein, every sauce, every price. That is what an assistant actually reads before it recommends you.
>
> The test takes two seconds. Open your menu on your phone and try to select the text. If it doesn't highlight, it isn't text.
>
> Free check at toctoc.ky/seo-checker
>
> #CaymanIslands #GrandCayman #CaymanRestaurants #CamanaBay #CaymanBusiness #WebDesignCayman #SEOServicesCayman

**Comentario para fijar:**

> This isn't an argument against beautiful menus. Print the PDF, frame it, hand it out. Just don't let it be the only place your dishes exist online.

Publicación **en colaboración con @yallah.ky** — el video los muestra como el ejemplo correcto,
así que es un sí fácil.

---

### 9.2 · Reel de ChatGPT — viernes 21 · POR PRODUCIR

**Hay dos caminos, y cambian una cosa importante.**

**Camino A — reusar la sesión que ya está en el sitio.** En toctoc.ky ya vive una grabación
donde ChatGPT y Gemini nombran a Uncle Liu y Coconut Room entre los mejores chinos de Seven
Mile Beach. No hay que grabar nada, y el texto en pantalla se adapta a la pregunta que se ve
en esa grabación.

> **La condición**: esa sesión es de julio de 2026, no de hoy. Entonces la fecha en pantalla
> es la real de la grabación, y el caption dice *"in a recorded session"* — nunca *"today"*.
> Es la misma fórmula que usa el sitio: pasado, sin afirmar una posición permanente. Fechar
> una prueba con el día equivocado es exactamente lo que arruina la credibilidad de todas las
> demás.

**Camino B — grabar nueva.** Más trabajo, pero permite decir *"asked today"*, que pega más
fuerte. Si se elige este:

**A · Grabación del chat — la hace André**

- Grabar desde el teléfono, no desde la computadora. Sale vertical de fábrica y la interfaz se ve grande.
- Modo No molestar activado. Una notificación entrando arruina la toma.
- Nada personal en pantalla: sin otras pestañas, sin nombre de usuario, sin sugerencias del teclado.
- Escribir la pregunta completa y sin errores, despacio. Pelearse con el autocorrector se ve.
- La pregunta: *Best Chinese restaurant on Seven Mile Beach, Grand Cayman?*
- Dejar que la respuesta se genere entera. Después desplazar lento hasta los nombres y quedarse quieto dos segundos.
- Que dure lo que dure: 30, 60 segundos. Se acelera en edición.
- Grabarlo **el mismo día que se publica**.

**B · Clip de Daniel**

- Vertical, cámara trasera del teléfono.
- Encuadre del pecho hacia arriba, ojos en el tercio superior, algo de aire sobre la cabeza.
- Luz de ventana **de frente**, nunca detrás.
- Fondo con profundidad, no una pared plana. Si es exterior, cuidado con el viento: con viento el clip no sirve.
- Audio en lugar silencioso, teléfono a un metro o auriculares con micrófono.
- Ropa de color liso. Nada de rayas finas ni cuadros chicos. **Evitar el verde lima**, compite con el acento de marca.
- **Mirar el lente**, no la pantalla. Es el error más común y se nota como que está leyendo.
- La línea, en plural porque son dos clientes: *"Both of those are our clients. That's not luck — that's how the sites are built."*
- Tres tomas. Se elige la más natural, no la más perfecta.

**C · Montaje — 22 segundos**

| Tiempo | Qué se ve | Texto en pantalla |
|---|---|---|
| 0–2 s | La pregunta escribiéndose, a 3x | *We asked ChatGPT where to eat on Seven Mile Beach. It named two of our clients.* |
| 2–4 s | La generación, a 4x | — |
| 4–11 s | La respuesta a velocidad normal. Se resalta **un nombre, se deja un latido, después el otro**. Zoom al 115% con barra lima detrás de cada uno | — |
| 11–16 s | Corte a Daniel, su línea | Subtítulos quemados |
| 16–22 s | Cierre de marca, fondo lima | *Ask it about your category.* / toctoc.ky/seo-checker |

Dos revelaciones separadas, no una que abarque los dos nombres: dos golpes pegan más que uno.

Fecha en pantalla, chiquita, esquina inferior derecha, del segundo 0 al 11. **La fecha real de
la sesión.**

Tipografía: Instrument Serif para los textos grandes, Inter para la fecha y los subtítulos.
Lima `#D8FF3D` sobre azul pizarra `#0B111E`. Música instrumental, que baje bajo la voz de
Daniel, y si se puede que el corte al nombre caiga en un golpe. Cortes secos, sin fundidos.

**D · Exportación**: 1080 × 1920, 30 fps, H.264, audio AAC. Portada: el frame con el nombre
resaltado. Master limpio sin marcas de agua.

**Caption:**

> We asked ChatGPT where to eat on Seven Mile Beach. It named @uncleliu.ky and @coconutroom.ky — both ours.
>
> Two sister venues, same owner, same method: the menu published as real page content, hours that match the Google profile exactly, and both digital profiles synchronized so an assistant never has to guess which is which.
>
> One restaurant getting named can be luck. Two in the same answer is structure.
>
> Try it with your own category — toctoc.ky/seo-checker
>
> #CaymanIslands #GrandCayman #SevenMileBeach #CaymanRestaurants #CaymanBusiness #AISearch

**Comentario para fijar:**

> Worth saying: these answers change by date, location and phrasing. The reason both venues show up consistently isn't the screenshot, it's that their menus, hours and profiles say the same thing everywhere an assistant looks.

**Colaboración doble, y se pide una sola vez**: Uncle Liu y Coconut Room son los dos locales de
Prime Group, mismo dueño. Instagram permite más de un colaborador, así que van los dos en el
mismo post y aparece en tres feeds. Una conversación, tres audiencias.

---

### 9.3 · Reel Morning Fuel — lunes 24 · PRODUCIDO, FALTA UNA LÍNEA

Formato día en la vida. Abre con *morning fuel* y el gancho *fixing the #1 design mistake most
agencies ignore*, sigue con el café, el tablero de proyectos, ella escribiendo, la llamada con
Daniel — *the problem? gorgeous designs that AI simply can't read* —, y cierra con la portada
de Yallah, *another AI-ready website delivered*, y ella despidiéndose con la mano.

**Lo único que falta**: una línea de texto en pantalla en la parte del diseño, algo como
*"the mistake: text baked into the image"*. El gancho promete arreglar un error concreto y hoy
no lo nombra en ningún momento. Quien entra por la promesa se va sin la respuesta, y eso
Instagram lo lee como contenido que no cumplió.

**Va después del reel del menú, no antes.** Su gancho habla de un error de diseño, y ese error
es exactamente lo que enseña la pieza del jueves. Publicado después se lee como continuación;
publicado antes queda alguien tomando café.

**Caption:**

> A Monday at TocToc, in 30 seconds.
>
> Coffee, the board, and the same conversation we have every week: the design is gorgeous, and an AI assistant can't read a word of it.
>
> That's the mistake almost nobody checks for — text baked into an image, a menu locked in a PDF, prices that live only inside a graphic. It looks perfect to you. It's a blank page to ChatGPT.
>
> Last week we showed you the test. This is what fixing it looks like from the inside.
>
> Free check at toctoc.ky/seo-checker
>
> #CaymanIslands #GrandCayman #CaymanBusiness #WebDesignCayman #GraphicDesign #BehindTheScenes

**Comentario para fijar:**

> The board in the middle is real — those are live builds. The one at the end is Yallah in Camana Bay, delivered this month.

---

### 9.4 · Reel del checker — miércoles 26 · POR PRODUCIR

Grabación de pantalla del checker analizando un sitio, con el puntaje apareciendo. Lo graba
André, que es quien lo construyó.

**El giro está en el pedido**: en vez de mandar a la bio, se pide lo contrario — que dejen su
web en los comentarios y se la corremos gratis.

| Tiempo | Qué se ve | Texto en pantalla |
|---|---|---|
| 0–3 s | La URL escribiéndose en el checker | *We built a free tool that grades any website.* |
| 3–10 s | El análisis corriendo, acelerado, y el puntaje apareciendo | *SEO. AI visibility. Speed.* |
| 10–16 s | Se recorre el detalle: qué está bien, qué falla | *In plain English. No signup.* |
| 16–22 s | Cierre lima | *Drop your website below and we'll run it free.* |

**Correr la herramienta sobre nuestra propia web**, nunca sobre la de un negocio local sin
avisarle. Publicar un puntaje bajo ajeno es una forma rápida de perder un cliente que todavía
no sabías que tenías.

**Caption:**

> Drop your website below and we'll run it free.
>
> Our checker grades three things: your classic SEO, how visible you are to AI assistants, and how fast the site actually loads on a phone. It explains every issue in plain English and in technical detail. About 60 seconds, no signup.
>
> Comment your URL and we'll reply with what we find. Cayman businesses first.
>
> toctoc.ky/seo-checker
>
> #CaymanIslands #GrandCayman #CaymanBusiness #SEOServicesCayman #LocalSEO

Esta es la pieza que ataca el número que peor está: **cero clics al enlace del perfil en 30
días**. Genera comentarios, que Instagram premia, y cada respuesta es una conversación privada
con un prospecto calificado. Las historias del día siguiente salen de las respuestas.
