CREATE OR REPLACE FUNCTION public.sp_crud_ficha_atencion_rabia(
	p_id_ficha integer,
p_id_persona integer,
p_id_acompanante integer,
p_ficha_persona character varying,
p_ficha_animal character varying,
p_historia_clinica character varying,
p_id_especie character varying,
p_id_raza character varying,
p_fecha_atencion date,
p_fecha_accidente date,
p_ubigeo_accidente character varying,
p_id_estado_actual_animal character varying,
p_tipo_exposicion character varying,
p_tipo_doc character varying,
p_numero_doc character varying,
p_nombres character varying,
p_ape_paterno character varying,
p_ape_materno character varying,
p_edad integer,
p_sexo character varying,
p_peso numeric,
p_direccion_persona character varying,
p_ubigeo_persona character varying,
p_direccion_referencia character varying,
p_telefono character varying,
p_e_mail character varying,
p_id_grado_instruccion character varying,
p_tipo_doc_acompanante character varying,
p_numero_doc_acompanante character varying,
p_nombres_acompanante character varying,
p_ape_paterno_acompanante character varying,
p_ape_materno_acompanante character varying,
p_mordedura boolean,
p_aranazo boolean,
p_contacto boolean,
p_superficial boolean,
p_profunda boolean,
p_id_localizacion character varying[],
p_antecedentes_vacunacion boolean,
p_enfermedad_actual boolean,
p_otra_localizacion character varying,
p_id_tipo_proteccion character varying,
p_id_numero_lesiones character varying,
p_id_estado_herida character varying,
p_id_atencion_herida character varying,
p_id_lugar_suceso character varying,
p_fecha_vacunacion date,
p_nro_dosis integer,
p_id_alergico character varying,
p_descripcion_enfermedad character varying,
p_id_tipo_propietario character varying,
p_descripcion_otros character varying,
p_id_situacion character varying,
p_id_local integer,
p_id_usuario integer



    )
    RETURNS character varying
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
declare
	maxid int;
    id_per int;
    id_aco int := null;
	laux character varying :='1';
	
