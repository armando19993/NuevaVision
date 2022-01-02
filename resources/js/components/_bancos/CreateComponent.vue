 <template>
    <div class="modal" id="createBanco" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Crear Banco</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="newRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Siglas</label>
                  <input type="text" class="form-control" placeholder="" v-model="siglas" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <input type="text" class="form-control" placeholder="" v-model="cuenta" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Banco</label>
                  <input type="text" class="form-control" placeholder="" v-model="nombre" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe</label>
                  <input type="number" class="form-control" placeholder="" v-model="debe" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber</label>
                  <input type="number" class="form-control" placeholder="" v-model="haber" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Estado</label>
                  <select id="modalEditUserStatus" name="modalEditUserStatus" v-model="status" class="form-select" aria-label="Default select example" >
                    <option value="0">Estado</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Convenio</label>
                  <select id="modalEditUserStatus" name="modalEditUserStatus" v-model="convenio" class="form-select" aria-label="Default select example" >
                    <option value="0">Convenio</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
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
                siglas: '',
                cuenta: '',
                nombre: '',
                debe: '',
                haber: '',
                status: 0,
                convenio: 0,
            }
        },

        mounted() {
        },

        methods: {
            newRegistro() {
                const params = {
                    siglas: this.siglas,
                    nombre: this.nombre,
                    cuenta: this.cuenta,
                    debe: this.debe,
                    haber: this.haber,
                    status: this.status,
                    convenio: this.convenio
                }

                axios.post('/api/bancos', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#createBanco").modal('hide');

                    this.siglas = '';
                    this.nombre = '';
                    this.cuenta = '';
                    this.debe = '';
                    this.haber = '';
                    this.status = 0;
                    this.convenio = 0;
                })
            }
        }
    }
</script>
