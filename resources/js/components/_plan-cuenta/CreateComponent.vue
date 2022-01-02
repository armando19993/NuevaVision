 <template>
    <div class="modal" id="createPlan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Crear Plan de Cuenta</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="newRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Codigo</label>
                  <input type="text" class="form-control" placeholder="" v-model="codigo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cedula Presupuestaria</label>
                  <input type="text" class="form-control" placeholder="" v-model="cedula_presupuestaria" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <input type="text" class="form-control" placeholder="" v-model="cuenta" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe Inicial</label>
                  <input type="number" class="form-control" placeholder="" v-model="debe_inicial" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber Inicial</label>
                  <input type="number" class="form-control" placeholder="" v-model="haber_inicial" />
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
                cedula_presupuestaria: '',
                cuenta: '',
                debe_inicial: '',
                haber_inicial: '',
            }
        },

        mounted() {
        },

        methods: {
            newRegistro() {
                const params = {
                    codigo: this.codigo,
                    cedula_presupuestaria: this.cedula_presupuestaria,
                    cuenta: this.cuenta,
                    debe_inicial: this.debe_inicial,
                    haber_inicial: this.haber_inicial,
                }

                axios.post('/api/planes-cuenta', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#createPlan").modal('hide');

                    this.codigo = '';
                    this.cedula_presupuestaria = '';
                    this.cuenta = '';
                    this.debe_inicial = '';
                    this.haber_inicial = '';
                })
            }
        }
    }
</script>
