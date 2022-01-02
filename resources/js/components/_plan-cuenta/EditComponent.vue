<template>
<div class="modal" id="editPlan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Editar Plan de Cuenta</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="updateRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Codigo</label>
                  <input type="text" class="form-control" placeholder="" v-model="editando.codigo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cedula Presupuestaria</label>
                  <input type="text" class="form-control" placeholder="" v-model="editando.cedula_presupuestaria" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <input type="text" class="form-control" placeholder="" v-model="editando.cuenta" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe Inicial</label>
                  <input type="number" class="form-control" placeholder="" v-model="editando.debe_inicial" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber Inicial</label>
                  <input type="number" class="form-control" placeholder="" v-model="editando.haber_inicial" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe </label>
                  <input type="number" step="0.01" class="form-control" placeholder="" v-model="editando.debe" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber </label>
                  <input type="number" step="0.01" class="form-control" placeholder="" v-model="editando.haber" />
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
      </div></template>

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
                    codigo: this.editando.codigo,
                    cedula_presupuestaria: this.editando.cedula_presupuestaria,
                    cuenta: this.editando.cuenta,
                    debe_inicial: this.editando.debe_inicial,
                    haber_inicial: this.editando.haber_inicial,
                    debe: this.editando.debe,
                    haber: this.editando.haber,
                    id: this.editando.id
                }

                axios.put('/api/planes-cuenta', params).then((response) => {
                    console.log(response.data);
                    this.$emit('new');
                    $("#editPlan").modal('hide');

                    this.editando.cuenta = '';
                    this.editando.haber = '';
                    this.editando.debe = '';
                    this.editando.codigo = '';
                    this.editando.haber_inicial = '';
                    this.editando.debe_inicial = '';
                    this.editando.cedula_presupuestaria = '';
                })

            }
        }
    }
</script>
