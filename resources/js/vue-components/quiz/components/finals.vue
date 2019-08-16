<template>
    <div>
        <finals-all
                    :attempts="attempts">
        </finals-all>

    </div>

</template>

<script>

    import FinalsAllComponent from "./finals-all";
    import {Attempts} from './../models/view.models';
    export default {
        components: {
            'finals-all': FinalsAllComponent,
        },
        props: {
            attempts: {
                type: Array,
                default: function () { return [] }
            }
        },
        data() {
            return {
                /**
                 * @type (Array<Quiz>)
                 */
                /** @type {Number}*/
            }
        }
    }
</script>

<style scoped>

</style>