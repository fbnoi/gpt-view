import { createApp } from 'vue';
import axios from 'axios';
import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';

$(function() {
    createApp({
        data: function  () {
            return {
                id: ident,
                history: [],
            }
        },
        mounted() {
            var vm = this;
            axios.get(this.route('api.session.history', {'id': vm.id}))
            .then(function (res) {
                if (res.status === 200) {
                    let response = res.data;
                    vm.$data.history = response.data;
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }
    }).use(ZiggyVue, Ziggy).mount('#chat-ui');
});
