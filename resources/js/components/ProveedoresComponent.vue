<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <proveedor-list-component
            v-if="list"
            @editar="editarUsuario(...arguments)"
            @show="showUsuario(...arguments)"
            @create="create_func()"
            :proveedores="proveedores"
            > </proveedor-list-component>
            <proveedor-create-component v-if="create" @new="updateList"></proveedor-create-component>
            <proveedor-edit-component
            v-if="edit"
            @new="updateList"
            @regresar="regresar"
            :editando="editando"> </proveedor-edit-component>
            <proveedor-show-component @regresar="regresar" v-if="show" :editando="editando"> </proveedor-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                proveedores: [],
                id_usuario: 0,
                editando: '',
                list: true,
                create: false,
                edit: false,
                obligado: false,
            }
        },

        mounted() {
            axios.get('/api/proveedores').then((response) =>
            {
                this.proveedores = response.data;
                console.log(this.proveedores);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/proveedores').then((response) =>
                {
                    this.proveedores = response.data;
                    this.regresar();
                });
            },
            editarUsuario(proveedor){
                this.list = false;
                this.edit = true;
                this.editando = proveedor;
            },
            showUsuario(proveedor){
                console.log(proveedor);
                this.editando = proveedor;
                this.list = false;
                this.show = true;
            },
            create_func()
            {
                this.list = false;
                this.create = true;
                this.edit = false;
                this.show = false;
            },
            regresar(){
                this.list = true;
                this.create = false;
                this.edit = false;
                this.show = false;
            }
        }
    }
</script>
