<div class="studentCard-container">
    <img src="../images/BackBtn.png" class="back-btn-listStudents back-btn">
        <script>
            $('.back-btn-listStudents').click(function() {
                $('.listStudents-container').css('display', 'block');
                $('.studentCard-container').css('display', 'none');
            });
        </script>
        <h3 class="text-center m-3">
            Карта персонофицированного учета
        </h3>
        <div class="text-center">
            <select class="CardStSelect combobox">
                
            </select>
        </div>
        
        <img src="" class="CardStImage">
        <div class="CardInfo">
            <div class="cardInfo-item-container">
                <h4>ФИО</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-FIO">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Дата рождения</h4>
                <div class="cardInfo-item">
                    <input type="date" readonly class="cardInfo-date_born">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Гражданство</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-national">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Школа</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-school">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Паспортные данные</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-Passport">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Адрес</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-adres">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Телефон</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-phone">
                    <script>
                        $(function(){
                            $('.cardInfo-phone').mask("+375 (99) 999-99-99");
                            });
                    </script>
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Общежитие</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-Hostel">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Состояние здоровья</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-health">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Сведение о семье</h4>
                <div class="cardInfo-item">
                    <textarea type="text" readonly class="cardInfo-Mother"></textarea>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <div class="cardInfo-item">
                    <textarea type="text" readonly class="cardInfo-Father"></textarea>
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Другие члены семьи</h4>
                <div class="cardInfo-item">
                    <textarea type="text" readonly class="cardInfo-Brothers"></textarea>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <div class="cardInfo-item">
                    <textarea type="text" readonly class="cardInfo-Sisters"></textarea>
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Отношение с семьей</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-relationship">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
            <div class="cardInfo-item-container">
                <h4>Увлечения</h4>
                <div class="cardInfo-item">
                    <input type="text" readonly class="cardInfo-hobby">
                    <img class="cardInfo-edit" src="../images/edit_ico.png"></img>
                    <img class="cardInfo-accept" src="../images/accept_ico.png"></img>
                    <img class="cardInfo-cancel" src="../images/cancel_ico.png"></img>
                </div>
            </div>
        </div>


        <!-- modal Passport -->
        <div class="passport-popup popup" role="document">
            <div class="rounded-4 shadow passport-popup-container popup-container">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Паспортные данные</h1>
                    <button type="button" class="btn-close btn_close-passport" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="passport-num" class="form-control rounded-3" placeholder="Номер паспорта">
                            <label for="floatingPassword">Номер паспорта</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="passport-date" class="form-control rounded-3" placeholder="Дата выдачи">
                            <label for="floatingPassword">Дата выдачи</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="passport-person" class="form-control rounded-3" placeholder="Кем выдан">
                            <label for="floatingPassword">Кем выдан</label>
                        </div>
                        <div class="warning warningPassport">
                            *Заполните все поля
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark OkPassport" type="submit">Ок</button>
                    </form>
                </div>
            </div>
        </div>


         <!-- modal Parent -->

         <div class="whatDo-parent popup" role="document">
            <div class="popup-container rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Выберите действие</h1>
                    <button type="button" class="btn-close btn_close-WhatDo_parent" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 text-center">
                            <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark AddParent" type="submit">Добавить</button>
                            <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark ChangeParent" type="submit">Изменить</button>
                </div>
            </div>
         </div>

         <div class="Who-parent popup" role="document">
            <div class="popup-container rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Выберите родителя</h1>
                    <button type="button" class="btn-close btn_close-Who_parent" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form class="text-center" method="post">
                            <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark Who-Mother" name="mother" type="submit">Мать</button>
                            <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark Who-Father" name="father" type="submit">Отец</button>
                            <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark Who-Opekun" name="opekun" type="submit">Опекун</button>
                    </form>
                </div>
            </div>
         </div>

         <div class="parent-popup popup" role="document">
            <div class="rounded-4 shadow parent-popup-container popup-container">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Сведения о семье</h1>
                    <button type="button" class="btn-close btn_close-parent" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" readonly name="parent-whois" class="form-control rounded-3">
                            <label for="floatingPassword">Родитель</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="parent-fio" class="form-control rounded-3" placeholder="ФИО">
                            <label for="floatingPassword">ФИО</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="parent-adres" class="form-control rounded-3" placeholder="Адрес">
                            <label for="floatingPassword">Адрес</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="parent-phone" class="form-control rounded-3" placeholder="Телефон">
                            <script>
                                $(function(){
                                    $('input[name="parent-phone').mask("+375 (99) 999-99-99");
                                    });
                            </script>
                            <label for="floatingPassword">Телефон</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="parent-place_job" class="form-control rounded-3" placeholder="Место работы">
                            <label for="floatingPassword">Место работы</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="parent-job" class="form-control rounded-3" placeholder="Должность">
                            <label for="floatingPassword">Должность</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="parent-date_born" class="form-control rounded-3" placeholder="Дата рождения">
                            <label for="floatingPassword">Дата рождения</label>
                        </div>
                        <div class="warning warningParent">
                            *Заполните все поля
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark OkParent" type="submit">Ок</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal Other -->


        <div class="whatDo-other popup" role="document">
            <div class="popup-container rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Выберите действие</h1>
                    <button type="button" class="btn-close btn_close-WhatDo_other" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 text-center">
                    <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark AddOther" type="submit">Добавить</button>
                    <button class="w-75 mb-2 btn btn-lg rounded-3 btn-dark ChangeOther" type="submit">Изменить</button>
                </div>
            </div>
         </div>
                            

        <div class="other-popup popup" role="document">
            <div class="rounded-4 shadow other-popup-container popup-container">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Другие члены семьи</h1>
                    <button type="button" class="btn-close btn_close-other" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" method="post">
                        <div class="form-floating mb-3">
                            <select class="other-who form-control rounded-3" placeholder="Выберите родственника">
                                <option value="none">Выберите родственника</option>
                            </select>
                            <label for="floatingPassword">Выберите родственника</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="other-fio" class="form-control rounded-3" placeholder="ФИО">
                            <label for="floatingPassword">ФИО</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="other-date_born" class="form-control rounded-3" placeholder="Дата рождения">
                            <label for="floatingPassword">Дата рождения</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="Other-type form-control rounded-3">
                                <option value="none">Вид деятельности</option>
                                <option>Учится</option>
                                <option>Работает</option>
                            </select>
                            <label for="floatingPassword">Вид деятельности</label>
                        </div>
                        <div class="warning warningOther">
                            *Заполните все поля
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark OkOther" type="submit">Ок</button>
                    </form>
                </div>
            </div>
        </div>

    <script src="../js/studentCard.js"></script>
</div>