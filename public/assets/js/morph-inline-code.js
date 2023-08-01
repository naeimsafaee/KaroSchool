
const { to, set, registerPlugin } = gsap

registerPlugin(MorphSVGPlugin)

$('.ticket-hover').on('mouseout', function (){
    gsap.to($(this), {morphSVG:"M0 11C0 4.92487 4.95584 0 11.0692 0H148.931C155.044 0 160 4.92487 160 11V39C160 45.0751 155.044 50 148.931 50H11.0692C4.95584 50 0 45.0751 0 39V11Z", duration: 0.3, fill: "#18E884"});
})

$('.ticket-hover').on('mouseover', function (){
    gsap.to($(this), {morphSVG:"M0 11C0 4.92487 4.95584 0 11.0692 0H148.931C155.044 0 160 4.92487 160 11C160 17.0751 153.5 18.9721 153.5 25C153.5 31.0279 160 32.9249 160 39C160 45.0751 155.044 50 148.931 50H11.0692C4.95584 50 0 45.0751 0 39C0 32.9249 5.5 30.8741 5.5 25C5.5 19.1259 0 17.0751 0 11ZZ", duration: 0.3 , fill: "#241953"});
})



$('.classes-item').on('mouseover', function () {
    let hover = $(this).find('.polygon-hover')
    gsap.to(hover, {morphSVG:"M9.90573 1.30047C13.0581 -0.433491 16.9419 -0.433491 20.0943 1.30047L24.9057 3.94704C28.0581 5.68101 30 8.8855 30 12.3534V17.6466C30 21.1145 28.0581 24.319 24.9057 26.053L20.0943 28.6995C16.9419 30.4335 13.0581 30.4335 9.90573 28.6995L5.09427 26.053C1.94192 24.319 0 21.1145 0 17.6466V12.3534C0 8.8855 1.94192 5.68101 5.09427 3.94704L9.90573 1.30047Z", duration: 0.3, fill: "#18E884"});
})
$('.classes-item').on('mouseout', function () {
    let hover = $(this).find('.polygon-hover')
    gsap.to(hover, {morphSVG:"M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z", duration: 0.3, fill: "#241953"});
})
$('.prerequisite-items').on('mouseover', function () {
    let hover = $(this).find('.polygon-hover')
    gsap.to(hover, {morphSVG:"M9.90573 1.30047C13.0581 -0.433491 16.9419 -0.433491 20.0943 1.30047L24.9057 3.94704C28.0581 5.68101 30 8.8855 30 12.3534V17.6466C30 21.1145 28.0581 24.319 24.9057 26.053L20.0943 28.6995C16.9419 30.4335 13.0581 30.4335 9.90573 28.6995L5.09427 26.053C1.94192 24.319 0 21.1145 0 17.6466V12.3534C0 8.8855 1.94192 5.68101 5.09427 3.94704L9.90573 1.30047Z", duration: 0.3, fill: "#18E884"});
})
$('.prerequisite-items').on('mouseout', function () {
    let hover = $(this).find('.polygon-hover')
    gsap.to(hover, {morphSVG:"M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z", duration: 0.3, fill: "#241953"});
})