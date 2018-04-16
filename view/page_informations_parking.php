 
<div class="main-container" style="background:#eae8e8">
    <section>
        <div class="container" id="start_reservation">

            <div class="row">

                <div class="col-sm-12">
                  <div class="boxed bg--white" style="padding-bottom:0px;">
                        <ol class="breadcrumbs">
                           <li class="breadcrumb-item"><a href="#"><?= BREADCRUMBS; ?></a></li>
                           <li class="breadcrumb-item active"><?= $parking[0]->parking_name; ?></li>
                           <li class="breadcrumb-item pull-right"><a href="javascript:history.go(-1)" style="color:blue;position:relative;top:9px">Voltar</a></li>
                        </ol>
                  </div>
                </div>

            </div>

            <div class="row" >

                <div class="col-sm-12">  

                    <div class="col-md-7">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                     
                          <div class="carousel-inner">
                            <?php if( !empty( $parking[0]->parking_maps ) ) : ?>
                            <div class="item">
                               <?= $parking[0]->parking_maps; ?>
                            </div>
                            <?php else: null; endif; ?>

                            <?php foreach( $photos as $k => $ph ): ?>

                            <div class="item <?= $k == 0 ? 'active' : null; ?>">
                               <img src="http://app.ubiqparking.com/<?= $ph->parking_photo; ?>" alt="">
                            </div>

                            <?php endforeach; ?>

                          </div>

                          <!-- Controls -->
                          <?php if( !empty( $photos ) ) : ?>
                          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <?php endif; ?>
                        </div>

                        <div class="feature feature-1 boxed boxed--border bg--white">
                            <h5><?= $parking[0]->parking_name; ?></h5>
                            <p>
                                <i class="glyphicon glyphicon-map-marker"></i> <?= $parking[0]->parking_address; ?><br>
                                <?= $parking[0]->parking_city == 0 ? null : $parking[0]->parking_city . '/'; ?>  <?= $parking[0]->parking_state == 0 ? null : $parking[0]->parking_state . '<br>'; ?>
                                <i class="glyphicon glyphicon-earphone"></i> <?= $parking[0]->parking_phone; ?>
                             </p>
                        </div>

                        <div class="feature feature-1 boxed boxed--border bg--white">
                            <h5 style="border-bottom: 1px solid #cec8c8;padding-bottom:4px;">Tabela de preços</h5>
                             <p style="padding-top:8px"><?= $parking[0]->parking_informations_prices; ?></p>
                        </div>

                        <div class="feature feature-1 boxed boxed--border bg--white">
                            <h5>Horário de funcionamento</h5>
                            <p><br>
                                <table class="table">
                                <tbody>
                                  <?php foreach( $hoursWeek as $wh ) : ?>                                                                  
                                    <tr class="bg-default">
                                      <td><?= $wh->wh_week_1; ?></td>
                                      <td><b>a</b></td>
                                      <td><?= $wh->wh_week_2; ?></td>
                                      <td><?= $wh->wh_hours_1; ?></td>
                                      <td><b>às</b></td>
                                      <td><?= $wh->wh_hours_2; ?></td>
                                     </tr> 
                                   <?php endforeach; ?>
                                </tbody>
                              </table>    
                            </p>
                        </div>

                         <div class="feature feature--featured feature-1 boxed boxed--border bg--white">
                                 <h5 style="border-bottom: 1px solid #cec8c8;padding-bottom:4px;">Outras informações</h5>
                               <p style="padding-top:8px">
                                    <?= $parking[0]->parking_general_informations; ?>
                                </p>
                         </div>

                    </div>
 
                        <div class="feature feature--featured feature-1 boxed boxed--border bg--white">
                         <h4><i class="glyphicon glyphicon-calendar"></i> Reserve uma vaga</h4>


                          <form action="<?= base_url( 'parking-reserve/' . separateLast( $parking[0]->parking_flag ) .'/' . $this->uri->segment( 3 ) . '/' . $this->uri->segment( 4 )); ?>" method="post" id="form_schedules">
                              <div id="id_parking" data-id="<?= $parking[0]->id_pkg; ?>"></div>
                              <div class="col-md-7"><span style="font-size:12px">Entrada</span>                              
                                  <input class="form-control datepicker" type="text"  name="datentrance" id="datentrance" value="<?php $dt = timeZoneLanguage(); echo $dt['date']; ?>">
                              </div>
                              <div class="col-md-5"><span style="font-size:12px">Hora</span>
                                   <select class="form-control" name="hourentrance" <?php $dt = timeZoneLanguage(); ?>>
                                    <option value="<?= $dt['time1']; ?>"><?= $dt['time1']; ?></option>
                                      <option value="1:00">1:00</option>
                                      <option value="1:30">1:30</option>
                                      <option value="2:00">2:00</option>
                                      <option value="2:30">2:30</option>
                                      <option value="3:00">3:00</option>
                                      <option value="3:30">3:30</option>
                                      <option value="4:00">4:00</option>
                                      <option value="4:30">4:30</option>
                                      <option value="5:00">5:00</option>
                                      <option value="5:30">5:30</option>
                                      <option value="6:00">6:00</option>
                                      <option value="6:30">6:30</option>
                                      <option value="7:00">7:00</option>
                                      <option value="7:30">7:30</option>
                                      <option value="8:00">8:00</option>
                                      <option value="8:30">8:30</option>
                                      <option value="9:00">9:00</option>
                                      <option value="9:30">9:30</option>
                                      <option value="10:00">10:00</option>
                                      <option value="10:30">10:30</option>
                                      <option value="11:00">11:00</option>
                                      <option value="11:30">11:30</option>
                                      <option value="12:00">12:00</option>
                                      <option value="12:30">12:30</option>
                                      <option value="13:00">13:00</option>
                                      <option value="13:30">13:30</option>
                                      <option value="14:00">14:00</option>
                                      <option value="14:30">14:30</option>
                                      <option value="15:00">15:00</option>
                                      <option value="15:30">15:30</option>
                                      <option value="16:00">16:00</option>
                                      <option value="16:30">16:30</option>
                                      <option value="17:00">17:00</option>
                                      <option value="17:30">17:30</option>
                                      <option value="18:00">18:00</option>
                                      <option value="18:30">18:30</option> 
                                      <option value="19:00">19:00</option>
                                      <option value="19:30">19:30</option> 
                                      <option value="20:00">20:00</option>
                                      <option value="20:30">20:30</option> 
                                      <option value="21:00">21:00</option>
                                      <option value="21:30">21:30</option> 
                                      <option value="22:00">22:00</option>
                                      <option value="22:30">22:30</option> 
                                      <option value="23:00">23:00</option>
                                      <option value="23:30">23:30</option>                            
                                      <option value="24:00">24:00</option>
                                      <option value="00:30">00:30</option>
                                   </select>
                              </div>
                               <div class="col-md-7"><span style="font-size:12px">Saída</span>
                                  <input class="form-control datepicker" type="text" name="datexit" id="datexit" value="<?php $dt = timeZoneLanguage(); echo $dt['date']; ?>">
                              </div>
                              <div class="col-md-5"><span style="font-size:12px">Hora</span>
                                 <select class="form-control" name="hourexit">
                                    <option value="<?= $dt['time2']; ?>"><?= $dt['time2']; ?></option>
                                      <option value="1:00">1:00</option>
                                      <option value="1:30">1:30</option>
                                      <option value="2:00">2:00</option>
                                      <option value="2:30">2:30</option>
                                      <option value="3:00">3:00</option>
                                      <option value="3:30">3:30</option>
                                      <option value="4:00">4:00</option>
                                      <option value="4:30">4:30</option>
                                      <option value="5:00">5:00</option>
                                      <option value="5:30">5:30</option>
                                      <option value="6:00">6:00</option>
                                      <option value="6:30">6:30</option>
                                      <option value="7:00">7:00</option>
                                      <option value="7:30">7:30</option>
                                      <option value="8:00">8:00</option>
                                      <option value="8:30">8:30</option>
                                      <option value="9:00">9:00</option>
                                      <option value="9:30">9:30</option>
                                      <option value="10:00">10:00</option>
                                      <option value="10:30">10:30</option>
                                      <option value="11:00">11:00</option>
                                      <option value="11:30">11:30</option>
                                      <option value="12:00">12:00</option>
                                      <option value="12:30">12:30</option>
                                      <option value="13:00">13:00</option>
                                      <option value="13:30">13:30</option>
                                      <option value="14:00">14:00</option>
                                      <option value="14:30">14:30</option>
                                      <option value="15:00">15:00</option>
                                      <option value="15:30">15:30</option>
                                      <option value="16:00">16:00</option>
                                      <option value="16:30">16:30</option>
                                      <option value="17:00">17:00</option>
                                      <option value="17:30">17:30</option>
                                      <option value="18:00">18:00</option>
                                      <option value="18:30">18:30</option> 
                                      <option value="19:00">19:00</option>
                                      <option value="19:30">19:30</option> 
                                      <option value="20:00">20:00</option>
                                      <option value="20:30">20:30</option> 
                                      <option value="21:00">21:00</option>
                                      <option value="21:30">21:30</option> 
                                      <option value="22:00">22:00</option>
                                      <option value="22:30">22:30</option> 
                                      <option value="23:00">23:00</option>
                                      <option value="23:30">23:30</option>                            
                                      <option value="24:00">24:00</option>
                                      <option value="00:30">00:30</option>
                                   </select>
                              </div>
                             <div id="list_products"></div>
    
                              <input type="submit" class="btn btn-block btn-primary" id="btn_reserve" value="RESERVAR">

                          </form>
                          
                          <br>
                                      
                        </div>                          

                    </div>
        
                </div>

            </div>

        </div>
    </section>
</div>
 