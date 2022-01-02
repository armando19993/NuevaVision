<template>
<div class="row justify-content-center">
        <div class="col-md-12">
            <plan-cuenta-list-component @editar="editarUsuario(...arguments)" @show="showUsuario(...arguments)" :planes="planes">> </plan-cuenta-list-component>
            <plan-cuenta-create-component @new="updateList"></plan-cuenta-create-component>
            <plan-cuenta-edit-component @new="updateList" :editando="editando"> </plan-cuenta-edit-component>
            <plan-cuenta-show-component :editando="editando"> </plan-cuenta-show-component>
        </div>
    </div>
</template>


<script>
    export default {

        data()
        {
            return {
                planes: [],
                editando: '',
                id: ''
            }
        },

        mounted() {
            axios.get('/api/planes-cuenta').then((response) =>
            {
                this.planes = response.data;
                console.log(this.planes);
            });
        },

        methods: {
            updateList() {
                axios.get('/api/planes-cuenta').then((response) =>
                {
                    this.planes = response.data;
                });
            },
            editarUsuario(plan){
                this.editando = plan;
                $("#editPlan").modal('show');
            },
            showUsuario(plan){
                console.log(plan);
                this.editando = plan;
                $("#showPlan").modal('show');
            }
        }
    }
</script>
