<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <socios-list-component 
            v-if="list" 
            :socios="socios" 
            @editar="editarSocio(...arguments)" 
            @crear="crear" 
            @search="search(...arguments)"
            @createAporte="createAporte(...arguments)"
            @listAportes="listAportes(...arguments)"> </socios-list-component>
            <socios-create-component v-if="create" @new="store"></socios-create-component>
            <socios-edit-component v-if="edit" :editando="editando" @regresar="store" @new="store"> </socios-edit-component>
            <socios-show-component v-if="show"> </socios-show-component>
            <aportes-socios-create-component v-if="create_aporte" :socio="aportante" :banco="banco_aportante" @new="store"> </aportes-socios-create-component>
            <aportes-socios-list-component 
            v-if="list_aporte" 
            :aportes="aportes" 
            :dependiente="dependiente"
            :nombre="nombres"
            @new="store"
            @regresar="store"
            @edit="editarAporte(...arguments)"> </aportes-socios-list-component>
            <aportes-socios-edit-component 
            v-if="edit_aporte" 
            :editando='editando'
            @regresarListado="listAportes(...arguments)"></aportes-socios-edit-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                list: true,
                create: false,
                edit: false,
                show: false,
                socios: [],
                create_aporte: false,
                editando: '',
                aportante: '',
                banco_aportante: '',
                list_aporte: false,
                aportes: [],
                dependiente: true,
                editando: '',
                edit_aporte: false
            }
        },

        mounted() {
            axios.get('/socios/listado').then((response) =>
                {
                    this.socios = response.data;
                    console.log(this.socios);
                })
        },

        methods: {
            updateList() {
                axios.get('/socios/listado').then((response) =>
                {
                    this.socios = response.data;
                });
            },
            crear()
            {
                this.list = false,
                this.edit = false,
                this.show = false,
                this.create = true
                this.list_aporte = false;
                this.edit_aporte = false;
            },
            store()
            {
                this.updateList();
                this.list = true,
                this.edit = false,
                this.show = false,
                this.create = false
                this.create_aporte = false;
                this.list_aporte = false;
                this.edit_aporte = false;
            },
            search( params )
            {

                axios.get('/socios/listado').then((response) =>
                {
                    this.socios = response.data;
                });
            },
            editarSocio( socio )
            {
                this.editando = socio;
                this.list = false,
                this.edit = true,
                this.show = false,
                this.create = false,
                this.list_aporte = false;
                this.edit_aporte = false;
            },
            createAporte( socio_id, banco_id )
            {
                this.list = false,
                this.edit = false,
                this.show = false,
                this.create = false
                this.create_aporte = true;
                this.list_aporte = false;
                this.edit_aporte = false;

                this.aportante = socio_id;
                this.banco_aportante = banco_id
            },
            listAportes( id_socio, nombres )
            {
                this.list = false,
                this.edit = false,
                this.show = false,
                this.create = false
                this.create_aporte = false;
                this.list_aporte = true; 
                this.nombres = nombres;
                this.edit_aporte = false;

                axios.get('/api/aportes-socios/'+id_socio).then((response) =>
                {
                    this.aportes = response.data;
                })
                
            },
            editarAporte(aporte)
            {
                this.editando = aporte;
                this.list = false,
                this.edit = false,
                this.show = false,
                this.create = false
                this.create_aporte = false;
                this.list_aporte = false; 
                this.edit_aporte = true;
            }
        }
    }
</script>
