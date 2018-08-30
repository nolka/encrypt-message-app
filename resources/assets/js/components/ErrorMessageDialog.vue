<template>
    <div
            id="error-message-dialog"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="encryptionWindowTitle">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="errorWndTitle">Ошибка!</h4>
                </div>
                <div class="modal-body">
                    {{ message }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ок</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ErrorMessageDialog",
        data (){
            return {
                message: null
            }
        },
        methods: {
            showError(errMsg) {
                this.message = errMsg;
                $('#error-message-dialog').modal();
            }
        },
        mounted(){
            this.$bus.$on('error', (errorText) => {
                this.showError(errorText)
            });
        }
    }
</script>

<style scoped>

</style>