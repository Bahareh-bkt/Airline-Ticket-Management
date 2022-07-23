<!-- gray bg -->
<section class="container tm-home-section-1" id="more">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <!-- Nav tabs -->
            <div class="tm-home-box-1">
                <ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
                    <li role="presentation" class="active" >
                        <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">Ticket tracking</a>
                    </li>
                    <li role="presentation" >
                        <a href="#car" aria-controls="car" role="tab" data-toggle="tab">Advanced search</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <?php
                    echo form_open('Site/Follow_up/');
                    ?>
                    <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
                        <div class="tm-search-box effect2">
                            <form action="#" method="post" class="hotel-search-form">
                                <div class="tm-form-inner">
                                    <div class="form-group">
                                        <div class='input-group date-time' id='datetimepicker3'>
                                            <input type='text' class="form-control" name="nationalCode" placeholder="Natinal Code" style="margin-bottom:10px; margin-right: 30px;border:solid 1px #000000; direction:ltr; background-color: #ffffff; box-shadow:none; width: 220px;"/>
                                        </div>
                                        <div class='input-group date-time' id='datetimepicker3'>
                                            <input type='text' class="form-control" name="ReserveCode" placeholder="Reserve Code" style="margin-bottom:10px; margin-right: 30px; border: 1px solid #000000; direction:ltr; background-color: #ffffff; box-shadow:none; width: 220px;"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group tm-yellow-gradient-bg text-center">
                                    <button type="submit" name="submit" class="tm-yellow-btn">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <div role="tabpanel" class="tab-pane fade tm-white-bg" id="car">
                        <div class="tm-search-box effect2">
                            <?php
                            echo form_open('Site/Search');
                            ?>
                            <div class="tm-form-inner" dir="ltr">
                                <div class="form-group">
                                    <select class="form-control" name="Flight_destination">
                                        <option value="Tehran"> To : </option>
                                        <option value="Tehran"> Tehran</option>
                                        <option value="Tabriz"> Tabriz</option>
                                        <option value="Shiraz"> Shiraz</option>
                                        <option value="Qom"> Qom</option>
                                        <option value="Mashhad"> Mashhad</option>
                                        <option value="Esfahan"> Esfahan</option>
                                        <option value="Urumie"> Urumie</option>
                                        <option value="Kish"> Kish</option>
                                        <option value="Ardebil"> Ardebil</option>
                                        <option value="Golestan"> Golestan</option>
                                        <option value="Mazandaran"> Mazandaran</option>
                                        <option value="Guilan"> Guilan</option>
                                        <option value="Sistan & Baloochestan"> Sistan & Baloochestan</option>
                                        <option value="Dezful"> Dezful</option>
                                        <option value="Zahedan"> Zahedan</option>
                                        <option value="Kermanshah"> Kermanshah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date-time' id='datetimepicker3'>
                                        <p>Flight date:</p>
                                        <input type='date' class="form-control example1" name="Flight_date" placeholder="Pickup Date" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group tm-yellow-gradient-bg text-center">
                                <button type="submit" class="tm-yellow-btn">Search</button>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
