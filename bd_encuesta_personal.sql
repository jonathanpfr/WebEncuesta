-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2018 a las 08:02:16
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_proyecto_encuesta_personal`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb001_grado_categoria_lista_activo`()
BEGIN
SELECT tb001.* from tb001_grado_categoria tb001 
where tb001.I001ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb002_especialidad_lista_activo`()
BEGIN
SELECT tb002.* from tb002_especialidad tb002 
where tb002.I002ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb003_grupo_sanguinero_lista_activo`()
BEGIN
SELECT tb003.* from tb003_grupo_sanguinero tb003 
where tb003.I003ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb004_departamento_lista_activo`()
BEGIN
SELECT tb004.* from tb004_departamento tb004 
where tb004.I004ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb004_perfil_lista_activo`()
BEGIN
SELECT tb004.* from tb004_perfil tb004 
where tb004.I004ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb005_provincia_lista_activo`(in id_departamento_ int)
BEGIN
SELECT tb005.* from tb005_provincia tb005 
where tb005.I005ESTADO=1 AND tb005.I004ID_DEPARTAMENTO=id_departamento_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb005_usuario_cambiar_clave`(in id_user_ int, in clave_ VARCHAR(200))
BEGIN
declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;


UPDATE tb005_usuario set V005PASSWORD=MD5(clave_),I005CAMBIO=1 where I005ID_USUARIO=id_user_ and not I005ESTADO=3;

	  SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb005_usuario_login`(in usuario_ VARCHAR(200),in clave_ VARCHAR(200))
BEGIN
SELECT tb005.I005ID_USUARIO,tb006.V006NOMBRES,tb004.V004NOMBRE,tb004.I004ID_PERFIL from tb005_usuario tb005
INNER JOIN tb006_trabajador tb006 on tb006.I006ID_TRABAJADOR=tb005.I006ID_TRABAJADOR
INNER JOIN tb004_perfil tb004 on tb004.I004ID_PERFIL=tb005.I004ID_PERFIL
where tb005.I005ESTADO=1 and tb005.V005USUARIO=usuario_ and V005PASSWORD=MD5(clave_);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb005_usuario_seleccion`(in id_usuario_ int)
BEGIN

set @contar_admin=(SELECT COUNT(tb005.I005ID_USUARIO)contar from tb005_usuario tb005 
INNER JOIN tb006_administrador tb006 on tb006.I005ID_USUARIO=tb005.I005ID_USUARIO
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_);

set @contar_alumno=(SELECT COUNT(tb005.I005ID_USUARIO)contar from tb005_usuario tb005 
INNER JOIN tb008_alumno tb008 on tb008.I005ID_USUARIO=tb005.I005ID_USUARIO
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_);

set @contar_profesor=(SELECT COUNT(tb005.I005ID_USUARIO)contar from tb005_usuario tb005 
INNER JOIN tb007_profesor tb007 on tb007.I005ID_USUARIO=tb005.I005ID_USUARIO
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_);

if(@contar_admin=1)THEN
SELECT tb005.I005ID_USUARIO as id_usuario,tb004.I004ID_PERFIL as id_perfil,
tb004.V004NOMBRE as nombre_perfil,tb006.V006NOMBRES as nombre,tb005.T005IMAGEN as imagen from tb005_usuario tb005 
INNER JOIN tb006_administrador tb006 on tb006.I005ID_USUARIO=tb005.I005ID_USUARIO
INNER JOIN tb004_perfil tb004 on tb004.I004ID_PERFIL=tb005.I004ID_PERFIL
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_;

elseif(@contar_alumno=1)THEN

SELECT tb005.I005ID_USUARIO as id_usuario,tb004.I004ID_PERFIL as id_perfil,
tb004.V004NOMBRE as nombre_perfil,tb008.V008NOMBRES as nombre,tb005.T005IMAGEN as imagen from tb005_usuario tb005 
INNER JOIN tb008_alumno tb008 on tb008.I005ID_USUARIO=tb005.I005ID_USUARIO
INNER JOIN tb004_perfil tb004 on tb004.I004ID_PERFIL=tb005.I004ID_PERFIL
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_;

ELSE

SELECT tb005.I005ID_USUARIO as id_usuario,tb004.I004ID_PERFIL as id_perfil,
tb004.V004NOMBRE as nombre_perfil,tb007.V007NOMBRES as nombre,tb005.T005IMAGEN as imagen from tb005_usuario tb005 
INNER JOIN tb007_profesor tb007 on tb007.I005ID_USUARIO=tb005.I005ID_USUARIO
INNER JOIN tb004_perfil tb004 on tb004.I004ID_PERFIL=tb005.I004ID_PERFIL
where tb005.I005ESTADO=1 and tb005.I005ID_USUARIO=id_usuario_;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_distrito_lista_activo`(in id_provincia_ int)
BEGIN
SELECT tb006.* from tb006_distrito tb006 
where tb006.I006ESTADO=1 AND tb006.I005ID_PROVINCIA=id_provincia_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_dni_verificar_modificar`(in id_numero_doc_ int,in numero_doc_ VARCHAR(200), in id_ int)
BEGIN
SELECT COUNT(tb006.I006ID_TRABAJADOR)contar from tb006_trabajador tb006 
where not tb006.I006ESTADO=3 and tb006.I007ID_TIPO_DOCUMENTO=id_numero_doc_ 
and tb006.V006NUMERO_DOCUMENTO=numero_doc_ and not tb006.I006ID_TRABAJADOR=id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_dni_verificar_registrar`(in id_numero_doc_ int,in numero_doc_ VARCHAR(200))
BEGIN
SELECT COUNT(tb006.I007ID_TIPO_DOCUMENTO)contar from tb006_trabajador tb006 
where not tb006.I006ESTADO=3 and tb006.I007ID_TIPO_DOCUMENTO=id_numero_doc_ 
and tb006.V006NUMERO_DOCUMENTO=numero_doc_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_eliminar`(in id_trabajador_ int)
BEGIN
declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;


set @contar_usuario=(SELECT COUNT(tb005.I005ID_USUARIO) from tb005_usuario tb005 where tb005.I006ID_TRABAJADOR=id_trabajador_ and not tb005.I005ESTADO=3);
set @id_usuario=(SELECT tb005.I005ID_USUARIO from tb005_usuario tb005 where tb005.I006ID_TRABAJADOR=id_trabajador_ and not tb005.I005ESTADO=3);
	if(@contar_usuario=1)THEN
	UPDATE tb005_usuario set I005ESTADO=3 where I005ID_USUARIO=@id_usuario;
	END IF;
UPDATE tb006_trabajador set I006ESTADO=3 where I006ID_TRABAJADOR=id_trabajador_;


	  SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_listar`()
BEGIN
SELECT * from (
SELECT tb006.*,tb007.V007NOMBRE,CONCAT(tb006.V006NOMBRES,' ',tb006.V006APELLIDO_PATERNO,' ',tb006.V006APELLIDO_MATERNO)nombre_completo from tb006_trabajador tb006 
INNER JOIN tb007_tipo_documento tb007 on tb007.I007ID_TIPO_DOCUMENTO=tb006.I007ID_TIPO_DOCUMENTO
where not tb006.I006ESTADO=3
) as a 
LEFT JOIN(
SELECT tb005.I005ID_USUARIO,tb005.V005USUARIO,tb005.I006ID_TRABAJADOR as id_trabajador from tb005_usuario tb005 
where not tb005.I005ESTADO=3
)as b on b.id_trabajador=a.I006ID_TRABAJADOR;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_modificar`(in nombre_ VARCHAR(200),in apellido_p_ VARCHAR(200),in apellido_m_ VARCHAR(200),in tipo_documento_ int,in numero_doc_ VARCHAR(200),
in correo_ varchar(200),in direccion_ varchar(200),in telefono_ varchar(200), in imagen_ text,in usuario_ VARCHAR(200),in clave_ VARCHAR(200),in estado_ int, in id_ int,in cambiar_clave_ int,in id_usuario_ int,in tipo_usuario_ int,in id_perfil_ int)
BEGIN

declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;

UPDATE tb006_trabajador set
V006NOMBRES=nombre_,V006APELLIDO_PATERNO=apellido_p_,
V006APELLIDO_MATERNO=apellido_m_,
I007ID_TIPO_DOCUMENTO=tipo_documento_,
V006NUMERO_DOCUMENTO=numero_doc_,
V006CORREO=correo_,
V006DIRECCION=direccion_,
V006TELEFONO=telefono_,
I006ESTADO=estado_ where I006ID_TRABAJADOR=id_;

