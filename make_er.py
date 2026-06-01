"""Diagrama Entidad-Relación de NoDou."""
import matplotlib.pyplot as plt
from matplotlib.patches import FancyBboxPatch, FancyArrowPatch
from matplotlib.lines import Line2D

PURPLE = "#5A189A"
INDIGO = "#3F51B5"
DEEP   = "#2A0F4F"
LILAC  = "#E8DFFF"
GOLD   = "#F1C40F"
WHITE  = "#FFFFFF"
INK    = "#1F1B2E"
MUTED  = "#6A6680"

fig, ax = plt.subplots(figsize=(16, 9), dpi=160)
ax.set_xlim(0, 16); ax.set_ylim(0, 9)
ax.axis("off")
fig.patch.set_facecolor(WHITE)

# Título
ax.text(0.3, 8.55, "Modelo Entidad–Relación", fontsize=22, fontweight="bold",
        color=INK, family="DejaVu Sans")
ax.text(0.3, 8.2, "NoDou · 7 tablas · MySQL", fontsize=12, color=MUTED,
        family="DejaVu Sans", style="italic")

def table(x, y, w, h, title, fields, color, pk_idx=None, fk_idx=None):
    # cabecera
    head = FancyBboxPatch((x, y + h - 0.55), w, 0.55,
                          boxstyle="round,pad=0.02,rounding_size=0.08",
                          linewidth=0, facecolor=color)
    ax.add_patch(head)
    ax.text(x + w/2, y + h - 0.28, title, fontsize=12.5, fontweight="bold",
            color=WHITE, ha="center", va="center", family="DejaVu Sans")
    # cuerpo
    body = FancyBboxPatch((x, y), w, h - 0.55,
                          boxstyle="round,pad=0.02,rounding_size=0.08",
                          linewidth=1.2, edgecolor=color, facecolor=WHITE)
    ax.add_patch(body)
    pk_idx = pk_idx or []
    fk_idx = fk_idx or []
    row_h = (h - 0.7) / max(len(fields), 1)
    for i, f in enumerate(fields):
        yy = y + h - 0.55 - (i + 1) * row_h + row_h/2
        prefix = ""
        col = INK
        weight = "normal"
        if i in pk_idx:
            prefix = "PK  "; col = "#B7950B"; weight = "bold"
        elif i in fk_idx:
            prefix = "FK  "; col = INDIGO; weight = "bold"
        ax.text(x + 0.2, yy, prefix + f, fontsize=10, color=col, weight=weight,
                family="DejaVu Sans Mono", va="center")
    # devolver puntos de anclaje
    return {
        "left":  (x, y + h/2),
        "right": (x + w, y + h/2),
        "top":   (x + w/2, y + h),
        "bot":   (x + w/2, y),
    }

# ----- Tablas -----
# Fila superior
usuarios = table(0.3, 4.5, 3.0, 3.4, "usuarios", [
    "id  INT",
    "nombre  VARCHAR(50)",
    "email  UNIQUE",
    "password  (hash)",
    "rol  ENUM",
    "fecha_creacion",
    "ultima_conexion",
], PURPLE, pk_idx=[0])

contactos = table(4.5, 5.6, 2.9, 2.3, "contactos", [
    "id  INT",
    "usuario_id  FK",
    "nombre_contacto",
    "email_contacto",
], INDIGO, pk_idx=[0], fk_idx=[1])

gastos_fijos = table(4.5, 2.7, 2.9, 2.5, "gastos_fijos", [
    "id  INT",
    "usuario_id  FK",
    "titulo",
    "monto_estimado",
    "dia_vencimiento",
    "completado_mes",
], INDIGO, pk_idx=[0], fk_idx=[1])

gastos = table(8.7, 4.4, 3.3, 3.5, "gastos", [
    "id  INT",
    "usuario_id  FK",
    "titulo",
    "monto_total",
    "metodo_division  ENUM",
    "categoria  ENUM",
    "fecha_gasto",
    "pagado_por",
], PURPLE, pk_idx=[0], fk_idx=[1])

