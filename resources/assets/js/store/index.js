import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import api from '../api'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        sidebarOpen: false,
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
        toggle_sidebar(state){
            state.sidebarOpen = !state.sidebarOpen
        },
    	store_session: (state, payload) => {
    		state.auth.token = payload.access_token
    		state.auth.type = payload.token_type
    		state.auth.expires = payload.expires_in
    	},

    },
    actions: {
        toggle_sidebar({ commit, state }){
            commit('toggle_sidebar')
        }
    }
});

export default store;