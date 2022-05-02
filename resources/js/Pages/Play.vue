<template>
    <section>
        <div id="darkMode">
            <div class="row expanded columns" id="mainSearchPage">
                <h3 class="gameTitle">Wired</h3>
                <div class="arrowContainer">
                    <div class="leftArrow">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="rightArrow">
                        <i class="fa fa-angle-right"></i>
                    </div>
                    <div class="sliderContainer">
                        <div class="leftBlocker"></div>
                        <div class="rightBlocker"></div>

                        <div class="sliderMech">
                            <div class="sliderContent" v-for="game in games">
                                <div class="sliderContentChild">
                                    <div class="gameImageContainer">
                                        <img class="gameThumbnail" v-bind:src="game.thumbnail">
                                        <p class="hideData">{{ game.id }}</p>
                                        <p class="hideData gameOwner">{{ game.owner }}</p>
                                        <p class="hideData room_link">{{ game.room_link }}</p>
                                        <p class="hideData">{{ game.co_owner }}</p>
                                        <p class="hideData gameRoomCount">{{ game.room_count }}</p>
                                        <p class="hideData gameCategory">{{ game.category }}</p>
                                        <p class="hideData gameType">{{ game.game_type }}</p>
                                        <p class="hideData gameName">{{ game.name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    components: {},
    props: {
        games: {
            thumbnail: String,
            id: Number,
            owner: String,
            room_link: String,
            co_owner: String,
            room_count: Number,
            category: String,
            game_type: String,
            name: String,
        }
    },
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
