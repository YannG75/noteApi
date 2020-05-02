<template>
    <div class="home">
    <SideBar></SideBar>
    <Note></Note>
    </div>

</template>

<script>
    import SideBar from "../components/SideBar";
    import Note from "../components/Note";
    import {mapActions,mapMutations,mapGetters} from 'vuex'

    export default {
        name: 'Home',
        components: {
            SideBar,
            Note,
        },
        data() {
            return {
                test: this.$store.state.num
            }
        },
        methods: {
            ...mapActions(["getAllNotes"])
        },
        mounted() {
            this.getAllNotes()
        }
    }
</script>

<style lang="scss">
.home {
    display: flex;
    height: 91vh;

}
</style>
