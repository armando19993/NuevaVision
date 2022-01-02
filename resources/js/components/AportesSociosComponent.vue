<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <aportes-socios-list-component 
                :aportes="aportes" 
                :dependiente="dependiente"
                :nombre="nombres"
                @new="store"
                @regresar="store"
                @edit="editarAporte(...arguments)"
                v-if="list"
                @crear="crearRegistro"
            > </aportes-socios-list-component>
            <aportes-socios-create-component v-if="create" @new="updateList"></aportes-socios-create-component>
            <aportes-socios-edit-total-component 
            v-if="edit" 
            @new="updateList" 
            @regresar="updateList"
            :editando="editando"> </aportes-socios-edit-total-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                aportes: [],
                dependiente: false,
                nombres: '',
                edit: false,
                create: false,
                list: true,
            }
        },

        mounted() {
            axios.get('/api/aportes-socios/0/'+$("#type_user").val()+'/'+$("#usuario_id").val()).then((response) =>
            {
                this.aportes = response.data;
                console.log(this.aportes);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/aportes-socios/0/'+$("#type_user").val()+'/'+$("#usuario_id").val()).then((response) =>
                {
                    this.aportes = response.data;
                    this.list = true;
                    this.create = false;
                    this.edit = false;
                });
            },
            editarAporte(aporte){
                this.editando = aporte;
                this.list = false;
                this.create = false;
                this.edit = true;
            },
            showUsuario(banco){
                console.log(banco);
                this.editando = banco;
                $("#showAporte").modal('show');
            },
            crearRegistro()
            {
                this.list = false;
                this.create = true;
                this.edit = false;
            }
        }
    }
</script>
