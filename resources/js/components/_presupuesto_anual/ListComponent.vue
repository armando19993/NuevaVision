<template>
    <div class="card">
      <div class="card-header text-right">
        <h4 class="card-title">Presupuesto Anual</h4>
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createPresupuesto"> <i class="fa fa-plus"></i> Agregar Nuevo</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Periodo</th>
              <th>Asignacion</th>
              <th>Gasto</th>
              <th>Saldo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(presupuesto, index) in presupuestos" :key="presupuesto.id">
              <td>
                <span class="fw-bold">{{presupuesto.codigo}}</span>
              </td>
              <td>{{presupuesto.nombre}}</td>
              <td> {{presupuesto.periodo}} </td>
              <td> {{presupuesto.asignacion}} </td>
              <td> {{presupuesto.gasto}} </td>
              <td> {{presupuesto.saldo}} </td>

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
        props: ['presupuestos'],
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
                let presupuesto = this.presupuestos[index];
                this.$emit('editar', presupuesto)
            },
            showRegistro(index){
                let presupuesto = this.presupuestos[index];
                console.log(presupuesto);
                this.$emit('show', presupuesto);
            }
        }
    }
</script>
