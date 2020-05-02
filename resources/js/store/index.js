import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        notes: [],
        note: {
            id: null,
            content: ''
        },
        words: 0
    },
    mutations: {
        countWord(state, note) {
            let wordsCount = note.trim().split(' ')
            state.words = wordsCount.length

        },

        getNotes(state, notes) {
            state.notes = notes
        },

        getNote(state,note ){
            let wordsCount = note.content.trim().split(' ')
            state.words = wordsCount.length
            state.note = note
        },
        resetNote(state){
            state.note = {
                id: null,
                content: ''
            }
        }
    },
    actions: {
        getAllNotes({commit}) {
            axios.get('https://notes-laravel.herokuapp.com/api/notes')
                .then(notes => {
                    commit('getNotes',notes.data.notes)
                })
        },
        getOneNote({commit}, noteId) {
            axios.get('https://notes-laravel.herokuapp.com/api/notes/'+ noteId)
                .then(note => {
                    commit('getNote', note.data.note)
                })
        },

        sendNote({commit, state, dispatch}, note) {
            if (state.note.id === null) {
                axios.post('https://notes-laravel.herokuapp.com/api/notes', {
                    content: note,

                })
                    .then(res => {
                        setTimeout(()=> {
                            dispatch('getAllNotes')
                        },1000)
                        commit('getNote',res.data.note)
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }

            else {
                axios.put('https://notes-laravel.herokuapp.com/api/notes/'+state.note.id, {
                    content: note,

                })
                    .then(res => {
                        setTimeout(()=> {
                            dispatch('getAllNotes')
                        },1000)
                        commit('getNote',res.data.note)
                    })
                    .catch(error =>{
                        console.log(error);
                    });
            }

        },

        deleteNote({commit, state, dispatch}, noteId) {
            axios.delete('https://notes-laravel.herokuapp.com/api/notes/'+noteId)
                .then(res => {
                    setTimeout(()=> {
                        dispatch('getAllNotes')
                    },1000)
                    if (state.note.id === noteId)
                    commit('resetNote')
                })
                .catch(error =>{
                    console.log(error);
                });
        }

    },
    getters: {
        getAllNotes: state => {
            return state.notes
        },

        getWords: state => {
            return state.words
        },

        getNote: state => {
            return state.note

        }
    }
})
