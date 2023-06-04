<template>
    <UserDashboard title="Books">
        <div class="col-lg-9">
            <div class="card p-4 rounded-5 mb25">
                <h4>My Rentals</h4>

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
                                    >PickUp Date</span
                                >
                            </th>
                            <th scope="col">
                                <span class="text-uppercase fs-12 text-gray"
                                    >Drop Location</span
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
                                    rental.start_date_time
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.start_date_time }}
                                </div>
                            </td>
                            <td>
                                <span class="d-lg-none d-sm-block">{{
                                    rental.drop_location
                                }}</span>
                                <div class="badge bg-gray-100 text-dark">
                                    {{ rental.drop_location }}
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
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    <p>No Rentals Found</p>
                </div>
            </div>
        </div>
    </UserDashboard>
</template>

<script>
import AdminDashboard from "@/Layouts/AdminDashboard.vue";
import UserDashboard from "@/Layouts/UserDashboard.vue";
export default {
    components: {
        AdminDashboard,
        UserDashboard,
    },
    data() {
        return {
            isEdit: false,
        };
    },

    props: ["rentals"],
    methods: {},
};
</script>
