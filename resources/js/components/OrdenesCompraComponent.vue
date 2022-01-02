<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <orden-compra-list-component
            v-if="list"
            @editar="editarUsuario(...arguments)"
            @show="showUsuario(...arguments)"
            @create="create_func()"
            :ordenes="ordenes"
            > </orden-compra-list-component>
            <orden-compra-create-component
            v-if="create"
            @new="updateList"
            @regresar="regresar"></orden-compra-create-component>
            <orden-compra-edit-component
            v-if="edit"
            @new="updateList"
            @regresar="regresar"
            :editando="editando"> </orden-compra-edit-component>
            <orden-compra-show-component
            @regresar="regresar"
            v-if="show"
            :editando="editando"> </orden-compra-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                ordenes: [],
                list: true,
                create: false,
                edit: false,
                show: false,
                obligado: false,
            }
        },

        mounted() {
            axios.get('/api/ordenes-compra').then((response) =>
            {
                this.ordenes = response.data;
                console.log(this.ordenes);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/ordenes-compra').then((response) =>
                {
                    this.ordenes = response.data;
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
