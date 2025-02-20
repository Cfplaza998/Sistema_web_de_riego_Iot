# Sistema de Riego IoT

## Resumen

El **Sistema de Riego IoT** es un proyecto que permite la gestión automatizada y remota del riego agrícola utilizando tecnologías como **Node-RED, MQTT, HTML y PHP**. Se basa en el uso de **Arduino Mega, electroválvulas, relés y un router** para la comunicación y activación del sistema. Además, ofrece funcionalidades de **registro de datos**, **generación de reportes por fechas** y **descarga de reportes en PDF**.

## Descripción

Este proyecto implementa un **Sistema de Riego IoT** utilizando **Node-RED, MQTT, HTML y PHP**, permitiendo el monitoreo y control remoto del riego mediante sensores y actuadores conectados a Internet. Además, cuenta con funcionalidades de **registro de datos**, **generación de reportes por fechas** y **descarga de reportes en formato PDF**.

## Tecnologías Utilizadas

- **Node-RED**: Para la gestión y automatización del flujo de datos.
- **MQTT**: Protocolo de comunicación para la transmisión de datos en tiempo real.
- **HTML, CSS, JavaScript**: Desarrollo de la interfaz web.
- **PHP y MySQL**: Backend y base de datos para el almacenamiento de información.
- **TCP/IP**: Comunicación entre dispositivos.
- **FPDF**: Generación de reportes en formato PDF.
- **Arduino Mega**: Microcontrolador principal del sistema.
- **Ethernet Shield W5100**: Shield usado para comunicacion entre arduino y el router.
- **Electroválvulas**: Control del flujo de agua.
- **Relés**: Activación y desactivación de las electroválvulas.
- **Router**: Comunicación y acceso a la red.

## Características

- Control del riego de forma remota mediante interfaz web.
- Registro automático de datos en la base de datos.
- Generación de reportes por fechas específicas.
- Descarga de reportes en formato PDF.
- Integración con sensores de humedad y temperatura.
- Notificaciones y alertas mediante Node-RED y MQTT.

## Instalación y Configuración

### Requisitos

- Servidor con **Apache**, **PHP** y **MySQL** (XAMPP o similar).
- Node-RED instalado.
- Broker MQTT (Ej: Mosquitto). Se puede usar un broker publico

### Pasos de instalación

1. Clonar este repositorio:
   ```bash
   https://github.com/Cfplaza998/Sistema_web_de_riego_Iot.git
   ```
2. Configurar la base de datos en MySQL:
   - Crear una base de datos llamada `sistema_riego`.
   - Importar el archivo `database.sql` incluido en el repositorio.
3. Configurar el servidor web:
   - Copiar los archivos del proyecto en la carpeta `htdocs` de XAMPP.
   - Modificar los archivos de conexión a la base de datos en `config.php`.
4. Configurar Node-RED:
   - Importar el flujo JSON en Node-RED.
   - Asegurar que el broker MQTT esté en funcionamiento.
5. Ejecutar Node-RED:
   ```bash
   node-red
   ```
6. Acceder al sistema mediante el navegador:
   ```
   http://localhost/sistema-riego
   ```

## Uso del Sistema

1. Acceder a la interfaz web.
2. Configurar los parámetros de riego.
3. Visualizar los datos en tiempo real.
4. Generar y descargar reportes en PDF según las fechas seleccionadas.

## Contribuciones

Las contribuciones son bienvenidas. Para contribuir:

1. Hacer un fork del repositorio.
2. Crear una nueva rama (`git checkout -b feature-nueva-caracteristica`).
3. Hacer commit de los cambios (`git commit -m 'Agregada nueva característica'`).
4. Hacer push a la rama (`git push origin feature-nueva-caracteristica`).
5. Abrir un pull request.

## Licencia

Este proyecto está licenciado bajo la **MIT License**.

## Contacto

- **Autor**: Fernando Plaza Calle
- **Email**: plaza3419@gmail.com
- **GitHub**: Cfplaza998

---

¡Espero que este README te sea útil para documentar tu proyecto en GitHub! 🚀

