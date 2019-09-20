<?php

use frontend\assets\AxiosAsset;
use frontend\assets\VueAsset;

$this->title = 'Api Complex List';

VueAsset::register($this);
AxiosAsset::register($this);

$api = Yii::$app->params['api'];

$this->registerJs("
    Vue.component('pagination', {
        props: {
            quantityOnCurrentPage: {
              type: Number,
              required: true
            },
            pageCount: {
              type: Number,
              required: true
            },
            currentPage: {
              type: Number,
              required: true
            },
            totalCount: {
              type: Number,
              required: true
            },
            clickHandler: {
              type: Function,
              default: () => { }
            },
        },
        template: '#pagination',
        methods: {
            handlePageSelected(selected) {
              this.clickHandler(selected)
            }
        },
    })

    var app = new Vue({
        el: '#app',
        data: function () {
            return {
                page: 1,
                cityId: 0,
                cities: [],
                complexes: [],
                meta: null,
            }
        },
        computed: {
            queryComplexes() {
                return {
                    'page': this.page,
                    'city_id': this.cityId,
                }
            },
        },
        methods: {
            clickCallback: function (pageNum) {
                this.page = pageNum;
            },
            getCities: function () {
                axios
                    .get('" . $api . "/city')
                    .then(response => {
                        this.cities = [{id: 0, attributes: {
                            name: 'Any'
                        }}].concat(response.data.data)
                    })
            },
            getComplexes: function () {
                let params = {
                    'fields[complexes]': 'name,address',
                    'page': this.page
                };
                
                if (this.cityId) {
                    params['filter[city_id]'] = this.cityId
                }
            
                axios
                    .get('" . $api . "/complex?' + this.getUriParams(params))
                    .then(response => {
                        this.meta = response.data.meta;
                        this.complexes = response.data.data;
                    });
            },
            getUriParams: function (obj) {
                var str = '';
                for (var key in obj) {
                    if (str != '') {
                        str += '&';
                    }
                    str += key + '=' + encodeURIComponent(obj[key]);
                }
                
                return str;
            }
        },
        watch: {
            queryComplexes() {
                this.getComplexes()
            }
        },
        mounted() {
            this.getCities();
            this.getComplexes();
        }
    })
");

?>

<div class="site-index">
    <div id="app">
        <div class="search">
            <div class="form-group">
                <label>City</label>
                <select class="form-control" v-model="cityId">
                    <option v-for="city in cities" :value="city.id">{{ city.attributes.name }}</option>
                </select>
            </div>

            <pagination v-if="meta" :page-count="meta['page-count']" :current-page="meta['current-page']" :total-count="meta['total-count']"  :click-handler="clickCallback" :quantity-on-current-page="complexes.length"></pagination>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="complex in complexes">
                        <td>{{ complex.attributes.name }}</td>
                        <td>{{ complex.attributes.address  }}</td>
                    </tr>
                </tbody>
            </table>

            <pagination v-if="meta" :page-count="meta['page-count']" :current-page="meta['current-page']" :total-count="meta['total-count']"  :click-handler="clickCallback" :quantity-on-current-page="complexes.length"></pagination>
        </div>
    </div>
</div>

<script type="text/x-template" id="pagination">
    <div class="pagination-wrapper">
        <nav aria-label="Page navigation example">
            <ul class="pagination m-0" v-if="pageCount > 1">
                <li class="page-item" v-for="i in pageCount">
                    <span @click="handlePageSelected(i)" class="page-link">{{ i }}</span>
                </li>
            </ul>
        </nav>

        <div class="page-info">
            Current page: {{ currentPage }} /  Quantity On Current Page: {{ quantityOnCurrentPage }} / Total count: {{ totalCount }}
        </div>
    </div>
</script>
