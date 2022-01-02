<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <banco-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :bancos="bancos">> </banco-list-component>
            <banco-create-component @new="updateList"></banco-create-component>
            <banco-edit-component @new="updateList" :editando="editando"> </banco-edit-component>
            <banco-show-component :editando="editando"> </banco-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                bancos: [],
                editando: ''
            }
        },

        mounted() {
            axios.get('/api/bancos').then((response) =>
            {
                this.bancos = response.data;
                console.log(this.bancos);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/bancos').then((response) =>
                {
                    this.bancos = response.data;
                });
            },
            editarUsuario(banco){
                this.editando = banco;
                $("#editBanco").modal('show');
            },
            showUsuario(banco){
                console.log(banco);
                this.editando = banco;
                $("#showBanco").modal('show');
            }
        }
    }
</script>
