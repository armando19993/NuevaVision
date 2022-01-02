<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <encargado-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :encargados="encargados"> </encargado-list-component>
            <encargado-create-component @new="updateList"></encargado-create-component>
            <encargado-edit-component @new="updateList" :editando="editando"> </encargado-edit-component>
            <encargado-show-component :editando="editando"> </encargado-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                encargados: [],
                id_usuario: 0,
                editando: ''
            }
        },

        mounted() {
            axios.get('/api/encargados').then((response) =>
            {
                this.encargados = response.data;
                console.log(this.encargados);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/encargados').then((response) =>
                {
                    this.encargados = response.data;
                });
            },
            editarUsuario(encargado){
                this.editando = encargado;
                $("#editEncargado").modal('show');
            },
            showUsuario(encargado){
                console.log(encargado);
                this.editando = encargado;
                $("#showEncargado").modal('show');
            }
        }
    }
</script>