begin
    --Acompaniante--
    if p_id_acompanante=0 then
         if p_numero_doc_acompanante!='' then 
            insert into persona(nombres,ape_paterno,ape_materno,id_tipo_documento,
            numero_documento) values(p_nombres_acompanante,p_ape_paterno_acompanante ,
            p_ape_materno_acompanante ,p_tipo_doc_acompanante ,p_numero_doc_acompanante );
            select currval('persona_id_seq') into id_aco;
         end if;
    else
        update persona set nombres=p_nombres_acompanante,ape_paterno=p_ape_paterno_acompanante,
        ape_materno=p_ape_materno_acompanante,id_tipo_documento=p_tipo_doc_acompanante,
        numero_documento=p_numero_doc_acompanante where id=p_id_acompanante;
        id_aco=p_id_acompanante;
     
    end if;
    if p_id_persona=0 then 
        insert into persona(nombres,ape_paterno,ape_materno,id_tipo_documento,
         numero_documento,direccion,id_ubigeo,sexo,direccion_referencia,
         telefono,e_mail,id_grado_instruccion) 
         values(p_nombres,p_ape_paterno ,
         p_ape_materno ,p_tipo_doc ,p_numero_doc ,p_direccion_persona ,
         p_ubigeo_persona , p_sexo,p_direccion_referencia,
         p_telefono,p_e_mail,p_id_grado_instruccion );
        select currval('persona_id_seq') into id_per;
    else
        update persona set nombres=p_nombres,ape_paterno=p_ape_paterno,
        ape_materno=p_ape_materno,id_tipo_documento=p_tipo_doc,
        numero_documento=p_numero_doc,direccion=p_direccion_persona,
        id_ubigeo=p_ubigeo_persona,
        sexo=p_sexo,
        direccion_referencia=p_direccion_referencia,
        telefono=p_telefono,
        e_mail=p_e_mail,
        id_grado_instruccion=p_id_grado_instruccion
        where id=p_id_persona;
        id_per=p_id_persona;
    end if;
    

	if p_id_ficha=0 then         
    	insert into ficha_antecion_rabia(
            id_local,
            ficha_persona,
            id_persona,
            hc_persona,
            edad_persona,
            peso_persona,
            id_acompaniante,
            id_distrito_accidente,
            id_lugar_accidente,
            ficha_animal,
            id_especie_animal,
            id_raza_animal,
            id_estado_animal_inicial,
            fecha_accidente,
            fecha_atencion,
            id_tipo_exposicion,
            chk_lesion_mordedura,
            chk_lesion_araniazo,
            chk_lesion_contacto,
            id_lesion_tipo_proteccion,
            id_lesion_numero,
            descrip_otro_localizacion,
            chk_herida_profunda,
            chk_herida_superficial,
            id_estado_herida,
            id_lesion_atencion_herida,
            chk_antecedente_vacunacion,
            fecha_ultima_vacuna,
            nro_dosis_vacunado,
            id_alergico_vacuna,
            chk_enfermedad_actual,
            descrip_enfermedad_actual,
            id_duenio_animal,
            id_estado_animal,
            id_usuario_crea

       ) 
	    values(
            p_id_local,
            p_ficha_persona,
            id_per,
            p_historia_clinica,
            p_edad,
            p_sexo,
            id_aco,
            p_ubigeo_accidente,
            p_id_lugar_suceso,
            p_ficha_animal,
            p_id_especie,
            p_id_raza,
            p_id_estado_actual_animal,
            p_fecha_accidente,
            p_fecha_atencion,
            p_tipo_exposicion,
            p_mordedura,
            p_aranazo,
            p_contacto,
            p_id_tipo_proteccion,
            p_id_numero_lesiones,
            p_otra_localizacion,
            p_profunda,
            p_superficial,
            p_id_estado_herida,
            p_id_atencion_herida,
            p_antecedentes_vacunacion,
            p_fecha_vacunacion,
            p_nro_dosis,
            p_id_alergico,
            p_enfermedad_actual,
            p_descripcion_enfermedad,
            p_id_tipo_propietario,
            p_id_situacion,
            p_id_usuario
      );

	 select currval('ficha_virus_rabico_atencion_id_seq') into maxid;
	else
		update ficha_antecion_rabia set 
            ficha_persona=p_ficha_persona,
            id_persona=id_per,
            hc_persona=p_historia_clinica,
            edad_persona=p_edad,
            peso_persona=p_peso,
            id_acompaniante=id_aco,
            id_distrito_accidente=p_ubigeo_accidente,
            id_lugar_accidente=p_id_lugar_suceso,
            ficha_animal=p_ficha_animal,
            id_especie_animal=p_id_especie,
            id_raza_animal=p_id_raza,
            id_estado_animal_inicial=p_id_estado_actual_animal,
            fecha_accidente=p_fecha_accidente,
            fecha_atencion=p_fecha_atencion,
            id_tipo_exposicion=p_tipo_exposicion,
            chk_lesion_mordedura=p_mordedura,
            chk_lesion_araniazo=p_aranazo,
            chk_lesion_contacto=p_contacto,
            id_lesion_tipo_proteccion=p_id_tipo_proteccion,
            id_lesion_numero=p_id_numero_lesiones,
            descrip_otro_localizacion=p_otra_localizacion,
            chk_herida_profunda=p_profunda,
            chk_herida_superficial=p_superficial,
            id_estado_herida=p_id_estado_herida,
            id_lesion_atencion_herida=p_id_atencion_herida,
            chk_antecedente_vacunacion=p_antecedentes_vacunacion,
            fecha_ultima_vacuna=p_fecha_vacunacion,
            nro_dosis_vacunado=p_nro_dosis,
            id_alergico_vacuna=p_id_alergico,
            chk_enfermedad_actual=p_enfermedad_actual,
            descrip_enfermedad_actual=p_descripcion_enfermedad,
            id_duenio_animal=p_id_tipo_propietario,
            id_estado_animal=p_id_situacion,
            fecha_modificacion=now(),
            id_usuario_modi=p_id_usuario
		where id=p_id_ficha;
	
		delete from ficha_virus_rabico_atencion_localizacion where id_ficha=p_id_ficha;
		maxid:=p_id_ficha;
	end if;
	
	--Insertando detalle
    
	if  array_length(p_id_localizacion,1)>0 then
		   for i in array_lower(p_id_localizacion, 1) .. array_upper(p_id_localizacion, 1)
		   loop	     
						
			insert into ficha_virus_rabico_atencion_localizacion(
			    id_ficha,id_lesion_localizacion
			) values(
			maxid,p_id_localizacion[i][1]
			);
			
		   end loop;	
	 end if;

	return laux;
	
	EXCEPTION
	WHEN OTHERS THEN
        laux:='0|'||SQLERRM;
    return laux;
end;
$BODY$;