if(id_usuario_=0 and tipo_usuario_=1)THEN
INSERT INTO tb005_usuario VALUES(null,imagen_,usuario_,MD5(clave_),id_perfil_,id_,estado_);
END IF;

if(id_usuario_!=0 and tipo_usuario_=2)THEN
UPDATE tb005_usuario set I005ESTADO=3 where I005ID_USUARIO=id_usuario_;
END IF;

if(id_usuario_!=0 and tipo_usuario_=1)THEN
	UPDATE tb005_usuario set I004ID_PERFIL=id_perfil_,T005IMAGEN=imagen_,V005USUARIO=usuario_,I005ESTADO=estado_ where I005ID_USUARIO=id_usuario_;

	if(cambiar_clave_ = 1)THEN
		UPDATE tb005_usuario set V005PASSWORD=MD5(clave_) where I005ID_USUARIO=id_usuario_;
	end if;

END IF;





	  SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_registrar`(in nombre_ VARCHAR(200),in apellido_p_ VARCHAR(200),in apellido_m_ VARCHAR(200),in tipo_documento_ int,in numero_documento_ VARCHAR(200),in correo_ varchar(200),in direccion_ varchar(200),in telefono_ varchar(200),
 in imagen_ text,in usuario_ VARCHAR(200),in clave_ VARCHAR(200),in id_perfil_ int,in tipo_usuario_ int)
BEGIN

declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;


INSERT INTO tb006_trabajador VALUES(null,nombre_,apellido_p_,apellido_m_,tipo_documento_,numero_documento_,correo_,direccion_,telefono_,1);
set @id_trabajador_=LAST_INSERT_ID();
if(tipo_usuario_=1)THEN

INSERT INTO tb005_usuario VALUES(null,imagen_,usuario_,MD5(clave_),id_perfil_,@id_trabajador_,0,1);
END IF;


	  SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_seleccion`(in id_ int)
BEGIN
SELECT * from (
SELECT * from (
SELECT tb006.*,tb007.I007NUMERO_DIGITOS,tb007.I007TIPO_VARIABLE,tb007.V007NOMBRE,CONCAT(tb006.V006NOMBRES,' ',tb006.V006APELLIDO_PATERNO,' ',tb006.V006APELLIDO_MATERNO)nombre_completo from tb006_trabajador tb006 
INNER JOIN tb007_tipo_documento tb007 on tb007.I007ID_TIPO_DOCUMENTO=tb006.I007ID_TIPO_DOCUMENTO
where not tb006.I006ESTADO=3
) as a 
LEFT JOIN(
SELECT tb005.T005IMAGEN,tb005.I004ID_PERFIL,tb005.I005ID_USUARIO,tb005.V005USUARIO,tb005.I006ID_TRABAJADOR as id_trabajador from tb005_usuario tb005 
where not tb005.I005ESTADO=3
)as b on b.id_trabajador=a.I006ID_TRABAJADOR
) as a where I006ID_TRABAJADOR=id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_seleccion_perfil`(in id_user_ int)
BEGIN
SELECT tb006.V006NOMBRES,tb005.T005IMAGEN,tb004.I004ID_PERFIL,tb004.V004NOMBRE,tb005.I005CAMBIO from tb005_usuario tb005 
INNER JOIN tb004_perfil tb004 on tb004.I004ID_PERFIL=tb005.I004ID_PERFIL
INNER JOIN tb006_trabajador tb006 on tb006.I006ID_TRABAJADOR=tb005.I006ID_TRABAJADOR
where tb005.I005ESTADO=1 AND tb005.I005ID_USUARIO=id_user_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_usuario_verificar_modificar`(in usuario_ VARCHAR(200),in id_ int)
BEGIN
SELECT COUNT(tb005.I005ID_USUARIO)contar from tb005_usuario tb005 
where not tb005.I005ESTADO=3 and tb005.V005USUARIO=usuario_ and not tb005.I005ID_USUARIO=id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb006_trabajador_usuario_verificar_registrar`(in usuario_ VARCHAR(200))
BEGIN
SELECT COUNT(tb005.I005ID_USUARIO)contar from tb005_usuario tb005 
where not tb005.I005ESTADO=3 and tb005.V005USUARIO=usuario_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb007_grado_instruccion_lista_activo`()
BEGIN
SELECT tb007.* from tb007_grado_instruccion tb007 
where tb007.I007ESTADO=1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb007_tipo_documento_lista_activo`()
BEGIN
SELECT tb007.* from tb007_tipo_documento tb007 
where tb007.I007ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb008_religion_lista_activo`()
BEGIN
SELECT tb008.* from tb008_religion tb008 
where tb008.I008ESTADO=1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb009_estado_civil_lista_activo`()
BEGIN
SELECT tb009.* from tb009_estado_civil tb009 
where tb009.I009ESTADO=1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_eliminar`(in id_ int)
BEGIN
declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;
UPDATE tb010_alumno set I010ESTADO=3 where I010ID_ALUMNO=id_;

 SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_listar`()
BEGIN
SELECT tb010.I010ESTADO,tb010.I010ID_ALUMNO,CONCAT(tb010.V010APELLIDO_PATERNO,' ',tb010.V010APELLIDO_MATERNO,', ',tb010.V010NOMBRES)nombre_apellidos,tb010.V010DNI,
tb001.V001NOMBRE,tb002.V002NOMBRE,tb010.T010CURRICULUM from tb010_alumno tb010 
INNER JOIN tb001_grado_categoria tb001 on tb001.I001ID_GRADO_CATEGORIA=tb010.I001ID_GRADO_CATEGORIA
INNER JOIN tb002_especialidad tb002 on tb002.I002ID_ESPECIALIDAD=tb010.I002ID_ESPECIALIDAD
where not tb010.I010ESTADO=3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_modificar`(in id_ int,
in id_grado_categoria_ int,in id_especialidad_ int,in nro_cip_ VARCHAR(200),in dni_ VARCHAR(200),in id_grupo_sanguineo_ int,
in apellido_paterno_ VARCHAR(200),in apellido_materno_ VARCHAR(200),in nombres_ VARCHAR(200),in fecha_nacimiento_ DATE,in id_distrito_ int,in id_grado_instruccion_ int,
in universidad_ VARCHAR(200),in calle_jrn_ VARCHAR(200),in urbanizacion_ VARCHAR(200),in distrito_ VARCHAR(200),in id_estado_civil_ int,in idiomas_domina_ VARCHAR(200),in id_religion_ int,
in telefono_ VARCHAR(200),in mail_ VARCHAR(200),in fecha_ingreso_marina_ DATE,in fecha_ascenso_grado_ DATE,in id_tipo_vivienda_ int,in nro_brevete_ VARCHAR(200),
in modelo_vehiculo_ VARCHAR(200),in placa_nro_ VARCHAR(200),in nro_lic_arma_ VARCHAR(200),in modelo_arma_ VARCHAR(200),in tipo_arma_ VARCHAR(200),in marca_arma_ VARCHAR(200),in calibre_arma_ VARCHAR(200),
in id_tipo_condicion_llega_ int,in curso_seguir_dictar_ VARCHAR(200),in dependencia_origen_ VARCHAR(200),in nro_carta_referencia_ VARCHAR(200),in cargo_ocupa_ VARCHAR(200),
in id_liper_ int,in id_lisan_ int,in id_tin_ int,
in profesion_emergencia_ VARCHAR(200),in brevete_militar_emergencia_ VARCHAR(200),in puesto_zafarrancho_ VARCHAR(200),in emegergencia_llamar_ VARCHAR(200),
in emergencia_parentesco_ VARCHAR(200),in emergencia_telefono_ VARCHAR(200),in emergencia_centro_trabajo_ VARCHAR(200),in emergencia_domicilio_ VARCHAR(200),
in id_padre_vive_ int,in nombre_padre_ VARCHAR(200),in ocupacion_padre_ VARCHAR(200),in domicilio_padre_ VARCHAR(200),in telefono_padre_ VARCHAR(200),
in id_madre_vive_ int,in nombre_madre_ VARCHAR(200),in ocupacion_madre_ VARCHAR(200),in domicilio_madre_ VARCHAR(200),in telefono_madre_ VARCHAR(200),
in id_tipo_compromiso_ int,in nacionalidad_compromiso_ VARCHAR(200),
in id_matrimonio_civil_ int,in id_matrimonio_religioso_ int,
in nombre_apellidos_esposa_ VARCHAR(200),in fecha_nacimiento_esposa_ DATE,in dpto_esposa_ VARCHAR(200),in centro_labores_esposa_ VARCHAR(200),in cargo_grado_esposa_ VARCHAR(200),
in domicilio_esposa_ VARCHAR(200),in telefono_esposa_ VARCHAR(200),
in foto_ TEXT,in croquis_ TEXT,in curriculum_ TEXT,
in contador_insertar_ int,in query_insertar_ TEXT,
in contador_modificar_ int,in query_modificar_ TEXT,
in contador_eliminar_ int,in query_eliminar_ TEXT,in id_user_ int)
BEGIN

declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;

UPDATE tb010_alumno set I001ID_GRADO_CATEGORIA=id_grado_categoria_,I002ID_ESPECIALIDAD=id_especialidad_,V010NRO_CIP=nro_cip_,V010DNI=dni_,I003ID_GRUPO_SANGUINEO=id_grupo_sanguineo_,
V010APELLIDO_PATERNO=apellido_paterno_,V010APELLIDO_MATERNO=apellido_materno_,V010NOMBRES=nombres_,F010FECHA_NACIMIENTO=fecha_nacimiento_,I006ID_DISTRITO=id_distrito_,I007ID_GRADO_INSTRUCCION=id_grado_instruccion_,V010UNIVERIDAD=universidad_,V010CALLE_JR=calle_jrn_,
V010URBANIZACION=urbanizacion_,V010DISTRITO=distrito_,I009ID_ESTADO_CIVIL=id_estado_civil_,V010IDIOMAS_DOMINA=idiomas_domina_,I008ID_RELIGION=id_religion_,V010TELEFONO=telefono_,V010MAIL=mail_,F010FECHA_INGRESO_MARINA=fecha_ingreso_marina_,F010FECHA_ASENSO_GRADO=fecha_ascenso_grado_,
I011ID_TIPO_VIVIENDA=id_tipo_vivienda_,V010NRO_BREVETE=nro_brevete_,V010MODELO_VEHICULO=modelo_vehiculo_,V010PLACA_NRO=placa_nro_,V010NRO_LIC_ARMA=nro_lic_arma_,V010MODELO_ARMA=modelo_arma_,V010TIPO_ARMA=tipo_arma_,V010MARCA=marca_arma_,V010CALIBRE=calibre_arma_,
I012ID_TIPO_CONDICION_LLEGA=id_tipo_condicion_llega_,V010CURSO_SEGUIR_DICTAR=curso_seguir_dictar_,V010DEPENDENCIA_ORIGEN=dependencia_origen_,V010NRO_CARTA_REFERENCIA=nro_carta_referencia_,V010CARGO_OCUPA=cargo_ocupa_,I010LIPER=id_liper_,I010LISAN=id_lisan_,I010TIN=id_tin_,
V010PROFESION_EMERGENCIA=profesion_emergencia_,V010BREVETE_MILITAR_EMERGENCIA=brevete_militar_emergencia_,V010PUESTO_ZAFARRANCHO=puesto_zafarrancho_,V010EMERGENCIA_LLAMAR_A=emegergencia_llamar_,V010EMERGENCIA_PARENTESCO=emergencia_parentesco_,
V010EMERGENCIA_TELEFONO=emergencia_telefono_,V010EMERGENCIA_CENTRO_TRABAJO=emergencia_centro_trabajo_,V010EMERGENCIA_DOMICILIO=emergencia_domicilio_,
I010PADRE_VIVE=id_padre_vive_,V010NOMBRE_PADRE=nombre_padre_,V010OCUPACION_PADRE=ocupacion_padre_,V010DOMICILIO_PADRE=domicilio_padre_,V010TELEFONO_PADRE=telefono_padre_,
I010MADRE_VIVE=id_madre_vive_,V010NOMBRE_MADRE=nombre_madre_,V010OCUPACION_MADRE=ocupacion_madre_,V010DOMICILIO_MADRE=domicilio_madre_,V010TELEFONO_MADRE=telefono_madre_,
I014ID_TIPO_COMPROMISO=id_tipo_compromiso_,V010NACIONALIDAD_ESPOSA=nacionalidad_compromiso_,
I010MATRIMONIO_CIVIL_ESPOSA=id_matrimonio_civil_,I010MATRIMONIO_RELIGIOSO_ESPOSA=id_matrimonio_religioso_,
V010NOMBRE_APELLIDOS_ESPOSA=nombre_apellidos_esposa_,F010FECHA_NACIMIENTO_ESPOSA=fecha_nacimiento_esposa_,V010DPTO_ESPOSA=dpto_esposa_,V010CENTRO_LABORES_ESPOSA=centro_labores_esposa_,V010CARGO_GRADO_ESPOSA=cargo_grado_esposa_,V010DOMICILIO_ESPOSA=domicilio_esposa_,V010TELEFONO_ESPOSA=telefono_esposa_,
T010FOTO=foto_,T010CROQUIS=croquis_,T010CURRICULUM=curriculum_,I005ID_USUARIO=id_user_ where I010ID_ALUMNO=id_;

			IF(contador_insertar_>0)THEN
				set @detalle1=CONCAT('INSERT INTO tb013_hijos VALUES ',query_insertar_);
				prepare action1 from @detalle1;
				EXECUTE action1;
				DEALLOCATE PREPARE action1;
			END IF;
      IF(contador_modificar_>0)THEN
				set @detalle2=CONCAT('UPDATE tb013_hijos SET ',query_modificar_);
				prepare action2 from @detalle2;
				EXECUTE action2;
				DEALLOCATE PREPARE action2;
			END IF;
      IF(contador_eliminar_>0)THEN
				set @detalle3=CONCAT('UPDATE tb013_hijos SET ',query_eliminar_);
				prepare action3 from @detalle3;
				EXECUTE action3;
				DEALLOCATE PREPARE action3;
			END IF;

 SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_registrar`(in id_grado_categoria_ int,in id_especialidad_ int,in nro_cip_ VARCHAR(200),in dni_ VARCHAR(200),in id_grupo_sanguineo_ int,
in apellido_paterno_ VARCHAR(200),in apellido_materno_ VARCHAR(200),in nombres_ VARCHAR(200),in fecha_nacimiento_ DATE,in id_distrito_ int,in id_grado_instruccion_ int,
in universidad_ VARCHAR(200),in calle_jrn_ VARCHAR(200),in urbanizacion_ VARCHAR(200),in distrito_ VARCHAR(200),in id_estado_civil_ int,in idiomas_domina_ VARCHAR(200),in id_religion_ int,
in telefono_ VARCHAR(200),in mail_ VARCHAR(200),in fecha_ingreso_marina_ DATE,in fecha_ascenso_grado_ DATE,in id_tipo_vivienda_ int,in nro_brevete_ VARCHAR(200),
in modelo_vehiculo_ VARCHAR(200),in placa_nro_ VARCHAR(200),in nro_lic_arma_ VARCHAR(200),in modelo_arma_ VARCHAR(200),in tipo_arma_ VARCHAR(200),in marca_arma_ VARCHAR(200),in calibre_arma_ VARCHAR(200),
in id_tipo_condicion_llega_ int,in curso_seguir_dictar_ VARCHAR(200),in dependencia_origen_ VARCHAR(200),in nro_carta_referencia_ VARCHAR(200),in cargo_ocupa_ VARCHAR(200),
in id_liper_ int,in id_lisan_ int,in id_tin_ int,
in profesion_emergencia_ VARCHAR(200),in brevete_militar_emergencia_ VARCHAR(200),in puesto_zafarrancho_ VARCHAR(200),in emegergencia_llamar_ VARCHAR(200),
in emergencia_parentesco_ VARCHAR(200),in emergencia_telefono_ VARCHAR(200),in emergencia_centro_trabajo_ VARCHAR(200),in emergencia_domicilio_ VARCHAR(200),
in id_padre_vive_ int,in nombre_padre_ VARCHAR(200),in ocupacion_padre_ VARCHAR(200),in domicilio_padre_ VARCHAR(200),in telefono_padre_ VARCHAR(200),
in id_madre_vive_ int,in nombre_madre_ VARCHAR(200),in ocupacion_madre_ VARCHAR(200),in domicilio_madre_ VARCHAR(200),in telefono_madre_ VARCHAR(200),
in id_tipo_compromiso_ int,in nacionalidad_compromiso_ VARCHAR(200),
in id_matrimonio_civil_ int,in id_matrimonio_religioso_ int,
in nombre_apellidos_esposa_ VARCHAR(200),in fecha_nacimiento_esposa_ DATE,in dpto_esposa_ VARCHAR(200),in centro_labores_esposa_ VARCHAR(200),in cargo_grado_esposa_ VARCHAR(200),
in domicilio_esposa_ VARCHAR(200),in telefono_esposa_ VARCHAR(200),
in foto_ TEXT,in croquis_ TEXT,in curriculum_ TEXT,
in contador_insertar_ int,in query_insertar_ TEXT,in id_user_ int)
BEGIN

declare exit handler for SQLEXCEPTION
    begin
        ROLLBACK;
        select '0' as 'contar';
    end;
    start transaction;

INSERT INTO tb010_alumno VALUES(null,id_grado_categoria_,id_especialidad_,nro_cip_,dni_,id_grupo_sanguineo_,
apellido_paterno_,apellido_materno_,nombres_,fecha_nacimiento_,id_distrito_,id_grado_instruccion_,universidad_,calle_jrn_,
urbanizacion_,distrito_,id_estado_civil_,idiomas_domina_,id_religion_,telefono_,mail_,fecha_ingreso_marina_,fecha_ascenso_grado_,
id_tipo_vivienda_,nro_brevete_,modelo_vehiculo_,placa_nro_,nro_lic_arma_,modelo_arma_,tipo_arma_,marca_arma_,calibre_arma_,
id_tipo_condicion_llega_,curso_seguir_dictar_,dependencia_origen_,nro_carta_referencia_,cargo_ocupa_,id_liper_,id_lisan_,id_tin_,
profesion_emergencia_,brevete_militar_emergencia_,puesto_zafarrancho_,emegergencia_llamar_,emergencia_parentesco_,
emergencia_telefono_,emergencia_centro_trabajo_,emergencia_domicilio_,
id_padre_vive_,nombre_padre_,ocupacion_padre_,domicilio_padre_,telefono_padre_,
id_madre_vive_,nombre_madre_,ocupacion_madre_,domicilio_madre_,telefono_madre_,
id_tipo_compromiso_,nacionalidad_compromiso_,
id_matrimonio_civil_,id_matrimonio_religioso_,
nombre_apellidos_esposa_,fecha_nacimiento_esposa_,dpto_esposa_,centro_labores_esposa_,cargo_grado_esposa_,domicilio_esposa_,telefono_esposa_,
foto_,croquis_,curriculum_,id_user_,1);

set @id_alumno=LAST_INSERT_ID();
				
			IF(contador_insertar_>0)THEN
				set @detalle1=CONCAT('INSERT INTO tb013_hijos VALUES ',query_insertar_);
				prepare action1 from @detalle1;
				EXECUTE action1;
				DEALLOCATE PREPARE action1;
			END IF;

 SELECT '1' as 'contar';
    commit;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_seleccion`(in id_ int)
