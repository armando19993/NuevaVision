<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Encargados</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createEncargado"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(encargado, index) in encargados" :key="encargado.id">
              <td>
                <span class="fw-bold">{{encargado.cedula}}</span>
              </td>
              <td>{{encargado.nombre}}</td>
              <td> {{encargado.telefono}} </td>
              <td>
                  <span class="badge rounded-pill badge-light-success me-1" v-if="encargado.status === 1">Activo</span>
                  <span class="badge rounded-pill badge-light-danger me-1" v-else>Inactivo</span>
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
        props: ['encargados'],
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
                let encargado = this.encargados[index];
                this.$emit('editar', encargado)
            },
            showRegistro(index){
                let encargado = this.encargados[index];
                console.log(encargado);
                this.$emit('show', encargado);
            }
        }
    }
</script>
