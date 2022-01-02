<template>
    <div class="modal" id="showPresupuesto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Editar Presupesto Anual</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="updateRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Codigo</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.codigo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Nombre</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.nombre" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Asignacion</label>
                  <input disabled type="number" step="0.01" class="form-control" placeholder="" v-model="editando.asignacion" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Gastos</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.gasto" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Saldo</label>
                  <input disabled type="number" step="0.01" class="form-control" placeholder="" v-model="editando.saldo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Periodo</label>
                  <v-select disabled label="label" :options="periodos" :reduce="(periodo) => periodo.id" :value.sync="editando.periodo" v-model="editando.periodo" ></v-select>
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <v-select disabled label="cuenta" :options="cuentas" :reduce="(cuenta) => cuenta.id" :value.sync="editando.cuenta" v-model="editando.cuenta" ></v-select>
                </div>



                <div class="col-12 text-center mt-2 pt-50">
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Cerrar">
                    Cerrar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
    export default {
        props: ['editando'],
        data()
        {
            return {
                periodos: [
                    {
                        label: 2021,
                        value: 2021,
                        id: 2021
                    },
                    {
                        label: 2022,
                        value: 2022,
                        id: 2022
                    },
                    {
                        label: 2020,
                        value: 2020,
                        id: 2020
                    },
                    {
                        label: 2019,
                        value: 2019,
                        id: 2019
                    }
                ],
                cuentas: []
            }
        },

        mounted() {
            axios.get('/api/planes-cuenta').then((response) => {
                this.cuentas = response.data
            });
        },

        methods: {

        }
    }
</script>
