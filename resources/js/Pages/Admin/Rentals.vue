<template>
    <AdminDashboard title="Books">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5 mb25">
                <h4>Books</h4>

                <button
                    type="button"
                    class="btn-main"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    Create New
                </button>

                <table class="table de-table" v-if="rentals.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >ID</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Vehicle</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Customer</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >PickUp Date</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >DropOff Date</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Status</span
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
                        <tr v-for="rental in rentals">
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.id }}
                                </div>
                            </td>

                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.vehicle_id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.car.make }}
                                </div>
                            </td>

                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.user.name
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.user.name }}
                                </div>
                            </td>

                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.start_date_time
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.start_date_time }}
                                </div>
                            </td>

                            

                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.end_date_time
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.end_date_time }}
                                </div>
                            </td>

                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.status
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.status }}
                                </div>
                            </td>

                            <td>
                                <a
                                    href="#"
                                    class="btn-main"
                                    @click="submitApprove(rental)"
                                >
                                    Approve
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    <p>No Rentals Found</p>
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
                            Create New Rental
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
                                    name="vehicle_id"
                                    id="vehicle_id"
                                    class="form-control"
                                    v-model="form.vehicle_id"
                                    placeholder="Vehicle"
                                />
                                <input
                                    type="text"
                                    name="user_id"
                                    id="user_id"
                                    class="form-control"
                                    v-model="form.user_id"
                                    placeholder="Customer"
                                />
                                <input
                                    type="date"
                                    name="date"
                                    id="date"
                                    class="form-control"
                                    v-model="form.pickup_date"
                                />
                                <input
                                    type="date"
                                    name="date"
                                    id="date"
                                    class="form-control"
                                    v-model="form.dropoff_date"
                                />
                                <input
                                    type="text"
                                    name="location"
                                    id="location"
                                    class="form-control"
                                    v-model="form.dropoff_date"
                                    placeholder="DropOff Location"
                                />
                                <input
                                    type="text"
                                    name="status"
                                    id="status"
                                    class="form-control"
                                    v-model="form.status"
                                />
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
    data() {
        return {
            form: useForm({
                id: "",
                vehicle_id: "",
                user_id: "",
                pickup_date: "",
                dropoff_date: "",
                dropoff_location: "",
                status: "",
            }),
            approveRentalForm: useForm({
                rental_id: "",
            }),

            isEdit: false,
        };
    },

    props: ["rentals"],
    methods: {
        submit() {
            if (this.isEdit) {
                this.submitEdit();
            } else {
                this.submitCreate();
            }
        },
        submitCreate() {
            this.form.post(route("rentals.add"), {
                onFinish: () => form.reset(),
            });
        },
        edit(rental) {
            this.isEdit = true;
            this.form.id = rental.id;
            this.form.vehicle_id = rental.vehicle_id;
            this.form.user_id = rental.user_id;
            this.form.pickup_date = rental.pickup_date;
            this.form.dropoff_date = rental.dropoff_date;
            this.form.dropoff_location = rental.dropoff_location;
            this.form.status = rental.status;
        },

        deleteCompany(rental) {
            this.form.delete(`/admin/rentals/${rental.id}`, {
                onFinish: () => {
                    this.form.reset();
                },
            });
        },

        submitEdit() {
            // console.log(this.form.id);
            this.form.put(`/admin/rentals/${this.form.id}`, this.form, {
                onFinish: () => {
                    this.form.reset();
                    this.isEdit = false;
                },
            });
        },

        submitApprove(rental) {
            const form = useForm({
                rental_id: rental.id,
            });

            form.post(route("rentals.approve"), {
                onFinish: () => form.reset(),
            });
        },
    },
};
</script>
