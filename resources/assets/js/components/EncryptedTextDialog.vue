<template>
    <div
            id="resultWindow"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="encryptionWindowTitle">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="encryptionWindowTitle">Результат</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="15" id="processingResult" readonly v-model="result"></textarea>
                    <h4>Не забудьте сохранить ключ: {{ keyword }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="copyResult" data-clipboard-target="#processingResult">
                        Скопировать
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ок</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EncryptedTextDialog",
        data() {
            return {
                keyword: null,
                result: null,
            }
        },
        methods: {
            showResult(keyword, result) {
                this.keyword = keyword
                this.result = result
                $('#resultWindow').modal();
            }
        },
        mounted(){
            this.$bus.$on('result', ({keyword, result}) => {
                this.showResult(keyword, result)
            });
        }
    }
</script>

<style scoped>

</style>