BEGIN
SELECT tb010.*,tb005.I005ID_PROVINCIA,tb004.I004ID_DEPARTAMENTO from tb010_alumno tb010 
INNER JOIN tb006_distrito tb006 on tb006.I006ID_DISTRITO=tb010.I006ID_DISTRITO
INNER JOIN tb005_provincia tb005 on tb005.I005ID_PROVINCIA=tb006.I005ID_PROVINCIA
INNER JOIN tb004_departamento tb004 on tb004.I004ID_DEPARTAMENTO=tb005.I004ID_DEPARTAMENTO
where tb010.I010ID_ALUMNO=id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_verificar_modificar`(in dni_ VARCHAR(200),in id_ int)
BEGIN
SELECT COUNT(tb010.I010ID_ALUMNO)contar from tb010_alumno tb010 
where not tb010.I010ESTADO=3 and tb010.V010DNI=dni_ and not tb010.I010ID_ALUMNO=id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb010_alumno_verificar_registrar`(in dni_ VARCHAR(200))
BEGIN
SELECT COUNT(tb010.I010ID_ALUMNO)contar from tb010_alumno tb010 
where not tb010.I010ESTADO=3 and tb010.V010DNI=dni_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb011_tipo_vivienda_lista_activo`()
BEGIN
SELECT tb011.* from tb011_tipo_vivienda tb011 
where tb011.I011ESTADO=1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb012_tipo_condicion_llega_lista_activo`()
BEGIN
SELECT tb012.* from tb012_tipo_condicion_llega tb012 
where tb012.I012ESTADO=1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb013_hijos_seleccion`(in id_ int)
BEGIN
SELECT tb013.* from tb013_hijos tb013 
where tb013.I010ID_ALUMNO=id_ and tb013.I013ESTADO=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tb014_tipo_compromiso_lista_activo`()
BEGIN
SELECT tb014.* from tb014_tipo_compromiso tb014 
WHERE tb014.I014ESTADO=1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb001_grado_categoria`
--

CREATE TABLE IF NOT EXISTS `tb001_grado_categoria` (
  `I001ID_GRADO_CATEGORIA` int(11) NOT NULL,
  `V001NOMBRE` varchar(200) NOT NULL,
  `I001ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb001_grado_categoria`
--

INSERT INTO `tb001_grado_categoria` (`I001ID_GRADO_CATEGORIA`, `V001NOMBRE`, `I001ESTADO`) VALUES
(1, '1 GRADO - CATEGORIA ', 1),
(2, '2 GRADO - CATEGORIA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb002_especialidad`
--

