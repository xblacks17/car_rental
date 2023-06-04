<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="no-bottom no-top zebra" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                <img
                    src="images/background/2.jpg"
                    class="jarallax-img"
                    alt=""
                />
                <div class="center-y relative text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 style="color: black">{{ car.make }}</h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-car-details">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="d-img">
                                <img
                                    :src="`/storage/${car.image_url}`"
                                    class="img-fluid"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <h3>{{ car.make }}</h3>
                            <p>
                                {{ car.description }}
                            </p>

                            <div class="spacer-10"></div>

                            <h4>Specifications</h4>
                            <div class="de-spec">
                                <div class="d-row">
                                    <span class="d-title">Make</span>
                                    <spam class="d-value">{{ car.make }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Model</span>
                                    <spam class="d-value">{{ car.model }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Mileage</span>
                                    <spam class="d-value">{{
                                        car.mileage
                                    }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Company</span>
                                    <spam class="d-value">{{
                                        car.company?.name
                                    }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Unit Price</span>
                                    <spam class="d-value">{{
                                        car.unit_price
                                    }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Location</span>
                                    <spam class="d-value">{{
                                        car.location
                                    }}</spam>
                                </div>
                            </div>

                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="de-price text-center">
                                Daily rate
                                <h3>${{ car.unit_price }}</h3>
                            </div>
                            <div class="spacer-30"></div>
                            <div class="de-box mb25">
                                <form
                                    name="contactForm"
                                    id="contact_form"
                                    @submit.prevent="submitBook"
                                >
                                    <h4>Booking this car</h4>

                                    <div class="spacer-20"></div>

                                    <div class="row">
                                        <div class="col-lg-12 mb20">
                                            <h5>Drop Off Location</h5>
                                            <select
                                                name="Pick Up Time"
                                                id="pickup-time"
                                                class="form-control"
                                                v-model="form.drop_location"
                                            >
                                                <option
                                                    selected
                                                    disabled
                                                    value="Select Drop Off Location"
                                                >
                                                    Location
                                                </option>
                                                <option
                                                    :value="location"
                                                    v-for="location in locations"
                                                >
                                                    {{ location }}
                                                </option>
                                            </select>
                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.drop_location"
                                            />
                                        </div>

                                        <div class="col-lg-12 mb20">
                                            <h5>Start Date & Time</h5>
                                            <div class="date-time-field">
                                                <input
                                                    type="datetime-local"
                                                    id="date-picker"
                                                    name="Start Date Time"
                                                    class="form-control"
                                                    v-model="
                                                        form.start_date_time
                                                    "
                                                />
                                                <InputError
                                                class="mt-2"
                                                :message="form.errors.start_date_time"
                                            />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb20">
                                            <h5>End Date & Time</h5>
                                            <div class="date-time-field">
                                                <input
                                                    type="datetime-local"
                                                    id="date-picker"
                                                    name="End Date Time"
                                                    class="form-control"
                                                    v-model="form.end_date_time"
                                                />
                                                <InputError
                                                class="mt-2"
                                                :message="form.errors.end_date_time"
                                            />
                                            </div>
                                        </div>
                                    </div>

                                    <input
                                        type="submit"
                                        id="send_message"
                                        :disabled="form.processing"
                                        value="Book Now"
                                        class="btn-main btn-fullwidth"
                                    />

                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>

<script>
import AdminDashboard from "@/Layouts/AdminDashboard.vue";
import { useForm } from "@inertiajs/vue3";
export default {
    components: {
        AdminDashboard,
    },
    props: ["car"],

    data() {
        return {
            form: useForm({
                vehicle_id: this.car.id,
                start_date_time: "",
                end_date_time: "",
                drop_location: "",
            }),

            locations: ["Airport", "CBD", "Westgate", "Samy Levy", "Chisipite"],
        };
    },

    methods: {
        submitBook() {
            this.form.post(route("bookings.store"), {
                onFinish: () => this.form.reset(),
            });
        },
    },
};
</script>
