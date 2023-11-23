-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 04:46:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsrcms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlminimos`
--

CREATE TABLE `controlminimos` (
  `idControlMinimo` bigint(20) UNSIGNED NOT NULL,
  `idEtapaTecnologica` bigint(20) UNSIGNED NOT NULL,
  `idUsuario` bigint(20) UNSIGNED NOT NULL,
  `descripcionControlMinimo` varchar(1000) DEFAULT NULL,
  `statusCumplimiento` varchar(10) DEFAULT NULL,
  `documentoEvidencia` varchar(255) NOT NULL,
  `observacionCumplimiento` varchar(255) NOT NULL,
  `atencionCumplimiento` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `controlminimos`
--

INSERT INTO `controlminimos` (`idControlMinimo`, `idEtapaTecnologica`, `idUsuario`, `descripcionControlMinimo`, `statusCumplimiento`, `documentoEvidencia`, `observacionCumplimiento`, `atencionCumplimiento`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Desarrollar un procedimiento de gestión y tratamiento de riesgosde seguridad y, de acuerdo a su resultado, implementar lasacciones preventivas y correctivas correspondientes.', 'Sí', 'Prueba.docx', 'Ninguna', 'Ninguna', '2023-09-21 03:35:39', '2023-10-12 10:57:33'),
(4, 1, 1, 'Crear, probar e implementar el plan de respuesta y gestión de losincidentes de seguridad, que incluya la conformación del ERISC, asícomo las acciones de preparación, detección y análisis, contención,erradicación y recuperación, y actividades posteriores al incidente.', 'Sí', 'Prueba.pdf', 'Ningunas', 'Ningunas', '2023-09-21 03:36:50', '2023-10-12 10:57:46'),
(5, 1, 1, 'Crear, probar e implementar los planes de continuidad deoperaciones y recuperación ante desastres, incluyendo en éste unalista predefi nida y prioridades para su recuperación; cuando sea posible, contar con sitios alternos como alternativa derecuperación.', 'No', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-09-21 03:37:21', '2023-10-12 10:57:58'),
(6, 1, 1, 'Crear, probar e implementar el plan de gestión de lasvulnerabilidades encontradas, en éste se deberá establecer elproceso para su identifi cación, asignación de responsables ytiempos para su solución.', 'No', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-09-21 03:37:32', '2023-10-12 10:58:10'),
(7, 1, 1, 'Crear e implementar una matriz de relación de proveedores deservicios, estableciendo un inventario de proveedores y servicios,los acuerdos de niveles de servicio y las personas responsables.', 'Sí', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-09-21 03:37:41', '2023-10-12 10:58:22'),
(8, 1, 1, 'Crear, probar e implementar el plan de migración de lasaplicaciones obsoletas y/o de software con el ciclo de vidaconcluido.', 'No', 'Prueba.docx', 'Ninguna', 'Ninguna', '2023-09-21 03:37:50', '2023-10-12 10:58:32'),
(11, 2, 1, 'Definir procesos y procedimientos que establezcan los pasos ytiempos para el respaldo de información y para las pruebas derestauración que le permita a la Dependencia o Entidad mantenersu confi dencialidad, integridad y disponibilidad.', 'No', 'Prueba.pptx', 'Ningunas', 'Ningunas', NULL, '2023-10-12 10:59:07'),
(12, 2, 1, 'Implementar un programa de concienciación, formación yeducación continua sobre seguridad de la información y el usoaceptable de los activos para todo el personal en la Dependencia oEntidad, como mínimo, se deberán considerar lo siguiente:', 'Sí', 'Prueba.pptx', 'Ninguna', 'Ninguna', '2023-09-22 03:48:58', '2023-10-12 10:59:18'),
(13, 2, 1, 'Tópicos acerca de cómo interactuar de manera segura con losactivos de información en general y los datos de la Dependencia oEntidad, identifi car y almacenar, transferir, archivar datosconfi denciales de manera adecuada y aplicar los procedimientospara el respaldo de información y copias de seguridad;', '', '', '', '', '2023-09-22 03:49:26', '2023-09-22 03:49:26'),
(14, 2, 1, 'Tópicos acerca de cómo interactuar de manera segura con losactivos de información en general y los datos de la Dependencia oEntidad, identifi car y almacenar, transferir, archivar datosconfi denciales de manera adecuada y aplicar los procedimientospara el respaldo de información y copias de seguridad;', '', '', '', '', '2023-09-22 03:49:26', '2023-09-22 03:49:26'),
(15, 2, 1, 'Concienciación de las causas de la exposición voluntaria einvoluntaria de datos para que se tenga la habilidad de reconocerlos ataques más comunes, como son: la ingeniería social y elphishing, por mencionar algunos; asimismo, la composición de contraseñas, administración de credenciales y autenticaciónmultifactor (MFA).', '', '', '', '', '2023-09-22 03:50:05', '2023-09-22 03:50:05'),
(16, 2, 1, 'Advertir sobre los peligros del descuido de los puestos de trabajo,conectarse y transmitir datos a través de redes inseguras paraactividades de la Dependencia o Entidad y para reconocer unposible evento o incidente de seguridad, pérdida y robo de losactivos de información y el reporte correspondiente.', '', '', '', '', '2023-09-22 03:50:26', '2023-09-22 03:50:26'),
(17, 2, 1, 'Establecer políticas de contraseñas para la administración de TICs.Con un mínimo de 17 caracteres y renovación periódica, al menoscada 3 meses.', '', '', '', '', '2023-09-22 03:50:41', '2023-09-22 03:50:41'),
(18, 2, 1, 'Implementar y utilizar autenticación multifactor en los equipos,sistemas y aplicaciones donde sea necesario y posible.', '', '', '', '', '2023-09-22 03:50:49', '2023-09-22 03:50:49'),
(19, 2, 1, 'Establecer el ciclo de vida de las credenciales de acceso, defi niendolos procedimientos para su creación, uso, suspensión porinactividad y borrado en los sistemas y aplicaciones institucionalesy cualquier otro activo de información donde se encuentranhabilitadas.', '', '', '', '', '2023-09-22 03:50:57', '2023-09-22 03:50:57'),
(20, 2, 1, 'Evitar el uso desmedido de cuentas de administración y cuentasprivilegiadas, que puedan provocar algún daño a los activos deinformación o interrupción de los servicios institucionales con altoimpacto a la operación y la continuidad. Utilizar protocolos deautenticación de redes.', '', '', '', '', '2023-09-22 03:51:13', '2023-09-22 03:51:13'),
(21, 2, 1, 'Deshabilitar las cuentas predeterminadas o genéricas en losactivos de información para evitar el uso indebido. En caso de sernecesarias para la ejecución de ciertas tareas, aplicaciones oservicios, se deberá establecer el procedimiento para justifi car,documentar, aprobar su uso y para contar con trazabilidad acercade su uso por personas servidoras públicas y otras externas a lasDependencias y Entidades.', '', '', '', '', '2023-09-22 03:51:24', '2023-09-22 03:51:24'),
(22, 2, 1, 'Administrar los accesos físicos a los activos de información, paragarantizar su protección y la trazabilidad en los ingresos, por mediode señalamientos para la restricción del acceso físico a personas noautorizadas, internas y externas, y aplicando el uso de bitácoras decontrol para el acceso a instalaciones o áreas específicas.', '', '', '', '', '2023-09-22 03:51:36', '2023-09-22 03:51:36'),
(23, 2, 1, 'Administrar los accesos lógicos a los activos de información,defi niendo e implementando las reglas de control de accesonecesarias basadas al menos en usuarios y contraseñas, y con losprivilegios necesarios de acuerdo a su perfi l o rol Institucional,cuando sea posible, establecer los controles para el uso de la fi rmaelectrónica o la autenticación multifactor, gestionando los accesospor VPN e implementando las restricciones de acceso a nivel depuerto o de dirección física.', '', '', '', '', '2023-09-22 03:51:45', '2023-09-22 03:51:45'),
(24, 2, 1, 'Aplicar la adecuada confi guración para la navegación web a fi n deprevenir el acceso o, en su caso, detectar páginas fraudulentas osospechosas en función de su reputación.', '', '', '', '', '2023-09-22 03:51:57', '2023-09-22 03:51:57'),
(25, 2, 1, 'Confi gurar adecuadamente el envío y recepción de correoselectrónicos evitando la entrada y salida hacia dominios públicos oprivados diferentes a los autorizados, se recomienda quepreferentemente sea sólo entre el dominio Institucional y con otrasentidades gubernamentales con las cuales se tenga comunicacióninterinstitucional.', '', '', '', '', '2023-09-22 03:52:05', '2023-09-22 03:52:05'),
(26, 2, 1, 'Para correo electrónico, implementar medidas antispam con lafi nalidad de evitar la propagación de malware, robo de datos yotras amenazas.', '', '', '', '', '2023-09-22 03:52:14', '2023-09-22 03:52:14'),
(27, 2, 1, 'Realizar el monitoreo constante que permita detectar conexiones,redes, dispositivos y software no autorizados realizado por personasinternas o externas a la Dependencia o Entidad.', '', '', '', '', '2023-09-22 03:52:21', '2023-09-22 03:52:21'),
(29, 2, 1, 'Contar con un inventario actualizado de bienes y servicios de TIC,incluyendo en éste los equipos de cómputo, dispositivos de red,sistemas, aplicaciones y todos los que se definan.', '', '', '', '', '2023-09-22 04:04:53', '2023-09-22 04:04:53'),
(30, 1, 1, 'Crear e implementar un plan de migración a software libre yestándares abiertos.', 'Sí', 'Prueba.pptx', 'Ninguna', 'Ninguna', '2023-09-22 04:40:43', '2023-10-12 10:58:45'),
(34, 3, 1, 'El personal que tenga acceso a información confidencial de la Dependencia o Entidad deberá firmar un acuerdo de confidencialidad y no divulgación de la información institucional.', 'Sí', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-10-12 10:28:48', '2023-10-12 10:59:31'),
(36, 3, 1, 'Establecer procedimientos para otorgar permisos y privilegios de acceso a los activos de información específicos, estableciendo roles y responsabilidades definidas para todas las personas servidoras públicas y proveedores usuarios de estos.', '', '', '', '', '2023-10-12 10:30:14', '2023-10-12 10:30:14'),
(37, 3, 1, 'Reforzar el buen uso de la cuenta de correo Institucional para que todas las comunicaciones estén relacionadas con su encargo o función, informando de los riesgos y sanciones por incumplimiento.', '', '', '', '', '2023-10-12 10:30:47', '2023-10-12 10:30:47'),
(38, 3, 1, 'Garantizar la asignación, revocación, supresión o modificación de los privilegios de acceso a los activos en materia de TIC, otorgados a servidores públicos de la Institución y de otras Dependencias y Entidades, así como al personal de los proveedores de servicios u otros usuarios, al inicio o término de su empleo, cargo o comisión, relación contractual o de cualquier otra naturaleza, o bien, cuando por algún motivo, el nivel de privilegios de acceso asignado cambie.', '', '', '', '', '2023-10-12 10:31:44', '2023-10-12 10:31:44'),
(39, 3, 1, 'Elaborar un proceso y procedimiento de desvinculación del personal que considere, como mínimo: la devolución de los activos de información bajo custodia, el retiro de credenciales y las cuentas de acceso a servicios y sistemas que permitan poner en riesgo la seguridad de la información en la Dependencia o Entidad.', '', '', '', '', '2023-10-12 10:32:19', '2023-10-12 10:32:19'),
(42, 3, 1, 'Contar con un proceso disciplinario, formalmente establecido y aceptado por todas las áreas de la Dependencias o Entidad, en elque se contemplen las sanciones administrativas o legales para los casos en los que el personal, interno o externo, incumpla con lo definido en materia de seguridad de la información.', '', '', '', '', '2023-10-12 10:41:32', '2023-10-12 10:41:32'),
(44, 4, 1, 'Mantener un registro de todos los equipos físicos, la persona servidora pública responsable del mismo y sus fechas de garantía o finalización del servicio.', 'Sí', 'Prueba.docx', 'Ninguna', 'Ninguna', '2023-10-12 10:51:37', '2023-10-12 10:54:59'),
(45, 4, 1, 'Mantener el firmware de los equipos actualizado, con la última versión estable indicada por el fabricante, sin comprometer la operación.', 'Sí', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-10-12 10:52:04', '2023-10-12 10:55:19'),
(47, 4, 1, 'Mantener una bitácora de control de mantenimiento físico, cambio, remoción, o en su caso, la destrucción de los equipos y/o activos de información, estableciendo las fechas próximas en las que se deberá realizar.', 'No', 'Prueba.pptx', 'Ninguna', 'Ninguna', '2023-10-12 10:56:51', '2023-10-12 10:57:13'),
(48, 5, 1, 'Establecer una bitácora de control de acceso físico al centro de datos y a los activos de información esenciales, describiendo la actividad a realizar en estos.', 'Sí', 'Prueba.docx', 'Ninguna', 'Ninguna', '2023-10-12 11:26:21', '2023-10-12 11:30:18'),
(49, 5, 1, 'Restringir el acceso físico a personas internas o externas, y permitirlo únicamente con autorización escrita y los registros correspondientes.', '', '', '', '', '2023-10-12 11:26:46', '2023-10-12 11:26:46'),
(50, 5, 1, 'Implementar bóvedas de medios, centros de datos alternos cuando sea posible, servicios en la nube, como alternativas para recuperarla operación de los Centros de Datos ante alguna situación que los afecte o interrumpa.', '', '', '', '', '2023-10-12 11:27:13', '2023-10-12 11:27:13'),
(51, 5, 1, 'En caso de requerirse la implementación de centros de datos alternos y bóvedas de medios, estos deberán estar localizados en distintos puntos geográficos, geológicamente viables y dentro del territorio nacional.', '', '', '', '', '2023-10-12 11:27:39', '2023-10-12 11:27:39'),
(52, 5, 1, 'Implementar mecanismos de cifrado en los medios de almacenamiento en Centros de Datos centralizados, determinando que la administración de dichos mecanismos de cifrado esté a cargo de servidores públicos.', '', '', '', '', '2023-10-12 11:28:10', '2023-10-12 11:28:10'),
(53, 5, 1, 'Todo Centro de Datos deberá cumplir en su diseño, estructura, desempeño, fiabilidad y medidas de seguridad equivalentes, como mínimo, el equivalente a una certificación TIER II.', '', '', '', '', '2023-10-12 11:28:38', '2023-10-12 11:28:38'),
(55, 5, 1, 'Establecer los procesos o procedimientos formales para la administración del Centro de Datos, en cuanto a accesos, mantenimiento de equipos, supervisión de trabajos externos y otras actividades relacionadas.', '', '', '', '', '2023-10-12 11:30:39', '2023-10-12 11:30:39'),
(58, 6, 1, 'Aplicar políticas de firewall permitiendo sólo el tráfico válido para la Dependencia o Entidad por medio de los puertos TCP/IP necesarios y autorizados.', 'Sí', 'Prueba.pdf', 'Ninguna', 'Ninguna', '2023-10-12 11:40:23', '2023-10-12 11:49:20'),
(59, 6, 1, 'Utilizar redes abiertas únicamente al proporcionar servicios a la población, las cuales deberán estar separadas y aisladas de las redes de datos institucionales, por ejemplo LAN, DMZ, invitados y de control, en caso de existir.', '', '', '', '', '2023-10-12 11:40:51', '2023-10-12 11:40:51'),
(60, 6, 1, 'Utilizar mecanismos de cifrado de llave pública y privada, canales cifrados de comunicación y, cuando corresponda, de firma electrónica avanzada, que permitan el acceso de la información únicamente al destinatario autorizado al que esté dirigida.', '', '', '', '', '2023-10-12 11:41:19', '2023-10-12 11:41:19'),
(61, 6, 1, 'Implementar controles de red como segmentación de redes, reglas de control de acceso, almacenamiento de bitácoras, seguridad depuertos, así como otras buenas prácticas con la finalidad de teneruna mejor administración y seguridad en la red.', '', '', '', '', '2023-10-12 11:41:45', '2023-10-12 11:41:45'),
(62, 6, 1, 'Desactivar el uso del protocolo RDP en general, en caso de ser necesario, limitarlo por velocidad con doble factor de autenticación, se recomienda hacer uso de redes privadas virtuales VPN.', '', '', '', '', '2023-10-12 11:42:04', '2023-10-12 11:42:04'),
(63, 6, 1, 'Establecer accesos por VPN como único medio de acceso remoto a las redes internas de la Dependencia o Entidad, con autenticación separada a la de los servicios institucionales, sin tener permisos superiores a los que el usuario tiene en la red interna, y con la finalidad de que sólo usuarios autorizados puedan acceder a la red institucional desde sitios remotos.', '', '', '', '', '2023-10-12 11:42:37', '2023-10-12 11:42:37'),
(64, 6, 1, 'Establecer acceso restringido a la red LAN para que sólo personal de la Dependencias o Entidad tenga acceso; para usuarios externos, será requerido contar con justificación, autorización y los registros correspondientes.', '', '', '', '', '2023-10-12 11:43:01', '2023-10-12 11:43:01'),
(65, 6, 1, 'Implementar proxy en las redes wireless y LAN, estableciendo políticas de uso de la red, es decir, autorización para navegar a sitios de la Internet y no permitiendo el acceso o salida directa hacia ésta; además, se deberán detectar páginas fraudulentas o sospechosas por medio de direcciones IP o dominios.', '', '', '', '', '2023-10-12 11:43:34', '2023-10-12 11:43:34'),
(66, 6, 1, 'Mantener una bitácora con la justificación de cada regla configurada en los firewall.', '', '', '', '', '2023-10-12 11:44:00', '2023-10-12 11:44:00'),
(67, 6, 1, 'Deshabilitar las reglas de acceso en el Firewall que no sean ocupadas, verificarlas y actualizarlas periódicamente según las necesidades institucionales.', '', '', '', '', '2023-10-12 11:44:19', '2023-10-12 11:44:19'),
(68, 6, 1, 'Establecer una configuración base y realizar periódicamente copias de seguridad de las configuraciones de dispositivos de telecomunicaciones.', '', '', '', '', '2023-10-12 11:44:43', '2023-10-12 11:44:43'),
(69, 6, 1, 'Se deberá mantener regularmente actualizado el firmware, el sistema operativo y el software instalado en los equipos, en su última versión estable, sin afectar la operación, así como aplicar los parches de seguridad recomendados por los fabricantes.', '', '', '', '', '2023-10-12 11:45:20', '2023-10-12 11:45:20'),
(70, 6, 1, 'Monitorear y analizar el flujo de tráfico y dispositivos de red, para la detección oportuna de amenazas que puedan explotar vulnerabilidades de los activos de información en la Dependencia o Entidad.', '', '', '', '', '2023-10-12 11:45:43', '2023-10-12 11:45:43'),
(71, 6, 1, 'Implementar un mecanismo de revisión constante de la reputación del segmento de IP, en caso de estar en lista negra, identificar la(s) causa(s) por la(s) que la reputación del segmento decreció, solucionar el problema y solicitar la exclusión de la lista negra.', '', '', '', '', '2023-10-12 11:46:11', '2023-10-12 11:46:11'),
(72, 6, 1, 'Implementar uso de protocolos seguros HTTPS, SFTP y SSH, en lugar de HTTP, FTP y Telnet. Priorizar el uso de Let’s Encrypt e implementar Autoridades de Certifi cación internas de confianza.', '', '', '', '', '2023-10-12 11:47:30', '2023-10-12 11:47:30'),
(73, 6, 1, 'Restringir el acceso a invitados a una red sólo con salida a internet, que no tenga acceso a la red interna de la Dependencia o Entidad, estableciendo el tiempo máximo de autorización de los dispositivos.', '', '', '', '', '2023-10-12 11:47:52', '2023-10-12 11:47:52'),
(75, 6, 1, 'En caso de contar con proveedores, el personal interno de la Dependencia o Entidad deberá tener acceso a los equipos de telecomunicaciones, además de estos, con usuarios y con privilegios de lectura o monitoreo a los equipos de telecomunicaciones, que deberán estar autorizados y documentados.', '', '', '', '', '2023-10-12 11:49:42', '2023-10-12 11:49:42'),
(76, 7, 1, 'Crear las imágenes de instalación base con las aplicaciones permitidas al interior de cada Dependencia o Entidad, de preferencia conformadas por software libre; configuración de los sistemas operativos y habilitación de los usuarios estrictamente necesarios de acuerdo con el grupo o rol de la persona servidora pública y priorizando el principio de menor privilegio.', 'Sí', 'Prueba.docx', 'Ninguna', 'Ninguna', '2023-10-12 22:48:16', '2023-10-12 22:50:19'),
(77, 7, 1, 'Establecer los procedimientos necesarios para la autorización, el ingreso, registro y la conexión de equipos de cómputo personales a las redes institucionales.', '', '', '', '', '2023-10-12 22:48:40', '2023-10-12 22:48:40'),
(78, 7, 1, 'Implementar herramientas de monitoreo de aplicaciones instaladas y actividad no deseada en los equipos de cómputo.', '', '', '', '', '2023-10-12 22:48:56', '2023-10-12 22:48:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapatecnologicas`
--