CREATE TABLE IF NOT EXISTS `tb002_especialidad` (
  `I002ID_ESPECIALIDAD` int(11) NOT NULL,
  `V002NOMBRE` varchar(200) NOT NULL,
  `I002ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb002_especialidad`
--

INSERT INTO `tb002_especialidad` (`I002ID_ESPECIALIDAD`, `V002NOMBRE`, `I002ESTADO`) VALUES
(1, 'ESPECIALIDAD 1', 1),
(2, 'ESPECIALIDAD 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb003_grupo_sanguinero`
--

CREATE TABLE IF NOT EXISTS `tb003_grupo_sanguinero` (
  `I003ID_GRUPO_SANGUINEO` int(11) NOT NULL,
  `V003NOMBRE` varchar(200) NOT NULL,
  `I003ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb003_grupo_sanguinero`
--

INSERT INTO `tb003_grupo_sanguinero` (`I003ID_GRUPO_SANGUINEO`, `V003NOMBRE`, `I003ESTADO`) VALUES
(1, 'A POSITIVO', 1),
(2, 'A NEGATIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb004_departamento`
--

CREATE TABLE IF NOT EXISTS `tb004_departamento` (
  `I004ID_DEPARTAMENTO` int(11) NOT NULL,
  `V004NOMBRE` varchar(200) NOT NULL,
  `I004ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb004_departamento`
--

INSERT INTO `tb004_departamento` (`I004ID_DEPARTAMENTO`, `V004NOMBRE`, `I004ESTADO`) VALUES
(1, 'LIMA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb004_perfil`
--

CREATE TABLE IF NOT EXISTS `tb004_perfil` (
  `I004ID_PERFIL` int(11) NOT NULL,
  `V004NOMBRE` varchar(200) NOT NULL,
  `I004ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb004_perfil`
--

INSERT INTO `tb004_perfil` (`I004ID_PERFIL`, `V004NOMBRE`, `I004ESTADO`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'USUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb005_provincia`
--

CREATE TABLE IF NOT EXISTS `tb005_provincia` (
  `I005ID_PROVINCIA` int(11) NOT NULL,
  `I004ID_DEPARTAMENTO` int(11) NOT NULL,
  `V005NOMBRE` varchar(200) NOT NULL,
  `I005ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb005_provincia`
--

INSERT INTO `tb005_provincia` (`I005ID_PROVINCIA`, `I004ID_DEPARTAMENTO`, `V005NOMBRE`, `I005ESTADO`) VALUES
(1, 1, 'CALLAO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb005_usuario`
--

CREATE TABLE IF NOT EXISTS `tb005_usuario` (
  `I005ID_USUARIO` int(11) NOT NULL,
  `T005IMAGEN` text NOT NULL,
  `V005USUARIO` varchar(200) NOT NULL,
  `V005PASSWORD` varchar(200) NOT NULL,
  `I004ID_PERFIL` int(11) NOT NULL,
  `I006ID_TRABAJADOR` int(11) NOT NULL,
  `I005CAMBIO` int(11) NOT NULL,
  `I005ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb005_usuario`
--

INSERT INTO `tb005_usuario` (`I005ID_USUARIO`, `T005IMAGEN`, `V005USUARIO`, `V005PASSWORD`, `I004ID_PERFIL`, `I006ID_TRABAJADOR`, `I005CAMBIO`, `I005ESTADO`) VALUES
(14, '1536703182_36_9_8.jpg', 'prueba', '202cb962ac59075b964b07152d234b70', 1, 6, 1, 1),
(19, '1537657246_10_69_76.png', 'usuario', '202cb962ac59075b964b07152d234b70', 2, 11, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb006_distrito`
--

CREATE TABLE IF NOT EXISTS `tb006_distrito` (
  `I006ID_DISTRITO` int(11) NOT NULL,
  `I005ID_PROVINCIA` int(11) NOT NULL,
  `V006NOMBRE` varchar(200) NOT NULL,
  `I006ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb006_distrito`
--

INSERT INTO `tb006_distrito` (`I006ID_DISTRITO`, `I005ID_PROVINCIA`, `V006NOMBRE`, `I006ESTADO`) VALUES
(1, 1, 'VENTANILLA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb006_trabajador`
--

CREATE TABLE IF NOT EXISTS `tb006_trabajador` (
  `I006ID_TRABAJADOR` int(11) NOT NULL,
  `V006NOMBRES` varchar(200) NOT NULL,
  `V006APELLIDO_PATERNO` varchar(200) NOT NULL,
  `V006APELLIDO_MATERNO` varchar(200) NOT NULL,
  `I007ID_TIPO_DOCUMENTO` int(11) NOT NULL,
  `V006NUMERO_DOCUMENTO` varchar(200) NOT NULL,
  `V006CORREO` varchar(200) NOT NULL,
  `V006DIRECCION` varchar(200) NOT NULL,
  `V006TELEFONO` varchar(200) NOT NULL,
  `I006ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb006_trabajador`
--

INSERT INTO `tb006_trabajador` (`I006ID_TRABAJADOR`, `V006NOMBRES`, `V006APELLIDO_PATERNO`, `V006APELLIDO_MATERNO`, `I007ID_TIPO_DOCUMENTO`, `V006NUMERO_DOCUMENTO`, `V006CORREO`, `V006DIRECCION`, `V006TELEFONO`, `I006ESTADO`) VALUES
(3, 'dadasda', 'adsasd', 'asdasd', 1, '32432432', 'lazaroortizdaniel@gmail.com', '', '', 3),
(4, 'asdasd', 'asdsad', 'asdasdasdasd', 1, '34244322', '', '', '', 3),
(5, 'sdffds', 'sfdfdsdfs', 'sfdsdfsdf', 1, '32444423', '', '', '', 3),
(6, 'DANTE', 'lazaro', 'ortiz', 1, '47089937', 'lazaroortizdaniel@gmail.com', '', '', 1),
(7, 'daniel ', 'lazaro', 'ortiz', 1, '47089937', 'lazaroortizdaniel@gmail.com', 'villa ñps reyes', '', 3),
(8, 'daniel', 'lazaro', 'ortiz', 1, '23432432', '', '', '', 3),
(9, 'COMERCIAL', 'COMERCIAL', 'COMERCIAL', 1, '47435345', '', '', '', 3),
(10, 'GERENTE', 'GERENTE', 'GERENTE', 1, '45633443', '', '', '', 3),
(11, 'daniel', 'lazaro', 'ortiz', 1, '47119937', 'lazaroortizdaniel@gmail.com', 'villa', '015501332', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb007_grado_instruccion`
--

CREATE TABLE IF NOT EXISTS `tb007_grado_instruccion` (
  `I007ID_GRADO_INSTRUCCION` int(11) NOT NULL,
  `V007NOMBRE` varchar(200) NOT NULL,
  `I007ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb007_grado_instruccion`
--

INSERT INTO `tb007_grado_instruccion` (`I007ID_GRADO_INSTRUCCION`, `V007NOMBRE`, `I007ESTADO`) VALUES
(1, '1 GRADO INSTRUCCION', 1),
(2, '2 GRADO INSTRUCCION', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb007_tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tb007_tipo_documento` (
  `I007ID_TIPO_DOCUMENTO` int(11) NOT NULL,
  `V007NOMBRE` varchar(200) NOT NULL,
  `I007NUMERO_DIGITOS` int(11) NOT NULL COMMENT 'dni=8,ruc=11,',
  `I007TIPO_VARIABLE` int(11) NOT NULL COMMENT 'numerico=1,2=letra,3=letra_numero',
  `I007ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb007_tipo_documento`
--

INSERT INTO `tb007_tipo_documento` (`I007ID_TIPO_DOCUMENTO`, `V007NOMBRE`, `I007NUMERO_DIGITOS`, `I007TIPO_VARIABLE`, `I007ESTADO`) VALUES
(1, 'DNI', 8, 1, 1),
(2, 'RUC', 11, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb008_religion`
--

CREATE TABLE IF NOT EXISTS `tb008_religion` (
  `I008ID_RELIGION` int(11) NOT NULL,
  `V008NOMBRE` varchar(200) NOT NULL,
  `I008ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb008_religion`
--

INSERT INTO `tb008_religion` (`I008ID_RELIGION`, `V008NOMBRE`, `I008ESTADO`) VALUES
(1, 'CATOLICA', 1),
(2, 'EVANGELICA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb009_estado_civil`
--

CREATE TABLE IF NOT EXISTS `tb009_estado_civil` (
  `I009ID_ESTADO_CIVIL` int(11) NOT NULL,
  `V009NOMBRE` varchar(200) NOT NULL,
  `I009ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb009_estado_civil`
--

INSERT INTO `tb009_estado_civil` (`I009ID_ESTADO_CIVIL`, `V009NOMBRE`, `I009ESTADO`) VALUES
(1, 'CASADO', 1),
(2, 'SOLTERO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb010_alumno`
--

CREATE TABLE IF NOT EXISTS `tb010_alumno` (
  `I010ID_ALUMNO` int(11) NOT NULL,
  `I001ID_GRADO_CATEGORIA` int(11) NOT NULL,
  `I002ID_ESPECIALIDAD` int(11) NOT NULL,
  `V010NRO_CIP` varchar(200) NOT NULL,
  `V010DNI` varchar(200) NOT NULL,
  `I003ID_GRUPO_SANGUINEO` int(11) NOT NULL,
  `V010APELLIDO_PATERNO` varchar(200) NOT NULL,
  `V010APELLIDO_MATERNO` varchar(200) NOT NULL,
  `V010NOMBRES` varchar(200) NOT NULL,
  `F010FECHA_NACIMIENTO` date NOT NULL,
  `I006ID_DISTRITO` int(11) NOT NULL,
  `I007ID_GRADO_INSTRUCCION` int(11) NOT NULL,
  `V010UNIVERIDAD` varchar(200) NOT NULL,
  `V010CALLE_JR` varchar(200) NOT NULL,
  `V010URBANIZACION` varchar(200) NOT NULL,
  `V010DISTRITO` varchar(200) NOT NULL,
  `I009ID_ESTADO_CIVIL` int(11) NOT NULL,
  `V010IDIOMAS_DOMINA` varchar(200) NOT NULL,
  `I008ID_RELIGION` int(11) NOT NULL,
  `V010TELEFONO` varchar(200) NOT NULL,
  `V010MAIL` varchar(200) NOT NULL,
  `F010FECHA_INGRESO_MARINA` date NOT NULL,
  `F010FECHA_ASENSO_GRADO` date NOT NULL,
  `I011ID_TIPO_VIVIENDA` int(11) NOT NULL,
  `V010NRO_BREVETE` varchar(200) NOT NULL,
  `V010MODELO_VEHICULO` varchar(200) NOT NULL,
  `V010PLACA_NRO` varchar(200) NOT NULL,
  `V010NRO_LIC_ARMA` varchar(200) NOT NULL,
  `V010MODELO_ARMA` varchar(200) NOT NULL,
  `V010TIPO_ARMA` varchar(200) NOT NULL,
  `V010MARCA` varchar(200) NOT NULL,
  `V010CALIBRE` varchar(200) NOT NULL,
  `I012ID_TIPO_CONDICION_LLEGA` int(11) NOT NULL,
  `V010CURSO_SEGUIR_DICTAR` varchar(200) NOT NULL,
  `V010DEPENDENCIA_ORIGEN` varchar(200) NOT NULL,
  `V010NRO_CARTA_REFERENCIA` varchar(200) NOT NULL,
  `V010CARGO_OCUPA` varchar(200) NOT NULL,
  `I010LIPER` int(11) NOT NULL COMMENT '0=NO,1=SI',
  `I010LISAN` int(11) NOT NULL COMMENT '0=NO,1=SI',
  `I010TIN` int(11) NOT NULL COMMENT '0=NO,1=SI',
  `V010PROFESION_EMERGENCIA` varchar(200) NOT NULL,
  `V010BREVETE_MILITAR_EMERGENCIA` varchar(200) NOT NULL,
  `V010PUESTO_ZAFARRANCHO` varchar(200) NOT NULL,
  `V010EMERGENCIA_LLAMAR_A` varchar(200) NOT NULL,
  `V010EMERGENCIA_PARENTESCO` varchar(200) NOT NULL,
  `V010EMERGENCIA_TELEFONO` varchar(200) NOT NULL,
  `V010EMERGENCIA_CENTRO_TRABAJO` varchar(200) NOT NULL,
  `V010EMERGENCIA_DOMICILIO` varchar(200) NOT NULL,
  `I010PADRE_VIVE` int(11) NOT NULL,
  `V010NOMBRE_PADRE` varchar(200) NOT NULL,
  `V010OCUPACION_PADRE` varchar(200) NOT NULL,
  `V010DOMICILIO_PADRE` varchar(200) NOT NULL,
  `V010TELEFONO_PADRE` varchar(200) NOT NULL,
  `I010MADRE_VIVE` int(11) NOT NULL,
  `V010NOMBRE_MADRE` varchar(200) NOT NULL,
  `V010OCUPACION_MADRE` varchar(200) NOT NULL,
  `V010DOMICILIO_MADRE` varchar(200) NOT NULL,
  `V010TELEFONO_MADRE` varchar(200) NOT NULL,
  `I014ID_TIPO_COMPROMISO` int(11) NOT NULL,
  `V010NACIONALIDAD_ESPOSA` varchar(200) NOT NULL,
  `I010MATRIMONIO_CIVIL_ESPOSA` int(11) NOT NULL,
  `I010MATRIMONIO_RELIGIOSO_ESPOSA` int(11) NOT NULL,
  `V010NOMBRE_APELLIDOS_ESPOSA` varchar(200) NOT NULL,
  `F010FECHA_NACIMIENTO_ESPOSA` date NOT NULL,
  `V010DPTO_ESPOSA` varchar(200) NOT NULL,
  `V010CENTRO_LABORES_ESPOSA` varchar(200) NOT NULL,
  `V010CARGO_GRADO_ESPOSA` varchar(200) NOT NULL,
  `V010DOMICILIO_ESPOSA` varchar(200) NOT NULL,
  `V010TELEFONO_ESPOSA` varchar(200) NOT NULL,
  `T010FOTO` text NOT NULL,
  `T010CROQUIS` text NOT NULL,
  `T010CURRICULUM` text NOT NULL,
  `I005ID_USUARIO` int(11) NOT NULL,
  `I010ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb010_alumno`
--

INSERT INTO `tb010_alumno` (`I010ID_ALUMNO`, `I001ID_GRADO_CATEGORIA`, `I002ID_ESPECIALIDAD`, `V010NRO_CIP`, `V010DNI`, `I003ID_GRUPO_SANGUINEO`, `V010APELLIDO_PATERNO`, `V010APELLIDO_MATERNO`, `V010NOMBRES`, `F010FECHA_NACIMIENTO`, `I006ID_DISTRITO`, `I007ID_GRADO_INSTRUCCION`, `V010UNIVERIDAD`, `V010CALLE_JR`, `V010URBANIZACION`, `V010DISTRITO`, `I009ID_ESTADO_CIVIL`, `V010IDIOMAS_DOMINA`, `I008ID_RELIGION`, `V010TELEFONO`, `V010MAIL`, `F010FECHA_INGRESO_MARINA`, `F010FECHA_ASENSO_GRADO`, `I011ID_TIPO_VIVIENDA`, `V010NRO_BREVETE`, `V010MODELO_VEHICULO`, `V010PLACA_NRO`, `V010NRO_LIC_ARMA`, `V010MODELO_ARMA`, `V010TIPO_ARMA`, `V010MARCA`, `V010CALIBRE`, `I012ID_TIPO_CONDICION_LLEGA`, `V010CURSO_SEGUIR_DICTAR`, `V010DEPENDENCIA_ORIGEN`, `V010NRO_CARTA_REFERENCIA`, `V010CARGO_OCUPA`, `I010LIPER`, `I010LISAN`, `I010TIN`, `V010PROFESION_EMERGENCIA`, `V010BREVETE_MILITAR_EMERGENCIA`, `V010PUESTO_ZAFARRANCHO`, `V010EMERGENCIA_LLAMAR_A`, `V010EMERGENCIA_PARENTESCO`, `V010EMERGENCIA_TELEFONO`, `V010EMERGENCIA_CENTRO_TRABAJO`, `V010EMERGENCIA_DOMICILIO`, `I010PADRE_VIVE`, `V010NOMBRE_PADRE`, `V010OCUPACION_PADRE`, `V010DOMICILIO_PADRE`, `V010TELEFONO_PADRE`, `I010MADRE_VIVE`, `V010NOMBRE_MADRE`, `V010OCUPACION_MADRE`, `V010DOMICILIO_MADRE`, `V010TELEFONO_MADRE`, `I014ID_TIPO_COMPROMISO`, `V010NACIONALIDAD_ESPOSA`, `I010MATRIMONIO_CIVIL_ESPOSA`, `I010MATRIMONIO_RELIGIOSO_ESPOSA`, `V010NOMBRE_APELLIDOS_ESPOSA`, `F010FECHA_NACIMIENTO_ESPOSA`, `V010DPTO_ESPOSA`, `V010CENTRO_LABORES_ESPOSA`, `V010CARGO_GRADO_ESPOSA`, `V010DOMICILIO_ESPOSA`, `V010TELEFONO_ESPOSA`, `T010FOTO`, `T010CROQUIS`, `T010CURRICULUM`, `I005ID_USUARIO`, `I010ESTADO`) VALUES
(2, 1, 1, '344243242', '47089937', 1, 'dasdsadas', 'dasdasdsa', 'dsadasdas', '2018-09-17', 1, 1, 'asddasads', 'addasdsaads', 'adsdasads', 'asddsadas', 2, 'sadasdadsds', 1, '43545543534', '3445343534@gmail.com', '2018-09-01', '2018-09-17', 2, 'dafdfsfd', 'dfsfdfds', 'dfsfds', 'dfsdsfds', 'dsfsddsf', 'fdfdsfd', 'fdsfdfsd', 'sdfdssdf', 1, 'dsffdsfdssdf', 'dfsfdssdfdfs', 'dsfdfssdf', 'dfsfsd', 1, 2, 1, 'sdfsdfdsf', 'fdsfds', 'dssdfdf', 'sdffdsdf', 'fdsfdsdf', '3424234', 'sdfsddfdf', 'fdsfdsfsdfsd', 1, 'maximo lazaro', 'obrero', 'mz h lote 11', '3423443', 1, 'oswalda ortiz', 'vidriera', 'mz h lote 11', '5501332', 2, 'peruana', 2, 2, 'elida rosario', '2018-09-01', 'lima', 'casa', 'secundaria completa', 'mz h lote 11', '5501332', '1537239593_10_85_84.png', '1537203834_92_59_34.png', '1537203834_75_62_98.docx', 14, 1),
(3, 1, 1, '3222332', '23234234', 1, 'dssdfds', 'fdsdfsdfsd', 'sdfdsfdsfsd', '2018-09-01', 1, 1, 'sffdssfd', 'sdfdssfd', 'sdffsd', 'sdfsdsfd', 2, 'dfssfdsdf', 1, '2343224343', 'lazaroortizdaniel@gmail.com', '2018-09-01', '2018-09-17', 1, '34243224342', 'dfdsffsdfs', 'dfdsfsdfsd', 'dfssfdsfdsfd', 'fsdsfdfsds', 'sfdfsdsfdfsd', 'fsfdfd', 'fdssfdfds', 1, 'sfdfsdfsdfdd', 'fdsfsdfsdsfd', 'sfdfsdfsdfsd', 'sdfsddf', 1, 2, 1, 'sdfdsfdsfd', 'fdssdfsd', 'fdsfsd', 'fsdfdsf', 'sfdsdf', '3543', 'sdfsdffdfds', 'ffsdsdf', 1, 'sdfsdffd', 'fdsfdsf', 'sdfsdfsdf', '343344334', 1, 'dffdsfddf', 'sfsfsdf', 'sdfsdfsd', '444234', 2, 'fdsfdsfds', 1, 2, 'fffdsfdfdsdfs', '2018-09-01', 'sdffdssfdfd', 'sdfdsdf', 'sdfsdf', 'sdfsdf', '342423342432', '1537204123_49_44_36.png', '', '1537204123_46_46_80.docx', 14, 1),
(4, 1, 2, '344243242', '32433422', 1, 'lazaro', 'ortiz', 'daniel', '2018-09-17', 1, 1, 'asddasads', 'addasdsaads', 'adsdasads', 'asddsadas', 2, 'sadasdadsds', 1, '43545543534', '3445343534@gmail.com', '2018-09-01', '2018-09-17', 2, 'dafdfsfd', 'dfsfdfds', 'dfsfds', 'dfsdsfds', 'dsfsddsf', 'fdfdsfd', 'fdsfdfsd', 'sdfdssdf', 1, 'dsffdsfdssdf', 'dfsfdssdfdfs', 'dsfdfssdf', 'dfsfsd', 1, 2, 1, 'sdfsdfdsf', 'fdsfds', 'dssdfdf', 'sdffdsdf', 'fdsfdsdf', '3424234', 'sdfsddfdf', 'fdsfdsfsdfsd', 1, 'maximo lazaro', 'obrero', 'mz h lote 11', '3423443', 1, 'oswalda ortiz', 'vidriera', 'mz h lote 11', '5501332', 2, 'peruana', 2, 2, 'elida rosario', '2018-09-01', 'lima', 'casa', 'secundaria completa', 'mz h lote 11', '5501332', '', '', '', 14, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb011_tipo_vivienda`
--

CREATE TABLE IF NOT EXISTS `tb011_tipo_vivienda` (
  `I011ID_TIPO_VIVIENDA` int(11) NOT NULL,
  `V011NOMBRE` varchar(200) NOT NULL,
  `I011ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb011_tipo_vivienda`
--

INSERT INTO `tb011_tipo_vivienda` (`I011ID_TIPO_VIVIENDA`, `V011NOMBRE`, `I011ESTADO`) VALUES
(1, '1 TIPO VIVIENDA', 1),
(2, '2 TIPO VIVIENDA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb012_tipo_condicion_llega`
--

CREATE TABLE IF NOT EXISTS `tb012_tipo_condicion_llega` (
  `I012ID_TIPO_CONDICION_LLEGA` int(11) NOT NULL,
  `V012NOMBRE` varchar(200) NOT NULL,
  `I012ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb012_tipo_condicion_llega`
--

INSERT INTO `tb012_tipo_condicion_llega` (`I012ID_TIPO_CONDICION_LLEGA`, `V012NOMBRE`, `I012ESTADO`) VALUES
(1, '1 CONDICION ', 1),
(2, '2 CONDICION ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb013_hijos`
--

CREATE TABLE IF NOT EXISTS `tb013_hijos` (
  `I013ID_HIJOS` int(11) NOT NULL,
  `I013CANTIDAD` int(11) NOT NULL,
  `V013NOMBRE_APELLIDOS` varchar(200) NOT NULL,
  `F013FECHA_NACIMIENTO` date NOT NULL,
  `I010ID_ALUMNO` int(11) NOT NULL,
  `V013OCUPACION_ACTUAL` varchar(200) NOT NULL,
  `I013ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb013_hijos`
--

INSERT INTO `tb013_hijos` (`I013ID_HIJOS`, `I013CANTIDAD`, `V013NOMBRE_APELLIDOS`, `F013FECHA_NACIMIENTO`, `I010ID_ALUMNO`, `V013OCUPACION_ACTUAL`, `I013ESTADO`) VALUES
(3, 1111111111, 'vania cristina lazaro neyra', '2005-09-10', 2, 'ninguna', 1),
(4, 1, 'dfsfsd', '2018-09-01', 3, 'dsdfs', 1),
(5, 3, 'miquela lazaro ortiz', '2018-09-13', 2, 'ninguna', 3),
(7, 2, 'aaaaaaa', '2018-09-01', 2, 'aaaaaaaaaaa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb014_tipo_compromiso`
--

CREATE TABLE IF NOT EXISTS `tb014_tipo_compromiso` (
  `I014ID_TIPO_COMPROMISO` int(11) NOT NULL,
  `V014NOMBRE` varchar(200) NOT NULL,
  `I014ESTADO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb014_tipo_compromiso`
--

INSERT INTO `tb014_tipo_compromiso` (`I014ID_TIPO_COMPROMISO`, `V014NOMBRE`, `I014ESTADO`) VALUES
(1, 'PRIMER COMPROMISO', 1),
(2, 'SEGUNDO COMPROMISO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb001_grado_categoria`
--
ALTER TABLE `tb001_grado_categoria`
  ADD PRIMARY KEY (`I001ID_GRADO_CATEGORIA`);

--
-- Indices de la tabla `tb002_especialidad`
--
ALTER TABLE `tb002_especialidad`
  ADD PRIMARY KEY (`I002ID_ESPECIALIDAD`);

--
-- Indices de la tabla `tb003_grupo_sanguinero`
--
ALTER TABLE `tb003_grupo_sanguinero`
  ADD PRIMARY KEY (`I003ID_GRUPO_SANGUINEO`);

--
-- Indices de la tabla `tb004_departamento`
--
ALTER TABLE `tb004_departamento`
  ADD PRIMARY KEY (`I004ID_DEPARTAMENTO`);

--
-- Indices de la tabla `tb004_perfil`
--
ALTER TABLE `tb004_perfil`
  ADD PRIMARY KEY (`I004ID_PERFIL`);

--
-- Indices de la tabla `tb005_provincia`
--
ALTER TABLE `tb005_provincia`
  ADD PRIMARY KEY (`I005ID_PROVINCIA`), ADD KEY `I004ID_DEPARTAMENTO` (`I004ID_DEPARTAMENTO`);

--
-- Indices de la tabla `tb005_usuario`
--
ALTER TABLE `tb005_usuario`
  ADD PRIMARY KEY (`I005ID_USUARIO`), ADD KEY `I004ID_PERFIL` (`I004ID_PERFIL`), ADD KEY `I006ID_TRABAJADOR` (`I006ID_TRABAJADOR`);

--
-- Indices de la tabla `tb006_distrito`
--
ALTER TABLE `tb006_distrito`
  ADD PRIMARY KEY (`I006ID_DISTRITO`), ADD KEY `I005ID_PROVINCIA` (`I005ID_PROVINCIA`);

--
-- Indices de la tabla `tb006_trabajador`
--
ALTER TABLE `tb006_trabajador`
  ADD PRIMARY KEY (`I006ID_TRABAJADOR`), ADD KEY `I007ID_TIPO_DOCUMENTO` (`I007ID_TIPO_DOCUMENTO`);

--
-- Indices de la tabla `tb007_grado_instruccion`
--
ALTER TABLE `tb007_grado_instruccion`
  ADD PRIMARY KEY (`I007ID_GRADO_INSTRUCCION`);

--
-- Indices de la tabla `tb007_tipo_documento`
--
ALTER TABLE `tb007_tipo_documento`
  ADD PRIMARY KEY (`I007ID_TIPO_DOCUMENTO`);

--
-- Indices de la tabla `tb008_religion`
--
ALTER TABLE `tb008_religion`
  ADD PRIMARY KEY (`I008ID_RELIGION`);

--
-- Indices de la tabla `tb009_estado_civil`
--
ALTER TABLE `tb009_estado_civil`
  ADD PRIMARY KEY (`I009ID_ESTADO_CIVIL`);

--
-- Indices de la tabla `tb010_alumno`
--
ALTER TABLE `tb010_alumno`
  ADD PRIMARY KEY (`I010ID_ALUMNO`), ADD KEY `I002ID_ESPECIALIDAD` (`I002ID_ESPECIALIDAD`), ADD KEY `I003ID_GRUPO_SANGUINEO` (`I003ID_GRUPO_SANGUINEO`), ADD KEY `I001ID_GRADO_CATEGORIA` (`I001ID_GRADO_CATEGORIA`), ADD KEY `I011ID_TIPO_VIVIENDA` (`I011ID_TIPO_VIVIENDA`), ADD KEY `I007ID_GRADO_INSTRUCCION` (`I007ID_GRADO_INSTRUCCION`), ADD KEY `I008ID_RELIGION` (`I008ID_RELIGION`), ADD KEY `I009ID_ESTADO_CIVIL` (`I009ID_ESTADO_CIVIL`), ADD KEY `I012ID_TIPO_CONDICION_LLEGA` (`I012ID_TIPO_CONDICION_LLEGA`), ADD KEY `I006ID_DISTRITO` (`I006ID_DISTRITO`), ADD KEY `I014ID_TIPO_COMPROMISO` (`I014ID_TIPO_COMPROMISO`), ADD KEY `I005ID_USUARIO` (`I005ID_USUARIO`);

--
-- Indices de la tabla `tb011_tipo_vivienda`
--
ALTER TABLE `tb011_tipo_vivienda`
  ADD PRIMARY KEY (`I011ID_TIPO_VIVIENDA`);

--
-- Indices de la tabla `tb012_tipo_condicion_llega`
--
ALTER TABLE `tb012_tipo_condicion_llega`
  ADD PRIMARY KEY (`I012ID_TIPO_CONDICION_LLEGA`);

--
-- Indices de la tabla `tb013_hijos`
--
ALTER TABLE `tb013_hijos`
  ADD PRIMARY KEY (`I013ID_HIJOS`), ADD KEY `I010ID_ALUMNO` (`I010ID_ALUMNO`);

--
-- Indices de la tabla `tb014_tipo_compromiso`
--
ALTER TABLE `tb014_tipo_compromiso`
  ADD PRIMARY KEY (`I014ID_TIPO_COMPROMISO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb001_grado_categoria`
--
ALTER TABLE `tb001_grado_categoria`
  MODIFY `I001ID_GRADO_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb002_especialidad`
--
ALTER TABLE `tb002_especialidad`
  MODIFY `I002ID_ESPECIALIDAD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb003_grupo_sanguinero`
--
ALTER TABLE `tb003_grupo_sanguinero`
  MODIFY `I003ID_GRUPO_SANGUINEO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb004_departamento`
--
ALTER TABLE `tb004_departamento`
  MODIFY `I004ID_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb004_perfil`
--
ALTER TABLE `tb004_perfil`
  MODIFY `I004ID_PERFIL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb005_provincia`
--
ALTER TABLE `tb005_provincia`
  MODIFY `I005ID_PROVINCIA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb005_usuario`
--
ALTER TABLE `tb005_usuario`
  MODIFY `I005ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tb006_distrito`
--
ALTER TABLE `tb006_distrito`
  MODIFY `I006ID_DISTRITO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb006_trabajador`
--
ALTER TABLE `tb006_trabajador`
  MODIFY `I006ID_TRABAJADOR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tb007_grado_instruccion`
--
ALTER TABLE `tb007_grado_instruccion`
  MODIFY `I007ID_GRADO_INSTRUCCION` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb007_tipo_documento`
--
ALTER TABLE `tb007_tipo_documento`
  MODIFY `I007ID_TIPO_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb008_religion`
--
ALTER TABLE `tb008_religion`
  MODIFY `I008ID_RELIGION` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb009_estado_civil`
--
ALTER TABLE `tb009_estado_civil`
  MODIFY `I009ID_ESTADO_CIVIL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb010_alumno`
--
ALTER TABLE `tb010_alumno`
  MODIFY `I010ID_ALUMNO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb011_tipo_vivienda`
--
ALTER TABLE `tb011_tipo_vivienda`
  MODIFY `I011ID_TIPO_VIVIENDA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb012_tipo_condicion_llega`
--
ALTER TABLE `tb012_tipo_condicion_llega`
  MODIFY `I012ID_TIPO_CONDICION_LLEGA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb013_hijos`
--
ALTER TABLE `tb013_hijos`
  MODIFY `I013ID_HIJOS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tb014_tipo_compromiso`
--
ALTER TABLE `tb014_tipo_compromiso`
  MODIFY `I014ID_TIPO_COMPROMISO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb005_provincia`
--
ALTER TABLE `tb005_provincia`
ADD CONSTRAINT `tb005_provincia_ibfk_1` FOREIGN KEY (`I004ID_DEPARTAMENTO`) REFERENCES `tb004_departamento` (`I004ID_DEPARTAMENTO`);

--
-- Filtros para la tabla `tb005_usuario`
--
ALTER TABLE `tb005_usuario`
ADD CONSTRAINT `tb005_usuario_ibfk_1` FOREIGN KEY (`I004ID_PERFIL`) REFERENCES `tb004_perfil` (`I004ID_PERFIL`),
ADD CONSTRAINT `tb005_usuario_ibfk_2` FOREIGN KEY (`I006ID_TRABAJADOR`) REFERENCES `tb006_trabajador` (`I006ID_TRABAJADOR`);

--
-- Filtros para la tabla `tb006_distrito`
--
ALTER TABLE `tb006_distrito`
ADD CONSTRAINT `tb006_distrito_ibfk_1` FOREIGN KEY (`I005ID_PROVINCIA`) REFERENCES `tb005_provincia` (`I005ID_PROVINCIA`);

--
-- Filtros para la tabla `tb006_trabajador`
--
ALTER TABLE `tb006_trabajador`
ADD CONSTRAINT `tb006_trabajador_ibfk_1` FOREIGN KEY (`I007ID_TIPO_DOCUMENTO`) REFERENCES `tb007_tipo_documento` (`I007ID_TIPO_DOCUMENTO`);

--
-- Filtros para la tabla `tb010_alumno`
--
ALTER TABLE `tb010_alumno`
ADD CONSTRAINT `tb010_alumno_ibfk_1` FOREIGN KEY (`I001ID_GRADO_CATEGORIA`) REFERENCES `tb001_grado_categoria` (`I001ID_GRADO_CATEGORIA`),
ADD CONSTRAINT `tb010_alumno_ibfk_10` FOREIGN KEY (`I006ID_DISTRITO`) REFERENCES `tb006_distrito` (`I006ID_DISTRITO`),
ADD CONSTRAINT `tb010_alumno_ibfk_11` FOREIGN KEY (`I014ID_TIPO_COMPROMISO`) REFERENCES `tb014_tipo_compromiso` (`I014ID_TIPO_COMPROMISO`),
ADD CONSTRAINT `tb010_alumno_ibfk_12` FOREIGN KEY (`I005ID_USUARIO`) REFERENCES `tb005_usuario` (`I005ID_USUARIO`),
ADD CONSTRAINT `tb010_alumno_ibfk_2` FOREIGN KEY (`I002ID_ESPECIALIDAD`) REFERENCES `tb002_especialidad` (`I002ID_ESPECIALIDAD`),
ADD CONSTRAINT `tb010_alumno_ibfk_3` FOREIGN KEY (`I003ID_GRUPO_SANGUINEO`) REFERENCES `tb003_grupo_sanguinero` (`I003ID_GRUPO_SANGUINEO`),
ADD CONSTRAINT `tb010_alumno_ibfk_4` FOREIGN KEY (`I011ID_TIPO_VIVIENDA`) REFERENCES `tb011_tipo_vivienda` (`I011ID_TIPO_VIVIENDA`),
ADD CONSTRAINT `tb010_alumno_ibfk_5` FOREIGN KEY (`I007ID_GRADO_INSTRUCCION`) REFERENCES `tb007_grado_instruccion` (`I007ID_GRADO_INSTRUCCION`),
ADD CONSTRAINT `tb010_alumno_ibfk_6` FOREIGN KEY (`I009ID_ESTADO_CIVIL`) REFERENCES `tb009_estado_civil` (`I009ID_ESTADO_CIVIL`),
ADD CONSTRAINT `tb010_alumno_ibfk_7` FOREIGN KEY (`I008ID_RELIGION`) REFERENCES `tb008_religion` (`I008ID_RELIGION`),
ADD CONSTRAINT `tb010_alumno_ibfk_9` FOREIGN KEY (`I012ID_TIPO_CONDICION_LLEGA`) REFERENCES `tb012_tipo_condicion_llega` (`I012ID_TIPO_CONDICION_LLEGA`);

--
-- Filtros para la tabla `tb013_hijos`
--
ALTER TABLE `tb013_hijos`
ADD CONSTRAINT `tb013_hijos_ibfk_1` FOREIGN KEY (`I010ID_ALUMNO`) REFERENCES `tb010_alumno` (`I010ID_ALUMNO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
