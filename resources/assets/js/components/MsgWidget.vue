<template>
    <div class="col-md-12" id="msg-container">
        <label for="a">Ключ</label>
        <div class="input-group">
            <input class="form-control " type="text" name="a" v-model="key">
            <span class="input-group-btn">
                <button class="btn btn-default" v-on:click="generateKey(23)">Сгенерировать новый</button>
                </span>
        </div>
        <div class="form-group">
            <label for="b">Введите сюда текст</label>
            <textarea class="form-control" rows="15" name="b" placeholder="Введите сюда текст"
                      v-model="message"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary col-sm-2 pull-right" v-on:click="encrypt">Зашифровать</button>
            <button class="btn btn-danger col-sm-2 pull-right btn-space" v-on:click="decrypt">Расшифровать</button>
        </div>

        <div class="modal fade" id="encryptionWindow" tabindex="-1" role="dialog"
             aria-labelledby="encryptionEindowTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="encryptionWindowTitle">Результат</h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="15" id="processingResult" readonly
                                  v-model="result"></textarea>
                        <h4>Не забудьте сохранить ключ: {{ key }}</h4>
                    </div>
                    <div class="modal-footer">
                        <!--<div class="col-sm-6">-->
                            <!--<div class="input-group">-->
                                <!--<span class="input-group-addon" id="url-part">www</span>-->
                                <!--<input type="text" class="form-control" placeholder="Username" readonly :value="url"-->
                                       <!--aria-describedby="url-part">-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-sm-6">-->
                            <button type="button" class="btn" id="copyResult" data-clipboard-target="#processingResult">
                                Скопировать
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ок</button>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="errorWindow" tabindex="-1" role="dialog"
             aria-labelledby="encryptionEindowTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="errorWndTitle">Ошибка!</h4>
                    </div>
                    <div class="modal-body">
                        Не удалось расшифровать сообщение. Возможно, вы указали некорректный ключ.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ок</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    var Clipboard = require('clipboard');
    //
    var axios = require('axios');
    var c = require('crypto-js');
    export default {
        mounted() {
            console.log('Widget loaded');
            this.generateKey(23);
            this.encrypt();
            new Clipboard('#copyResult');
        },
        data() {
            return {
                key: '',
                message: '',
                result: '',
                url: null
            }
        },
        methods: {
            generateKey: function (length) {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+/-=,.|\\";
                for (var i = 0; i < length; i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                this.key = text;
            },
            encrypt: function () {
                if (this.message.length == 0) {
                    this.result = '';
                    return;
                }
                this.result = c.AES.encrypt(this.message, this.key).toString();
                this.save();
            },
            decrypt: function () {
                try {
                    this.result = c.AES.decrypt(this.message, this.key).toString(c.enc.Utf8);
                    if (this.result === "") {
                        this.showModal('errorWindow');
                        return;
                    }
                    this.showModal('encryptionWindow');
                }
                catch (e) {
                    this.showModal('errorWindow');
                }
            },
            save: function () {
                axios.post('/save', {message: this.result}, {responseType: 'json'})
                    .then(r => {
                        var url = r.data.url;
                        if (url == null) {
                            this.url = '<Error!>';
                            return;
                        }

                        this.url = url;
                        this.showModal('encryptionWindow');
                    })
            },
            showModal: function (windowId) {
                $('#' + windowId).modal();
            },
            load: function () {

            }
        }
    }
</script>