CREATE TABLE `etapatecnologicas` (
  `idEtapaTecnologica` bigint(20) UNSIGNED NOT NULL,
  `nombreEtapaTecnologica` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etapatecnologicas`
--

INSERT INTO `etapatecnologicas` (`idEtapaTecnologica`, `nombreEtapaTecnologica`, `created_at`, `updated_at`) VALUES
(1, 'Planeacion', '2023-10-12 02:32:33', '2023-10-12 02:32:40'),
(2, 'Gestion', '2023-10-12 02:32:33', '2023-10-12 02:32:40'),
(3, 'Recursos humanos', '2023-10-12 02:32:33', '2023-10-12 02:32:40'),
(4, 'Equipos físicos', '2023-10-12 04:51:32', '2023-10-12 04:51:32'),
(5, 'Centro de datos', '2023-10-12 05:02:34', '2023-10-12 05:02:34'),
(6, 'Redes y Telecomunicaciones\r\n', '2023-10-12 05:39:02', '2023-10-12 05:39:02'),
(7, 'Equipo de cómputo', '2023-10-12 16:04:48', '2023-10-12 16:04:48'),
(8, 'Tecnología Móvil', '2023-10-12 16:57:37', '2023-10-12 16:57:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_07_180727_create_permission_tables', 1),
(7, '2023_08_17_223848_etapa_tecnologicas', 1),
(8, '2023_08_17_225249_control_minimos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$PG.n.5molha1IEh/6krvPOObHvAfmWfJneAJfDtrRs4o2k9iZ1cea', '2023-09-22 13:08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-control mínimo', 'web', '2023-09-15 23:50:03', '2023-09-15 23:50:03'),
(2, 'crear-control mínimo', 'web', '2023-09-15 23:50:03', '2023-09-15 23:50:03'),
(3, 'editar-control mínimo', 'web', '2023-09-15 23:50:03', '2023-09-15 23:50:03'),
(4, 'borrar-control mínimo', 'web', '2023-09-15 23:50:03', '2023-09-15 23:50:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-09-16 00:46:37', '2023-09-16 00:46:37'),
(2, 'Usuario', 'web', '2023-09-16 00:46:37', '2023-09-16 00:46:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `intentoSesion` bigint(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `estado`, `intentoSesion`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@gmail.com', 0, 0, NULL, '$2y$10$zAny9cXeh46jdttl7uCsyOms11bSFLBAyflMfgAgl5rFhS746cz5C', NULL, '2023-09-16 00:46:37', '2023-10-12 21:51:50'),
(2, 'Usuario', 'user@gmail.com', 0, 0, NULL, '$2y$10$Ym4oKSlp22HZkG4CXb7qrOTk/rQI5K9sEfBuJvUvxqKiwyz/PIEqW', NULL, '2023-09-16 00:46:37', '2023-09-16 00:46:37'),
(3, 'Carlos', 'carlos@gmail.com', 0, 0, NULL, '$2y$10$68z/bTFnSEriAGUX6G6KruH7qjejKDIyWUaf4/bo7eod74qqM3A9W', NULL, '2023-09-22 23:15:38', '2023-09-22 23:15:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `controlminimos`
--
ALTER TABLE `controlminimos`
  ADD PRIMARY KEY (`idControlMinimo`),
  ADD KEY `controlminimos_idetapatecnologica_foreign` (`idEtapaTecnologica`),
  ADD KEY `controlminimos_idusuario_foreign` (`idUsuario`);

--
-- Indices de la tabla `etapatecnologicas`
--
ALTER TABLE `etapatecnologicas`
  ADD PRIMARY KEY (`idEtapaTecnologica`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `controlminimos`
--
ALTER TABLE `controlminimos`
  MODIFY `idControlMinimo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `etapatecnologicas`
--
ALTER TABLE `etapatecnologicas`
  MODIFY `idEtapaTecnologica` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `controlminimos`
--
ALTER TABLE `controlminimos`
  ADD CONSTRAINT `controlminimos_idetapatecnologica_foreign` FOREIGN KEY (`idEtapaTecnologica`) REFERENCES `etapatecnologicas` (`idEtapaTecnologica`),
  ADD CONSTRAINT `controlminimos_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
