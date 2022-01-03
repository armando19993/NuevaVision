<template>
<div class="modal" id="showUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              <div class="text-center mb-2">
                <h1 class="mb-1">Editar Usuario</h1>
              </div>
              <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false" v-on:submit.prevent="updateRegistro()">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Nombre</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.name" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Usuario</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.user" />
                </div>
                <div class="col-12 col-md-12">
                  <label class="form-label" for="modalEditUserFirstName">Correo</label>
                  <input disabled type="text" class="form-control" placeholder="" v-model="editando.email" />
                </div>


                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Estado</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.status_user" class="form-select" aria-label="Default select example" >
                    <option value="0">Estado</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserStatus">Tipo de Usuario</label>
                  <select disabled id="modalEditUserStatus" name="modalEditUserStatus" v-model="editando.type_user" class="form-select" aria-label="Default select example" >
                    <option value="0">Tipo de Usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Abogado</option>
                    <option value="3">Tesorer@</option>
                    <option value="4">Secretari@</option>
                    <option value="5">Soci@</option>
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
    }
</script>
