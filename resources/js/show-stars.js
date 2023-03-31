// Create stars review
function getStars(vote) {
    vote /= 2;
    const stars = [];
    for (let i = 0; i < 5; i++) {
        if (vote < 0.8) {
            //not full active
            if (vote >= 0.3) {
                // 100% half
                stars.push(0.5);
            }
            else {
                // 100% disabled
                stars.push(0);
            }
        }
        else {
            //100% active
            stars.push(1);
        }
        vote--;
    }
    return stars;
}

const starsContainer = document.querySelectorAll(".show_stars")

/* getStars(4.5000).forEach(star => {
    let divBox = "<div class='star'></div>"
    
    starsContainer.innerHTML = divBox
}); */
console.log(starsContainer)

starsContainer.innerHTML = 'ciao'

/* for (let i = 0; i < 5; i++) {

} */











/* <div class="d-flex align-items-center">
   <div v-for="star in store.getStars(doctorData.reviews_avg_rating)" class="star"
       :class="(star === 0.5) ? 'half' : (star === 0) ? 'disabled' : ''"></div>
   <span>({{ doctorData.reviews_avg_rating / 2 }})</span>
</div> */

//{{ star===0.5 ? 'half' : (star===0) ? 'disabled : '' }} -------> ternary in blade??


//@if(star===0.5) ? 'half : (star===0) ? 'disabled : '' @endif -------> ternary in blade??