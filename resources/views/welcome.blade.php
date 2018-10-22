<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
        .loading{background: #000;}
        </style>
        <!-- Styles -->
        
    </head>
    <body>
        <div id="root">
            <ul>
                <li v-for="skill in skills">@{{ skill }}</li>
            </ul>

            <form action="/form" method="post" @submit.prevent='onSubmit' @keydown='form.errors.clear($event.target.name)'>
                <input type="text" name="name" id='name' v-model='form.name' >
                <span v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                <input type="text" name="desc" id='desc' v-model='form.desc'>
                <span v-if="form.errors.has('desc')" v-text="form.errors.get('desc')"></span>
                
                <input type="submit" value="Submit" :disabled='form.errors.any()' :class="{loading:isLoading}">
            </form>

        </div>
        
        <script src="/js/app.js"></script>

    </body>
</html>
