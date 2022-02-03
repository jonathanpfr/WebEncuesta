

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb001_grado_categoria_lista_activo`()
BEGIN
SELECT tb001.* from tb001_grado_categoria tb001 
where tb001.I001ESTADO=1;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb002_especialidad_lista_activo`()
BEGIN
SELECT tb002.* from tb002_especialidad tb002 
where tb002.I002ESTADO=1;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb003_grupo_sanguinero_lista_activo`()
BEGIN
SELECT tb003.* from tb003_grupo_sanguinero tb003 
where tb003.I003ESTADO=1;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb004_departamento_lista_activo`()
BEGIN
SELECT tb004.* from tb004_departamento tb004 
where tb004.I004ESTADO=1;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb005_provincia_lista_activo`(in id_departamento_ int)
BEGIN
SELECT tb005.* from tb005_provincia tb005 
where tb005.I005ESTADO=1 AND tb005.I004ID_DEPARTAMENTO=id_departamento_;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb006_distrito_lista_activo`(in id_provincia_ int)
BEGIN
SELECT tb006.* from tb006_distrito tb006 
where tb006.I006ESTADO=1 AND tb006.I005ID_PROVINCIA=id_provincia_;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb007_grado_instruccion_lista_activo`()
BEGIN
SELECT tb007.* from tb007_grado_instruccion tb007 
where tb007.I007ESTADO=1 ;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb008_religion_lista_activo`()
BEGIN
SELECT tb008.* from tb008_religion tb008 
where tb008.I008ESTADO=1 ;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb009_estado_civil_lista_activo`()
BEGIN
SELECT tb009.* from tb009_estado_civil tb009 
where tb009.I009ESTADO=1 ;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_eliminar`(in id_ int)
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

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_listar`()
BEGIN
SELECT tb010.I010ESTADO,tb010.I010ID_ALUMNO,CONCAT(tb010.V010APELLIDO_PATERNO,' ',tb010.V010APELLIDO_MATERNO,', ',tb010.V010NOMBRES)nombre_apellidos,tb010.V010DNI,
tb001.V001NOMBRE,tb002.V002NOMBRE,tb010.T010CURRICULUM from tb010_alumno tb010 
INNER JOIN tb001_grado_categoria tb001 on tb001.I001ID_GRADO_CATEGORIA=tb010.I001ID_GRADO_CATEGORIA
INNER JOIN tb002_especialidad tb002 on tb002.I002ID_ESPECIALIDAD=tb010.I002ID_ESPECIALIDAD
where not tb010.I010ESTADO=3;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_modificar`(in id_ int,
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
in contador_eliminar_ int,in query_eliminar_ TEXT)
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
T010FOTO=foto_,T010CROQUIS=croquis_,T010CURRICULUM=curriculum_ where I010ID_ALUMNO=id_;

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

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_registrar`(in id_grado_categoria_ int,in id_especialidad_ int,in nro_cip_ VARCHAR(200),in dni_ VARCHAR(200),in id_grupo_sanguineo_ int,
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
in contador_insertar_ int,in query_insertar_ TEXT)
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
foto_,croquis_,curriculum_,1);

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

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_seleccion`(in id_ int)
BEGIN
SELECT tb010.*,tb005.I005ID_PROVINCIA,tb004.I004ID_DEPARTAMENTO from tb010_alumno tb010 
INNER JOIN tb006_distrito tb006 on tb006.I006ID_DISTRITO=tb010.I006ID_DISTRITO
INNER JOIN tb005_provincia tb005 on tb005.I005ID_PROVINCIA=tb006.I005ID_PROVINCIA
INNER JOIN tb004_departamento tb004 on tb004.I004ID_DEPARTAMENTO=tb005.I004ID_DEPARTAMENTO
where tb010.I010ID_ALUMNO=id_;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_verificar_modificar`(in dni_ VARCHAR(200),in id_ int)
BEGIN
SELECT COUNT(tb010.I010ID_ALUMNO)contar from tb010_alumno tb010 
where not tb010.I010ESTADO=3 and tb010.V010DNI=dni_ and not tb010.I010ID_ALUMNO=id_;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb010_alumno_verificar_registrar`(in dni_ VARCHAR(200))
BEGIN
SELECT COUNT(tb010.I010ID_ALUMNO)contar from tb010_alumno tb010 
where not tb010.I010ESTADO=3 and tb010.V010DNI=dni_;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb011_tipo_vivienda_lista_activo`()
BEGIN
SELECT tb011.* from tb011_tipo_vivienda tb011 
where tb011.I011ESTADO=1 ;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb012_tipo_condicion_llega_lista_activo`()
BEGIN
SELECT tb012.* from tb012_tipo_condicion_llega tb012 
where tb012.I012ESTADO=1 ;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb013_hijos_seleccion`(in id_ int)
BEGIN
SELECT tb013.* from tb013_hijos tb013 
where tb013.I010ID_ALUMNO=id_ and tb013.I013ESTADO=1;
END$$

CREATE DEFINER=`pdacom`@`localhost` PROCEDURE `sp_tb014_tipo_compromiso_lista_activo`()
BEGIN
SELECT tb014.* from tb014_tipo_compromiso tb014 
WHERE tb014.I014ESTADO=1;
END$$

DELIMITER ;
