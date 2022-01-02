<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <procesos-list-component :procesos="procesos" @crear="crear()" @editar="editar(...arguments)" v-if="list"> </procesos-list-component>
            <procesos-create-component  v-if="create" @regresar="regresar()" @new="regresar"></procesos-create-component>
            <procesos-edit-component  v-if="edit" :editando="editando" @new="regresar"> </procesos-edit-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                procesos: [],
                list: true,
                create: false,
                edit: false,
                editando: ''
            }
        },

        mounted() {
            axios.get('/api/procesos/'+$("#type_user").val()+'/'+$("#usuario_id").val()).then((response) =>
            {
                this.procesos = response.data;
            })
        },
        methods: {
            updateList() {
                axios.get('/api/procesos/'+$("#type_user").val()+'/'+$("#usuario_id").val()).then((response) =>
                {
                    this.procesos = response.data;
                    this.list = true;
                    this.create = false;
                    this.edit = false;
                });
            },
            crear()
            {
                    this.list = false;
                    this.create = true;
                    this.edit = false;
            },
            regresar()
            {
                this.updateList();
            },
            editar(proceso)
            {
                this.editando = proceso;
                this.list = false;
                    this.create = false;
                    this.edit = true;
            }
        }
    }
</script>
