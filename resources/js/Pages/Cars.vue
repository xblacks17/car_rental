<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="no-bottom no-top zebra" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                <div class="center-y relative text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 style="color: black">Cars</h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-cars">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div
                                    v-for="car in cars"
                                    class="col-xl-4 col-lg-6"
                                >
                                    <div class="de-item mb30">
                                        <div class="d-img">
                                            <img
                                                :src="`/storage/${car.image_url}`"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-info">
                                            <div class="d-text">
                                                <h4>{{ car.name }}</h4>
                                                
                                                <div class="d-atr-group">
                                                    <span class="d-atr"
                                                        ><img
                                                            src="images/icons/1.svg"
                                                            alt=""
                                                        />{{ car.company?.name }}</span
                                                    >

                                                    <span class="d-atr"
                                                        ><img
                                                            src="images/icons/3.svg"
                                                            alt=""
                                                        />{{ car.make }}</span
                                                    >
                                                    <span class="d-atr"
                                                        ><img
                                                            src="images/icons/4.svg"
                                                            alt=""
                                                        />{{ car.model }}</span
                                                    >
                                                </div>
                                                <div class="d-price">
                                                    Daily rate from
                                                    <span
                                                        >${{
                                                            car.unit_price
                                                        }}</span
                                                    >
                                                    <a
                                                        class="btn-main"
                                                        :href="`/cars/${car.id}`"
                                                        >Rent Now</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    props: ["cars", "companies"],

    data() {
        return {};
    },

    methods: {},
};
</script>
