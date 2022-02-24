<template>
    <div class="container">
        <div>
            <b-tabs content-class="mt-3">
                <b-tab title="Alumnos" active
                    ><p>Alumnos</p>
                    <div>
                        <b-button
                            v-b-modal.modal-prevent-closing
                            @click="materias()"
                            >Agregar carga academica</b-button
                        >

                        <b-modal
                            id="modal-prevent-closing"
                            ref="modal"
                            title="Carga academica"
                            @show="resetModal"
                            @hidden="resetModal"
                            @ok="handleOk"
                        >
                            <form
                                ref="form"
                                @submit.stop.prevent="handleSubmit"
                            >
                                <b-form-group
                                    label="Alumno"
                                    label-for="name-input"
                                    invalid-feedback="Name is required"
                                    :state="nameState"
                                >
                                </b-form-group>
                                <select v-model="selected" @click="usuario()">
                                    <option disabled value="">
                                        Please select one
                                    </option>
                                    <option
                                        v-for="item in alumnos"
                                        :key="item.id"
                                    >
                                        {{ item.name }}
                                    </option>
                                </select>
                                <span>Selected: {{ selected }}</span>
                                <b-form-group
                                    label="Materias"
                                    label-for="edad-input"
                                    invalid-feedback="Name is required"
                                    :state="nameState"
                                >
                                    <div
                                        v-for="item in materias1"
                                        :key="item.id"
                                    >
                                        <input
                                            @click="suma(item.creditos)"
                                            type="checkbox"
                                            :id="item.id"
                                            :value="item.creditos"
                                            
                                        />
                                        <label for="jack">
                                            {{ item.nombre }}
                                        </label>

                                        <br />
                                    </div>
                                    <span
                                        >Suma de creditos: {{ checkedNames }}</span
                                    >
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
                                <th scope="col" colspan="2" class="text-center">
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="contact in personas"
                                :key="contact.id_Alumno"
                            >
                                <th scope="row">{{ contact.id_Alumno }}</th>
                                <td>{{ contact.nombreAlumno }}</td>
                                <td>{{ contact.nombre }}</td>
                                <td>{{ contact.creditos }}</td>
                                <td>{{ contact.semestre }}</td>
                                <td>{{ contact.maestro }}</td>
                                <td>
                                    <button
                                        @click="update = true"
                                        class="btn btn-warning"
                                    >
                                        Editar
                                    </button>
                                    <b-button v-b-modal.modal-prevent-closing
                                        >Open Modal</b-button
                                    >
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
                </b-tab>
                <b-tab title="Materias"
                    ><p>Materias</p>
                    <form ref="form">
                        <b-form-group
                            label="Maestro"
                            label-for="name-input"
                            invalid-feedback="Maestro es requerido"
                            :state="nameState"
                        >
                        </b-form-group>
                        <select v-model="idMateria" @click="maestroSM()">
                            <option disabled value="">
                                Seleccione una opcion
                            </option>
                            <option
                                v-for="item in maestrossinAsignacion"
                                :key="item.id"
                                v-bind:value="item.id"
                            >
                                {{ item.nombre }}
                            </option>
                        </select>

                        <b-form-group
                            label="Nombre materia"
                            label-for="edad-input"
                            invalid-feedback="Materia es requerido"
                            :state="nameState"
                        >
                            <b-form-input v-model="MateriaNombre" />
                        </b-form-group>
                        <b-form-group
                            label="semestre"
                            label-for="semestre-input"
                            invalid-feedback="Semestre es requerido"
                            :state="nameState"
                        >
                            <b-form-input
                                id="semestre-input"
                                :state="nameState"
                                type="number"
                                min="1"
                                max="11"
                                v-model="semestre"
                                required
                            ></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Creditos"
                            label-for="creditos-input"
                            invalid-feedback="Credito es requerido"
                            :state="nameState"
                        >
                            <b-form-input
                                id="creditos-input"
                                v-model="creditos"
                                :state="nameState"
                                type="number"
                                min="1"
                                max="5"
                                required
                            ></b-form-input>
                        </b-form-group>
                        <button
                            @click="AgregarMateria(1)"
                            class="btn btn-primary"
                        >
                            Enviar
                        </button>
                    </form>
                </b-tab>
            </b-tabs>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            selected: "",
            checkedNames: 0,
            name: "",
            nameState: null,
            edad: "",
            domicilio: "",
            submittedNames: [],
            personas: [],
            alumnos: [],
            persona: {
                nombre: "",
                edad: "",
                domicilio: "",
            },

            materias1: [],
            maestros: [],
            maestrossinAsignacion: [],
            materiasEnviar: {
                nombre: "",
                semestre: 0,
                creditos: 0,
                maestro_id: 0,
            },
            idMateria: 0,
            MateriaNombre: "",
            creditos: 0,
            semestre: 0,
        };
    },
    methods: {
        async list() {
            const res = await axios.get("cargaAcademica");
            this.personas = res.data;
        },
        async usuario() {
            const res = await axios.get("Usuario");
            this.alumnos = res.data;
        },
        
        async materias() {
            const materias1 = await axios.get("NomMaterias");
            this.materias1 = materias1.data;
        },
        async materiasMaestros() {
            const materias = await axios.get("Materias");
            this.materias = materias.data;
        },
        async maestro() {
            const res = await axios.get("maestros");
            this.maestros = res.data;
        },
        async maestroSM() {
            const res = await axios.get("maestrosSinAsignacion");
            this.maestrossinAsignacion = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/cargaAcademica/" + id);
            this.list();
        },
        async editar(id) {
            const res = await axios.put(
                "/cargaAcademica/" + this.id,
                this.persona
            );
            this.list();
        },
        async save(id) {
            const res = await axios.post("/cargaAcademica", this.persona);
        },
        async AgregarMateria(id) {
            this.materiasEnviar.nombre = this.MateriaNombre;
            this.materiasEnviar.semestre = this.semestre;
            this.materiasEnviar.creditos = this.creditos;
            this.materiasEnviar.idMateria = this.idMateria;
            const res = await axios.post("/Materias", this.materiasEnviar);
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
        suma(sum){
        this.checkedNames += sum;
            if(this.checkedNames>5){
                alert("no debes de tener mas de 30 creditos");
            }
        }
    },
    created() {
        this.list();
    },
};
</script>
