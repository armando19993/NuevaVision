<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Ordenes de Compra</h4>
        <button class="btn btn-primary float-right" @click="crear"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Ordc. Gasto</th>
              <th>Ordc. Asignacion</th>
              <th>Ordc. Saldo</th>
              <th>Proveedor</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(orden, index) in ordenes" :key="orden.id">
              <td>
                <span class="fw-bold">{{orden.ordc_gasto}}</span>
              </td>
              <td>{{orden.ordc_asignacion}}</td>
              <td> {{orden.ordc_saldo}} </td>
              <td> {{orden.proveedor.razon_social}} </td>
              <td> {{orden.created_at}} </td>

              <td>
                  <span class="badge rounded-pill badge-light-success me-1" v-if="orden.status === true">Activa</span>
                  <span class="badge rounded-pill badge-light-danger me-1" v-else>Inactiva</span>
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
        props: ['ordenes'],
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
                let orden = this.ordenes[index];
                this.$emit('editar', orden)
            },
            showRegistro(index){
                let orden = this.ordenes[index];
                console.log(orden);
                this.$emit('show', orden);
            },
            crear()
            {
                this.$emit('create');
            }
        }
    }
</script>
