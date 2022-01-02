<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Bancos</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createBanco"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Siglas</th>
              <th>Banco</th>
              <th>Cuenta</th>
              <th>Convenio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(banco, index) in bancos" :key="banco.id">
              <td>
                <span class="fw-bold">{{banco.siglas}}</span>
              </td>
              <td>{{banco.nombre}}</td>
              <td> {{banco.cuenta}} </td>
              <td>
                  <span class="badge rounded-pill badge-light-success me-1" v-if="banco.convenio === 1">Bajo Convenio</span>
                  <span class="badge rounded-pill badge-light-danger me-1" v-else>Sin Convenio</span>
              </td>
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
        props: ['bancos'],
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
                let banco = this.bancos[index];
                this.$emit('editar', banco)
            },
            showRegistro(index){
                let banco = this.bancos[index];
                console.log(banco);
                this.$emit('show', banco);
            }
        }
    }
</script>
