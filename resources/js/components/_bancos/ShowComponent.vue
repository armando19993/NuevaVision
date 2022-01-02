<template>
<div class="modal" id="showBanco" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Crear Banco</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="updateRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Siglas</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.siglas" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.cuenta" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Banco</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.nombre" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe</label>
                  <input disabled type="number" class="form-control" placeholder="" v-model="editando.debe" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber</label>
                  <input disabled type="number" class="form-control" placeholder="" v-model="editando.haber" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Estado</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.status" class="form-select" aria-label="Default select example" >
                    <option value="0">Estado</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Convenio</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.convenio" class="form-select" aria-label="Default select example" >
                    <option value="0">Convenio</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
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
            }
        },

        mounted() {
        },

        methods: {
            updateRegistro()
            {
                const params = {
                    id: this.editando.id,
                    siglas: this.editando.siglas,
                    cuenta: this.editando.cuenta,
                    nombre: this.editando.nombre,
                    debe: this.editando.debe,
                    haber: this.editando.haber,
                    status: this.editando.status,
                    convenio: this.editando.convenio
                }

                axios.put('/api/bancos', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#editBanco").modal('hide');

                    this.editando.siglas = '';
                    this.editando.cuenta = '';
                    this.editando.nombre = '';
                    this.editando.debe = '';
                    this.editando.haber = '';
                    this.editando.convenio = 0;
                    this.editando.status = 0;
                })

            }
        }
    }
</script>
