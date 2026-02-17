<div data-backdrop="static" class="modal fade" id="modalNew" role="dialog" aria-labelledby="modalNew" aria-hidden="true"
  tabindex="-1">
  <div class="modal-dialog modal-lg " role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalTitle">Ficha Evaluación Sanitaria de Servicios de Alimentación en
          Establecimiento de Salud</h4>
      </div>

      <div class="modal-body">

        <div class="panel panel-success">
          <div class="modal-header modal-header-success">
            Datos de la Ficha
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Establecimiento</label>
                  <input type="hidden" id="hid_local">
                  <input type="hidden" id="id_ficha">
                  <input type="text" readonly="" class="form-control" id="establecimiento" placeholder="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Distrito</label>
                  <input type="text" readonly="" class="form-control" id="distrito" placeholder="">
                </div>
              </div>



              <div class="col-md-3">
                <div class="form-group">

                  <label for="exampleInputPassword1">Fecha Visita:</label>
                  <div class="input-group date">

                    <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>

                </div>
              </div>



            </div>
            <div class="row">


              <!--
             <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre del Mercado : </label>
                
                <input type="text"  class="form-control" id="responsable_mercado" placeholder="">
              </div>
            </div>

-->

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">

                  <label for="exampleInputEmail1">Nombre del Mercado : </label>

                  <select class="form-control" style='width: 270px;' id="responsable_mercado">
                    <option value="">Selecciona</option>

                  </select>

                </div>
              </div>



              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Razon Social :</label>

                  <input type="text" class="form-control" id="razon_s" placeholder="">
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">N° Puesto</label>

                  <input type="text" class="form-control" id="numero_puesto" placeholder="">
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipos de Alimentos</label>

                  <input type="text" class="form-control" id="tipo_alimentos" placeholder="">
                </div>
              </div>


            </div>


            <div class="row">



              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del Inspector : </label>

                  <input type="text" class="form-control" id="n_inspector" placeholder="">
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del Vendedor :</label>

                  <input type="text" class="form-control" id="n_vendedor" placeholder="">
                </div>
              </div>



              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Direccion :</label>

                  <input type="text" class="form-control" id="n_direccion" placeholder="">
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Proveedores :</label>

                  <input type="text" class="form-control" id="n_proveedores" placeholder="">
                </div>
              </div>


            </div>





          </div>
        </div>


        <div class="panel panel-primary">
          <div class="panel-heading ">
            Calificacion
          </div>
          <div class="panel-body">



            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <table class="table  table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>


                  </thead>
                  <tbody>
                    <tr class="v-grid-header">

                      <th>I. ALIMENTO</th>
                      <th class="text-center">Calificacion</th>
                      <th class="text-center">Valor</th>
                    </tr>
                    <tr>
                      <td>1.1 Procedencia formal y No beneficia al puesto (*).</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="i_1" class="form-control text-right" name="coda3">
                          <option value="0">0</option>
                          <option value="4">4</option>

                      </td>
                    </tr>
                    <tr>
                      <td>1.2 Aspecto normal de carcasas o visceras y ausencia de parasitos ( quistes , larvas ).</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="i_2" class="form-control text-right" name="coda3">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>1.3 Carnes y menudencias identificadas por especie .</td>
                      <td class="text-center">SI=2</td>
                      <td class="text-center">
                        <select id="i_3" class="form-control text-right" name="coda3">
                          <option value="0">0</option>
                          <option value="2">2</option>

                      </td>
                    </tr>


                    <tr class="v-grid-header">

                      <th class="text-success">Total de Puntaje 1 Obtenido</th>
                      <th class="text-center"></th>
                      <th class="text-center"><input type="text" disabled placeholder="" id="total_puntaje1"
                          class="form-control text-right text-success " value="0"></th>
                    </tr>






                    <!--II-->

                    <tr class="v-grid-header">

                      <th>II. BUENAS PRACTICAS DE MANIPULACION ( BPM ) </th>
                      <th class="text-center">Calificacion</th>
                      <th class="text-center">Valor</th>
                    </tr>
                    <tr>
                      <td>2.1 Aplica temperatura de frio ( 5°C a -18° C ) en la conservacion .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="ii_1" name="coda4" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>2.2 Escribe en bandejas de material sarvitario y de facil limpieza</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="ii_2" name="coda4" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>2.3 Usa agua segura (0,5 ppm ) y fria (*) </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="ii_3" name="coda4" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>2.4 Desinfecta utensilios , superficies , paños y equipos .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="ii_4" name="coda4" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>

                      </td>
                    </tr>









                    <tr>
                      <td>2.5 Despacha en bolsas plasticas transparentes o blancas de primer uso .</td>
                      <td class="text-center">SI=2</td>
                      <td class="text-center">
                        <select id="ii_5" name="coda4" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="2">2</option>
                      </td>

                    <tr class="v-grid-header">

                      <th class="text-success">Total de Puntaje 2 Obtenido</th>
                      <th class="text-center"></th>
                      <th class="text-center"><input type="text" disabled placeholder="" id="total_puntaje2"
                          class="form-control text-right text-success " value="0"></th>
                    </tr>





                    <!-- III -->







                    <tr class="v-grid-header">

                      <th>III. VENDEDOR </th>
                      <th class="text-center">Calificacion</th>
                      <th class="text-center">Valor</th>
                    </tr>

                    <tr>
                      <td>3.1 Sin episodio actual de enfermedad y sin heridas ni infecciones en piel y mucosas </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iii_1" name="coda5" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>3.2 Manos limpias y sin joyas , con uñas cortas , limpias y sin esmaltes . </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iii_2" name="coda5" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>3.3 Cabello corto o recogido , sin maquillaje facial .</td>
                      <td id="ww2" class="text-center">SI=2</td>
                      <td class="text-center">
                        <select id="iii_3" name="coda5" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="2">2</option>
                      </td>
                    </tr>
                    <tr>
                      <td>3.4 Uniforme completo , limpio y de color claro .</td>
                      <td id="ww2" class="text-center">SI=2</td>
                      <td class="text-center">
                        <select id="iii_4" name="coda5" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="2">2</option>
                      </td>
                    </tr>
                    <tr>
                      <td>3.5 Aplica capacitaciones en BPM </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iii_5" name="coda5" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>

                    <tr class="v-grid-header">

                      <th class="text-success">Total de Puntaje 3 Obtenido</th>
                      <th class="text-center"></th>
                      <th class="text-center"><input type="text" disabled placeholder="" id="total_puntaje3"
                          class="form-control text-right text-success " value="0"></th>
                    </tr>





                    <!-- IIII -->


                    <tr class="v-grid-header">

                      <th>IIII. AMBIENTES Y ENSERES </th>
                      <th class="text-center">Calificacion</th>
                      <th class="text-center">Valor</th>
                    </tr>

                    <tr>
                      <td>4.1 Puesto ubicado en zona segun rubro y sin riesgo de contaminacion cruzada .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_1" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>4.2 Exterior e interior del puesto limpio y ordenado (sin jabas ) </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">

                        <select id="iiii_2" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    </tr>
                    <tr>
                      <td>4.3 Superficie para cortar en buen estado y limpia .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_3" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>
                    <tr>
                      <td>4.4 Equipos y utensilios en buen estado y limpio .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_4" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>

                    <tr>
                      <td>4.5 Mostrador de exhibicion en buen estado y limpios .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">

                        <SELECT id="iiii_5" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>


                      </td>
                    </tr>

                    <tr>
                      <td>4.6 Platos , secadores en buen estado y limpios .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_6" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>


                    <tr>
                      <td>4.7 Basura bien dispuesta ( tacho c/bolsa interior y tapa ) </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_7" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>


                    <tr>
                      <td>4.8 Desague con sumidero , rejilla y trampa en buena condicion .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_8" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>



                    <tr>
                      <td>4.9 Ausencia de vectores , roedores u otros animales o signos de tu presencia ( excremento u
                        otros ) .</td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_9" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>

                    <tr>
                      <td>4.10 Guarda el material de limpieza y desinfeccion separados de alimento . </td>
                      <td class="text-center">SI=4</td>
                      <td class="text-center">
                        <select id="iiii_10" name="coda6" class="form-control text-right">
                          <option value="0">0</option>
                          <option value="4">4</option>
                      </td>
                    </tr>


                    <tr class="v-grid-header">

                      <th class="text-success">Total de Puntaje 4 Obtenido</th>
                      <th class="text-center"></th>
                      <th class="text-center">
                        <input disabled value="0" id="total_puntaje4" placeholder=""
                          class="form-control text-right text-success ">



                      </th>
                    </tr>








                    <tr class="v-grid-header">

                      <th class="text-center">INFORMACION COMPLEMENTARIA</th>
                      <th class="text-center">Calificacion</th>
                      <th class="text-center">Valor</th>
                    </tr>




                    <tr class="v-grid-header">

                      <th class="text-success">PUNTAJE TOTAL</th>
                      <th class="text-center"> </th>
                      <th class="text-center"><input type="text" disabled placeholder="" name="total_puntaje5"
                          id="total_puntaje5" class="form-control text-right text-success " value="0"></th>



                    </tr>


                    <tr class="v-grid-header">

                      <th class="text-success">ESTADO</th>
                      <th class="text-center"></th>
                      <th class="text-center"><input type="text" disabled placeholder="" id="total_puntaje6"
                          class="form-control text-right text-success "></th>



                    </tr>








                  </tbody>

                </table>

              </div>


            </div>



          </div>
        </div>





      </div>
      <div class="modal-footer">
        <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i>
          Guardar</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>
          Cancelar</button>

      </div>
      <!--</div>-->


    </div>
  </div>

</div>