<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Phone Numbers</h3>
                    </div>
                    <div class="card-body">
                        <div class="row filtration">
                            <div class="col-6">
                                <select class="form-select" id="country" v-on:change="filter($event)">
                                    <option value="">Select Country</option>
                                    <option v-for="country in countries" :value="country.key">{{ country.value }}</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" id="state" v-on:change="filter($event)">
                                    <option value="">Select States</option>
                                    <option value="Ok">Valid</option>
                                    <option value="NOk">Invalid</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Country Code</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody v-if="customers.data && customers.data.length > 0">
                                <tr v-for="(customer, index) in customers.data" :key="index">
                                    <td>{{ customer.country }}</td>
                                    <td>{{ customer.state }}</td>
                                    <td>{{ customer.countryCode }}</td>
                                    <td>{{ customer.phoneNumber }}</td>
                                </tr>
                                </tbody>
                                <tbody v-else>
                                <tr>
                                    <td align="center" colspan="3">No record found.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination align="center" :data="customers" @pagination-change-page="list"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import pagination from 'laravel-vue-pagination'
export default {
    name: 'customers',
    components: {
        pagination
    },
    data() {
        return {
            customers: {
                type: Object,
                default: null
            },
            state: '',
            countryCode: '',
            countries: [],
            states: []
        }
    },
    mounted() {
        this.list()
    },
    methods: {
        async list(page = 1) {
            const countryCode = this.countryCode
            const state = this.state
            await axios.get(`/api/customers?page=${page}&country_code=${countryCode}&state=${state}`)
                .then(({data}) => {
                    this.customers = data
                })
                .catch(({ response }) => {
                    console.error(response)
                })
        },
        filter(e) {
            if (e.target.id === 'country') {
                this.countryCode = e.target.value
            }
            if (e.target.id === 'state') {
                this.state = e.target.value
            }
            this.list()
        },
        async loadCountries() {
            await axios.get(`/api/countries`)
                .then(({data}) => {
                    if (data) {
                        let countries = [];
                        Object.keys(data).forEach(key => {
                            let obj = {
                                'key': key,
                                'value': data[key],
                            };
                            countries.push(obj);
                        });
                        this.countries = countries
                    }
                })
        },
    },
    created() {
        this.loadCountries()
    }
}
</script>
<style scoped>
.pagination {
    margin-bottom: 0;
}
.filtration {
    margin-bottom: 20px;
}
</style>
