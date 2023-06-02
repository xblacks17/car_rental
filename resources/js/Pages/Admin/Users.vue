<template>
    <AdminDashboard title="Users">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5 mb25">
                <h4>Users</h4>

                <button
                    type="button"
                    class="btn-main"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    Create New
                </button>

                <table class="table de-table" v-if="users.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >ID</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Full Name</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Email</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Phone Number</span
                                >
                            </th>

                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >User Type
                                </span>
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Action
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    user.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ user.id }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    user.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ user.name }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    user.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ user.email }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    user.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ user.phone_number }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    user.id
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ user.user_type }}
                                </div>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    style="margin-right: 10px"
                                    @click="deleteUser(user)"
                                >
                                    Delete
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    @click="edit(user)"
                                    data-bs-target="#exampleModal"
                                >
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    <p class="text-center">No Companies Found</p>
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
                            Create New User
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
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    v-model="form.name"
                                    placeholder="User Name"
                                />
                            </div>
                            <div class="field-set">
                                <label for="name">Phone Number</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    v-model="form.phone_number"
                                />
                            </div>
                            <div class="field-set">
                                <label for="name">Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    v-model="form.email"
                                    placeholder="Email"
                                />
                            </div>

                            <div class="field-set">
                                <label for="name">Password</label>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    v-model="form.password"
                                    placeholder=""
                                />
                            </div>

                            <div class="field-set">
                                <label for="name">User Type</label>
                                <select
                                    name="cars"
                                    v-model="form.user_type"
                                    id="cars"
                                >
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
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
    props: ["users"],

    data() {
        return {
            form: useForm({
                name: "",
                id: "",
                email: "",
                password: "",
                phone_number: "",
                user_type: "",
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
            this.form.post(route("users.add"), {
                onFinish: () => this.form.reset(),
            });
        },
        edit(user) {
            this.isEdit = true;
            this.form.name = user.name;
            this.form.id = user.id;
            this.form.email = user.email;
            this.form.password = user.password;
            this.form.phone_number = user.phone_number;
            this.form.user_type = user.user_type;
        },

        deleteUser(user) {
            this.form.delete(`/admin/users/${user.id}`, {
                onFinish: () => {
                    this.form.reset();
                },
            });
        },

        submitEdit() {
            // console.log(this.form.id);
            this.form.put(`/admin/users/${this.form.id}`, this.form, {
                onFinish: () => {
                    this.form.reset();
                    this.isEdit = false;
                },
            });
        },
    },
};
</script>
