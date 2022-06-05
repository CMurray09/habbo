<template>
    <div id="darkMode">
        <div id="mainSearchPage" class="row expanded columns">

            <div id="gameOverlay">
                <div id="gameModal" class="row">

                    <div id="imageModalContainer" class="columns large-6">
                        <div id="imgThumbnailContainer">
                            <img id="imgThumbnailModal">
                        </div>
                        <div id="iconSeperator">
                            <p>__________________________________</p>
                        </div>
                        <div id="iconContainer">
                <span>
                    <i aria-hidden="true" class="fa fa-heart" data-tooltip tabindex="1" title="Favourite"></i>
                </span>
                            <span>
                    <i aria-hidden="true" class="fa fa-thumbs-up" data-tooltip tabindex="2" title="Like"></i>
                </span>
                            <span>
                    <i aria-hidden="true" class="fa fa-thumbs-down" data-tooltip tabindex="3" title="Dislike"></i>
                </span>
                            <span>
                    <i aria-hidden="true" class="fa fa-star-half-o" data-tooltip tabindex="4"
                       title="Completed until.."></i>
                </span>
                            <span>
                    <i aria-hidden="true" class="fa fa-star" data-tooltip tabindex="5" title="Completed"></i>
                </span>
                            <span>
                <i aria-hidden="true" class="fa fa-clock-o" data-tooltip tabindex="6" title="Play later"></i>
                </span>
                            <span>
                    <i aria-hidden="true" class="fa fa-flag" data-tooltip tabindex="7" title="Report"></i>
                </span>
                        </div>
                    </div>

                    <div id="playModalContainer" class="columns large-3">
            <span>
                <i id="homeIcon" aria-hidden="true" class="fa fa-home" data-tooltip tabindex="8" title="Room name"></i>
            </span>
                        <div id="homeIconInfoContainer">
                            <p id="homeIconInfo"></p>
                        </div>
                        <span>
                <i id="roomIcon" aria-hidden="true" class="fa fa-cubes" data-tooltip tabindex="9"
                   title="Room count"></i>
            </span>
                        <p id="roomIconInfo"></p>
                        <span>
                <i id="categoryIcon" aria-hidden="true" class="fa fa-gamepad" data-tooltip tabindex="10"
                   title="Category"></i>
                <p id="categoryIconInfo"></p>
            </span>
                        <span>
                <i id="typeIcon" aria-hidden="true" class="fa fa-map-signs" data-tooltip tabindex="11" title="Type"></i>
            </span>
                        <p id="typeIconInfo"></p>
                        <div id="playContainer">
                            <a id="playButton" class="button"><b>Play</b></a>
                        </div>
                    </div>
                    <div id="avatarModalContainer" class="columns large-3">
                        <i id="closeModalCross" class="fa fa-times fa-lg"></i>
                        <div id="avatarName">
                            <p id="avatarNameDisplay"></p>
                        </div>
                        <div id="avatarImgContainer">
                            <div id="avatarBody">
                                <img id="avatarImg">
                            </div>
                        </div>
                        <div id="avatarProfileContainer">
                            <a id="avatarProfileButton" class="button"><b>Profile</b></a>
                        </div>
                    </div>

                </div>
            </div>

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
                        <div v-for="game in games" class="sliderContent">
                            <div class="sliderContentChild">
                                <div class="gameImageContainer">
                                    <img :src="game.thumbnail" class="gameThumbnail">
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


            <h3 class="gameTitle">Habbodome Originals</h3>
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
                        <div v-for="game in games" class="sliderContent">
                            <div class="sliderContentChild">
                                <div class="gameImageContainer">
                                    <img src="{{ game.thumbnail }}">
                                    <a class="button letsPlay" href="{{ game.room_link}}" target="_blank">Play</a>
                                    <div class="gameFooter">
                                        <p>{{ game.category }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <h3 class="gameTitle">Non-Wired</h3>
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
                        <div v-for="game in games" class="sliderContent">
                            <div class="sliderContentChild">
                                <div class="gameImageContainer">
                                    <img src="{{ game.thumbnail }}">
                                    <a class="button letsPlay" href="{{ game.room_link}}" target="_blank">Play</a>
                                    <div class="gameFooter">
                                        <p>{{ game.category }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <h3 class="gameTitle">Mixed</h3>
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
                        <div v-for="game in games" class="sliderContent">
                            <div class="sliderContentChild">
                                <div class="gameImageContainer">
                                    <img src="{{ game.thumbnail }}">
                                    <a class="button letsPlay" href="{{ game.room_link}}" target="_blank">Play</a>
                                    <div class="gameFooter">
                                        <p>{{ game.category }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import $ from 'jquery';
import 'foundation-sites';
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
            },
        },
        created() {
            window.addEventListener("resize", this.sliderSetup);
        },
        mounted() {
            this.$nextTick(function () {
                this.readySlick();
                this.gameAnimate();
            });
        },
        methods: {
            sliderSetup: function () {
                $.each($('.sliderMech'), function () {
                    $(this).slick('slickGoTo', 0);
                    $(this).closest('.arrowContainer').find('.leftArrow').css({'visibility': 'hidden'});
                    $(this).closest('.arrowContainer').find('.rightArrow').css({'visibility': 'visible'});
                });
                for (const slickObj of $('.sliderMech')) {
                    slickObj.slick.refresh();
                }
                this.gameAnimate();
            },
            gameAnimate: function () {
                let widthBox = $('.sliderContent').parent().width();
                let totalWidth = $('.sliderContainer').width();
                let calcWidth = Math.floor((320 - widthBox) / 2);
                let calcWidthStr = calcWidth.toString() + 'px';

                $.each($('.sliderContainer').find('.rightBlocker'), function () {
                    $(this).css({'left': totalWidth - 10 + 'px'});

                });
                $.each($('.sliderContainer').find('.leftBlocker'), function () {
                    $(this).css({'right': totalWidth - 10 + 'px'});
                });

                let remainderLength = (($('.arrowContainer').width() - $('.slick-list').width()) / 2);
                let arrowWidth = $('.leftArrow i').width();
                $('.leftArrow').css({'left': remainderLength - arrowWidth - 10 + 'px'});
                $('.rightArrow').css({'right': remainderLength - arrowWidth - 12 + 'px'});


                $.each($('.slick-slide'), function () {
                    $(this).find('.sliderContentChild').css({'width': widthBox, 'height': '160px'});
                    $(this).find('.gameFooter').css({'width': widthBox});
                    $(this).find('.gameImageContainer').css({'width': '320px', 'height': '160px'});
                    $(this).find('.gameImageContainer img').css({
                        'width': '320px',
                        'height': '320px', 'right': calcWidthStr, 'bottom': '80px'
                    });
                });

                $.each($('.sliderMech'), function () {
                    let isLastSlideActive = $(this).find('.slick-slide').last().hasClass('slick-active');
                    if (isLastSlideActive || $(this).find('.slick-slide').length === 0) {
                        $(this).parents('.arrowContainer').find('.rightArrow').css({'visibility': 'hidden'});
                    }
                })

                let gameTime;
                let thisGame;
                let animateDur = 0.2;
                let imageWidth;

                $('.sliderContent').on({
                    click: function () {
                        document.getElementById('gameOverlay').style.display = 'block';
                        let gameOwnerName = $(this).find('.gameOwner')[0].innerHTML;
                        let gameOwnerImage = 'https://www.habbo.com/habbo-imaging/avatarimage?user=' + gameOwnerName + '&direction=4&head_direction=4&gesture=sml&crr=6&size=l&format=.gif'
                        let gameName = $(this).find('.gameName')[0].innerHTML;
                        let gameRoomCount = $(this).find('.gameRoomCount')[0].innerHTML;
                        let gameType = $(this).find('.gameType')[0].innerHTML;
                        let gameCategory = $(this).find('.gameCategory')[0].innerHTML;
                        let roomLink = $(this).find('.room_link')[0].innerHTML;
                        $('#homeIconInfo').text(gameName);
                        $('#roomIconInfo').text(gameRoomCount);
                        $('#typeIconInfo').text(gameType);
                        $('#categoryIconInfo').text(gameCategory);
                        $('#imgThumbnailModal').attr('src', $(this).find('.gameThumbnail')[0].src);
                        $('#avatarImg').attr('src', gameOwnerImage);
                        $('#playButton').click(() => window.open(roomLink));
                        $('#avatarProfileButton').click(() => window.open('https://www.habbo.com/profile/' + gameOwnerName));
                        $('#avatarNameDisplay').text(gameOwnerName);
                        fitty('#avatarNameDisplay', {
                            minSize: 6,
                            maxSize: 16,
                        });
                        fitty('#homeIconInfo', {
                            minSize: 6,
                            maxSize: 16,
                        });
                    },
                    mouseenter: function () {
                        let imgWidth = $(this).parent().width();
                        let newWidth = Math.round(imgWidth + 20);
                        let sliderContentChild = $(this).find('.sliderContentChild');
                        let gameImageContainerImg = $(this).find('.gameImageContainer img');
                        let leftBlocker = $(this).parents('.sliderContainer').find('.leftBlocker');
                        let rightBlocker = $(this).parents('.sliderContainer').find('.rightBlocker');

                        imageWidth = imgWidth;
                        thisGame = $(this);

                        if (newWidth > 320) {
                            newWidth = 320;
                        }

                        gameTime = setTimeout(function () {
                            thisGame.css('z-index', '2');
                            let firstActive = thisGame.parents('.slick-list').find('.slick-active').first().find('.sliderContent');
                            let lastActive = thisGame.parents('.slick-list').find('.slick-active').last().find('.sliderContent');
                            let tl = gsap.timeline();
                            tl.to(thisGame, {duration: animateDur, width: newWidth, height: 180, top: -10, left: -10}, 0);
                            tl.to(sliderContentChild, {duration: animateDur, width: newWidth, height: 180}, 0);
                            tl.to(gameImageContainerImg, {duration: animateDur, right: calcWidth - 10, bottom: 70}, 0);
                            if (thisGame.is(firstActive)) {
                                tl.to(leftBlocker, {duration: animateDur, right: totalWidth}, 0);
                            }
                            if (thisGame.is(lastActive)) {
                                tl.to(rightBlocker, {duration: animateDur, left: totalWidth}, 0);
                            }
                        }, 300);
                    },
                    mouseleave: function () {
                        clearTimeout(gameTime);

                        let sliderContentChild = $(this).find('.sliderContentChild');
                        let gameImageContainerImg = $(this).find('.gameImageContainer img');
                        let leftBlocker = $(this).parents('.sliderContainer').find('.leftBlocker');
                        let rightBlocker = $(this).parents('.sliderContainer').find('.rightBlocker');
                        thisGame = $(this);

                        let tl = gsap.timeline();
                        tl.to(thisGame, {
                            duration: animateDur,
                            width: imageWidth,
                            height: 160,
                            top: 0,
                            left: 0,
                            zIndex: 0
                        }, 0);
                        tl.to(sliderContentChild, {duration: animateDur, width: imageWidth, height: 160}, 0);
                        tl.to(gameImageContainerImg, {duration: animateDur, right: calcWidth, bottom: 80}, 0);
                        tl.to(leftBlocker, {duration: animateDur, right: totalWidth - 10}, 0);
                        tl.to(rightBlocker, {duration: animateDur, left: totalWidth - 10}, 0);

                    },
                });
            },
            readySlick: function () {
                $('.sliderMech').slick({
                    infinite: false,
                    arrows: false,
                    rows: 3,
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
                $('#closeModalCross').click(function () {
                    document.getElementById('gameOverlay').style.display = 'none';
                })

                $('body').click(function (a) {
                    if (a.target.id === 'gameOverlay') {
                        document.getElementById('gameOverlay').style.display = 'none';
                    }
                });

                $('.leftArrow').click(function () {
                    $(this).parent().find('.sliderMech').slick('slickPrev');
                    let firstActive = $(this).parent().find('.slick-slide').first().hasClass('slick-active');

                    $(this).parent().find('.rightArrow').css({'visibility': 'visible'});
                    if (firstActive) {
                        $(this).css({'visibility': 'hidden'});
                    }
                });

                $('.rightArrow').click(function () {
                    $(this).parent().find('.sliderMech').slick('slickNext');
                    let lastActive = $(this).parent().find('.slick-slide').last().hasClass('slick-active');

                    $(this).parent().find('.leftArrow').css({'visibility': 'visible'});
                    if (lastActive) {
                        $(this).css({'visibility': 'hidden'});
                    }
                });

                $('.sliderMech').on('swipe', function (event, slick, direction) {
                    let leftArrow = $(this).parents('.arrowContainer').find('.leftArrow');
                    let rightArrow = $(this).parents('.arrowContainer').find('.rightArrow');

                    if (direction === 'right') {
                        rightArrow.css({'visibility': 'visible'});
                        let firstActive = ($(this).find('.slick-slide').first().hasClass('slick-active'));
                        if (firstActive) {
                            leftArrow.css({'visibility': 'hidden'});
                        }
                    } else if (direction === 'left') {
                        leftArrow.css({'visibility': 'visible'});
                        let lastActive = ($(this).find('.slick-slide').last().hasClass('slick-active'));
                        if (lastActive) {
                            rightArrow.css({'visibility': 'hidden'});
                        }
                    }
                });
            }
        },
    }
)
</script>

<style lang="scss">
$sliderHeight: 180px;
// $sliderBackgroundColour: rgb(0, 175, 236);
$whiteColour: rgb(204, 204, 194);
$greyColour: rgb(154, 154, 144);
$blackColour: rgb(104, 104, 94);
$gameBackgroundColour: rgb(26, 25, 25);

/********************************
***       MAIN               ****
********************************/

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

/********************************
***       SLIDER             ****
********************************/

.sliderMech {
    height: $sliderHeight;
    position: relative;
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
    color: white;
}

.leftArrow i, .rightArrow i {
    color: $whiteColour;
    font-size: 80px;
    width: 100%;
}

.sliderContainer {
    margin-left: 3%;
    margin-right: 3%;
    position: relative;
    overflow: hidden !important;
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

.slick-list {
    padding-left: 10px !important;
    padding-right: 11px !important;
}

.slick-track {
    margin-left: 0px !important;
    margin-right: 0px !important;
}

.slick-slide {
    margin: 0 3px;
    margin-bottom: 5px;
}

.gameImageContainer {
    position: relative;
}

.gameImageContainer img {
    position: relative;
    object-fit: none;
}

.slick-prev:before, .slick-next:before {
    color: white !important;
}

.slick-arrow {
    visibility: hidden;
}

.sliderContent:hover .sliderContentChild {
    outline: 6.5px solid $gameBackgroundColour;
}

.hideData {
    visibility: hidden;
}

#gameOverlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 10;
    display: none;
}

#gameModal {
    width: 800px;
    height: 400px;
    position: fixed;
    margin: auto;
    top: 20%;
    left: 0;
    right: 0;
    z-index: 11;
    background-color: #333;
    border-radius: 10px;
}

