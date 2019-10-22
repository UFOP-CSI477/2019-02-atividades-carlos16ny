$('.card').click((event) => {
    var obj = event.currentTarget;
    console.log(obj);
    if (obj.dataset.info == 'correct') {
        $(obj).children()[1].style.backgroundColor = 'red';
    } else {
        $(obj).children()[1].style.backgroundColor = 'green';
    }
})

$('.form-control').change((event) => {
    var target = event.currentTarget;
    if (target.options[target.options.selectedIndex].dataset.info == 'correct') {
        target.offsetParent.style.backgroundColor = 'green';
    } else {
        target.offsetParent.style.backgroundColor = 'purple';
    }
})