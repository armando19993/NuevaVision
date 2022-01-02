require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue'
import vSelect from 'vue-select'
import VueFormWizard from 'vue-form-wizard'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';


Vue.component('v-select', vSelect);
Vue.use(VueFormWizard);
Vue.use(ElementUI);


//Modulo Usuarios
Vue.component( 'usuarios-component', require( './components/UsuariosComponent.vue' ).default );
Vue.component( 'usuario-list-component', require( './components/_usuarios/ListComponent.vue' ).default);
Vue.component( 'usuario-create-component', require( './components/_usuarios/CreateComponent.vue' ).default);
Vue.component( 'usuario-edit-component', require( './components/_usuarios/EditComponent.vue' ).default);
Vue.component( 'usuario-show-component', require( './components/_usuarios/ShowComponent.vue' ).default);
//Fin Modulo Usuarios

//Modulo Plan de Cuentas
Vue.component( 'plan-cuenta-component', require( './components/PlanCuentaComponent.vue' ).default );
Vue.component( 'plan-cuenta-list-component', require( './components/_plan-cuenta/ListComponent.vue' ).default);
Vue.component( 'plan-cuenta-create-component', require( './components/_plan-cuenta/CreateComponent.vue' ).default);
Vue.component( 'plan-cuenta-edit-component', require( './components/_plan-cuenta/EditComponent.vue' ).default);
Vue.component( 'plan-cuenta-show-component', require( './components/_plan-cuenta/ShowComponent.vue' ).default);
//Fin Modulo Plan de Cuentas

//Modulo Bancos
Vue.component( 'bancos-component', require( './components/BancosComponent.vue' ).default );
Vue.component( 'banco-list-component', require( './components/_bancos/ListComponent.vue' ).default);
Vue.component( 'banco-create-component', require( './components/_bancos/CreateComponent.vue' ).default);
Vue.component( 'banco-edit-component', require( './components/_bancos/EditComponent.vue' ).default);
Vue.component( 'banco-show-component', require( './components/_bancos/ShowComponent.vue' ).default);
//Fin Modulo Bancos

//Modulo Aportes
Vue.component( 'aportes-component', require( './components/AportesComponent.vue' ).default );
Vue.component( 'aporte-list-component', require( './components/_aportes/ListComponent.vue' ).default);
Vue.component( 'aporte-create-component', require( './components/_aportes/CreateComponent.vue' ).default);
Vue.component( 'aporte-edit-component', require( './components/_aportes/EditComponent.vue' ).default);
Vue.component( 'aporte-show-component', require( './components/_aportes/ShowComponent.vue' ).default);
//Fin Modulo Aportes

//Modulo Encargados
Vue.component( 'encargados-component', require( './components/EncargadosComponent.vue' ).default );
Vue.component( 'encargado-list-component', require( './components/_encargados/ListComponent.vue' ).default);
Vue.component( 'encargado-create-component', require( './components/_encargados/CreateComponent.vue' ).default);
Vue.component( 'encargado-edit-component', require( './components/_encargados/EditComponent.vue' ).default);
Vue.component( 'encargado-show-component', require( './components/_encargados/ShowComponent.vue' ).default);
//Fin Modulo Encargados

//Modulo Presupuesto Anual
Vue.component( 'presupuesto-anual-component', require( './components/PresupuestoAnualComponent.vue' ).default );
Vue.component( 'presupuesto-anual-list-component', require( './components/_presupuesto_anual/ListComponent.vue' ).default);
Vue.component( 'presupuesto-anual-create-component', require( './components/_presupuesto_anual/CreateComponent.vue' ).default);
Vue.component( 'presupuesto-anual-edit-component', require( './components/_presupuesto_anual/EditComponent.vue' ).default);
Vue.component( 'presupuesto-anual-show-component', require( './components/_presupuesto_anual/ShowComponent.vue' ).default);
//Fin Modulo Presupuesto Anual


//Modulo Proveedores
Vue.component( 'proveedores-component', require( './components/ProveedoresComponent.vue' ).default );
Vue.component( 'proveedor-list-component', require( './components/_proveedores/ListComponent.vue' ).default);
Vue.component( 'proveedor-create-component', require( './components/_proveedores/CreateComponent.vue' ).default);
Vue.component( 'proveedor-edit-component', require( './components/_proveedores/EditComponent.vue' ).default);
Vue.component( 'proveedor-show-component', require( './components/_proveedores/ShowComponent.vue' ).default);
//Fin Modulo Proveedores

//Modulo Proveedores
Vue.component( 'ordenes-compras-component', require( './components/OrdenesCompraComponent.vue' ).default );
Vue.component( 'orden-compra-list-component', require( './components/_ordenes_compra/ListComponent.vue' ).default);
Vue.component( 'orden-compra-create-component', require( './components/_ordenes_compra/CreateComponent.vue' ).default);
Vue.component( 'orden-compra-edit-component', require( './components/_ordenes_compra/EditComponent.vue' ).default);
Vue.component( 'orden-compra-show-component', require( './components/_ordenes_compra/ShowComponent.vue' ).default);
//Fin Modulo Proveedores

//Modulo Socios
Vue.component( 'socios-component', require( './components/SociosComponent.vue' ).default );
Vue.component( 'socios-list-component', require( './components/_socios/ListComponent.vue' ).default);
Vue.component( 'socios-create-component', require( './components/_socios/CreateComponent.vue' ).default);
Vue.component( 'socios-edit-component', require( './components/_socios/EditComponent.vue' ).default);
Vue.component( 'socios-show-component', require( './components/_socios/ShowComponent.vue' ).default);
//Fin Modulo Socios

//Modulo AportesSocios
Vue.component( 'aportes-socios-component', require( './components/AportesSociosComponent.vue' ).default);
Vue.component( 'aportes-socios-create-component', require( './components/_aportes_socios/CreateComponent.vue' ).default);
Vue.component( 'aportes-socios-list-component', require( './components/_aportes_socios/ListComponent.vue' ).default);
Vue.component( 'aportes-socios-edit-component', require( './components/_aportes_socios/EditComponent.vue' ).default);
Vue.component( 'aportes-socios-edit-total-component', require( './components/_aportes_socios/EditComponent2.vue' ).default);
//Fin Modulo AportesSocios

//Modulo Socios
Vue.component( 'procesos-component', require( './components/ProcesosComponent.vue' ).default );
Vue.component( 'procesos-list-component', require( './components/_procesos/ListComponent.vue' ).default);
Vue.component( 'procesos-create-component', require( './components/_procesos/CreateComponent.vue' ).default);
Vue.component( 'procesos-edit-component', require( './components/_procesos/EditComponent.vue' ).default);
//Fin Modulo Socios

const app = new Vue({
    el: '#app',
});
