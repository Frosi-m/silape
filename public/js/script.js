const observer_l = new IntersectionObserver((entries) =>{
    entries.forEach((entry)=> {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show1');
        }
        else{
            entry.target.classList.remove('show1');
        }
    });
});

const hiddenElements_l = document.querySelectorAll('.hidden-l');
hiddenElements_l.forEach((el) => observer_l.observe(el));

const observer_r = new IntersectionObserver((entries) =>{
    entries.forEach((entry)=> {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show2');
        }
        else{
            entry.target.classList.remove('show2');
        }
    });
});

const hiddenElements_r = document.querySelectorAll('.hidden-r');
hiddenElements_r.forEach((el) => observer_r.observe(el));