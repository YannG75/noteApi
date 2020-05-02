<template>
    <div class="sideBar">
        <div class="create">
            <button @click="resetNote">
                create a New Note
            </button>
        </div>

        <ul>
            <li v-for="(note, index) in getAllNotes" >
                <p @click="getOneNote(note.id)">{{note.content}}</p>
                <button @click="deleteNote(note.id)"><i class="far fa-trash-alt"></i></button>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapActions,mapMutations,mapGetters} from 'vuex'
    export default {
        name: 'SideBar',
        data() {
            return {}
        },
        computed: {
            ...mapGetters(['getAllNotes'])
        },
        methods: {
            ...mapActions(['getOneNote','deleteNote']),
            ...mapMutations(['resetNote'])
        }

    }
</script>

<style lang="scss">

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #ffffff;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #202020;
    }

    ::-webkit-scrollbar-track-piece{
        background: #1f6fb2;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    .sideBar {
        width: 30vw;
        height: 100%;
        background: whitesmoke;
        overflow-y: scroll;
        overflow-x: hidden;


        .create {
            display: flex;
            justify-content: center;
            button {
                border: none;
                background: none;
                font-size: 15px;
                outline: none;
                padding: 10px;
                cursor: pointer;
            }
        }

        .create:hover {
            background: #f0f0f0;
        }

        ul {
            list-style: none;
            padding: 0;

            li {
                padding: 2px 10px;
                width: 95%;
                cursor: pointer;
                display: flex;
                justify-content: space-between;

                p {
                    width: 80%;
                    height: 35px;
                    line-height: 35px;
                    white-space: nowrap;
                    margin: 5px 0;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                button {
                    background: rgba(255, 0, 0, 0.56);
                    box-shadow: darkgrey 1px 1px 1px;
                    border: none;
                    opacity: 0;
                    width: 0;
                    cursor: pointer;
                    transition: width 1s, opacity 0.5s ;
                    .far {
                        font-size: 20px;
                        transition: opacity 1.5s ;
                        opacity: 0;
                    }
                }
            }
        }

        li:hover {
            background: #f0f0f0;
            button {
                opacity: 1;
                width: 20%;
                .far{
                    opacity: 1;
                }
            }
        }

    }
</style>
