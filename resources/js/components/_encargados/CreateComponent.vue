 <template>
    <div class="modal" id="createEncargado" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Crear Encargado</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="newRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cedula</label>
                  <input type="text" class="form-control" placeholder="" v-model="cedula" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Nombre</label>
                  <input type="text" class="form-control" placeholder="" v-model="nombre" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Correo</label>
                  <input type="text" class="form-control" placeholder="" v-model="email" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Telefono</label>
                  <input type="number" class="form-control" placeholder="" v-model="telefono" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Movil</label>
                  <input type="number" class="form-control" placeholder="" v-model="movil" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Direccion</label>
                  <input type="text" class="form-control" placeholder="" v-model="direccion" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Estado</label>
                  <select id="modalEditUserStatus" name="modalEditUserStatus" v-model="status" class="form-select" aria-label="Default select example" >
                    <option value="0">Estado</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
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
                cedula: '',
                nombre: '',
                telefono: '',
                movil: '',
                direccion: '',
                email: '',
                status: ''
            }
        },

        mounted() {
        },

        methods: {
            newRegistro() {
                const params = {
                    cedula: this.cedula,
                    nombre: this.nombre,
                    telefono: this.telefono,
                    movil: this.movil,
                    direccion: this.direccion,
                    email: this.email,
                    status: this.status,
                    id_creador: $("#usuario_id").val(),
                }

                axios.post('/api/encargados', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#createEncargado").modal('hide');

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
