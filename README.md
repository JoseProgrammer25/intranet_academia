# 📚 Academia Web - Proyecto PHP + MySQL

Este proyecto está compuesto por una aplicación web para la gestión de cursos académicos. A continuación se detalla la estructura y funcionamiento del sistema.

---

## 📁 Estructura de Carpetas

- **`academia_servidor/`** → Esta carpeta contiene los archivos del servidor web y debe colocarse dentro de `htdocs` (por ejemplo, en XAMPP).
- **`academia/`** → Esta carpeta contiene los archivos de la base de datos MySQL y debe importarse en el gestor de bases de datos (por ejemplo, phpMyAdmin).

---

## 🧭 Flujo de Navegación

1. **`index.html`** → Página principal del sitio.
2. **`login.php`** → Formulario de acceso para usuarios registrados.
3. **`dashboard.php`** → Panel principal tras iniciar sesión.
4. **Menú de funcionalidades** dentro del dashboard:
   - 📋 **Listar cursos**
   - ➕ **Añadir curso**
   - ❌ **Borrar curso**
   - ✏️ **Editar curso**
   - 🔙 **Volver al dashboard**
   - 🚪 **Salir** → Cierra sesión y redirige al `index.html`

---

## 🛠️ Requisitos

- Servidor local (XAMPP, WAMP, etc.)
- PHP 7.4+
- MySQL
- Navegador web moderno

---

## 🚀 Instalación

1. Copia `academia_servidor/` en la carpeta `htdocs`.
2. Importa la base de datos desde `academia/` en tu gestor MySQL.
3. Accede a `http://localhost/academia_servidor/index.html` desde tu navegador.

---

¡Listo para gestionar tus cursos de forma eficiente! 🎓