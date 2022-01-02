<template>
<div class="modal" id="showAporte" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Editar Aporte</h1>

              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="updateRegistro()">

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Aporte</label>
                  <input  disabled type="number" class="form-control" placeholder="" v-model="editando.aporte" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Año</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.ano" class="form-select" aria-label="Default select example" >
                    <option value="0">Año</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                  </select>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Tipo de Aporte</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.tipo_aporte" class="form-select" aria-label="Default select example" >
                    <option value="0">Tipo</option>
                    <option value="APORTE">Aporte</option>
                    <option value="INSCRIPCION">Inscripcion</option>
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

        }
    }
</script>