/********************************
***       IN-GAME            ****
********************************/

#imageModalContainer, #playModalContainer, #avatarModalContainer {
    background-color: #333;
    height: 400px;
}

#imageModalContainer {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

#avatarModalContainer {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

#imgThumbnailContainer {
    position: relative;
}

#imgThumbnailModal {
    position: absolute;
    top: 20px;
    left: 25px;
    border: 5px solid #555;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}

#iconSeperator {
    position: absolute;
    top: 340px;
    left: 48px;
    width: 320px;
    color: $whiteColour;
}

#iconContainer {
    position: absolute;
    top: 365px;
    left: 48px;
    width: 320px;
}

.gameRow {
    width: 100%;
    position: relative;
    top: 80px;
}

#avatarName {
    position: relative;
    top: 50px;
    left: 5px;
    color: $whiteColour;
}

#avatarNameDisplay {
    text-align: center;
    max-width: 100%;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%)
}

#avatarModalContainer {
    position: relative;
}

#avatarImgContainer {
    width: 100%;
    height: 180px;
    position: relative;
    top: 86px;
}

#avatarBody {
    position: absolute;
    left: 54%;
    -webkit-transform: translateX(-54%);
    transform: translateX(-54%);
    overflow: hidden;
    height: 160px;
    width: 104px;
}

