<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Aportes</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createAporte"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Año</th>
              <th>Aporte</th>
              <th>Tipo de Aporte</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(aporte, index) in aportes" :key="aporte.id">
              <td>
                <span class="fw-bold">{{aporte.ano}}</span>
              </td>
              <td>{{aporte.aporte}}</td>
              <td> {{aporte.tipo_aporte}} </td>
              <td>
                <i class="fa fa-edit btn btn-primary" v-on:click="editRegistro(index)"></i>
                <i class="fa fa-eye btn btn-info" v-on:click="showRegistro(index)"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['aportes'],
        data()
        {
            return {
                data_usuario_edit: '',
                modeEdit: 0
            }
        },

        mounted() {

        },

        methods: {
            editRegistro(index){
                let aporte = this.aportes[index];
                this.$emit('editar', aporte)
            },
            showRegistro(index){
                let aporte = this.aportes[index];
                console.log(aporte);
                this.$emit('show', aporte);
            }
        }
    }
</script>
