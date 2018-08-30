<template>
    <div class="col-md-12" id="msg-container">
        <label for="a">Ключ</label>
        <div class="input-group">
            <input class="form-control " type="text" name="a" v-model="keyword">
            <span class="input-group-btn">
                <button class="btn btn-default"
                        @click="generateKey(23)">Сгенерировать новый</button>
                </span>
        </div>
        <div class="form-group">
            <label for="b">Введите сюда текст</label>
            <textarea class="form-control" rows="15" name="b" placeholder="Введите сюда текст"
                      v-model="message"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary col-sm-2 pull-right" @click="encrypt">Зашифровать</button>
            <button class="btn btn-danger col-sm-2 pull-right btn-space" @click="decrypt">Расшифровать</button>
        </div>
        <error-message-dialog></error-message-dialog>
        <encrypted-text-dialog></encrypted-text-dialog>
    </div>
</template>

<script>
    import ErrorMessageDialog from './ErrorMessageDialog.vue'
    import EncryptedTextDialog from './EncryptedTextDialog.vue'

    var Clipboard = require('clipboard');

    var axios = require('axios');
    var c = require('crypto-js');
    export default {
        components: {
            ErrorMessageDialog,
            EncryptedTextDialog
        },
        mounted() {
            this.generateKey(23);
            this.encrypt();
            new Clipboard('#copyResult');
        },
        data() {
            return {
                keyword: '',
                message: '',
                result: '',
                url: null
            }
        },
        methods: {
            generateKey(length) {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+/-=,.|\\";
                for (var i = 0; i < length; i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                this.keyword = text;
            },
            encrypt() {
                if (this.message.length == 0) {
                    this.result = '';
                    return;
                }
                this.result = c.AES.encrypt(this.message, this.keyword).toString();
                this.save();
            },
            decrypt() {
                if (this.message.length == 0) {
                    return this.showError("Введите текст для расшифровки");
                }
                this.result = c.AES.decrypt(this.message, this.keyword).toString(c.enc.Utf8);
                if (this.result === "") {
                    this.showError('Не удалось расшифровать сообщение. Возможно, вы указали некорректный ключ')
                    return;
                }
                this.showEncodeDecodeDialog();
            },
            save() {
                axios.post('/save', {message: this.result}, {responseType: 'json'})
                    .then(r => {
                        var url = r.data.url;
                        if (url == null) {
                            this.url = '<Error!>';
                            return;
                        }

                        this.url = url;
                        this.showEncodeDecodeDialog();
                    })
            },
            showError(errMessage) {
                this.$bus.$emit('error', errMessage);
            },
            showEncodeDecodeDialog() {
                this.$bus.$emit('result', {keyword: this.keyword, result: this.result});
            },
        }
    }
</script>