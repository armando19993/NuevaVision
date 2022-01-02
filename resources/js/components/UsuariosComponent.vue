<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <usuario-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :usuarios="usuarios">> </usuario-list-component>
            <usuario-create-component @new="updateList"></usuario-create-component>
            <usuario-edit-component @new="updateList" :editando="editando"> </usuario-edit-component>
            <usuario-show-component :editando="editando"> </usuario-show-component>
        </div>
    </div>
</template>


<script>
    export default {

        data()
        {
            return {
                usuarios: [],
                editando: '',
                id: ''
            }
        },

        mounted() {
            axios.get('/api/usuarios').then((response) =>
            {
                this.usuarios = response.data;
                console.log(this.usuarios);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/usuarios').then((response) =>
                {
                    this.usuarios = response.data;
                    console.log(this.usuarios);
                });
            },
            editarUsuario(usuario){
                this.editando = usuario;
                $("#editUser").modal('show');
            },
            showUsuario(usuario){
                console.log(usuario);
                this.editando = usuario;
                $("#showUser").modal('show');
            }
        }
    }
</script>
