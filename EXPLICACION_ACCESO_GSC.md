# Explicación del Acceso a Google Search Console (GSC)

Este documento detalla cómo este agente de IA tiene acceso a los datos de SEO de los proyectos contenidos en la carpeta **TRABAJO SEO**.

## 1. El Agente de Servicio (Service Account)
El acceso se realiza a través de una cuenta de servicio de Google Cloud Platform (GCP):

*   **Email:** `agente-seo@agente-seo-490601.iam.gserviceaccount.com`

Una "Cuenta de Servicio" es un tipo especial de cuenta de Google que pertenece a una aplicación o un robot, en lugar de a un usuario individual. Esto permite que el agente realice tareas automáticas sin necesidad de una intervención manual o de iniciar sesión en un navegador.

## 2. Autenticación mediante Clave JSON
Para "identificarse" ante Google, el agente utiliza un archivo de credenciales privado ubicado en:

*   **Ruta:** `herramientas/mcp-gsc/service_account_credentials.json`

Este archivo contiene la clave criptográfica que funciona como la "contraseña" de la cuenta de servicio. El agente lee este archivo cada vez que necesita conectarse a la API de Google Search Console.

## 3. Configuración de Permisos (Imprescindible)
Para que el agente pueda ver los datos de un sitio web, la cuenta de servicio debe estar autorizada en la consola de Search Console de cada cliente:

1.  El propietario del sitio debe entrar en **Google Search Console**.
2.  Ir a **Ajustes > Usuarios y permisos**.
3.  Hacer clic en **Añadir usuario**.
4.  Introducir el email del agente: `agente-seo@agente-seo-490601.iam.gserviceaccount.com`.
5.  Asignar el permiso de **Propietario** (o al menos **Usuario restringido/completo** para lectura).

## 4. Estructura de Proyectos en "TRABAJO SEO"
El agente reconoce los proyectos según las subcarpetas dentro de este espacio de trabajo:

*   `1981`
*   `carnivore`
*   `coconut`
*   `gate-garage`
*   `herramientas`
*   `prospect-storage`
*   `tintxking`
*   `uncle-liu`

Existen scripts dedicados en `herramientas/mcp-gsc/` (por ejemplo, `get_uncleliu_data.py`) que están configurados para mapear cada carpeta con su respectiva Propiedad de Search Console mediante la cuenta de servicio mencionada.

## 5. Capacidades del Agente
Gracias a este acceso, el agente puede:
*   Consultar consultas de búsqueda (keywords) y páginas con más tráfico.
*   Analizar el CTR (Click-Through Rate) y la posición media en Google.
*   Verificar el estado de indexación de URLs específicas.
*   Revisar sitemaps y posibles errores de rastreo.

---
**Nota de seguridad:** El archivo `service_account_credentials.json` es sensible y no debe compartirse públicamente, ya que otorga acceso a todas las propiedades de GSC donde el email del agente haya sido invitado.
