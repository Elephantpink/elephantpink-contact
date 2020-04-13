import axios from 'axios'

let contactStore = {
    state: {
        contactAPI: '/api/v1/contact',
        contacts: [],
    },
    getters: {
        contactAPI: state => {
            return state.contactAPI
        },
        contacts: state => {
            return state.contacts
        },
    },
    mutations: {
        // CONTACTS
        setContacts (state, contacts) {
          state.contacts = contacts
        },
    },
    actions: {
        getContacts ({ commit, getters }) {
            return axios.get(getters.contactAPI)
              .then(response => {
                commit('setContacts', response.data.contacts)
              })
              .catch(error => {
                console.error(error)
              })
          },
    }
}

export default contactStore