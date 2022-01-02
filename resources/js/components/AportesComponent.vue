<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <aporte-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :aportes="aportes"> </aporte-list-component>
            <aporte-create-component @new="updateList"></aporte-create-component>
            <aporte-edit-component @new="updateList" :editando="editando"> </aporte-edit-component>
            <aporte-show-component :editando="editando"> </aporte-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                aportes: [],
                id_usuario: 0,
                editando: ''
            }
        },

        mounted() {
            axios.get('/api/aportes').then((response) =>
            {
                this.aportes = response.data;
                console.log(this.aportes);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/aportes').then((response) =>
                {
                    this.aportes = response.data;
                });
            },
            editarUsuario(banco){
                this.editando = banco;
                $("#editAporte").modal('show');
            },
            showUsuario(banco){
                console.log(banco);
                this.editando = banco;
                $("#showAporte").modal('show');
            }
        }
    }
</script>
