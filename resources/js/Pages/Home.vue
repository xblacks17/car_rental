<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section
                id="section-hero"
                aria-label="section"
                class="jarallax no-top no-bottom"
                style="background-image: url(images/car-back.jpg); background-repeat: none;background-size: 100%;"
            >
                <div class="overlay-bg no-top no-bottom">
                    <div class="v-center">
                        <div class="container position-relative z1000">
                            <div
                                class="spacer-double d-lg-none d-sm-block"
                            ></div>
                            <div
                                class="spacer-double d-lg-none d-sm-block"
                            ></div>
                            <div
                                class="spacer-double d-lg-none d-sm-block"
                            ></div>
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-light">
                                    <h4>
                                        <span class="id-color"
                                            >Fast and Easy Way to Rent a
                                            Car in Harare</span
                                        >
                                    </h4>
                                    <div class="spacer-10"></div>
                                    <h1 class="mb-2">
                                        Explore the world with comfortable car
                                    </h1>
                                    <div class="spacer-10"></div>
                                    <p class="lead">
                                        Embark on unforgettable adventures and
                                        discover the world in unparalleled
                                        comfort and style with our fleet of
                                        exceptionally comfortable cars.
                                    </p>
                                </div>

                                <div class="col-lg-6 card" >
                                    <div class="spacer-single sm-hide"></div>
                                    <div
                                        class="p-4 rounded-3 shadow-soft text-light"
                                        data-bgcolor="rgba(0, 0, 0, .6)"
                                    >
                                        <form
                                            name="contactForm"
                                            id="contact_form"
                                        >

                                            <div
                                                class="de_form de_radio row g-3"
                                            >
                                                <div
                                                    class="radio-img col-lg-3 col-sm-3 col-6"
                                                >
                                                    <input
                                                        id="radio-1a"
                                                        name="Car_Type"
                                                        type="radio"
                                                        value="Residential"
                                                        checked="checked"
                                                    />
                                                    <label for="radio-1a"
                                                        ><img
                                                            src="images/select-form/car.png"
                                                            alt=""
                                                        />Car</label
                                                    >
                                                </div>

                                                <div
                                                    class="radio-img col-lg-3 col-sm-3 col-6"
                                                >
                                                    <input
                                                        id="radio-1b"
                                                        name="Car_Type"
                                                        type="radio"
                                                        value="Office"
                                                    />
                                                    <label for="radio-1b"
                                                        ><img
                                                            src="images/select-form/van.png"
                                                            alt=""
                                                        />Van</label
                                                    >
                                                </div>

                                                <div
                                                    class="radio-img col-lg-3 col-sm-3 col-6"
                                                >
                                                    <input
                                                        id="radio-1c"
                                                        name="Car_Type"
                                                        type="radio"
                                                        value="Commercial"
                                                    />
                                                    <label for="radio-1c"
                                                        ><img
                                                            src="images/select-form/minibus.png"
                                                            alt=""
                                                        />Minibus</label
                                                    >
                                                </div>

                                                <div
                                                    class="radio-img col-lg-3 col-sm-3 col-6"
                                                >
                                                    <input
                                                        id="radio-1d"
                                                        name="Car_Type"
                                                        type="radio"
                                                        value="Retail"
                                                    />
                                                    <label for="radio-1d"
                                                        ><img
                                                            src="images/select-form/sportscar.png"
                                                            alt=""
                                                        />Prestige</label
                                                    >
                                                </div>
                                            </div>

                                            <div class="spacer-20"></div>

                                            <div class="row">
                                                <div class="col-lg-12 mb20">
                                                   
                                                    <h5  style="color:black">Pick Up Location</h5>
                                                    <select
                                                        name="Pick Up Time"
                                                        id="pickup-time"
                                                        class="form-control"
                                                        style="color:black"
                                                        v-model="
                                                            form.location
                                                        "
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
                                                    
                                                </div>
                                            </div>

                                            <input
                                                type="button"
                                                id="send_message"
                                                value="Find a Vehicle"
                                                class="btn-main pull-right"
                                                @click.prevent="submitSearch"
                                            />

                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="spacer-double d-lg-none d-sm-block"
                            ></div>
                            <div
                                class="spacer-double d-lg-none d-sm-block"
                            ></div>
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

    data() {
        return {
            form: useForm({
                location: "",
            }),
            locations: ["Airport", "CBD", "Westgate", "Samy Levy", "Chisipite"],
        };
    },

    methods: {
        submitSearch() {
            //redirect to cars page with query params
           window.location.href = `/cars?location=${this.form.location}`;
        },
    },
};
</script>
