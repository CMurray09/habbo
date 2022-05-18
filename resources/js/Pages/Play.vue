<template>
    <section>
        <div id="darkMode">
            <div class="row expanded columns" id="mainSearchPage">
                <h3 class="gameTitle">Wired</h3>
                <div class="arrowContainer">
                    <div class="leftArrow">
                        <i class="fa fa-angle-right"></i>
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
import $ from 'jquery';
import 'slick-carousel';

export default defineComponent({
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
            $('.sliderMech').slick({
                infinite: false,
                arrows: false,
                rows: 1,
                swipe: false,
                slidesToShow: 12,
                slidesToScroll: 12,
                touchThreshold: 50,
                responsive: [
                    {
                        breakpoint: 3700,
                        settings: {
                            slidesToShow: 11,
                            slidesToScroll: 11,
                        }
                    },
                    {
                        breakpoint: 3350,
                        settings: {
                            slidesToShow: 10,
                            slidesToScroll: 10
                        }
                    },
                    {
                        breakpoint: 3000,
                        settings: {
                            slidesToShow: 9,
                            slidesToScroll: 9
                        }
                    },
                    {
                        breakpoint: 2650,
                        settings: {
                            slidesToShow: 8,
                            slidesToScroll: 8
                        }
                    },
                    {
                        breakpoint: 2300,
                        settings: {
                            slidesToShow: 7,
                            slidesToScroll: 7
                        }
                    },
                    {
                        breakpoint: 1950,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 6
                        }
                    },
                    {
                        breakpoint: 1600,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5
                        }
                    },
                    {
                        breakpoint: 1250,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 550,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 200,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        })
    },
    methods: function () {
        function readySlick() {
        }

    }
})
</script>

<style lang="scss">
$sliderHeight: 180px;
$gameBackgroundColour: rgb(26, 25, 25);
$whiteColour: rgb(204, 204, 194);

#darkMode {
    background-color: $gameBackgroundColour;
    width: 100%;
    height: 100%;
    min-height: 692px;
}

.gameTitle {
    color: $whiteColour;
    margin-left: 4%;
}

.arrowContainer {
    position: relative;
}

.leftArrow, .rightArrow {
    width: 28.57px !important;
    height: 80px !important;
    margin: auto;
    top: 0;
    bottom: 0;
    position: absolute;
    z-index: 2;
}

.leftArrow {
    visibility: hidden;
}

.leftArrow:hover, .rightArrow:hover {
    background-color: black;
}

.leftArrow:active i, .rightArrow:active i {
    color: white;;
}

.leftArrow i, .rightArrow i {
    color: rgb(204, 204, 194);
    font-size: 80px;
    width: 100%;
}

.sliderContainer {
    margin-left: 3%;
    margin-right: 3%;
    position: relative;
    overflow: hidden !important;
}

.leftBlocker {
    background-color: rgb(26, 25, 25);
    width: 200px;
    height: 180px;
    position: absolute;
    z-index: 1;
}

.rightBlocker {
    background-color: rgb(26, 25, 25);
    width: 200px;
    height: 180px;
    position: absolute;
    z-index: 1;
}

.sliderMech {
    height: $sliderHeight;
    position: relative;
}

.sliderContent {
    margin-top: 10px;
    transition-delay: 0s;
    box-shadow: 3px 3px #222;
    background-color: $gameBackgroundColour;
    cursor: pointer;
    position: relative;
    display: block;
}

.sliderContentChild {
    overflow: hidden;
    position: relative;
    outline: 6.5px solid $gameBackgroundColour;
}

.sliderContent:hover .sliderContentChild {
    outline: 6.5px solid $gameBackgroundColour;
}

.gameImageContainer {
    position: relative;
}

.gameImageContainer img {
    position: relative;
    object-fit: none;
}

</style>
