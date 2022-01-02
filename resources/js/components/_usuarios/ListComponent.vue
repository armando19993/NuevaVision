<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Listado de Usuarios</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createUser"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Status</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(usuario, index) in usuarios" :key="usuario.id">
              <td>
                <span class="fw-bold">{{usuario.id}}</span>
              </td>
              <td>{{usuario.name}}</td>
              <td> {{usuario.user}} </td>
              <td>
                  <span class="badge rounded-pill badge-light-success me-1" v-if="usuario.status_user === 1">Activo</span>
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
        props: ['usuarios'],
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
                let usuario = this.usuarios[index];
                console.log(usuario);
                this.$emit('editar', usuario)
            },
            showRegistro(index){
                let usuario = this.usuarios[index];
                console.log(usuario);
                this.$emit('show', usuario);
            }
        }
    }
</script>
