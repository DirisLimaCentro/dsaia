 <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="id_menu" class="col-form-label">Menu Principal</label>
                        
                         <select class="form-control"  id='id_menu' onchange="loadMenuDetalle();" >
                         </select>                        

                        
                      </div>
                    </div>

                     <div class="col-md-2">
                      <div class="form-group">
                           
                      </div>
                     </div> 

                     <div class="col-md-5">
                      <div class="form-group">
                        <label for="id_usuario_a" class="col-form-label">Usuario</label>
                        
                         <select style="width: 100%;" class="form-control input-sm select2 itemNamedist text-uppercase"  id='id_usuario_a'  onchange="loadAccesosxUsuario();" >
                         </select>                        

                        
                      </div>
                    </div>  


                  </div>

                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="id_menu_detalle" class="col-form-label">Sub Menu</label>
                        
                        <select style="height: 140px;" class="select2_multiple form-control"  id='id_menu_detalle' multiple="multiple" >
                        </select>                        

                        
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                            <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                      <br>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                 <div class="col-md-12 text-center">
                                     <div class="form-group">
                                    <a onclick="add('O');" style="width: 100px;"  class="btn btn-default btn-success btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span> Agregar <i class="glyphicon glyphicon-chevron-right"></i> </span></a>
                                    </div>  
                                    
                                 </div>
                           </div>
                           <div class="row">
                                 <div class="col-md-12 text-center">
                                     <div class="form-group">
                                     <a onclick="add('A');" style="width: 100px;"  class="btn btn-default btn-success btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span> Agregar todo <i class="glyphicon glyphicon-forward"></i> </span></a> 
                                     </div>
                                  </div>
                          </div>


                           <div class="row">
                                 <div class="col-md-12 text-center">
                                     <div class="form-group">
                                    <a onclick="remove('O');"  style="width: 100px;" class="btn btn-default btn-success btn-sm" tabindex="0"  href="#"><span> <i class="glyphicon glyphicon-chevron-left"></i> Quitar  </span></a>
                                    </div>  
                                    
                                 </div>
                           </div>
                           <div class="row">
                                 <div class="col-md-12 text-center">
                                     <div class="form-group">
                                     <a onclick="remove('A');"  style="width: 100px;" class="btn btn-default btn-success btn-sm" tabindex="0"  href="#"><span> <i class="glyphicon glyphicon-backward"></i> Quitar todo  </span></a> 
                                     </div>
                                  </div>
                          </div>



                      </div>
                     </div> 

                     <div class="col-md-5">
                      <div class="form-group">
                        <label for="id_acceso" class="col-form-label">Accesos del usuario</label>
                        
                        <select style="height: 140px;" class="select2_multiple form-control"  id='id_acceso' multiple="multiple" >
                        </select>                        

                        
                      </div>
                    </div>



                  </div>



              </div>  
            </div>  