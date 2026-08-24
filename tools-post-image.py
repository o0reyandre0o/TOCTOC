# -*- coding: utf-8 -*-
"""Imagen destacada de un articulo. 1200x675.

Dos cosas que la primera version hizo mal y esta corrige:

1. Composicion. La marca arriba del todo y el titular abajo del todo dejaban un
   agujero muerto en el centro. Ahora marca, titular y pie son un solo bloque
   optico: el titular manda y el resto orbita cerca.

2. Margen de seguridad. La portada del blog recorta a 16:10 y las tarjetas de
   relacionados usan object-cover, asi que la imagen SIEMPRE se recorta en
   algun sitio. Nada importante entra en los 96 px del borde.

Uso:  python post_image.py "Antetitulo" "Titular" "Subtitulo" salida.jpg
"""
import os, sys
from PIL import Image, ImageDraw, ImageFont, ImageFilter

THEME  = r"C:\Users\58424\Documents\GitHub\TOCTOC"
SERIF  = os.path.join(THEME, "assets", "fonts", "InstrumentSerif-Regular.ttf")
SANS   = r"C:\Windows\Fonts\segoeui.ttf"
SANS_B = r"C:\Windows\Fonts\segoeuib.ttf"

ACCENT = (217, 255, 62)
WHITE  = (255, 255, 255)
GRAY   = (165, 180, 200)
DARK   = (15, 23, 42)
TOP    = (11, 17, 32)
BOTTOM = (24, 34, 52)

W, H = 1200, 675
SAFE = 96          # margen intocable
GAP  = 26


def build(eyebrow, title, sub, out):
    serif = lambda px: ImageFont.truetype(SERIF, px)
    sans  = lambda px, b=False: ImageFont.truetype(SANS_B if b else SANS, px)

    im = Image.new("RGB", (W, H))
    d  = ImageDraw.Draw(im)
    for y in range(H):
        m = y / H
        d.line([(0, y), (W, y)], fill=tuple(int(TOP[i] + (BOTTOM[i] - TOP[i]) * m) for i in range(3)))

    # Halos. El azul entra de arriba-izquierda y sostiene el titular; el lima se
    # queda en una esquina, chico y lejos del texto, para que sea un acento y no
    # una mancha verde detras de las letras.
    for color, box, alpha in (((6, 108, 224), (-360, -420, 720, 300), 115),
                              ((56, 173, 248), (820, 380, 1500, 1000), 42),
                              (ACCENT, (1010, 520, 1360, 860), 60)):
        mask = Image.new("L", (W, H), 0)
        ImageDraw.Draw(mask).ellipse(box, fill=alpha)
        mask = mask.filter(ImageFilter.GaussianBlur(130))
        im = Image.composite(Image.new("RGB", (W, H), color), im, mask)

    dd = ImageDraw.Draw(im, "RGBA")
    for x in range(40, W, 44):
        for y in range(40, H, 44):
            dd.ellipse([x - 1.3, y - 1.3, x + 1.3, y + 1.3], fill=(148, 163, 184, 34))
    d = ImageDraw.Draw(im)

    def tracked(xy, text, font, fill, track=0.0):
        x, y = xy
        for ch in text:
            d.text((x, y), ch, font=font, fill=fill)
            x += d.textlength(ch, font=font) + track

    def wrap(text, font, maxw):
        lines, cur = [], ""
        for word in text.split():
            probe = (cur + " " + word).strip()
            if d.textlength(probe, font=font) <= maxw or not cur:
                cur = probe
            else:
                lines.append(cur); cur = word
        if cur:
            lines.append(cur)
        return lines

    # La columna de texto se corta al 78% del ancho util, no al 100%. Un titular
    # de una sola linea que llega hasta el margen derecho se ve apretado y, peor,
    # es lo primero que pierde un recorte a 16:10. Al estrecharla, envuelve en
    # dos lineas, se lee mejor y deja el lado derecho para el acento lima.
    colw = int((W - 2 * SAFE) * 0.64)
    px, lines, lh = 64, [], 0
    while px >= 32:
        f  = serif(px)
        lh = int(px * 1.04)
        lines = wrap(title, f, colw)
        if len(lines) <= 3 and len(lines) * lh <= (H - 2 * SAFE) * 0.62:
            break
        px -= 3
    f = serif(px)

    sub_lines = wrap(sub, sans(22), colw) if sub else []

    brand_h = 54
    block_h = brand_h + GAP + 8 + 18 + len(lines) * lh
    if sub_lines:
        block_h += 14 + len(sub_lines) * 32

    y = max(SAFE, (H - block_h) // 2)

    # marca
    s = 46 / 84.0
    d.ellipse([SAFE, y, SAFE + 46, y + 46], fill=ACCENT)
    d.line([(SAFE + 23 * s, y + 44 * s), (SAFE + 38 * s, y + 60 * s)], fill=DARK, width=6)
    d.line([(SAFE + 38 * s, y + 60 * s), (SAFE + 63 * s, y + 26 * s)], fill=DARK, width=6)
    d.text((SAFE + 60, y - 1), "TocToc Marketing", font=serif(28), fill=WHITE)
    tracked((SAFE + 62, y + 31), eyebrow.upper(), sans(13, True), ACCENT, track=1.7)
    y += brand_h + GAP

    d.rectangle([SAFE, y, SAFE + 104, y + 7], fill=ACCENT)
    y += 8 + 18

    for ln in lines:
        d.text((SAFE - 2, y), ln, font=f, fill=WHITE)
        y += lh

    if sub_lines:
        y += 14
        for ln in sub_lines:
            d.text((SAFE, y), ln, font=sans(22), fill=GRAY)
            y += 32

    tracked((SAFE, H - SAFE + 22), "TOCTOC.KY", sans(15, True), ACCENT, track=2.3)

    im.save(out, "JPEG", quality=90, subsampling=0, optimize=True)
    print("  %s  %d KB  %dx%d  titular %dpx en %d linea(s)"
          % (os.path.basename(out), os.path.getsize(out) // 1024, W, H, px, len(lines)))
    return out


if __name__ == "__main__":
    a = sys.argv[1:]
    build(a[0], a[1], a[2], a[3])
