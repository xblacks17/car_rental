<template>
    <AdminDashboard title="Users">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5 mb25">
                <h4>Cars</h4>

                <button
                    type="button"
                    class="btn-main"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    Create New
                </button>

                <table class="table de-table" v-if="cars.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >ID</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Make</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Model</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Description</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Reg Number</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Image</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Location</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Status</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Unit price</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Mileage</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Company</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Action</span
                                >
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="car in cars">
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.id }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.make
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.make }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.model
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.model }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.description
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.description }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.reg_number
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.reg_number }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.image
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.image }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.location
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.location }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.status
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.status }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.unit_price
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.unit_price }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.mileage
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.mileage }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    car.company
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ car.company.name }}
                                </div>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    @click="edit(car)"
                                    data-bs-target="#exampleModal"
                                >
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    @click="deleteCar(car)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" v-else>
                    <p>No cars found.</p>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Create New Car
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form
                            id="form_register"
                            class="form-border"
                            @submit.prevent="submit"
                        >
                            <div class="field-set">
                                <input
                                    type="text"
                                    name="make"
                                    id="make"
                                    class="form-control"
                                    v-model="form.make"
                                    placeholder="Vehicle Make"
                                />
                                <input
                                    type="text"
                                    name="model"
                                    id="model"
                                    class="form-control"
                                    v-model="form.model"
                                    placeholder="Vehicle Model"
                                />
                                <input
                                    type="text"
                                    name="description"
                                    id="description"
                                    class="form-control"
                                    v-model="form.description"
                                    placeholder="Vehicle Description"
                                />
                                <input
                                    type="text"
                                    name="reg_number"
                                    id="reg_number"
                                    class="form-control"
                                    v-model="form.reg_number"
                                    placeholder="Vehicle Registration Number"
                                />
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control"
                                    @change="onFileChange"
                                    placeholder="Vehicle Image"
                                />
                                <input
                                    type="text"
                                    name="location"
                                    id="location"
                                    class="form-control"
                                    v-model="form.location"
                                    placeholder="Vehicle Location"
                                />
                                <input
                                    type="text"
                                    name="status"
                                    id="status"
                                    class="form-control"
                                    v-model="form.status"
                                    placeholder="Vehicle Status"
                                />
                                <input
                                    type="text"
                                    name="unit_price"
                                    id="unit_price"
                                    class="form-control"
                                    v-model="form.unit_price"
                                    placeholder="Vehicle Unit Price"
                                />
                                <input
                                    type="text"
                                    name="mileage"
                                    id="mileage"
                                    class="form-control"
                                    v-model="form.mileage"
                                    placeholder="Vehicle Mileage"
                                />
                                <div class="field-set">
                                    <label for="name">Company</label>
                                    <select
                                        name="cars"
                                        v-model="form.company_id"
                                        id="cars"
                                    >
                                        <option
                                            :value="company.id"
                                            v-for="company in companies"
                                        >
                                            {{ company.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div id="submit">
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn-main"
                                        data-bs-dismiss="modal"
                                    >
                                        Close
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn-main"
                                        :disabled="form.loading"
                                    >
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboard>
</template>

<script>
import AdminDashboard from "@/Layouts/AdminDashboard.vue";
import { useForm } from "@inertiajs/vue3";
export default {
    components: {
        AdminDashboard,
    },
    props: ["cars", "companies"],

    data() {
        return {
            form: useForm({
                name: "",
                id: "",
                created_at: "",
                make: "",
                model: "",
                reg_number: "",
                description: "",
                image_url: "",
                location: "",
                status: "",
                unit_price: "",
                mileage: "",
                company_id: "",
            }),

            isEdit: false,
        };
    },

    methods: {
        submit() {
            if (this.isEdit) {
                this.submitEdit();
            } else {
                this.submitCreate();
            }
        },
        submitCreate() {
            this.form.post(route("cars.add"), {
                onFinish: () => this.form.reset(),
            });
        },
        edit(car) {
            this.isEdit = true;
            this.form.name = car.name;
            this.form.id = car.id;
            this.form.created_at = car.created_at;
            this.form.make = car.make;
            this.form.model = car.model;
            this.form.reg_number = car.reg_number;
            this.form.location = car.location;
            this.form.status = car.status;
            this.form.unit_price = car.unit_price;
            this.form.mileage = car.mileage;
            this.form.company_id = car.company_id;
            this.form.description = car.description;
        },
        onFileChange(e) {
            const file = e.target.files[0];
            if (!file) {
                return;
            }
            this.form.image_url = file;
        },

        deleteCar(car) {
            this.form.delete(`/admin/cars/${car.id}`, {
                onFinish: () => {
                    this.form.reset();
                },
            });
        },

        submitEdit() {
            // console.log(this.form.id);
            this.form.put(`/admin/cars/${this.form.id}`, this.form, {
                onFinish: () => {
                    this.form.reset();
                    this.isEdit = false;
                },
            });
        },
    },
};
</script>
