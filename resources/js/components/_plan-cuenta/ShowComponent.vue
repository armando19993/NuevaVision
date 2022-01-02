<template>
<div class="modal" id="showPlan" tabindex="-1" aria-hidden="true">
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
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.codigo" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Cedula Presupuestaria</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.cedula_presupuestaria" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Cuenta</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.cuenta" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe Inicial</label>
                  <input disabled type="number" class="form-control" placeholder="" v-model="editando.debe_inicial" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber Inicial</label>
                  <input disabled type="number" class="form-control" placeholder="" v-model="editando.haber_inicial" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Debe </label>
                  <input disabled type="number" step="0.01" class="form-control" placeholder="" v-model="editando.debe" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Haber </label>
                  <input disabled type="number" step="0.01" class="form-control" placeholder="" v-model="editando.haber" />
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

        }
    }
</script>
