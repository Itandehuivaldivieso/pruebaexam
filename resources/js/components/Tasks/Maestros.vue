<template>
    <div class="container">
        <div>
            <b-button v-b-modal.modal-prevent-closing>Agregar carga academica</b-button>

            <b-modal
                id="modal-prevent-closing"
                ref="modal"
                title="Carga academica"
                @show="resetModal"
                @hidden="resetModal"
                @ok="handleOk"
            >
                <form ref="form" @submit.stop.prevent="handleSubmit">
                    <b-form-group
                        label="Name"
                        label-for="name-input"
                        invalid-feedback="Name is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="name-input"
                            v-model="persona.nombre"
                            :state="nameState"
                            required
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        label="Edad"
                        label-for="edad-input"
                        invalid-feedback="Name is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="edad-input"
                            v-model="persona.edad"
                            :state="nameState"
                            type="number"
                            min="0"
                            required
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group
                        label="Domicilio"
                        label-for="domicilio-input"
                        invalid-feedback="Domicilio is required"
                        :state="nameState"
                    >
                        <b-form-input
                            id="domicilio-input"
                            v-model="persona.domicilio"
                            :state="nameState"
                            required
                        ></b-form-input>
                    </b-form-group>
                </form>
            </b-modal>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del alumno</th>
                    <th scope="col"># materias</th>
                    <th scope="col">#creditos</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Maestro</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in personas" :key="contact.id_Alumno" >
                   
                    <th scope="row">{{ contact.id_Alumno }}</th>
                    <td>{{ contact.nombreAlumno }}</td>
                    <td>{{ contact.nombre }}</td>
                    <td>{{ contact.creditos }}</td>
                    <td>{{ contact.semestre }}</td>
                    <td>{{ contact.maestro }}</td>
                    <td>
                        <button @click="update=true; " class="btn btn-warning">Editar</button>
                        <b-button  v-b-modal.modal-prevent-closing>Open Modal</b-button>
                    </td>
                    <td>
                        <button
                            @click="eliminar(contact.id_Alumno)"
                            class="btn btn-danger"
                        >
                            Eliminar
                        </button>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            name: "",
            nameState: null,
            edad: "",
            domicilio: "",
            submittedNames: [],
            personas: [],
            persona: {
                nombre: "",
                edad: "",
                domicilio: "",
            },
            maestros:[]
        };
    },
    methods: {
        async list() {
            const res = await axios.get("cargaAcademica");
            this.personas = res.data;
        },
        async maestro (){
            const res = await axios.get("maestros");
            this.maestros = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/cargaAcademica/" + id);
            this.list();
        },
        async editar(id){
            const res = await axios.put("/cargaAcademica/"+ this.id, this.persona);
            this.list();

        },
        async save(id){
            const res = await axios.post('/cargaAcademica', this.persona);
        },
        checkFormValidity() {
            const valid = this.$refs.form.checkValidity();
            this.nameState = valid;
            return valid;
        },
        resetModal() {
            this.name = "";
            this.nameState = null;
        },
        handleOk(bvModalEvt, data = {}) {
            // Prevent modal from closing
            bvModalEvt.preventDefault();
                this.persona.nombre = data.nombre;
                this.persona.creditos = data.creditos;
                this.persona.semestre = data.semestre;
                this.persona.maestro = data.maestro;
            
            // Trigger submit handler
            this.handleSubmit();
        },
        handleSubmit() {
            // Exit when the form isn't valid
            if (!this.checkFormValidity()) {
                return;
            }
            // Push the name to submitted names
            this.submittedNames.push(this.name);
            // Hide the modal manually
            this.$nextTick(() => {
                this.$bvModal.hide("modal-prevent-closing");
            });
        },
    },
    created() {
        this.list();
    },
};
</script>
