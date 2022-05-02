<template>
    <section>
        <div data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
            <div><h3>{{ games }}</h3></div>
        </div>
    </section>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    components: {},
    props: ['games', 'nonwiredGame'],
    mounted: function () {
        this.$nextTick(function () {
            // $('.multiple-items').slick({
            //     infinite: true,
            //     slidesToShow: 3,
            //     slidesToScroll: 3
            // });
        })
    }

})
</script>
