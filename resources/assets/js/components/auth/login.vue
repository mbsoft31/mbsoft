<template>
<div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4" v-for="item, index in fields" :key="index">
            <label :class="item.classes.label" :for="item.name" v-html="item.label"></label>
            <input :class="(!item.valid)?item.classes.input +' border-red':item.classes.input" :id="item.name" :type="item.type" :placeholder="item.placeholder" v-model="item.value">
            <p class="text-red text-xs italic" v-if="!item.valid" v-html="item.validation.message"></p>
        </div>
        <div class="mb-6">
            <div class=""></div>
            <label class="block text-grey-darker text-sm font-bold mb-2">
                <input class="shadow mr-2 leading-tight" type="checkbox">
                <span class="text-sm">
                    Keep me logged in!
                </span>
            </label>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="login">
            Sign In
            </button>
            <div class="flex flex-col items-center justify-around">
                <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    Forgot Password?
                </a>
                <router-link to="/register">
                <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker">
                    Sign Up
                </a>
                </router-link>
            </div>
        </div>
    </form>
    <p class="text-center text-grey text-xs">
        ©2018 GB-soft. All rights reserved.
    </p>
</div>
</template>
<script>
export default {
name: 'Login',
mounted() {
console.log('Component mounted.')
},
data: () => {
return {
fields: [
{
type: 'email',
name: 'email',
label: 'Email',
placeholder: 'Enter your email...',
classes: {
label: 'block text-grey-darker text-sm font-bold mb-2',
input: 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline'
},
validation: {
rules: '',
message: 'Please choose an email.'
},
value: 'qsdqsdqs',
valid: true
},
{
type: 'password',
name: 'password',
label: 'Password',
placeholder: 'Enter your password...',
classes: {
label: 'block text-grey-darker text-sm font-bold mb-2',
input: 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline'
},
validation: {
rules: '',
message: 'Please choose a password.'
},
value: 'sdfsd',
valid: true
}
],
token: '',
token_type: ''
}
},
methods: {
getFields() {
let data = [];
let fields = this.fields;
for (var i = 0; i < fields.length ; i++) {
let s = []
s[fields[i].name] = fields[i].value
data.push(s)
}
var obj = data.reduce(function(result, item) {
var key = Object.keys(item)[0];
result[key] = item[key];
return result;
}, {});
console.log(obj)
return obj
},
login() {
axios.post('http://crud/api/login', this.getFields()).then(res => {
this.$store.commit('store_session' , res.data)
console.log(this.$store.state.auth)
}).catch(err => {
console.error(err)
})
}
},
computed: {
form_data: () => {
let data = [];
let fields = this.fields;
for (var i = 0; i < fields.length ; i++) {
let s = {
value: fields[i].value,
name: fields[i].name
};
data.push(s)
}
return data;
}
}
}
</script>