#avatarImg {
    position: relative;
    bottom: 20px;
}

#avatarProfileContainer {
    position: absolute;
    width: 170px;
    height: 41px;
    top: 304px;
}

#avatarProfileButton {
    background-color: #fb8b31;
    border-color: #f7e165;
    width: 88px;
    border-radius: 5px;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}

#avatarProfileButton:hover {
    background-color: #ffa55c;
    border-color: #f7e581;
}

#avatarProfileButton:active {
    background-color: #ef7f24;
    border-color: #fb8b31;
}

#playContainer {
    position: relative;
}

#playButton {
    width: 128px;
    top: 279px;
    border-radius: 5px;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    background-color: #00ab54;
    border-color: #b9f373;
}

#playButton:hover {
    background-color: #1dc26e;
    border-color: #c3f587;
}

#playButton:active {
    background-color: #00813e;
    border-color: #00ab54;
}

/********************************
***         ICONS            ****
********************************/

#homeIcon {
    position: absolute;
    top: 78px;
    left: 418px;
}

#homeIconInfoContainer {
    max-width: 135px;
    height: 25px;
}

#homeIconInfo {
    position: absolute;
    top: 74px;
    left: 450px;
}

#roomIcon {
    position: absolute;
    top: 128px;
}

#roomIconInfo {
    position: absolute;
    top: 124px;
    left: 450px;
}

#categoryIcon {
    position: absolute;
    top: 178px;
}

#categoryIconInfo {
    position: absolute;
    top: 174px;
    left: 450px;
}

#typeIcon {
    position: absolute;
    top: 228px;
}

#typeIconInfo {
    position: absolute;
    top: 224px;
    left: 450px;
}

#iconContainer span {
    padding-left: 21px;
}

#homeIcon, #roomIcon, #categoryIcon, #typeIcon, #homeIconInfo,
#roomIconInfo, #categoryIconInfo, #typeIconInfo, #iconContainer i {
    color: $whiteColour;
    border-bottom: 0px !important;
}

#iconContainer i:hover {
    color: $greyColour;
}

#iconContainer i:active {
    color: $blackColour;
}

.fa-times {
    position: relative;
    left: 95%;
    top: 2px;
    cursor: pointer;
    color: #777;
}

#closeModalCross {
    font-size: 25px;
}
</style>
