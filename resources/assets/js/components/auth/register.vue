<template>
    <div class="w-full flex items-center justify-center bg-grey-lighter h-screen">
        <div class="container">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                
                <div class="mb-4" v-for="item, index in fields" :key="index">
                    <label :class="item.classes.label" :for="item.name" v-html="item.label"></label>
                    <input :class="(!item.valid)?item.classes.input +' border-red':item.classes.input" :id="item.name" :type="item.type" :placeholder="item.placeholder" v-model="item.value">
                    <p class="text-red text-xs italic" v-if="!item.valid" v-html="item.validation.message"></p>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="register">
                        Register
                    </button>
                    <div class="flex flex-col items-center justify-around">
                        <router-link to="/login">
                            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker">
                                Sign In
                            </a>
                        </router-link>
                    </div>
                </div>
            </form>
            <p class="text-center text-grey text-xs">
                ©2018 GB-soft. All rights reserved.
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Register',
        mounted() {
            console.log('Component mounted.')
        },
        data: () => {
            return {
                fields: [
                    {
                        type: 'text',
                        name: 'name',
                        label: 'Name',
                        placeholder: 'Enter your Full name...',
                        classes: {
                            label: 'block text-grey-darker text-sm font-bold mb-2',
                            input: 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline'
                        },
                        validation: {
                            rules: '',
                            message: 'Please enter a name.'
                        },
                        value: 'qsdqsdqs',
                        valid: true
                    },
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
                    },
                    {
                        type: 'password',
                        name: 'password_confirmation',
                        label: 'Password confirmation',
                        placeholder: 'Enter your password...',
                        classes: {
                            label: 'block text-grey-darker text-sm font-bold mb-2',
                            input: 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline'
                        },
                        validation: {
                            rules: '',
                            message: 'Please confirm your password.'
                        },
                        value: 'sdfsd',
                        valid: false
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
            register() {
                axios.post('http://crud/api/register', this.getFields()).then(res => {
                    this.token = res.data.access_token
                    this.token_type = res.data.token_type
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
