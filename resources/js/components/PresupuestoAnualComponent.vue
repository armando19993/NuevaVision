<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <presupuesto-anual-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :presupuestos="presupuestos"> </presupuesto-anual-list-component>
            <presupuesto-anual-create-component @new="updateList"></presupuesto-anual-create-component>
            <presupuesto-anual-edit-component @new="updateList" :editando="editando"> </presupuesto-anual-edit-component>
            <presupuesto-anual-show-component :editando="editando"> </presupuesto-anual-show-component>
        </div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return {
                presupuestos: [],
                id_usuario: 0,
                editando: ''
            }
        },

        mounted() {
            axios.get('/api/presupuesto-anual').then((response) =>
            {
                this.presupuestos = response.data;
                console.log(this.presupuestos);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/presupuesto-anual').then((response) =>
                {
                    this.presupuestos = response.data;
                });
            },
            editarUsuario(presupuesto){
                this.editando = presupuesto;
                console.log(presupuesto);
                $("#editPresupuesto").modal('show');
            },
            showUsuario(presupuesto){
                console.log(presupuesto);
                this.editando = presupuesto;
                $("#showPresupuesto").modal('show');
            }
        }
    }
</script>
