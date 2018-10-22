import Errors from './Errors'

class Form {
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }


    }

    data() {

        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }


        return data;
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                });
        });

    }

    onSuccess(data) {
        alert(data.msg);

        this.errors.clear();
        this.reset();
        app.isLoading = false;

    }

    onFail(errors) {
        app.isLoading = false;
        this.errors.record(errors);
    }

}

export default Form;