document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('light-mode');
    document.querySelector('.navbar').classList.toggle('light-mode');
    document.querySelector('.card').classList.toggle('light-mode');

    if (document.body.classList.contains('light-mode')) {
        this.innerHTML = '<img src="assets/images/light-mode.png" style="width: 20px; background-color:darkgoldenrod;" alt="الوضع المظلم">';
    } else {
        this.innerHTML = '<img src="assets/images/night-mode.png" style="width: 20px; background-color:darkgoldenrod;"  alt="الوضع الفاتح">';
    }
});

var controller = new ScrollMagic.Controller();
var box1 = document.getElementById('box1');
var box2 = document.getElementById('box2');
var box3 = document.getElementById('box3');
gsap.from(box1, { opacity: 0, y: 100, duration: 1 });
gsap.from(box2, { opacity: 0, x: -100, duration: 1 });
gsap.from(box3, { opacity: 0, y: 100, duration: 1 });
new ScrollMagic.Scene({
    triggerElement: box1,
    triggerHook: 0.8, 
    reverse: false // تعطيل العكس للتأكد من أن التأثير يظهر مرة واحدة فقط
})
.setTween(box1, { opacity: 1, y: 0 })
.addTo(controller);

new ScrollMagic.Scene({
    triggerElement: box2,
    triggerHook: 0.8,
    reverse: false
})
.setTween(box2, { opacity: 1, x: 0 })
.addTo(controller);

new ScrollMagic.Scene({
    triggerElement: box3,
    triggerHook: 0.8,
    reverse: false
})
