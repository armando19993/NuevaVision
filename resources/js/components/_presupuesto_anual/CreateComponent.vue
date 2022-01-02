 <template>
    <div class="modal" id="createPresupuesto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Crear Presupesto Anual</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="newRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Codigo</label>
                  <input type="text" class="form-control" placeholder="" v-model="codigo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Nombre</label>
                  <input type="text" class="form-control" placeholder="" v-model="nombre" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Asignacion</label>
                  <input type="number" step="0.01" class="form-control" placeholder="" v-model="asignacion" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Periodo</label>
                  <v-select label="label" :options="periodos" :reduce="(periodo) => periodo.id" :value.sync="periodo.id" v-model="periodo" ></v-select>
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <v-select label="cuenta" :options="cuentas" :reduce="(cuenta) => cuenta.id" :value.sync="cuenta.id" v-model="cuenta" ></v-select>
                </div>





                <div class="col-12 text-center mt-2 pt-50">
                  <button type="submit" class="btn btn-primary me-1">Guardar</button>
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
        data()
        {
            return {
                codigo: '',
                nombre: '',
                asignacion: '',
                gasto: '',
                saldo: '',
                periodo: 0,
                cuenta: 0,
                cuentas: [],
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
                ]
            }
        },

        mounted() {
            axios.get('/api/planes-cuenta').then((response) => {
                this.cuentas = response.data
            });
        },

        methods: {
            newRegistro() {
                const params = {
                    codigo: this.codigo,
                    nombre: this.nombre,
                    asignacion: this.asignacion,
                    cuenta: this.cuenta,
                    periodo: this.periodo,
                    id_creador: $("#usuario_id").val(),
                }

                axios.post('/api/presupuesto-anual', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#createPresupuesto").modal('hide');

                    this.codigo = '';
                    this.nombre = '';
                    this.asignacion = '';
                    this.gasto = '';
                    this.saldo = '';
                    this.cuenta = 0;
                    this.periodo = 0;
                })
            }
        }
    }
</script>
