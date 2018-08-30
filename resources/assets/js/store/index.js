import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import api from '../api'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
    	auth:{
    		token: null,
    		type: null,
    		expires: 0
    	},
    },
    getters: {
    	auth: (state) => {
    		return state.auth
    	}
    },
    mutations: {
    	store_session: (state, payload) => {
    		state.auth.token = payload.access_token
    		state.auth.type = payload.token_type
    		state.auth.expires = payload.expires_in
    	}
    },
    actions: {
    }
});

export default store;