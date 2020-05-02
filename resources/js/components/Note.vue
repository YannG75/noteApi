<template>
<div class="Note">
    <span> {{getNote.updated_at ?  moment(getNote.updated_at).format('MMMM Do YYYY, h:mm:ss a') : moment().format('MMMM Do YYYY, h:mm:ss a')}} | words : {{getWords}}</span>
    <textarea v-model="getNote.content" name="" id="create" cols="30" rows="10" placeholder="Votre note..." @input="countWord($event.target.value)" v-debounce="callCreateNote">{{getNote.content}}</textarea>

</div>
</template>

<script>
    import {mapActions,mapMutations,mapGetters} from 'vuex'
    import moment from 'moment'
    export default {
        name: "Note",
        data(){
            return {
            }
        },

        computed: {
            ...mapGetters(['getWords','getNote'])

        },

        methods: {
            moment(date) {
                return moment(date);
            },
            ...mapMutations(['countWord']),
            ...mapActions(['sendNote']),
            callCreateNote(val, e) {
                this.sendNote(val)
            }
        }
    }
</script>

<style scoped lang="scss">
.Note {
    width: 69vw;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 0 20px;

    span {
        text-align: center;
    }

    input {
        border: none;
        outline: none;
        font-size: 35px;
        font-weight: bold;
        background: none;
        color: #636b6f;
    }

    textarea {
        background: none;
        outline: none;
        border: none;
        margin: 20px 0;
        color: #636b6f;
        font-size: 20px;
    }
}
</style>
