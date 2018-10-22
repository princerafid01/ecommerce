import Vue from 'vue';
import axios from  'axios';
import Form from './core/Form';

window.axios = axios;
window.Form = form;



var app = new Vue({
    el: '#root',
    data: {
        form: new Form({
            name: '',
            desc: '',
        }),
        isLoading: false,
        skills: [],
    },
    methods: {
        onSubmit() {
            this.form.submit('post', '/form')
                .then(data => console.log(data))
                .catch(errors => console.log(errors));
            this.isLoading = true;

        }
    },

    mounted() {
        //make an ajax call
        axios.get('/skills').then(response => this.skills = response.data);


    },
});