detalle = table(13.0, 5.5, 2.7, 2.4, "detalle_gasto", [
    "id  INT",
    "gasto_id  FK",
    "nombre_participante",
    "monto_asignado",
    "porcentaje",
    "pagado  BOOL",
], INDIGO, pk_idx=[0], fk_idx=[1])

articulos = table(13.0, 2.7, 2.7, 2.3, "articulos_gasto", [
    "id  INT",
    "gasto_id  FK",
    "nombre_articulo",
    "precio",
], INDIGO, pk_idx=[0], fk_idx=[1])

# logs JSON (suelto, sin FK)
logs = table(0.3, 1.4, 3.0, 2.4, "logs (JSON)", [
    "_id",
    "fecha_hora",
    "usuario_id",
    "accion",
    "detalles { … }",
], DEEP)
ax.text(0.3 + 1.5, 1.05, "NoSQL · archivo  logs/actividad.json",
        fontsize=9, color=MUTED, ha="center", style="italic")

# ----- Relaciones -----
def rel(p1, p2, label, color=PURPLE, rad=0.15, label_offset=(0, 0.15)):
    arrow = FancyArrowPatch(p1, p2,
                            connectionstyle=f"arc3,rad={rad}",
                            arrowstyle="-",
                            mutation_scale=14,
                            linewidth=1.8,
                            color=color)
    ax.add_patch(arrow)
    # endpoints decorations (1 y N)
    # crow-foot simplificado: pintamos texto "1" cerca del padre y "N" cerca del hijo
    # Etiqueta central
    mx = (p1[0] + p2[0]) / 2 + label_offset[0]
    my = (p1[1] + p2[1]) / 2 + label_offset[1]
    ax.text(mx, my, label, fontsize=9, color=color, ha="center", va="center",
            fontweight="bold",
            bbox=dict(boxstyle="round,pad=0.25", fc=WHITE, ec=color, lw=0.8))

def cardinality(point, text, color, dx=0, dy=0):
    ax.text(point[0] + dx, point[1] + dy, text, fontsize=10, color=color,
            ha="center", va="center", fontweight="bold")

# usuarios → contactos (1:N)
rel(usuarios["right"], contactos["left"], "1  ──  N", color=PURPLE, rad=-0.1)
# usuarios → gastos_fijos (1:N)
rel(usuarios["right"], gastos_fijos["left"], "1  ──  N", color=PURPLE, rad=0.1)
# usuarios → gastos (1:N)
rel(usuarios["right"], gastos["left"], "1  ──  N", color=PURPLE, rad=0.0,
    label_offset=(0, 0.35))
# gastos → detalle_gasto (1:N)
rel(gastos["right"], detalle["left"], "1  ──  N", color=INDIGO, rad=-0.1)
# gastos → articulos_gasto (1:N)
rel(gastos["right"], articulos["left"], "1  ──  N", color=INDIGO, rad=0.1)

# Leyenda
legend_x, legend_y = 8.7, 1.4
lg = FancyBboxPatch((legend_x, legend_y), 7.0, 1.5,
                    boxstyle="round,pad=0.03,rounding_size=0.1",
                    linewidth=1, edgecolor=LILAC, facecolor=LILAC)
ax.add_patch(lg)
ax.text(legend_x + 0.2, legend_y + 1.2, "Leyenda", fontsize=11,
        fontweight="bold", color=PURPLE, family="DejaVu Sans")
ax.text(legend_x + 0.2, legend_y + 0.85, "PK  ·  Clave primaria (PRIMARY KEY)",
        fontsize=10, color="#B7950B", fontweight="bold")
ax.text(legend_x + 0.2, legend_y + 0.55,
        "FK  ·  Clave foránea con  ON DELETE CASCADE",
        fontsize=10, color=INDIGO, fontweight="bold")
ax.text(legend_x + 0.2, legend_y + 0.25,
        "1 ── N  Relación uno a muchos",
        fontsize=10, color=INK)

plt.tight_layout()
out = r"C:\Users\fabiv\Desktop\NoDou\er_diagram.png"
plt.savefig(out, dpi=180, bbox_inches="tight", facecolor=WHITE)
print("OK ->", out)
